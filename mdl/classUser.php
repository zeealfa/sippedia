<?php
error_reporting(E_ALL);
/**
 * For App Scope Variables.
 * User: Alfa
 * Date: 21/07/2016
 * Time: 3:20
 */


require_once("mdl/classBaca.php");

class classUser extends classBaca
{
    private $accuser = "";
    private $idSikad = 0;
    private $loginAs = 0;
    private $isAdmin = 0;
    public $dbLocal = 0;
    public $tahunAjaran = '';
    public $periode = '';
    public $noInduk = '';

    public $loginStat = false;
    public $email = "";
    public $kdUser = "";

    private function writes($sql)
    {
        require_once("mdl/classTulis.php");
        $tulis = new classTulis();
        $tulis->query_one($sql);
        $hasil = new stdClass();
        $hasil->error = $tulis->error;
        $hasil->errno = $tulis->errno;

        return $hasil;
    }


    public function cekLoginStat($accuser)
    {
        $sql = "SELECT ID_SIKAD,LOGIN_STAT,IS_ADMIN,EMAIL ,KD_TAHUN_AJARAN,KD_PERIODE_BELAJAR,NO_INDUK as noInduk FROM smreborn.t_session WHERE SESSID='$accuser' AND SESS_ACTIVE=1  ";
        $data = $this->query_one($sql);
        $user_sql = "SELECT KD_USER FROM smreborn.t_users WHERE EMAIL_USER='$data->EMAIL'";
        $user_data = $this->query_one($user_sql);
        if ($user_data->KD_USER != "") {
            $this->accuser = $accuser;
            $this->idSikad = $data->ID_SIKAD;
            $this->loginAs = $data->LOGIN_STAT;
            $this->isAdmin = $data->IS_ADMIN;
            $this->email = $data->EMAIL;
            $this->kdUser = $user_data->KD_USER;
            $this->tahunAjaran = $data->KD_TAHUN_AJARAN;
            $this->periode = $data->KD_PERIODE_BELAJAR;
            $this->noInduk = $data->noInduk;

            $sikad_sql = "SELECT LOCAL_SETTING as dbClient FROM mastersikad.t_sikad WHERE ID_SIKAD=$data->ID_SIKAD";
            $client_data = $this->query_one($sikad_sql);
            $this->dbLocal = $client_data->dbClient;
            if ($client_data->dbClient == 'production') $this->dbLocal = 'pas_sma';

        } else $data = null;

        return $data;
    }

    public function getUserMenu($targetMenu = "", $f)
    {
        $host = "//" . $_SERVER['SERVER_NAME'] . "/";
        $params = $targetMenu;
        $hasil = new stdClass();
        $sql = "SELECT * FROM smlearning.t_menu  WHERE `LEVEL` =1 AND IS_VISIBLE=1 AND (AKSES_BY=$this->loginAs OR AKSES_BY=0) ORDER BY `URUT`";
        $data = $this->query_all($sql);
        $bread = '';
        if ($data) {
            foreach ($data as $index => $item) {
                $anak = $this->anakMenu($item->ID_MENU, $params);
                $data[$index]->anak = $anak;
                if ($anak->items) {
                    $data[$index]->hiper = 'javascript:;';
                    $data[$index]->className = 'nav-link nav-toggle';
                    if ($anak->isOpen) {
                        $classLi = ' active open';
                        $bread = $item->NM_MENU . "|" . $anak->openBread;
                    } else $classLi = '';
                    $data[$index]->classLi = $classLi;

                } else {
//                    $data[$index]->hiper = str_replace(" ", "", strtolower($item->NM_MENU));
                    $data[$index]->hiper = $host . str_replace(" ", "", strtolower($item->NM_MENU));
                    $data[$index]->className = 'nav-link nav-toggle';
                    if ($params == $data[$index]->hiper) {
                        $classLi = ' active open';
                        $bread = $item->NM_MENU;
                    } else $classLi = '';
                    $data[$index]->classLi = $classLi;
                }
            }
        }
        $hasil->error = $this->error;
        $hasil->errno = $this->errno;
        $hasil->items = $data;
        $hasil->bread = $bread;
        $content = "";

        if ($targetMenu != "utama") {
            $targetMenu = str_replace(" ", "", strtolower($targetMenu));
            $page_sql = "SELECT t_menu.TARGET,ID_MENU from smlearning.t_menu WHERE LCASE(REPLACE(NM_MENU,' ',''))='$targetMenu'";
            if (isset($f[1])) $page_sql .= " AND VAR1='$f[1]'";
            $page_data = $this->query_one($page_sql);
            if ($page_data) {
                $pageTarget = $page_data->TARGET;
                $content = $this->getContent($page_data->ID_MENU, $f);
            } else $pageTarget = "404";
        } else {
            $pageTarget = "utama";
        }
        $hasil->pageTarget = $pageTarget;
        $hasil->pageContent = $content;

        return $hasil;
    }

    private function anakMenu($idMenu, $params)
    {
        $host = "//" . $_SERVER['SERVER_NAME'] . "/";
        $sql = "SELECT * FROM smlearning.t_menu WHERE ID_PARENT=$idMenu AND IS_VISIBLE=1 AND AKSES_BY=$this->loginAs ORDER BY `URUT`";
        $data = $this->query_all($sql);
        $isOpen = false;
        $theLevel = '';
        $theBread = '';
        if ($data) {
            foreach ($data as $index => $item) {
                $anak = $this->anakMenu($item->ID_MENU, $params);
                $data[$index]->anak = $anak;
                if ($anak->items) {
                    $data[$index]->hiper = 'javascript:;';
                    $data[$index]->className = 'nav-link nav-toggle';
                    if ($anak->isOpen) {
                        $classLi = ' active open';
                        $isOpen = true;
                        $theLevel = $item->LEVEL;
                        $theBread = $item->NM_MENU . "|" . $anak->openBread;
                    } else $classLi = '';
                    $data[$index]->classLi = $classLi;
                } else {
                    $data[$index]->hiper = $host . str_replace(" ", "", strtolower($item->NM_MENU));
                    $data[$index]->className = 'nav-link';
                    if ($params == str_replace(" ", "", strtolower($item->NM_MENU))) {
                        $classLi = ' active open';
                        $isOpen = true;
                        $theLevel = $item->LEVEL;
                        $theBread = $item->NM_MENU;
                    } else {
                        $classLi = '';
                    }
                    $data[$index]->classLi = $classLi;
                }
            }
        }
        $hasil = new stdClass();
        $hasil->error = $this->error;
        $hasil->errno = $this->errno;
        $hasil->isOpen = $isOpen;
        $hasil->items = $data;
        $hasil->openLevel = $theLevel;
        $hasil->openBread = $theBread;

        return $hasil;
    }

    private function getContent($idMenu, $f)
    {
        $hasil = new stdClass();
        $hasil->isTwig = true;
        $hasil->element = array();
        $jamNow = date('Y-m-d H:i:s');
        $myPlace = $_COOKIE['PHPSESSID'];
        switch ($idMenu) {
            case 9999:#logout
                $hasil->isTwig = false;
                setcookie('accuser', null, -1000);
                break;
            case 9:#Induk Soal baru
                $judulKolom = array(
                    "TANGGAL_SOAL" => "TANGGAL",
                    "ID_JENIS_SOAL" => "JENIS SOAL",
                    'ID_TINGKAT_SEKOLAH' => ' TINGKAT ',
                    'ID_MATA_PELAJARAN' => ' MATA PELAJARAN ',

                );
                $removeKolom = array(
//                    'ID_SOAL'   => true,
                    'TIMESTAMP_SOAL_INDUK' => true,
                );
                $hideKolom = array(
                    'KD_USER' => true,
                    'KD_SOAL_INDUK' => true,
//                    'SUMBER_SOAL' => true,
                );
                $placeholder = array(
                    'TANGGAL_SOAL' => 'Tanggal Pembuatan Soal',
                    'DESKRIPSI_SOAL' => '',
                );
                $className = array(
                    'TANGGAL_SOAL' => 'tanggalan',
                    'KD_SOAL_INDUK' => 'primary ',
                    'DESKRIPSI_SOAL' => 'encrypt ',
                    'ID_JENIS_SOAL' => ' select2 ',
                    "ID_TINGKAT_SEKOLAH" => ' select2 selectCond1 ', #update condition
                    "ID_MATA_PELAJARAN" => '  selectResult1 '
                );
                $defaultValue = array(
                    "TANGGAL_SOAL" => date('d-m-Y'),
                    "KD_SOAL" => sha1($this->accuser . rand(1000, 9999) . date('dmYHis')),
                    "KD_SOAL_INDUK" => sha1($this->accuser . rand(1000, 9999) . date('dmYHis')),
                    "KD_USER" => $this->kdUser
                );
                $parSelect = $this->generateSelect(array(
                    "db" => "smlearning",
                    "table" => "r_jenis_soal",
                    "primaryKey" => "ID_JENIS_SOAL",
                    "displayKey" => "NM_JENIS_SOAL",
                    "orderKey" => "ID_JENIS_SOAL"))->items;
                $tingkatSelect = $this->generateSelect(array(
                    "db" => "refs",
                    "table" => "r_tingkat_sekolah",
                    "primaryKey" => "ID_TINGKAT_SEKOLAH",
                    "displayKey" => "NM_TINGKAT_SEKOLAH",
                    "orderKey" => "ID_TINGKAT_SEKOLAH"))->items;
                $mapelSelect = $this->generateSelect(array(
                    "db" => "refs",
                    "table" => "r_mata_pelajaran",
                    "primaryKey" => "ID_MATA_PELAJARAN",
                    "displayKey" => "NM_MATA_PELAJARAN",
                    "groupBy" => "ID_MATA_PELAJARAN",
                    "orderKey" => "ID_MATA_PELAJARAN"
                ))->items;

                $alterType = array(
                    "ID_JENIS_SOAL" => array(
                        "tipe" => "select",
                        "parameter" => $parSelect
                    ),
                    "ID_TINGKAT_SEKOLAH" => array(
                        "tipe" => "select",
                        "parameter" => $tingkatSelect
                    ),
                    "ID_MATA_PELAJARAN" => array(
                        "tipe" => "select",
                        "parameter" => $mapelSelect
                    )
                );
                $buttons = array(
                    array(
                        "idButton" => "btnSimpan",
                        "tipe" => "button",
                        "className" => "green",
                        "icon" => "fa-check",
                        "label" => "Soal Tunggal",
                    ),
//                    array(
//                        "idButton"  => "btnPaket",
//                        "tipe"      => "button",
//                        "className" => "blue",
//                        "icon"      => "fa-list",
//                        "label"     => "Paket Soal",
//                    ),
                    array(
                        "idButton" => "btnBatal",
                        "tipe" => "button",
                        "className" => "red",
                        "icon" => "fa-times",
                        "label" => "Batal",
                    ),
                );
                $frmConfig = array(
                    "database" => "smlearning",
                    "table" => "t_soal_induk",
                    "target" => "t_soal_induk",
                    "judul" => $judulKolom,
                    "isRemove" => $removeKolom,
                    "isHide" => $hideKolom,
                    "placeholder" => $placeholder,
                    "className" => $className,
                    "defValue" => $defaultValue,
                    "alterType" => $alterType,
                    "buttonState" => true,
                    "buttons" => $buttons,
                );
                $builder = $this->frmBuilder($frmConfig);
                $hasil->element['forms'][] = array(
                    "boxColor" => "box grey bordered",
                    "idElement" => "formSoal",
                    "judul" => "Pembuatan Soal",
                    "dataset" => $builder
                );
                break;
            case 10:#update soal
                $parSelect = $this->generateSelect(array(
                    "db" => "smlearning",
                    "table" => "r_jenis_soal",
                    "primaryKey" => "ID_JENIS_SOAL",
                    "displayKey" => "NM_JENIS_SOAL",
                    "condition" => "ID_JENIS_SOAL<3",
                    "orderKey" => "ID_JENIS_SOAL"))->items;


                $alterType = array(
                    "ID_JENIS_SOAL" => array(
                        "tipe" => "select",
                        "parameter" => $parSelect
                    ),
                );

                $buttons = array(
                    /*                    array(
                                            "idButton"  => "btnAdvance",
                                            "tipe"      => "button",
                                            "className" => "blue",
                                            "icon"      => "fa-arrow-up",
                                            "label"     => "Lanjutan",
                                        ),*/
                    array(
                        "idButton" => "btnJawab",
                        "tipe" => "button",
                        "className" => "yellow",
                        "icon" => "fa-list",
                        "label" => "Atur Jawaban",
                    ),

                );
                $removeKolom = array(
                    'KD_SOAL' => true,
                    'KD_SOAL_INDUK' => true,
                    'KD_USER' => true,
                    'TIMESTAMP' => true,
                );
                $hideKolom = array();
                $placeholder = array();
                $className = array(
                    'TEKS_SOAL' => ' encrypt',
                    'TANGGAL_SOAL' => ' tanggalan ',
                    "ID_JENIS_SOAL" => ' select2 updating ',
                );
                $defaultValue = array();
                $judulKolom = array(
                    'ID_JENIS_SOAL' => 'JENIS_SOAL',
                    "ID_TINGKAT_SEKOLAH" => "TINGKAT",
                    "ID_MATA_PELAJARAN" => "MATA PELAJARAN",
                );
                $syarat = array(
                    "KD_SOAL" => $f[2]
                );
                $frmConfig = array(
                    "database" => "smlearning",
                    "table" => "t_soal",
                    "target" => "t_soal",
                    "syarat" => $syarat,
                    "judul" => $judulKolom,
                    "isRemove" => $removeKolom,
                    "isHide" => $hideKolom,
                    "placeholder" => $placeholder,
                    "className" => $className,
                    "defValue" => $defaultValue,
                    "alterType" => $alterType,
                    "buttonState" => true,
                    "buttons" => $buttons,
                );
                $builder = $this->frmBuilder($frmConfig);
                #Untuk pilihan
                $sql = "SELECT KD_SOAL as kode,ID_JENIS_SOAL as jenis FROM smlearning.t_soal WHERE KD_SOAL='$f[2]' ";
                $data_soal = $this->query_one($sql);
                $data_jawab = null;
                if ($data_soal) {
                    switch ($data_soal->jenis) {
                        case '1':
                        case '2':
                            $kdSoal = $f[2];
                            $sql_jawab = "SELECT NO_URUT_JAWABAN as urut,ISI_JAWABAN as jawaban,RESPON_JAWABAN as respon,IS_BENAR as benar FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$f[2]'";
                            $data_jawab = $this->query_all($sql_jawab);
                            if ($data_jawab) {
                                foreach ($data_jawab as $index => $item) {
                                    $item->jawaban = base64_decode($item->jawaban);
                                }
                            }
                            break;
                        case '3':#benar salah
                            $kdSoal = $f[2];
                            $sql_jawab = "SELECT NO_URUT_JAWABAN as urut,ISI_JAWABAN as jawaban,RESPON_JAWABAN as respon,IS_BENAR as benar FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$f[2]'";
                            $data_jawab = $this->query_all($sql_jawab);
                            if (count($data_jawab) != 2) {
                                $sql = "DELETE FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$kdSoal'";#hapus dulu
                                $this->writes($sql);

                                $sql = "INSERT INTO smlearning.t_soal_jawaban_multiple (KD_SOAL, NO_URUT_JAWABAN, ISI_JAWABAN, RESPON_JAWABAN, IS_BENAR)
                                    VALUES ('$kdSoal',1,'Benar','',0)";
                                $this->writes($sql);
                                $sql = "INSERT INTO smlearning.t_soal_jawaban_multiple (KD_SOAL, NO_URUT_JAWABAN, ISI_JAWABAN, RESPON_JAWABAN, IS_BENAR)
                                    VALUES ('$kdSoal',2,'Salah','',0)";
                                $this->writes($sql);
                            }
                            $data_jawab = $this->query_all($sql_jawab);
                            break;
                        case '5':#Uraian
                            $kdSoal = $f[2];

                            $sql_jawab = "SELECT NO_URUT_FILE as urut,DESKRIPSI_FILE as deskripsi,ID_TIPE_FILE as tipefile,IS_WAJIB as wajib FROM smlearning.t_soal_jawaban_upload WHERE KD_SOAL='$f[2]'";
                            $data_jawab = $this->query_all($sql_jawab);
                            break;
                    }
                }
                $hasil->element['forms'][] = array("idElement" => "formSoal", "judul" => "Detail Soal", "dataset" => $builder);
                $hasil->data['soal'] = $data_soal;
                $hasil->data['opsi'] = $data_jawab;
            case 11:#update pilihan using form
                #Untuk soal
                $sql = "SELECT KD_SOAL as kode,ID_JENIS_SOAL as jenis FROM smlearning.t_soal WHERE KD_SOAL='$f[2]' ";
                $data_soal = $this->query_one($sql);

                $pil_sql = "SELECT  NO_URUT_JAWABAN FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$f[2]'";
                $jum = ($this->query_affected($pil_sql)) + 1;

                $judulKolom = array();
                $removeKolom = array(
                    "IS_BENAR" => true
                );
                $hideKolom = array(
                    "KD_SOAL" => true,
                    "NO_URUT_JAWABAN" => true

                );
                $placeholder = array(
                    "ISI_JAWABAN" => "Pilihan jawaban yang ditampilkan",
                    "RESPON_JAWABAN" => "Ini adalah respon sistem apabila peserta didik menjawab pilihan ini"
                );
                $className = array(
                    "ISI_JAWABAN" => " encrypt "
                );
                $alterType = array(
                    "RESPON_JAWABAN" => "text"
                );
                $buttons = array();
                $syarat = array(
                    'KD_SOAL' => $f[2],
                    'NO_URUT_JAWABAN' => @$f[3]
                );
                if ($data_soal->jenis == 3) {#benar salah
                    $className = array();
                    $alterType = array(
                        "RESPON_JAWABAN" => "text",
                        "ISI_JAWABAN" => "text"
                    );

                }
                $table = "t_soal_jawaban_multiple";
                $target = "t_soal_jawaban_multiple";

                if ($data_soal->jenis == 5) {#Upload
                    $className = array();
                    $alterType = array(
                        "RESPON_JAWABAN" => "text",
                        "ISI_JAWABAN" => "text"
                    );
                    $table = "t_soal_jawaban_upload";
                    $target = "t_soal_jawaban_upload";
                    $pil_sql = "SELECT  NO_URUT_FILE FROM smlearning.t_soal_jawaban_upload WHERE KD_SOAL='$f[2]'";
                    $jum = ($this->query_affected($pil_sql)) + 1;
                    $syarat = array(
                        'KD_SOAL' => $f[2],
                        'NO_URUT_FILE' => @$f[3]
                    );

                }
                $defaultValue = array(
                    "KD_SOAL" => $f[2],
                    "NO_URUT_JAWABAN" => $jum,
                    "NO_URUT_FILE" => $jum,
                );

                $frmConfig = array(
                    "database" => "smlearning",
                    "table" => $table,
                    "target" => $target,
                    "syarat" => $syarat,
                    "judul" => $judulKolom,
                    "isRemove" => $removeKolom,
                    "isHide" => $hideKolom,
                    "placeholder" => $placeholder,
                    "className" => $className,
                    "defValue" => $defaultValue,
                    "alterType" => $alterType,
                    "buttonState" => false,
                    "buttons" => $buttons,
                );
                $builder = $this->frmBuilder($frmConfig);
                $hasil->element['forms'][] = array("idElement" => "formJawaban", "judul" => "Detail Soal", "dataset" => $builder);
                $hasil->data['soal'] = $data_soal;

                break;
            case 12:#update jawaban
                $kdSoal = $f[2];
                switch ($f[3]) {#tipe
                    case 1:
                    case 3:#satu pilihan
                        $urut = $f[4];
                        $val = $f[5];
                        $sql = "UPDATE smlearning.t_soal_jawaban_multiple SET IS_BENAR=0 WHERE KD_SOAL='$kdSoal' ";
                        $this->writes($sql);
                        $sql = "UPDATE smlearning.t_soal_jawaban_multiple SET IS_BENAR=$val WHERE KD_SOAL='$kdSoal' AND  NO_URUT_JAWABAN=$urut";
                        $result = $this->writes($sql);
                        $hasil->error = $result;
                        $sql = "SELECT NO_URUT_JAWABAN AS a, IS_BENAR as b FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$kdSoal'";
                        $data = $this->query_all($sql);
                        $hasil->items = $data;

                        break;
                    case 2:#pilihan ganda multi jawaban
                        $urut = $f[4];
                        $val = $f[5];
                        $sql = "UPDATE smlearning.t_soal_jawaban_multiple SET IS_BENAR=$val WHERE KD_SOAL='$kdSoal' AND  NO_URUT_JAWABAN=$urut";
                        $result = $this->writes($sql);
                        $hasil->error = $result;
                        $sql = "SELECT NO_URUT_JAWABAN AS a, IS_BENAR as b FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$kdSoal'";
                        $data = $this->query_all($sql);
                        $hasil->items = $data;
                        break;
                }
                $hasil->isTwig = false;
                break;
            case 13:#hapus jawaban
                $kdSoal = $f[2];
                $urut = $f[4];
                $sql = "DELETE FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$kdSoal' AND  NO_URUT_JAWABAN=$urut";
                $a = $this->writes($sql);
                $sql = "DELETE FROM smlearning.t_soal_jawaban_upload WHERE KD_SOAL='$kdSoal' AND  NO_URUT_FILE=$urut";
                $a = $this->writes($sql);
                $hasil->error = $a;
                $hasil->isTwig = false;
                $sql = "SELECT NO_URUT_JAWABAN AS a, IS_BENAR as b FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$kdSoal'";

                if (isset($f[3]) && $f[3] == 5) {
                    $sql = "SELECT NO_URUT_FILE AS a FROM smlearning.t_soal_jawaban_upload WHERE KD_SOAL='$kdSoal'";
                }

                $data = $this->query_all($sql);
                $hasil->items = $data;
                break;
            case 14:#List opsi jawaban
                $kdSoal = $f[2];
                if (isset($f[3])) $tipe = $f[3];
                else $tipe = 1;
                $sql = "SELECT NO_URUT_JAWABAN AS a, IS_BENAR as b, ISI_JAWABAN as `c`, RESPON_JAWABAN as `d`,$tipe as `e`  FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$kdSoal'";

                if (isset($f[3]) && $f[3] == 5) {
                    $sql = "SELECT NO_URUT_FILE AS a, DESKRIPSI_FILE as b, NM_TIPE_FILE as `c`, IS_WAJIB as `d`,$tipe as `e`  FROM smlearning.t_soal_jawaban_upload
                              INNER JOIN refs.r_tipe_file ON refs.r_tipe_file.ID_TIPE_FILE=smlearning.t_soal_jawaban_upload.ID_TIPE_FILE
                      WHERE KD_SOAL='$kdSoal'";
                    $tipe = $f[3];
                }
                $data = $this->query_all($sql);
                if (($data) && ($tipe < 4)) {
                    foreach ($data as $index => $item) {
                        $item->c = base64_decode($item->c);
                    }
                }
                $hasil->error = $sql;
                $hasil->items = $data;
                $hasil->isTwig = false;
                break;
            case 15:#List Soal
                $sql = "SELECT * FROM smlearning.t_soal_induk ";
                if (isset($f[2])) {
                    $filter = $f[2];
                } else {
                    $sql .= " WHERE KD_USER='$this->kdUser'";
                }

                $data = $this->query_all($sql . " ORDER BY TIMESTAMP_SOAL_INDUK DESC");
                echo $this->error;
                $soaleach = array();
                if ($data) {
                    foreach ($data as $index => $item) {
                        $mapel_sql = "SELECT NM_MATA_PELAJARAN AS nama from refs.r_mata_pelajaran WHERE ID_MATA_PELAJARAN=$item->ID_MATA_PELAJARAN";
                        $mapel_nama = $this->query_one($mapel_sql);
                        $tingkat_sql = "SELECT NM_TINGKAT_SEKOLAH AS nama from refs.r_tingkat_sekolah WHERE ID_TINGKAT_SEKOLAH=$item->ID_TINGKAT_SEKOLAH";
                        $tingkat_nama = $this->query_one($tingkat_sql);
                        $user_sql = "SELECT NM_USER as nama FROM smreborn.t_users WHERE KD_USER='$this->kdUser'";
                        $user_data = $this->query_one($user_sql);

                        $times = DateTime::createFromFormat('Y-m-d H:i:s', $item->TIMESTAMP_SOAL_INDUK);
                        $soaleach[$mapel_nama->nama . "-" . $tingkat_nama->nama][] = array(
                            'a' => $item->KD_SOAL_INDUK,
                            'judul' => $item->JUDUL_SOAL,
                            'tanggal' => $item->TIMESTAMP_SOAL_INDUK,
                            'oleh' => $user_data->nama,
                            'tDate' => $times->format('d M'),
                            'tTime' => $times->format('H:i'),
                        );
                    }
                }
                $hasil->items = $soaleach;
                $hasil->error = $this->error;
                $hasil->isTwig = false;
                break;
            case 16:#update paket soal
                $alterType = array(
//                    "ID_JENIS_SOAL" => array(
//                        "tipe"      => "select",
//                        "parameter" => $parSelect
//                    ),
                );
                $buttons = array(
                    array(
                        "idButton" => "btnSimpan",
                        "tipe" => "button",
                        "className" => "green",
                        "icon" => "fa-plus",
                        "label" => "Atur Soal",
                    ),

                );
                $removeKolom = array(
                    "KD_USER" => true,
                    "ID_TINGKAT_SEKOLAH" => true,
                    "ID_MATA_PELAJARAN" => true,
                    "TIMESTAMP_SOAL_INDUK" => true,
                );
                $hideKolom = array(
                    "KD_SOAL_INDUK" => true,
                );
                $placeholder = array();
                $className = array(
                    "TANGGAL_SOAL" => ' tanggalPanjang ',
                    "DESKRIPSI_SOAL" => ' encrypt ',
                    "KD_SOAL_INDUK" => ' primary ',
                );
                $readOnly = array(
                    "TANGGAL_SOAL" => true
                );
                $defaultValue = array();
                $judulKolom = array(
                    "DESKRIPSI_SOAL" => 'PENGANTAR',
                );
                $syarat = array(
                    "KD_SOAL_INDUK" => $f[2]
                );
                $frmConfig = array(
                    "database" => "smlearning",
                    "table" => "t_soal_induk",
                    "target" => "t_soal_induk",
                    "syarat" => $syarat,
                    "judul" => $judulKolom,
                    "isRemove" => $removeKolom,
                    "isHide" => $hideKolom,
                    "isReadOnly" => $readOnly,
                    "placeholder" => $placeholder,
                    "className" => $className,
                    "defValue" => $defaultValue,
                    "alterType" => $alterType,
                    "buttonState" => true,
                    "buttons" => $buttons,
                );
                $builder = $this->frmBuilder($frmConfig);
                $hasil->element['forms'][] = array("idElement" => "formPaketSoal", "judul" => "Detail Soal", "dataset" => $builder);
                break;
            case 17:
                $kdInduk = $f[2];
                $sql = "SELECT * FROM smlearning.t_soal_induk WHERE KD_SOAL_INDUK='$kdInduk'";
                $data = $this->query_one($sql);
                $hasil->data['induk'] = $data;
                break;
            case 18:#update soal induk using form
                #Untuk soal
                $kdInduk = $f[2];
                $sql = "DELETE FROM smlearning.t_soal WHERE KD_SOAL='$kdInduk'";
                $this->writes($sql);
                $sql = "SELECT DESKRIPSI_SOAL AS a FROM smlearning.t_soal_induk WHERE KD_SOAL_INDUK='$kdInduk'";
                $data = $this->query_one($sql);
                if ($data)
                    $data->a = base64_decode($data->a);
                $hasil->data['soal'] = $data;
                $hasil->data['judul'] = 'Teks Pengantar';
                break;
            case 19:#update soal
                $parSelect = $this->generateSelect(array(
                    "db" => "smlearning",
                    "table" => "r_jenis_soal",
                    "primaryKey" => "ID_JENIS_SOAL",
                    "displayKey" => "NM_JENIS_SOAL",
                    "orderKey" => "ID_JENIS_SOAL"))->items;


                $alterType = array(
//                    "ID_JENIS_SOAL" => array(
//                        "tipe"      => "select",
//                        "parameter" => $parSelect
//                    ),
                );

                $buttons = array(
                    /*                    array(
                                            "idButton"  => "btnAdvance",
                                            "tipe"      => "button",
                                            "className" => "blue",
                                            "icon"      => "fa-arrow-up",
                                            "label"     => "Lanjutan",
                                        ),*/
                    array(
                        "idButton" => "btnJawab",
                        "tipe" => "button",
                        "className" => "yellow",
                        "icon" => "fa-list",
                        "label" => "Atur Jawaban",
                    ),

                );
                $removeKolom = array(
                    'KD_SOAL' => true,
                    'KD_SOAL_INDUK' => true,
                    'KD_USER' => true,
                    'TIMESTAMP' => true,
                );
                $hideKolom = array(
                    'ID_JENIS_SOAL' => true,

                );
                $placeholder = array();
                $className = array(
                    'TEKS_SOAL' => ' encrypt',
                    'TANGGAL_SOAL' => ' tanggalan ',
//                    "ID_JENIS_SOAL" => ' select2 updating ',
                );
                $defaultValue = array(
                    "ID_JENIS_SOAL" => $f[4]
                );
                $judulKolom = array(
                    "ID_TINGKAT_SEKOLAH" => "TINGKAT",
                    "ID_MATA_PELAJARAN" => "MATA PELAJARAN",
                );
                $syarat = array(
                    "KD_SOAL_INDUK" => $f[2],
                    "KD_SOAL" => $f[3],
                );
                $frmConfig = array(
                    "database" => "smlearning",
                    "table" => "t_soal",
                    "target" => "t_soal",
                    "syarat" => $syarat,
                    "judul" => $judulKolom,
                    "isRemove" => $removeKolom,
                    "isHide" => $hideKolom,
                    "placeholder" => $placeholder,
                    "className" => $className,
                    "defValue" => $defaultValue,
                    "alterType" => $alterType,
                    "buttonState" => true,
                    "buttons" => $buttons,
                );
                $builder = $this->frmBuilder($frmConfig);
                #Untuk pilihan
                $sql = "SELECT KD_SOAL as kode,ID_JENIS_SOAL as jenis FROM smlearning.t_soal WHERE KD_SOAL='$f[2]' ";
                $data_soal = $this->query_one($sql);
                $data_jawab = null;
                if ($data_soal) {
                    switch ($data_soal->jenis) {
                        case '1':
                        case '2':
                            $kdSoal = $f[2];
                            $sql_jawab = "SELECT NO_URUT_JAWABAN as urut,ISI_JAWABAN as jawaban,RESPON_JAWABAN as respon,IS_BENAR as benar FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$f[2]'";
                            $data_jawab = $this->query_all($sql_jawab);
                            if ($data_jawab) {
                                foreach ($data_jawab as $index => $item) {
                                    $item->jawaban = base64_decode($item->jawaban);
                                }
                            }
                            break;
                        case '3':#benar salah
                            $kdSoal = $f[2];
                            $sql_jawab = "SELECT NO_URUT_JAWABAN as urut,ISI_JAWABAN as jawaban,RESPON_JAWABAN as respon,IS_BENAR as benar FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$f[2]'";
                            $data_jawab = $this->query_all($sql_jawab);
                            if (count($data_jawab) != 2) {
                                $sql = "DELETE FROM smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$kdSoal'";#hapus dulu
                                $this->writes($sql);

                                $sql = "INSERT INTO smlearning.t_soal_jawaban_multiple (KD_SOAL, NO_URUT_JAWABAN, ISI_JAWABAN, RESPON_JAWABAN, IS_BENAR)
                                    VALUES ('$kdSoal',1,'Benar','',0)";
                                $this->writes($sql);
                                $sql = "INSERT INTO smlearning.t_soal_jawaban_multiple (KD_SOAL, NO_URUT_JAWABAN, ISI_JAWABAN, RESPON_JAWABAN, IS_BENAR)
                                    VALUES ('$kdSoal',2,'Salah','',0)";
                                $this->writes($sql);
                            }
                            $data_jawab = $this->query_all($sql_jawab);
                            break;
                        case '5':#Uraian
                            $kdSoal = $f[2];

                            $sql_jawab = "SELECT NO_URUT_FILE as urut,DESKRIPSI_FILE as deskripsi,ID_TIPE_FILE as tipefile,IS_WAJIB as wajib FROM smlearning.t_soal_jawaban_upload WHERE KD_SOAL='$f[2]'";
                            $data_jawab = $this->query_all($sql_jawab);
                            break;
                    }
                }
                $hasil->element['forms'][] = array("idElement" => "formSoal", "judul" => "Detail Soal", "dataset" => $builder);
                $hasil->data['soal'] = $data_soal;
                $hasil->data['opsi'] = $data_jawab;
                break;
            case 21:#Induk Ujian baru
                $judulKolom = array(
                    "TANGGAL_SOAL" => "TANGGAL",
                    "ID_JENIS_SOAL" => "JENIS SOAL",
                    'ID_TINGKAT_SEKOLAH' => ' TINGKAT ',
                    'ID_TINGKAT_KELAS' => ' KELAS',
                    'ID_MATA_PELAJARAN' => ' MATA PELAJARAN ',
                    'ID_SCOPE_SOAL' => ' CAKUPAN SOAL ',
                    'DURASI_UJIAN' => ' DURASI UJIAN (menit)',


                );
                $removeKolom = array(
//                    'ID_SOAL'   => true,
                    'CREATED_ON' => true,
                );
                $hideKolom = array(
                    'KD_USER' => true,
                    'KD_UJIAN' => true,
                    'KODE_TOKEN' => true,
                    'ID_SIKAD' => true,
                    'USER_EDIT' => true,
                    'LAST_EDIT' => true,

                );
                $placeholder = array(
                    'TANGGAL_SOAL' => 'Tanggal Pembuatan Soal',
                    'DESKRIPSI_SOAL' => '',
                );
                $className = array(
                    'TANGGAL_MULAI' => 'tanggalan',
                    'TANGGAL_AKHIR' => 'tanggalan',
                    'KD_UJIAN' => 'primary ',
                    'DESKRIPSI_SOAL' => 'encrypt ',
                    'ID_JENIS_SOAL' => ' select2 ',
                    'ID_SCOPE_SOAL' => ' select2 ',
                    'ID_TINGKAT_KELAS' => ' select2 selectResult2',
                    "ID_TINGKAT_SEKOLAH" => ' select2 selectCond1 ', #update condition
                    "ID_MATA_PELAJARAN" => '  selectResult1 '
                );
                $parSelect = $this->generateSelect(array(
                    "db" => "smlearning",
                    "table" => "r_jenis_soal",
                    "primaryKey" => "ID_JENIS_SOAL",
                    "displayKey" => "NM_JENIS_SOAL",
                    "orderKey" => "ID_JENIS_SOAL"))->items;
                $tingkatSelect = $this->generateSelect(array(
                    "db" => "refs",
                    "table" => "r_tingkat_sekolah",
                    "primaryKey" => "ID_TINGKAT_SEKOLAH",
                    "displayKey" => "NM_TINGKAT_SEKOLAH",
                    "orderKey" => "ID_TINGKAT_SEKOLAH"))->items;
                $mapelSelect = $this->generateSelect(array(
                    "db" => "refs",
                    "table" => "r_mata_pelajaran",
                    "primaryKey" => "ID_MATA_PELAJARAN",
                    "displayKey" => "NM_MATA_PELAJARAN",
                    "groupBy" => "ID_MATA_PELAJARAN",
                    "orderKey" => "ID_MATA_PELAJARAN"
                ))->items;
                $kelasSelect = $this->generateSelect(array(
                    "db" => "refs",
                    "table" => "r_tingkat_kelas",
                    "primaryKey" => "ID_TINGKAT_KELAS",
                    "displayKey" => "NM_TINGKAT_KELAS",
                    "groupBy" => "ID_TINGKAT_KELAS",
                    "orderKey" => "ID_TINGKAT_KELAS"
                ))->items;
                $scopeSelect = $this->generateSelect(array(
                    "db" => "refs",
                    "table" => "r_scope_soal",
                    "primaryKey" => "ID_SCOPE_SOAL",
                    "displayKey" => "NM_SCOPE_SOAL",
                    "groupBy" => "ID_SCOPE_SOAL",
                    "orderKey" => "ID_SCOPE_SOAL"
                ))->items;

                $alterType = array(
                    "ID_JENIS_SOAL" => array(
                        "tipe" => "select",
                        "parameter" => $parSelect
                    ),
                    "ID_TINGKAT_SEKOLAH" => array(
                        "tipe" => "select",
                        "parameter" => $tingkatSelect
                    ),
                    "ID_MATA_PELAJARAN" => array(
                        "tipe" => "select",
                        "parameter" => $mapelSelect
                    ),
                    "ID_TINGKAT_KELAS" => array(
                        "tipe" => "select",
                        "parameter" => $kelasSelect
                    ),
                    "ID_SCOPE_SOAL" => array(
                        "tipe" => "select",
                        "parameter" => $scopeSelect
                    )
                );
                $buttons = array(
                    array(
                        "idButton" => "btnSimpan",
                        "tipe" => "button",
                        "className" => "green",
                        "icon" => "fa-check",
                        "label" => "Simpan Ujian",
                    ),
//                    array(
//                        "idButton"  => "btnPeserta",
//                        "tipe"      => "button",
//                        "className" => "blue",
//                        "icon"      => "fa-list",
//                        "label"     => "Pilih Peserta",
//                    ),
                    array(
                        "idButton" => "btnBatal",
                        "tipe" => "button",
                        "className" => "red",
                        "icon" => "fa-times",
                        "label" => "Batal",
                    ),
                );


                $defaultValue = array(
                    "TANGGAL_MULAI" => date('d-m-Y'),
                    "TANGGAL_AKHIR" => date('d-m-Y'),
                    "LAST_EDIT" => date('Y-m-d H:i:s'),
                    "KD_UJIAN" => sha1($this->accuser . rand(1000, 9999) . date('dmYHis')),
                    "KD_USER" => $this->kdUser,
                    "USER_EDIT" => $this->kdUser,
                    "ID_TINGKAT_SEKOLAH" => '30',
                    "ID_TINGKAT_KELAS" => '10',
                    "ID_SIKAD" => $this->idSikad,
                    "JUMLAH_SOAL" => 10,
                    "DURASI_UJIAN" => 40,
                    'KODE_TOKEN' => rand(10000, 99999),

                );

                $frmConfig = array(
                    "database" => "smlearning",
                    "table" => "t_ujian",
                    "target" => "t_ujian",
                    "judul" => $judulKolom,
                    "isRemove" => $removeKolom,
                    "isHide" => $hideKolom,
                    "placeholder" => $placeholder,
                    "className" => $className,
                    "defValue" => $defaultValue,
                    "alterType" => $alterType,
                    "buttonState" => true,
                    "buttons" => $buttons,
                );
                $builder = $this->frmBuilder($frmConfig);
                $hasil->element['forms'][] = array(
                    "boxColor" => "box grey bordered",
                    "idElement" => "formSoal",
                    "judul" => "Pembuatan Soal",
                    "dataset" => $builder
                );
                break;
            case 22:#hpilih Soal Ujian->Data Ujian
                $kdUjian = $f[2];
                $sql = "SELECT NAMA_UJIAN,NM_MATA_PELAJARAN,TANGGAL_MULAI,TANGGAL_AKHIR,DURASI_UJIAN,JUMLAH_SOAL,NM_SCOPE_SOAL,KODE_TOKEN,KD_UJIAN AS kode FROM smlearning.t_ujian as tabA
INNER JOIN refs.r_mata_pelajaran as tabB ON tabA.ID_MATA_PELAJARAN=tabB.ID_MATA_PELAJARAN
INNER JOIN refs.r_scope_soal as tabC ON tabC.ID_SCOPE_SOAL=tabA.ID_SCOPE_SOAL
WHERE KD_UJIAN='$kdUjian' AND ID_SIKAD=$this->idSikad";
                $data = $this->query_one($sql);
                $data->TANGGAL_MULAI = $this->tanggal_panjang($data->TANGGAL_MULAI);
                $data->TANGGAL_AKHIR = $this->tanggal_panjang($data->TANGGAL_AKHIR);
                $soal_sql = "SELECT * FROM smlearning.t_ujian_soal WHERE KD_UJIAN='$kdUjian'";
                $soal_data = $this->query_all($soal_sql);
                $peserta_sql = "SELECT * FROM smlearning.t_ujian_peserta WHERE KD_UJIAN='$kdUjian' AND ID_SIKAD=$this->idSikad";
                $peserta_data = $this->query_all($peserta_sql);

                $quest = "SELECT KD_SOAL,TEKS_SOAL,JUDUL_SOAL FROM smlearning.t_soal INNER JOIN
smlearning.t_soal_induk ON smlearning.t_soal_induk.KD_SOAL_INDUK=smlearning.t_soal.KD_SOAL_INDUK
                WHERE smlearning.t_soal.KD_SOAL_INDUK IN (SELECT KD_SOAL_INDUK FROM smlearning.t_ujian_soal WHERE KD_UJIAN='$kdUjian') ";
                $quests = $this->query_all($quest);

                $hasil->ujian = $data;
                $hasil->jumlahSoal = count($soal_data);
                if ($quests) {
                    foreach ($quests as $index => $quest) {
                        $kdSoal = $quest->KD_SOAL;
                        $quests[$index]->teksSoal = base64_decode($quest->TEKS_SOAL);
                        $ans_sql = "SELECT KD_SOAL as kode,NO_URUT_JAWABAN as noOpsi,ISI_JAWABAN as textJawab from smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$kdSoal'";
                        $answers = $this->query_all($ans_sql);
                        if ($answers) {
                            foreach ($answers as $idx => $answer) {
                                $answers[$idx]->textJawab = base64_decode($answer->textJawab);
                            }
                        }
                        $quests[$index]->answers = $answers;
                    }
                }
                $hasil->theSoal = $quests;
                $hasil->jumlahPeserta = count($peserta_data);
                break;
            case 23:#load Rombal
                $hasil->isTwig = false;
                $kdUjian = $f[2];
                $sql = "SELECT KD_LAMA_TINGKAT_KELAS AS kdTingkat FROM smlearning.t_ujian INNER JOIN refs.r_tingkat_kelas
 on refs.r_tingkat_kelas.ID_TINGKAT_KELAS=smlearning.t_ujian.ID_TINGKAT_KELAS
 WHERE KD_UJIAN='$kdUjian' AND ID_SIKAD=$this->idSikad";
                $data = $this->query_one($sql);
                $kdTingkat = $data->kdTingkat;
                $rombel = $this->getRombel($this->tahunAjaran, $kdTingkat);
                $hasil->data = $rombel;
                break;
            case 24:#load Siswa
                $hasil->isTwig = false;
                $kdTingkat = $f[2];
                $kdProgram = $f[3];
                $kdRombel = $f[4];
                $siswa = $this->getSiswaRombel($this->tahunAjaran, $kdTingkat, $kdProgram, $kdRombel);
                $hasil->data = $siswa;
                break;
            case 25:#save Siswa pesertaUjian
                $hasil->isTwig = false;
                $kdUjian = $f[2];
                $siswas = explode('|', $f[3]);
                $val = $f[4];
                if (count($siswas) > 0) {
                    foreach ($siswas as $index => $siswa) {
                        if ($val == 1) {
                            $sel = "SELECT KD_PESERTA FROM smlearning.t_ujian_peserta WHERE KD_UJIAN='$kdUjian' AND NIS='$siswa' AND t_ujian_peserta.ID_SIKAD=$this->idSikad";
                            $sels = $this->query_one($sel);
                            if (!$sels) {
                                $kdPes = sha1($kdUjian . $this->idSikad . $siswa . rand(1000, 9999));
                                $sql = "INSERT INTO smlearning.t_ujian_peserta (KD_PESERTA, KD_UJIAN, ID_SIKAD, NIS)
                                  VALUES ('$kdPes','$kdUjian',$this->idSikad,'$siswa')";
                                $this->writes($sql);

                            }
                        } else {
                            $sel = "DELETE FROM smlearning.t_ujian_peserta WHERE KD_UJIAN='$kdUjian' AND NIS='$siswa' AND t_ujian_peserta.ID_SIKAD=$this->idSikad";
                            $this->writes($sel);
                        }
                    }
                }
                break;
            case 26:#load Siswa pesertaUjian
                $hasil->isTwig = false;
                $kdUjian = $f[2];
                $peserta = "SELECT NIS as noUrut FROM smlearning.t_ujian_peserta WHERE KD_UJIAN='$kdUjian' AND ID_SIKAD=$this->idSikad";
                $pesertas = $this->query_all($peserta);
                $hasil->data = $pesertas;
                break;
            case 27:#hapus soal
                $hasil->isTwig = false;
                $kdUjian = $f[2];
                $kdSoalInduk = $f[3];
                $del = "DELETE FROM smlearning.t_ujian_soal WHERE KD_UJIAN='$kdUjian' AND KD_SOAL_INDUK='$kdSoalInduk'";
                $hasil->data = $this->writes($del);
                break;
            case 28:#list Soal
                $kdUser = $this->kdUser;
                $ujian_next = "SELECT * FROM smlearning.t_ujian WHERE ID_SIKAD='$this->idSikad' AND KD_UJIAN NOT IN (SELECT KD_UJIAN FROM smlearning.t_ujian_peserta WHERE IS_VALID=1 AND ID_SIKAD=$this->idSikad GROUP BY KD_UJIAN)";
                $nextUjians = $this->query_all($ujian_next);
                $ujian_progress = "SELECT * FROM smlearning.t_ujian WHERE ID_SIKAD='$this->idSikad' AND KD_UJIAN IN (SELECT KD_UJIAN FROM smlearning.t_ujian_peserta WHERE IS_VALID=1 AND ID_SIKAD=$this->idSikad GROUP BY KD_UJIAN)";
                $progUjians = $this->query_all($ujian_progress);
                $hasil->progUjian = $progUjians;
                $hasil->nextUjian = $nextUjians;
                break;
            case 29:#hapus ujian
                $hasil->isTwig = false;
                $kdUjian = $f[2];
                $del = "DELETE FROM smlearning.t_ujian WHERE KD_UJIAN='$kdUjian'";
                $hasil->data = $this->writes($del);
                break;
            case 30:#hManage Ujian
                $kdUjian = $f[2];
                if (!isset($f[3])) {
                    $sql = "SELECT NAMA_UJIAN,NM_MATA_PELAJARAN,TANGGAL_MULAI,TANGGAL_AKHIR,DURASI_UJIAN,JUMLAH_SOAL,NM_SCOPE_SOAL,KODE_TOKEN,KD_UJIAN AS kode FROM smlearning.t_ujian as tabA
INNER JOIN refs.r_mata_pelajaran as tabB ON tabA.ID_MATA_PELAJARAN=tabB.ID_MATA_PELAJARAN
INNER JOIN refs.r_scope_soal as tabC ON tabC.ID_SCOPE_SOAL=tabA.ID_SCOPE_SOAL
WHERE KD_UJIAN='$kdUjian' AND ID_SIKAD=$this->idSikad";
                    $data = $this->query_one($sql);
                    $data->TANGGAL_MULAI = $this->tanggal_panjang($data->TANGGAL_MULAI);
                    $data->TANGGAL_AKHIR = $this->tanggal_panjang($data->TANGGAL_AKHIR);
                    $soal_sql = "SELECT * FROM smlearning.t_ujian_soal WHERE KD_UJIAN='$kdUjian'";
                    $soal_data = $this->query_all($soal_sql);
                    $peserta_sql = "SELECT KD_PESERTA as kdPeserta, NIS AS noUrut,ID_SIKAD as idSikad,START_AT as mulai,FINISH_AT as selesai FROM smlearning.t_ujian_peserta WHERE KD_UJIAN='$kdUjian' AND ID_SIKAD=$this->idSikad";
                    $pesertas = $this->query_all($peserta_sql);
                    $hasil->ujian = $data;
                    foreach ($pesertas as $index => $peserta) {
                        $siswa = $this->getDataSiswa($peserta->noUrut, $this->tahunAjaran);
                        $pesertas[$index]->detail = $siswa;
                        if ($peserta->mulai)
                            $peserta->mulai = date('d-m-y H:i:s', strtotime($peserta->mulai));
                        else
                            $peserta->mulai = 'Belum';
                        if ($peserta->selesai)
                            $peserta->selesai = date('d-m-y H:i:s', strtotime($peserta->selesai));
                        else
                            $peserta->selesai = 'Belum selesai';
                    }

                    $hasil->peserta = $pesertas;
                    $hasil->jumlahSoal = count($soal_data);
                    $hasil->jumlahPeserta = count($pesertas);
                } else {
                    switch ($f[3]) {
                        case 1:#ganti token
                            $hasil->isTwig = false;
                            $baru = rand(10000, 99999);
                            $update = "UPDATE smlearning.t_ujian SET KODE_TOKEN=$baru WHERE KD_UJIAN='$kdUjian'";
                            $this->writes($update);
                            $sql = "SELECT KODE_TOKEN as a FROM smlearning.t_ujian WHERE KD_UJIAN='$kdUjian'";
                            $data = $this->query_one($sql);
                            $hasil->data = $data->a;
                            break;
                    }
                }
                break;
            case 31:#list Soal Ujian selesai
                $kdUser = $this->kdUser;
                $ujian_done = "SELECT * FROM smlearning.t_ujian WHERE ID_SIKAD='$this->idSikad' AND KD_UJIAN  IN (SELECT KD_UJIAN FROM smlearning.t_ujian_peserta WHERE IS_VALID=1 GROUP BY KD_UJIAN)";
                $doneUjians = $this->query_all($ujian_done);
                $hasil->doneUjian = $doneUjians;
                break;
            case 32:#analisa
                $kdUjian = $f[2];
                $sql = "SELECT NAMA_UJIAN,NM_MATA_PELAJARAN,TANGGAL_MULAI,TANGGAL_AKHIR,DURASI_UJIAN,JUMLAH_SOAL,NM_SCOPE_SOAL,KODE_TOKEN,KD_UJIAN AS kode FROM smlearning.t_ujian as tabA
INNER JOIN refs.r_mata_pelajaran as tabB ON tabA.ID_MATA_PELAJARAN=tabB.ID_MATA_PELAJARAN
INNER JOIN refs.r_scope_soal as tabC ON tabC.ID_SCOPE_SOAL=tabA.ID_SCOPE_SOAL
WHERE KD_UJIAN='$kdUjian'";
                $data = $this->query_one($sql);
                $data->TANGGAL_MULAI = $this->tanggal_panjang($data->TANGGAL_MULAI);
                $data->TANGGAL_AKHIR = $this->tanggal_panjang($data->TANGGAL_AKHIR);
                $soal_sql = "SELECT * FROM smlearning.t_ujian_soal WHERE KD_UJIAN='$kdUjian'";
                $soal_data = $this->query_all($soal_sql);
                $peserta_sql = "SELECT KD_PESERTA as kdPeserta, NIS AS noUrut,ID_SIKAD as idSikad,START_AT as mulai,FINISH_AT as selesai FROM smlearning.t_ujian_peserta WHERE KD_UJIAN='$kdUjian' ORDER BY NIS";
                $pesertas = $this->query_all($peserta_sql);
                $hasil->ujian = $data;
                foreach ($pesertas as $index => $peserta) {
                    $siswa = $this->getDataSiswa($peserta->noUrut, $this->tahunAjaran);
                    $pesertas[$index]->detail = $siswa;
                    if ($peserta->mulai)
                        $peserta->mulai = date('d-m-y H:i:s', strtotime($peserta->mulai));
                    else
                        $peserta->mulai = 'Belum';
                    if ($peserta->selesai)
                        $peserta->selesai = date('d-m-y H:i:s', strtotime($peserta->selesai));
                    else
                        $peserta->selesai = 'Belum selesai';
                    $jawab_sql = "SELECT tSoal.NO_URUT_JAWABAN AS jawab,kunci FROM smlearning.t_peserta_soal as tSoal
INNER JOIN (SELECT KD_SOAL AS kdSoal,NO_URUT_JAWABAN AS kunci FROM smlearning.t_soal_jawaban_multiple WHERE IS_BENAR=1) AS tKunci
ON tKunci.kdSoal=tSoal.`KD_SOAL` WHERE tSoal.KD_PESERTA='$peserta->kdPeserta'";
                    $jawabs = $this->query_all($jawab_sql);
                    $isJawab = 0;
                    $isBenar = 0;
                    $isSalah = 0;
                    if ($jawabs) {
                        foreach ($jawabs as $index => $jawab) {
                            if ($jawab->jawab > 0) $isJawab++;
                            if ($jawab->jawab == $jawab->kunci) $isBenar++;
                            else $isSalah++;
                        }
                    }
                    $pros = ($isBenar / count($jawabs)) * 100;
                    $peserta->jawab = $isJawab;
                    $peserta->benar = $isBenar;
                    $peserta->salah = $isSalah;
                    $peserta->pros = number_format($pros, 2);
                }

                $hasil->peserta = $pesertas;
                $hasil->jumlahSoal = count($soal_data);
                $hasil->jumlahPeserta = count($pesertas);
                break;
            case 33:#cetak
                $kdUjian = $f[2];
                $hasil->isTwig = false;
                include_once('tabel/tabel33.php');
                $isi = text($kdUjian, $this);
                $hasil->isi = $isi;
                break;
            case 34:#hapus soal
                $hasil->isTwig = false;
                $kdSoalInduk = $f[2];
                $del = "DELETE FROM smlearning.t_soal_induk WHERE KD_SOAL_INDUK='$kdSoalInduk'";
                $hasil->data = $this->writes($del);
                $hasil->errno = $hasil->data->errno;
                break;

            /***************************************/
            case 1003:#list Soal untuk siswa
                $noInduk = $this->noInduk;
                $ujian_next = "SELECT  KD_PESERTA AS kdPeserta,tba.KD_UJIAN as kdUjian,tbb.NAMA_UJIAN from smlearning.t_ujian_peserta AS tba
                  inner join
                  smlearning.t_ujian as tbb ON tbb.KD_UJIAN=tba.KD_UJIAN
                  WHERE tba.NIS='$noInduk' AND tba.ID_SIKAD=$this->idSikad AND tbb.ID_SIKAD=$this->idSikad AND tba.FINISH_AT IS NULL";
                $nextUjians = $this->query_all($ujian_next);
                $hasil->nextUjian = $nextUjians;
                $hasil->tql1=$ujian_next;
                $ujian_past = "SELECT  KD_PESERTA AS kdPeserta,tba.KD_UJIAN as kdUjian,tbb.NAMA_UJIAN from smlearning.t_ujian_peserta AS tba
                  inner join
                  smlearning.t_ujian as tbb ON tbb.KD_UJIAN=tba.KD_UJIAN
                  WHERE tba.NIS='$noInduk' AND tba.ID_SIKAD=$this->idSikad AND tbb.ID_SIKAD=$this->idSikad AND tba.FINISH_AT IS NOT NULL";
                $nextUjians = $this->query_all($ujian_past);
                $hasil->pastUjian = $nextUjians;
                break;
            case 1004:#data peserta Ujian
                $kdPeserta = $f[2];
                $peserta_sql = "SELECT * FROM smlearning.t_ujian_peserta WHERE KD_PESERTA='$kdPeserta' and NIS='$this->noInduk'";
                $pesertas = $this->query_one($peserta_sql);
                $hasil->peserta = false;
                if ($pesertas) {
                    if ($this->noInduk == $pesertas->NIS) {
                        $detailPeserta = $this->getDataSiswa($pesertas->NIS, $this->tahunAjaran);
                        $hasil->peserta = $detailPeserta;
                    }
                }
                $kdUjian = $pesertas->KD_UJIAN;
                $sql = "SELECT NAMA_UJIAN,NM_MATA_PELAJARAN,TANGGAL_MULAI,TANGGAL_AKHIR,DURASI_UJIAN,JUMLAH_SOAL,NM_SCOPE_SOAL,KODE_TOKEN,KD_UJIAN AS kode FROM smlearning.t_ujian as tabA
                        INNER JOIN refs.r_mata_pelajaran as tabB ON tabA.ID_MATA_PELAJARAN=tabB.ID_MATA_PELAJARAN
                        INNER JOIN refs.r_scope_soal as tabC ON tabC.ID_SCOPE_SOAL=tabA.ID_SCOPE_SOAL
                        WHERE KD_UJIAN='$kdUjian'";
                $data = $this->query_one($sql);
                $data->TANGGAL_MULAI = $this->tanggal_panjang($data->TANGGAL_MULAI);
                $data->TANGGAL_AKHIR = $this->tanggal_panjang($data->TANGGAL_AKHIR);
                $data->valid = $pesertas->FINISH_AT;
                $hasil->ujian = $data;
                $hasil->target = $kdPeserta;
                break;
            case 1005:#cekToken
                $hasil->isTwig = false;
                $kdUjian = $f[2];
                $kdPeserta = $f[3];
                $token = $f[4];
                $sql = "select KODE_TOKEN as token,JUMLAH_SOAL as jumSoal,DURASI_UJIAN AS waktu from smlearning.t_ujian WHERE KD_UJIAN='$kdUjian'";
                $data = $this->query_one($sql);

                $peserta_sql = "SELECT * FROM smlearning.t_ujian_peserta WHERE KD_PESERTA='$kdPeserta' and NIS='$this->noInduk'";
                $pesertas = $this->query_one($peserta_sql);
                $respon = 0;

                $placeValid = true;
                if ($pesertas->WORKING_AT != '') {
                    if ($myPlace != $pesertas->WORKING_AT) $placeValid = false;
                    $respon = 9;
                }
                $placeValid = true;

                if (($data) && ($pesertas) && ($placeValid)) {
                    if ($data->token == $token) {
                        $respon = 1;
                        $upd = "UPDATE smlearning.t_ujian_peserta SET IS_VALID=1,START_AT='$jamNow',LAST_AT='$jamNow'
                                WHERE KD_PESERTA='$kdPeserta' AND IS_VALID=0 AND t_ujian_peserta.FINISH_AT IS NULL and NIS='$this->noInduk'";
                        $this->writes($upd);
                        $upd = "UPDATE smlearning.t_ujian_peserta SET END_AT=DATE_ADD(`START_AT`, INTERVAL $data->waktu MINUTE),WORKING_AT='$myPlace'
                          WHERE KD_PESERTA='$kdPeserta' AND t_ujian_peserta.FINISH_AT IS NULL ";
                        $this->writes($upd);

                        $cekSoal = "SELECT KD_PESERTA_SOAL FROM smlearning.t_peserta_soal WHERE KD_PESERTA='$kdPeserta'";
                        $cek = $this->query_all($cekSoal);
                        if (count($cek) == 0) {
                            #susun soal
                            $soal_sql = "SELECT KD_SOAL_INDUK FROM smlearning.t_ujian_soal WHERE KD_UJIAN='$kdUjian' ";
                            $soals = $this->query_all($soal_sql);
                            $itik = rand(1, 9);
                            for ($i = 1; $i <= $itik; $i++) {
                                shuffle($soals);
                            }
                            $no = 1;
                            foreach ($soals as $index => $soal) {
                                $soalnya = "SELECT * FROM smlearning.t_soal WHERE KD_SOAL_INDUK='$soal->KD_SOAL_INDUK'";
                                $theSoals = $this->query_all($soalnya);
                                if ($theSoals) {
                                    foreach ($theSoals as $idx => $theSoal) {
                                        $ins = "INSERT INTO smlearning.t_peserta_soal (KD_PESERTA, KD_PESERTA_SOAL, KD_SOAL_INDUK,KD_SOAL) VALUES
('$kdPeserta',$no,'$theSoal->KD_SOAL_INDUK','$theSoal->KD_SOAL') ";
                                        $this->writes($ins);
                                        if ($no > $data->jumSoal) break;
                                        $no++;
                                    }
                                }
                                if ($no > $data->jumSoal) break;
                            }
                        }
                    }
                }
                $hasil->respon = $respon;
                break;
            case 1006:#load all soal
                $kdPeserta = $f[2];
                $peserta_sql = "SELECT * FROM smlearning.t_ujian_peserta WHERE KD_PESERTA='$kdPeserta' AND IS_VALID=1 AND NIS='$this->noInduk' AND FINISH_AT IS NULL";
                $pesertas = $this->query_one($peserta_sql);
                $placeValid = true;
                if ($pesertas->WORKING_AT != '') {
                    if ($myPlace != $pesertas->WORKING_AT) $placeValid = false;
                }
                $placeValid = true;

                if (($placeValid) && ($pesertas)) {
                    $quest = "SELECT tbs.KD_PESERTA as kdPeserta, KD_PESERTA_SOAL AS noSoal, tba.KD_SOAL,TEKS_SOAL,JUDUL_SOAL FROM smlearning.t_soal as tba
INNER JOIN smlearning.t_soal_induk ON smlearning.t_soal_induk.KD_SOAL_INDUK=tba.KD_SOAL_INDUK
INNER JOIN smlearning.t_peserta_soal as tbs ON tbs.KD_SOAL= tba.KD_SOAL AND tbs.KD_SOAL_INDUK=tba.KD_SOAL_INDUK
                WHERE KD_PESERTA='$kdPeserta'   ORDER BY KD_PESERTA_SOAL";
                    $quests = $this->query_all($quest);
                    if ($quests) {
                        foreach ($quests as $index => $quest) {
                            $kdSoal = $quest->KD_SOAL;
                            $quests[$index]->teksSoal = base64_decode($quest->TEKS_SOAL);
                            $ans_sql = "SELECT KD_SOAL as kode,NO_URUT_JAWABAN as noOpsi,ISI_JAWABAN as textJawab from smlearning.t_soal_jawaban_multiple WHERE KD_SOAL='$kdSoal'";
                            $answers = $this->query_all($ans_sql);
                            if ($answers) {
                                foreach ($answers as $idx => $answer) {
                                    $answers[$idx]->textJawab = base64_decode($answer->textJawab);
                                }
                            }
                            $quests[$index]->answers = $answers;
                        }
                    }
                    $hasil->theSoal = $quests;
                }
                $hasil->target = $kdPeserta;
                $hasil->place = $placeValid;
                break;
            case 1007:#simpan jawabna
                $hasil->isTwig = false;
                $kdPeserta = $f[2];
                $time_left = "SELECT END_AT AS mustEnd,WORKING_AT FROM smlearning.t_ujian_peserta WHERE KD_PESERTA='$kdPeserta' AND NIS='$this->noInduk'";
                $time = $this->query_one($time_left);
                $placeValid = true;
                if ($time->WORKING_AT != '') {
                    if ($myPlace != $time->WORKING_AT) $placeValid = false;
                }
                $placeValid = true;

                $hasil->place = $placeValid;

                if ($placeValid) {
                    $noSoal = $f[3];
                    $jwb = $f[4];
                    $update = "UPDATE smlearning.t_peserta_soal SET NO_URUT_JAWABAN=$jwb,LAST_ANSWER='$jamNow' WHERE KD_PESERTA='$kdPeserta' AND KD_PESERTA_SOAL=$noSoal";
                    $hasil->data = $this->writes($update);
                    $update = "UPDATE smlearning.t_ujian_peserta SET LAST_AT='$jamNow',WORKING_AT='$myPlace' WHERE KD_PESERTA='$kdPeserta'";
                    $hasil->data = $this->writes($update);
                }
                break;
            case 1008:#loadjawabna
                $hasil->isTwig = false;
                $kdPeserta = $f[2];
                $time_left = "SELECT END_AT AS mustEnd,WORKING_AT FROM smlearning.t_ujian_peserta WHERE KD_PESERTA='$kdPeserta'";
                $time = $this->query_one($time_left);
                $placeValid = true;
                if ($time->WORKING_AT != '') {
                    if ($myPlace != $time->WORKING_AT) $placeValid = false;
                }
                $placeValid = true;
                $hasil->place = $placeValid;

                $update = "SELECT NO_URUT_JAWABAN AS a,KD_PESERTA_SOAL AS b,IS_RAGU as c FROM  smlearning.t_peserta_soal WHERE KD_PESERTA='$kdPeserta'";
                $hasil->data = $this->query_all($update);
                $timeNow = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                $timeTo = DateTime::createFromFormat('Y-m-d H:i:s', $time->mustEnd);
                $secondsLeft = $timeTo->diff($timeNow);
                if ($secondsLeft->h < 10) $jam = '0' . $secondsLeft->h;
                else $jam = $secondsLeft->h;
                if ($secondsLeft->i < 10) $menit = '0' . $secondsLeft->i;
                else $menit = $secondsLeft->i;
                if ($secondsLeft->s < 10) $detik = '0' . $secondsLeft->s;
                else $detik = $secondsLeft->s;
                $hasil->timeLeft['i'] = $menit;
                $hasil->timeLeft['h'] = $jam;
                $hasil->timeLeft['s'] = $detik;
                break;
            case 1009:#finish
                $hasil->isTwig = false;
                $kdPeserta = $f[2];
                $update = "UPDATE smlearning.t_ujian_peserta SET FINISH_AT='$jamNow' WHERE KD_PESERTA='$kdPeserta' AND NIS='$this->noInduk' AND t_ujian_peserta.WORKING_AT='$myPlace'";
                $hasil->data = $this->writes($update);
                break;

        }

        return $hasil;
    }


    //LOCAL FUNCTIONS

    private function getRombel($tahun, $tingkatKelas = '', $program = '', $rombel = '', $nipWali = 0)
    {
        $db = $this->dbLocal;
        $rombel_sql = "SELECT KETERANGAN as nmKelas,KD_TINGKAT_KELAS as kdTingkat,KD_PROGRAM_PENGAJARAN as kdProgram,KD_ROMBEL as kdRombel FROM $db.t_pegawai_rombel WHERE KD_TAHUN_AJARAN=$tahun";
        if ($tingkatKelas != '') $rombel_sql .= " AND $db.t_pegawai_rombel.KD_TINGKAT_KELAS='$tingkatKelas'";
        if ($program != '') $rombel_sql .= " AND $db.t_pegawai_rombel.KD_PROGRAM_PENGAJARAN='$program'";
        if ($rombel != '') $rombel_sql .= " AND $db.t_pegawai_rombel.KD_ROMBEL='$rombel'";
        if ($nipWali != 0)
            $rombel_sql = "SELECT * FROM $db.t_pegawai_rombel WHERE KD_TAHUN_AJARAN=$tahun AND NIP=$nipWali";
        $rombel_data = $this->query_all($rombel_sql . " order BY KD_TINGKAT_KELAS,KD_PROGRAM_PENGAJARAN,KD_ROMBEL");

        return $rombel_data;
    }

    private function getSiswaRombel($tahun, $tingkat, $program, $rombel)
    {
        $db = $this->dbLocal;
        $sql = "SELECT NO_URUT AS noUrut,NAMA_SISWA,NO_INDUK FROM $db.v_siswa_tingkat WHERE KD_TAHUN_AJARAN='$tahun' AND KD_PROGRAM_PENGAJARAN='$program' AND v_siswa_tingkat
.KD_ROMBEL='$rombel' AND v_siswa_tingkat.KD_TINGKAT_KELAS='$tingkat'";
        $data = $this->query_all($sql);

        return $data;
    }

    public function getDataSiswa($nis, $tahun)
    {
        $db = $this->dbLocal;
        $sql = "SELECT * FROM $db.v_siswa_tingkat WHERE NO_URUT='$nis' AND KD_TAHUN_AJARAN='$tahun'";
        $data = $this->query_one($sql);

        return $data;
    }

}

?>