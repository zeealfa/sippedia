<?php
error_reporting(E_ALL);
/**
 * For App Scope Variables.
 * User: Alfa
 * Date: 21/07/2016
 * Time: 3:20
 */


require_once("incs/class.MysqliDatabase.php");

class theApp extends MysqliDatabase
{
    private $read;
    private $errorMess = '';
    private $dataCS;
    public $statLogin = false;
    public $statMenu = false;
    public $sessid = '';
    private $idUser;
    private $keyApp = '';
    private $params = '';

    public function __construct($sessid, $isWriting = false)
    {
        include('config.php');
        if ($isWriting)
            $CS = explode(';', $db_param_write);
        else
            $CS = explode(';', $db_param_reader);
        foreach ($CS as $Key => $Element) {
            $Element = explode('=', $Element);
            if (isset($Element[1])) {
                $CS[trim($Element[0])] = trim($Element[1]);
                unset($CS[$Key]);
            }
        }
        $this->dataCS = $CS;
        @$this->connect(empty($CS['server']) ? 'localhost' : $CS['server'],
            empty($CS['username']) ? 'root' : $CS['username'],
            empty($CS['password']) ? '' : $CS['password'],
            empty($CS['database']) ? 'test' : $CS['database'],
            empty($CS['port']) ? 3306 : $CS['port'],
            empty($CS['socket']) ? null : $CS['socket']);
        $this->keyApp = $kunci;

        if ($this->connect_errno) {
            if ($ThrowExceptions) throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
        }
        $this->sessid = $sessid;
        $this->getUser();
    }

    private function isMenu($params)
    {
        $sql = "SELECT * FROM smlearning.t_menu WHERE REPLACE(NM_MENU, ' ', '')='$params'";
        $data = $this->query_one($sql);
        if ($data) return true;
        else return false;
    }

    public function getClient()
    {
        $email = $_COOKIE['accuser'];
        echo sha1($this->keyApp . 'joeskardi@yahoo.co.id');
        $client_sql = "SELECT a.ID_SIKAD,b.LOCAL_SETTING as dbClient,a.KD_PERIODE_BELAJAR as semester,a.KD_TAHUN_AJARAN as tahun FROM smreborn.t_session AS a
        INNER JOIN mastersikad.t_sikad AS b ON b.ID_SIKAD=a.ID_SIKAD
WHERE SHA1(CONCAT('" . $this->keyApp . "',a.EMAIL))='$email'  ORDER BY TIMESTAMP_SESS DESC LIMIT 1";
        $client_data = $this->query_one($client_sql);
        echo json_encode($client_data);

        if ($client_data->dbClient == 'production') $client_data->dbClient = 'pas_sma';
        $db = $client_data->dbClient;
        $sekolah_sql = "SELECT A.KD_JENIS_SEKOLAH AS jenisSekolah,B.IS_JURUSAN as isJurusan
            FROM pas_sma.t_sekolah_identitas as A
            INNER JOIN refs.r_jenis_sekolah as B ON B.ID_JENIS_SEKOLAH=A.KD_JENIS_SEKOLAH
          ORDER BY KD_TAHUN_AJARAN LIMIT 1";
        $sekolah_data = $this->query_one($sekolah_sql);
        $client_data->jenisSekolah = $sekolah_data->jenisSekolah;
        $client_data->isJurusan = $sekolah_data->isJurusan;

        return $client_data;
    }

    public function getUser()
    {
        $login = array();
        $cookVal = $this->sessid;
        $sql = "SELECT EMAIL,ID_SIKAD,NO_INDUK FROM smreborn.t_session WHERE SESSID='$cookVal'";
        $data = $this->query_one($sql);


//        if ((!isset($_COOKIE['accuser'])) || ($_COOKIE['accuser']=='-')) {
        if ($data) {
            $this->statLogin = true;
            $login['errmess'] = 'Login Berhasil';
            $login['errno'] = 1;
            $login['statLogin'] = true;
            #CARI USER
            $user_sql = "SELECT NM_USER AS namauser,PROFILE_USER AS pic,EMAIL_USER as email FROM smreborn.t_users WHERE EMAIL_USER='$data->EMAIL'";
            $user_data = $this->query_one($user_sql);
            $login['nama'] = $user_data->namauser;
            $login['pic'] = $user_data->pic;
            $login['nip'] = $data->NO_INDUK;
            $login['email'] = $user_data->email;
//                if ($data->ID_SIKAD > 0) $this->goMigrate($data->ID_SIKAD);

        }
        else {
            $this->statLogin = false;
            $login['errmess'] = 'Nomor Induk tidak ditemukan';
            $login['errno'] = 0;
            $login['statLogin'] = false;
        }
//        }
//        else {
//            $email = @$data->EMAIL;
//            $user_sql = "SELECT NM_USER AS namauser,PROFILE_USER AS pic,EMAIL_USER AS email FROM smreborn.t_users WHERE EMAIL_USER='$email'";
//            $user_data = $this->query_one($user_sql);
//            if ($user_data) {
//                $login['email'] = $user_data->email;
//                $login['nama'] = $user_data->namauser;
//                $login['pic'] = $user_data->pic;
//                $theSess_sql = "SELECT NO_INDUK,ID_SIKAD FROM smreborn.t_session WHERE EMAIL='$user_data->email'";
//                $theSess = $this->query_one($theSess_sql);
//                $login['nip'] = $theSess->NO_INDUK;
//                $login['statLogin'] = true;
////                if ($theSess->ID_SIKAD > 0) $this->goMigrate($theSess->ID_SIKAD);
//            }
//            else {
//                $this->statLogin = false;
//                $login['errmess'] = 'Nomor Induk tidak ditemukan (no cookie)';
//                $login['errno'] = 0;
//                $login['statLogin'] = false;
//                setcookie('accuser', sha1($this->keyApp ), -300);
//            }
//        }
        return $login;
    }

    public function getMenu()
    {
        $params = $this->params;
        $hasil = new stdClass();
        $sql = "SELECT * FROM smlearning.t_menu  WHERE `LEVEL` =1 AND IS_VISIBLE=1 ORDER BY `URUT`";
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
                    }
                    else $classLi = '';
                    $data[$index]->classLi = $classLi;

                }
                else {
                    $data[$index]->hiper = str_replace(" ", "", strtolower($item->NM_MENU));
                    $data[$index]->className = 'nav-link nav-toggle';
                    if ($params == $data[$index]->hiper) {
                        $classLi = ' active open';
                        $bread = $item->NM_MENU;
                    }
                    else $classLi = '';
                    $data[$index]->classLi = $classLi;
                }
            }
        }
        $hasil->error = $this->error;
        $hasil->errno = $this->errno;
        $hasil->items = $data;
        $hasil->bread = $bread;

        return $hasil;
    }

    private function anakMenu($idMenu, $params)
    {
        $sql = "SELECT * FROM smlearning.t_menu WHERE ID_PARENT=$idMenu ORDER BY `URUT`";
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
                    }
                    else $classLi = '';
                    $data[$index]->classLi = $classLi;
                }
                else {
                    $data[$index]->hiper = str_replace(" ", "", strtolower($item->NM_MENU));
                    $data[$index]->className = 'nav-link';
                    if ($params == $data[$index]->hiper) {
                        $classLi = ' active open';
                        $isOpen = true;
                        $theLevel = $item->LEVEL;
                        $theBread = $item->NM_MENU;
                    }
                    else {
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

    public function getContent($params)
    {
        $hasil = new stdClass();
        $user = $this->getUser();
        echo json_encode($user);
//        if ($user['statLogin']) {
//        if ((isset($_COOKIE['accuser'])) && ($_COOKIE['accuser']!='-')) {
        $sql = "SELECT * FROM smlearning.t_menu WHERE REPLACE(NM_MENU, ' ', '')='$params'";
        $data = $this->query_one($sql);
        $bread = '';
        $dataBuild = null;
        if ($data) {
            $this->statMenu = true;
            $dataBuild = $this->buildPage($data->TARGET);
        }
        else {
            $this->statMenu = false;
        }
        $hasil->error = $this->error;
        $hasil->errno = $this->errno;
        $hasil->items = $data;
        $hasil->pageData = $dataBuild;
//        }
//        else {
//            $hasil->items = false;
//        }

        return $hasil;
    }

    private function buildPage($fileTarget)
    {
        $hasil = new stdClass();
        $client = $this->getClient();
        if ($client) {
            $db = $client->dbClient;
            if ($db == 'production') $db = 'pas_sma';
            switch ($fileTarget) {
                default:
                    $hasil = null;
                    break;
                case 'migrasi-program';
                    if ($client->jenisSekolah == 30) {
                        $hasil->judul = 'Program Pengajaran';
                    }
                    else {
                        $hasil->judul = 'Bidang Keahlian';
                    }
                    #tabel1  builder
                    $programLama_sql = "SELECT  KD_PROGRAM_PENGAJARAN AS id,KD_PROGRAM_PENGAJARAN AS kode,NM_PROGRAM_PENGAJARAN AS label
                        FROM pas_sma.r_program_pengajaran AND KD_PROGRAM_PENGAJARAN NOT IN (SELECT KD_PROGRAM_PENGAJARAN FROM sikad_main.t_sekolah_paket_pengajaran WHERE
                        ID_SIKAD=$client->ID_SIKAD)";
                    $programLama_data = $this->query_all($programLama_sql);
                    $koloms = array(
                        array('judul' => '_', 'className' => 'hide', 'field' => array('target' => 'kode')),
                        array('judul' => 'No', 'lebar' => '5%'),
                        array('judul' => 'Nama ' . $hasil->judul, 'field' => array('target' => 'label')),
                        array('judul' => 'Detail ',
                              'lebar' => '10%',
                              'field' => array('render' => '<button class="btn btn-xs btn-success btn-circle"><i class="fa fa-check"></i> Pilih </button>'))
                    );
                    $hasil->dataProgram = $this->buildTable($koloms, $programLama_data, 'Drag and drop untuk setup', 'tabel1', 'progLama  ');
                    #!tabel builder2
                    $programBaru_sql = "SELECT ID_PAKET_KEAHLIAN AS id,KD_PAKET_KEAHLIAN AS kode,NM_PAKET_KEAHLIAN AS label FROM refs.r_paket_keahlian WHERE ID_JENIS_SEKOLAH=$client->jenisSekolah";
                    $programBaru_data = $this->query_all($programBaru_sql);
                    $koloms = array(
                        array('judul' => '_', 'className' => 'hide', 'field' => array('target' => 'kode')),
                        array('judul' => 'No', 'lebar' => '5%'),
                        array('judul' => 'Nama ' . $hasil->judul, 'field' => array('target' => 'label')),
                        array('judul' => 'Detail ',
                              'lebar' => '10%',
                              'field' => array('render' => '<button class="btn btn-xs btn-info btn-circle"><i class="fa fa-save"></i> Set </button>'))
                    );
                    $hasil->dataProgramFunc = $this->buildTable($koloms, $programBaru_data, 'Data ' . $hasil->judul, 'tabel2', 'progBaru');
                    break;
                case 'migrasi-mapel';
                    #tabel1  builder
                    $mapelLama_sql = "SELECT  KODE_MATPEL AS id,KODE_MATPEL AS kode,NM_MATA_PELAJARAN AS label FROM pas_sma.t_sikad_mata_pelajaran_kelompok where KODE_MATPEL IN (SELECT KODE_MATPEL FROM pas_sma
.t_sikad_enrollment) ORDER BY NM_MATA_PELAJARAN";
                    $mapelLama_data = $this->query_all($mapelLama_sql);
                    $koloms = array(
                        array('judul' => 'No', 'lebar' => '5%'),
                        array('judul' => 'Kode', 'field' => array('target' => 'kode')),
                        array('judul' => 'Mata Pelajaran Lama ', 'field' => array('target' => 'label')),
                        array('judul' => 'Detail ',
                              'lebar' => '10%',
                              'field' => array('render' => '<button class="btn btn-xs btn-success btn-circle"><i class="fa fa-check"></i> Set </button>'))
                    );
                    $hasil->dataProgram = $this->buildTable($koloms, $mapelLama_data, 'Drag and drop untuk setup', 'tabel1', 'progLama  ');
                    #!tabel builder2
                    $mapelInduk_sql = "SELECT ID_MATA_PELAJARAN AS id,ID_MATA_PELAJARAN AS kode,NM_MATA_PELAJARAN AS label FROM refs.r_mata_pelajaran WHERE ID_JENIS_SEKOLAH=$client->jenisSekolah";
                    $programBaru_data = $this->query_all($mapelInduk_sql);
                    $koloms = array(
                        array('judul' => 'No', 'lebar' => '5%'),
                        array('judul' => 'Mata Pelajaran ', 'field' => array('target' => 'label')),
                    );
                    $hasil->dataProgramFunc = $this->buildTable($koloms, $programBaru_data, 'Mata Pelajaran Induk', 'tabel2', 'progBaru');
                    break;
            }
        }
        else {
            $hasil = null;
        }

        return $hasil;
    }


    private function getSession()
    {
        $user = $this->getUser();
        $userEmail = $user['email'];
        $thisSess_sql = "SELECT * FROM smreborn.t_session WHERE EMAIL='$userEmail' ORDER BY TIMESTAMP_SESS DESC LIMIT 1";
        $thisSess_data = $this->query_one($thisSess_sql);

        return $thisSess_data;
    }

    public function getTahunAjaran($kode = null)
    {
        $hasil = new stdClass();
        if (!$kode) {
            $theSession = $this->getSession();
            $kode = $theSession->KD_TAHUN_AJARAN;
            if ($kode == '') $kode = 22;
        }
        $sql = "SELECT KD_TAHUN_AJARAN AS kode,NM_TAHUN_AJARAN AS tahun FROM refs.r_tahun_ajaran WHERE KD_TAHUN_AJARAN=$kode";
        $data = $this->query_one($sql);
        $hasil->error = $this->error;
        $hasil->errno = $this->errno;
        $hasil->tahunAjaran = $data;
        $hasil->semester = $theSession->KD_PERIODE_BELAJAR;

        return $hasil;

    }

    private function goMigrate($idSikad)
    {
        $cekMigrasi = "SELECT LEVEL_MIGRASI AS lev FROM sikad_main.t_sekolah_migrasi WHERE ID_SIKAD=$idSikad ORDER BY LEVEL_MIGRASI DESC";
        $migrated = $this->query_one($cekMigrasi);

        $client_data = $this->getClient();
        $db = $client_data->dbClient;

        if ($client_data->jenisSekolah == '27') $jenisSekolah = 10;
        else $jenisSekolah = $client_data->jenisSekolah;
        if (!$migrated) {
            #migrate identitas sekolah
            $sql = "INSERT INTO sikad_main.t_sekolah_identitas (SELECT '$idSikad',`KD_TAHUN_AJARAN`,
                          `NSS`,
                          `KD_STATUS_SEKOLAH`,
                          `KD_BENTUK_SEKOLAH`,
                          $jenisSekolah,
                          `NIS`,
                          `NM_SEKOLAH`,
                          `JALAN`,
                          `KD_POS`,
                          `KD_DAERAH`,
                          `ID_PROPINSI`,
                          `ID_KABUPATEN`,
                          `ID_KECAMATAN`,
                          `KD_DESA`,
                          `KD_AREA`,
                          `NO_TELP`,
                          `NO_FAX`,
                          `EMAIL`,
                          `WEBSITE`,
                          `JARAK_SKL_SJNS`,
                          `KD_WAKTU_PENYELENGGARAAN`,
                          `TAHUN_DIBUKA`,
                          `TAHUN_AKHIR_RENOV`,
                          `NM_BANK`,
                          `NO_REK_SEKOLAH`,
                          `NO_SK_PENDIRIAN`,
                          `TANGGAL_SK_PENDIRIAN`,
                          `KD_KETERANGAN_SK`,
                          `NO_SK_AKHIR_STATUS`,
                          `TANGGAL_SK_AKHIR_STATUS`,
                          `KD_AKREDITASI`,
                          `NO_SK_AKREDITASI`,
                          `TANGGAL_SK_AKREDITASI`,
                          `TAHUN_TUTUP`,
                          `KELILING_TANAH`,
                          `DIPAGAR_PERMANEN`,
                          `STATUS_AKTIF`,
                          `NPSN`,
                          `KD_KLASIFIKASI_GEOGRAFIS`,
                          `KD_KLASIFIKASI_SEKOLAH`,
                          `INKLUSI`,
                          `RT`,
                          `RW`,
                          `LATITUDE`,
                          `LONGITUDE`,
                          `AKSES_INTERNET`,
                          `AKSES_INTERNET_JENIS`,
                          `AKSES_INTERNET_LAINNYA`,
                          `AKSES_INTERNET_BANDWIDTH`,
                          `STATUS_KEPEMILIKAN`,
                          `PND_TGN_SK_PENDIRIAN`,
                          `NO_SK_OPERASIONAL`,
                          `TANGGAL_SK_OPERASIONAL`,
                          `PND_TGN_SK_OPERASIONAL`,
                          `NO_SK_AKREDITASI_AKHIR`,
                          `TANGGAL_SK_AKREDITASI_AKHIR`,
                          `SERTIFIKASI_ISO`,
                          `GUGUS_SEKOLAH`,
                          `REK_ATAS_NAMA`,
                          `STATUS_MBS`,
                          `USERNAME`,
                          `TANGGAL_AKSES`
 FROM $db.t_sekolah_identitas)";
            $sekolah = $this->query_one($sql);

            #pegawai
            $pegawai_sql = "SELECT NIP FROM $db.t_pegawai ";
            $pegawai_data = $this->query_all($pegawai_sql);

            foreach ($pegawai_data as $pegIdx => $itPeg) {
                $kdUSerPegawai = sha1($idSikad . '|' . $itPeg->NIP);
                $cek = "SELECT * FROM sikad_main.t_pegawai WHERE KD_USER_PEGAWAI='$kdUSerPegawai'";
                $data = $this->query_one($cek);

                if (!$data) {
                    $insert = "INSERT INTO sikad_main.t_pegawai (KD_USER_PEGAWAI, NOMOR_INDUK_BARU, NM_PEGAWAI, KOTA_LAHIR, TANGGAL_LAHIR, KD_JENIS_KELAMIN, KD_GOL_DARAH, KD_AGAMA, KD_STATUS_NIKAH, ALAMAT, RT, RW, KELURAHAN_DESA, KECAMATAN, KABUPATEN_KOTA, PROPINSI, KD_POS, KD_AREA, NO_TELP, NO_HP, EMAIL, TANGGAL_AKSES, NUPTK, GELAR_DEPAN, GELAR_BELAKANG, NIY_NIGK, NIK, NM_IBU_KANDUNG, STATUS_KEPEGAWAIAN, SERTIFIKASI_JABATAN, TAHUN_SERTIFIKAT_JABATAN, NOMOR_SERTIFIKAT_JABATAN, KD_SERTIFIKASI_BIDANG_STUDI, KD_PROGRAM_KEAHLIAN, LISENSI_KEPALA_SEKOLAH, CATATAN)
                    (SELECT  '$kdUSerPegawai', NOMOR_INDUK_BARU, NM_PEGAWAI, KOTA_LAHIR, TANGGAL_LAHIR, KD_JENIS_KELAMIN, KD_GOL_DARAH, KD_AGAMA, KD_STATUS_NIKAH, ALAMAT, RT, RW, KELURAHAN_DESA, KECAMATAN, KABUPATEN_KOTA, PROPINSI, KD_POS, KD_AREA, NO_TELP, NO_HP, EMAIL, TANGGAL_AKSES, NUPTK, GELAR_DEPAN, GELAR_BELAKANG, NIY_NIGK, NIK, NM_IBU_KANDUNG, STATUS_KEPEGAWAIAN, SERTIFIKASI_JABATAN, TAHUN_SERTIFIKAT_JABATAN, NOMOR_SERTIFIKAT_JABATAN, KD_SERTIFIKASI_BIDANG_STUDI, KD_PROGRAM_KEAHLIAN, LISENSI_KEPALA_SEKOLAH, CATATAN from $db.t_pegawai
                        WHERE NIP=$itPeg->NIP
                    )";
                    $this->query_one($insert);
                }
                //cek t_pegawai_aktif

                $pegAktifPas_sql = "SELECT * FROM $db.t_pegawai_aktif WHERE NIP=$itPeg->NIP";
                $pegAktifPas_data = $this->query_all($pegAktifPas_sql);

                foreach ($pegAktifPas_data as $index => $item) {
                    $insPAktif_sql = "INSERT INTO sikad_main.t_pegawai_sekolah (KD_USER_PEGAWAI, KD_TAHUN_AJARAN, ID_SIKAD, NIP, KD_JENIS_KETENAGAAN, STATUS_AKTIF) values
('$kdUSerPegawai',$item->KD_TAHUN_AJARAN,$idSikad,$item->NIP,$item->KD_JENIS_KETENAGAAN,$item->STATUS_AKTIF)";
                    $this->query_one($insPAktif_sql);
                }

                set_time_limit(0);
            }//EACH PEGAWAI
            set_time_limit(0);
            #impor tingkat kelas
            $tingKelas_sql = "SELECT * FROM $db.r_tingkat_kelas";
            $tingKelas_data = $this->query_all($tingKelas_sql);
            foreach ($tingKelas_data as $idxTingkat => $itemTingkat) {
                $kodeTingkat = $this->konvTingkatKelas($itemTingkat->KD_TINGKAT_KELAS, $jenisSekolah);
                $insTingkatKelas = "INSERT INTO sikad_main.t_sekolah_tingkat_kelas(ID_SIKAD, ID_TINGKAT_KELAS,KD_TINGKAT_KELAS_LAMA) VALUES ($idSikad,$kodeTingkat,'$itemTingkat->KD_TINGKAT_KELAS')";
                $this->query_one($insTingkatKelas);

            }

        }//EACH SEKOLAH

        $cek1 = "SELECT * FROM sikad_main.t_sekolah_tingkat_kelas WHERE ID_SIKAD=$idSikad";
        if (count($this->query_all($cek1)) > 0) {
            $insMIgrasi = "INSERT INTO sikad_main.t_sekolah_migrasi (ID_SIKAD, LEVEL_MIGRASI, NIP) VALUES ($idSikad,1,1)";
            $this->query_one($insMIgrasi);
        }
        $cek2 = "SELECT * FROM sikad_main.t_sekolah_paket_pengajaran WHERE ID_SIKAD=$idSikad";
        if (count($this->query_all($cek2)) > 0) {
            $insMIgrasi = "INSERT INTO sikad_main.t_sekolah_migrasi (ID_SIKAD, LEVEL_MIGRASI, NIP) VALUES ($idSikad,2,1)";
            $this->query_one($insMIgrasi);
        }
        $migrated = $this->query_one($cekMigrasi);
        switch (intval($migrated->lev)) {
            case 2:#program sudah jurusan belum
                $jurLama_sql = "SELECT * FROM pas_sma.t_sekolah_jurusan";
                $jurLama_data = $this->query_all($jurLama_sql);
                foreach ($jurLama_data as $index => $item) {
                    $kodeTingkat = $this->konvTingkatKelas($item->KD_TINGKAT_KELAS, $jenisSekolah);
                    $kodeProgram = $this->konvProgram($item->KD_PROGRAM_PENGAJARAN, $idSikad);
                    $insJur_sql = "INSERT INTO sikad_main.t_sekolah_jurusan (ID_SIKAD, KD_TAHUN_AJARAN, ID_TINGKAT_KELAS, ID_PAKET_KEAHLIAN) VALUES
                          ($idSikad,$item->KD_TAHUN_AJARAN,$kodeTingkat,$kodeProgram)";
                    $this->query_one($insJur_sql);
                }
                $cek3 = "SELECT * FROM sikad_main.t_sekolah_jurusan WHERE ID_SIKAD=$idSikad";
                if (count($this->query_all($cek3)) > 0) {
                    $insMIgrasi = "INSERT INTO sikad_main.t_sekolah_migrasi (ID_SIKAD, LEVEL_MIGRASI, NIP) VALUES ($idSikad,3,1)";
                    $this->query_one($insMIgrasi);
                }
                break;
            case 3:#Migrasi wali kelas
                $waliLama_sql = "SELECT * FROM pas_sma.t_pegawai_rombel";
                $waliLama_data = $this->query_all($waliLama_sql);
                foreach ($waliLama_data as $index => $item) {
                    $kodeTingkat = $this->konvTingkatKelas($item->KD_TINGKAT_KELAS, $jenisSekolah);
                    $kodeProgram = $this->konvProgram($item->KD_PROGRAM_PENGAJARAN, $idSikad);
                    $nip = $this->konvNIP($item->NIP, $idSikad);
                    $tahun = $item->KD_TAHUN_AJARAN;
                    $rombel = $item->KD_ROMBEL;
                    if ($rombel == '') $rombel = rand(0, 9);
                    $walasIns = "INSERT INTO sikad_main.t_pegawai_walas
                            (ID_SIKAD, KD_TAHUN_AJARAN, ID_TINGKAT_KELAS, ID_PAKET_KEAHLIAN, KD_ROMBEL, KD_USER_PEGAWAI, ID_JENIS_WALAS, ID_RUANG_KELAS, NM_ROMBEL)
                            VALUES
                            ($idSikad,$tahun,$kodeTingkat,$kodeProgram,'$rombel','$nip',1,1,'$item->KETERANGAN')
                            ";
                    $this->query_one($walasIns);
                    set_time_limit(0);
                }
                $cek4 = "SELECT * FROM sikad_main.t_pegawai_walas WHERE ID_SIKAD=$idSikad";
                if (count($this->query_all($cek4)) > 0) {
                    $insMIgrasi = "INSERT INTO sikad_main.t_sekolah_migrasi (ID_SIKAD, LEVEL_MIGRASI, NIP) VALUES ($idSikad,4,1)";
                    $this->query_one($insMIgrasi);
                }
                break;
            case 4:#Migrasi siswa
                $siswa_sql = "SELECT NIS FROM pas_sma.t_siswa";
                $siswa_data = $this->query_all($siswa_sql);
                foreach ($siswa_data as $index => $item) {
                    $kdUSerSiswa = sha1($idSikad . '|' . $item->NIS);
                    $cekSiswa = "SELECT FROM sikad_main.t_siswa WHERE KD_USER_SISWA='$kdUSerSiswa'";
                    $isAda = $this->query_one($cekSiswa);
                    if ($isAda) continue;
                    $ins = "INSERT INTO sikad_main.t_siswa(KD_USER_SISWA, NO_INDUK, NISN, NIK, NM_SISWA, NM_PANGGILAN, KD_JENIS_KELAMIN, KOTA_LAHIR, TANGGAL_LAHIR, ALAMAT, RT, RW, KD_POS, KD_GOL_DARAH, KD_AGAMA, NO_TELP, NO_HP, NO_HP_ORTU, KEWARGANEGARAAN, ANAK_KE, JUMLAH_KANDUNG, JUMLAH_TIRI, JUMLAH_ANGKAT, STATUS_YATIM_PIATU, BAHASA, TINGGAL_DI, JARAK_SEK, KELAINAN_JASMANI, BERAT_BADAN, TINGGI_BADAN, HUBUNGI, TANGGUNG_BIAYA, TEMP_AKSES_NET, FREK_AKSES_NET, FREK_REKRE_KEL, DIR_FOTO, STATUS_ENTRI, KD_JENIS_KETUNAAN, KD_STATUS_DALAM_KELUARGA, JENIS_TINGGAL, KELURAHAN_DESA, KECAMATAN, KABUPATEN_KOTA, PROPINSI, KD_AREA, KD_JARAK_SEK, ALAT_TRANSPORTASI, EMAIL_PRIBADI)
 (select '$kdUSerSiswa', NO_INDUK, NISN, NIK, NM_SISWA, NM_PANGGILAN, KD_JENIS_KELAMIN, KOTA_LAHIR, TANGGAL_LAHIR, ALAMAT, RT, RW,
 KD_POS, KD_GOL_DARAH, KD_AGAMA, NO_TELP, NO_HP, NO_HP_ORTU, KEWARGANEGARAAN, ANAK_KE, JUMLAH_KANDUNG, JUMLAH_TIRI, JUMLAH_ANGKAT, STATUS_YATIM_PIATU, BAHASA, TINGGAL_DI,
 JARAK_SEK, KELAINAN_JASMANI, BERAT_BADAN, TINGGI_BADAN, HUBUNGI, TANGGUNG_BIAYA, TEMP_AKSES_NET, FREK_AKSES_NET, FREK_REKRE_KEL, DIR_FOTO, STATUS_ENTRI, KD_JENIS_KETUNAAN,
 KD_STATUS_DALAM_KELUARGA, JENIS_TINGGAL, KELURAHAN_DESA, KECAMATAN, KABUPATEN_KOTA, PROPINSI, KD_AREA, KD_JARAK_SEK, ALAT_TRANSPORTASI, EMAIL_PRIBADI
   FROM pas_sma.t_siswa WHERE NIS='$item->NIS')";
                    $this->query_one($ins);
                    set_time_limit(0);
                }

                $kelas_sql = "SELECT * FROM pas_sma.t_siswa_tingkat";
                $kelas_data = $this->query_all($kelas_sql);
                foreach ($kelas_data as $index => $item) {
                    $kdUSerSiswa = sha1($idSikad . '|' . $item->NIS);
                    $kodeTingkat = $this->konvTingkatKelas($item->KD_TINGKAT_KELAS, $jenisSekolah);
                    $kodeProgram = $this->konvProgram($item->KD_PROGRAM_PENGAJARAN, $idSikad);
                    $tahun = $item->KD_TAHUN_AJARAN;
                    $rombel = $item->KD_ROMBEL;
                    $kodeSiswaKelas = sha1($idSikad . "|" . $tahun . "|" . $kodeTingkat . "|" . $kodeProgram . "|" . $rombel);
                    $cek_sql = "SELECT KD_SISWA_KELAS FROM sikad_main.t_siswa_kelas WHERE KD_SISWA_KELAS='$kodeSiswaKelas' AND KD_USER_SISWA='$kdUSerSiswa'";
                    $cekdata = $this->query_one($cek_sql);
                    if ($cekdata) continue;
                    $insKls = "INSERT INTO sikad_main.t_siswa_kelas (KD_SISWA_KELAS, ID_SIKAD, KD_TAHUN_AJARAN, ID_TINGKAT_KELAS, ID_PAKET_KEAHLIAN, KD_ROMBEL, KD_USER_SISWA)
(SELECT '$kodeSiswaKelas',$idSikad,'$tahun',$kodeTingkat,$kodeProgram,'$rombel','$kdUSerSiswa' FROM pas_sma.t_siswa_tingkat WHERE NIS='$item->NIS'
AND KD_TAHUN_AJARAN='$tahun')";
                    $this->query_one($insKls);
                    if ($this->errno != 0) {
                        echo $this->error . '<br />';
                        echo $insKls . '<br />';
                    }
                    set_time_limit(0);
                }
                $cek5 = "SELECT * FROM sikad_main.t_siswa_kelas WHERE ID_SIKAD=$idSikad";
                if (count($this->query_all($cek5)) > 0) {
                    $insMIgrasi = "INSERT INTO sikad_main.t_sekolah_migrasi (ID_SIKAD, LEVEL_MIGRASI, NIP) VALUES ($idSikad,5,1)";
                    $this->query_one($insMIgrasi);
                }
                break;

            case 5:#migrasi kelompok mapel
                $kelLama_sql = "SELECT ID_KELOMPOK_MAPEL as a FROM pas_sma.r_sikad_kelompok_mapel";
                $kelLama_data = $this->query_all($kelLama_sql);
                $urut = 1;
                foreach ($kelLama_data as $index => $item) {
                    $tahun_sql = "SELECT KD_TAHUN_AJARAN AS tahun FROM pas_sma.t_sekolah_identitas";
                    $tahun_data = $this->query_all($tahun_sql);
                    foreach ($tahun_data as $inThn => $itTahun) {
                        $ins_sql = "INSERT INTO sikad_main.t_sekolah_kelompok_mapel (ID_SIKAD, KD_TAHUN_AJARAN, ID_KELOMPOK_MAPEL, LEVEL_KELOMPOK_MAPEL, NM_KELOMPOK_MAPEL, INISIAL_KELOMPOK,JUDUL_RAPOR, IS_TAMPIL_RAPOR, URUT_RAPOR)
                            (SELECT  $idSikad,$itTahun->tahun,`ID_KELOMPOK_MAPEL`,1,`NM_KELOMPOK_MAPEL`,`NM_KELOMPOK_MAPEL`,`DE_KELOMPOK_MAPEL`,1,$urut FROM pas_sma.r_sikad_kelompok_mapel WHERE ID_KELOMPOK_MAPEL=$item->a)";
                        $this->query_one($ins_sql);
                    }
                }
                $cek6 = "SELECT * FROM sikad_main.t_sekolah_identitas WHERE ID_SIKAD=$idSikad";
                if (count($this->query_all($cek6)) > 0) {
                    $insMIgrasi = "INSERT INTO sikad_main.t_sekolah_migrasi (ID_SIKAD, LEVEL_MIGRASI, NIP) VALUES ($idSikad,6,1)";
                    $this->query_one($insMIgrasi);
                }

                break;

        }

    }

    private function konvTingkatKelas($kdLama, $jenisSekolah)
    {
        $sql = "SELECT ID_TINGKAT_KELAS AS kode FROM refs.r_tingkat_kelas WHERE PMK_JENIS_SEKOLAH='$jenisSekolah' AND KD_LAMA_TINGKAT_KELAS='$kdLama'";
        $data = $this->query_one($sql);

        return $data->kode;
    }

    private function konvProgram($kdLama, $idSikad)
    {
        $sql = "SELECT ID_PAKET_KEAHLIAN AS kode FROM sikad_main.t_sekolah_paket_pengajaran WHERE KD_PROGRAM_PENGAJARAN='$kdLama' and ID_SIKAD=$idSikad";
        $data = $this->query_one($sql);

        return $data->kode;
    }

    private function konvNIP($nipLama, $idSikad)
    {
        $sql = "SELECT KD_USER_PEGAWAI AS kode FROM sikad_main.t_pegawai_sekolah WHERE NIP='$nipLama' and ID_SIKAD=$idSikad";
        $data = $this->query_one($sql);

        return $data->kode;
    }

    private function buildTable($koloms, $data, $judulTabel, $idTabel, $rowClassName)
    {
        $hasil = new stdClass();
        $hasil->idTabel = $idTabel;
        $hasil->dataTabel = $data;
        $hasil->koloms = $koloms;
        $hasil->judulTabel = $judulTabel;
        $hasil->rowClassName = $rowClassName;

        return $hasil;
    }

}

?>