<?php
error_reporting(E_ALL);
/**
 * For App Scope Variables.
 * User: Alfa
 * Date: 21/07/2016
 * Time: 3:20
 */


require_once("incs/class.MysqliDatabase.php");

class classBaca extends MysqliDatabase
{
    private $dataCS;
    public $sessid = '';
    public $keyApp = '';

    public function __construct()
    {
        include('config.php');
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
    }

    public function frmBuilder($config)
    {
        $hasil = new stdClass();

        $db = $config['database'];
        $table = $config['table'];
        $target = $config['target'];

        $sql = "SELECT * FROM $db.$table";
        if (isset($config['syarat'])) {
            $sql .= " WHERE ";
            $idxSyarat = 0;
            foreach ($config['syarat'] as $kols => $aidi) {
                if ($idxSyarat != 0) $sql .= " AND ";
                $sql .= $kols . " ='$aidi' ";
                $idxSyarat++;
            }
            $data = $this->query_one($sql);
            $tipe = "update";
            if (!$data) $tipe = "insert";
        }
        else {
            $data = false;
            $tipe = "insert";

        }

        #form prop
        $targetPar = array(
            "db"   => $db,
            "tb"   => $target,
            "con"  => @$config['syarat'],
            "tipe" => $tipe
        );

        $hasil->chuck = sha1($_COOKIE['accuser'] . $db . $table);
        $_SESSION[sha1($_COOKIE['accuser'] . $db . $table)] = $targetPar;

        $hasil->buttonState = $config['buttonState'];
        if (isset($config['buttons'])) {
            $hasil->buttons = $config['buttons'];
        }
        else {
            $hasil->buttons[] = array(
                "idButton"  => "btnSimpan",
                "tipe"      => "button",
                "className" => "blue",
                "icon"      => "fa-save",
                "label"     => "Simpan",
            );
        }


        #susun kolom
        $kolom_sql = "SHOW COLUMNS FROM $db.$table";
        $kolom_data = $this->query_all($kolom_sql);
        $judul = $config['judul'];
        $remove = $config['isRemove'];
        $hidden = $config['isHide'];
        $placeholder = $config['placeholder'];
        $theClassName = $config['className'];
        $theDefValue = $config['defValue'];
        $theAlterType = $config['alterType'];
        isset($config['isReadOnly']) ? $theReadOnly = $config['isReadOnly'] : $theReadOnly = array();

        $frmBuild = array();
        foreach ($kolom_data as $idxCol => $itemCol) {

            if (isset($remove[$itemCol->Field])) continue;
            $selectOptions = false;

            $arType = explode("(", $itemCol->Type);
            array_key_exists($itemCol->Field, $theAlterType) ? $fieldType = @$theAlterType[$itemCol->Field]['tipe'] : $fieldType = $arType[0];

            switch ($fieldType) {
                default:
                case 'int':
                    $tipeField = "text";
                    break;
                case 'longblob':
                case 'mediumblob':
                case 'longtext':
                case 'mediumtext':
                case 'text':
                    $tipeField = "textarea";
                    break;
                case 'select':
                    $tipeField = "select";
                    $selectOptions = $theAlterType[$itemCol->Field]['parameter'];
                    break;
            }

            array_key_exists($itemCol->Field, $judul) ? $judulKolom = $judul[$itemCol->Field] : $judulKolom = $itemCol->Field;
            array_key_exists($itemCol->Field, $hidden) ? $isHidden = $hidden[$itemCol->Field] : $isHidden = false;
            array_key_exists($itemCol->Field, $placeholder) ? $thePlaceholder = $placeholder[$itemCol->Field] : $thePlaceholder = "";
            array_key_exists($itemCol->Field, $theClassName) ? $className = $theClassName[$itemCol->Field] : $className = "";
            $nmField = $itemCol->Field;
            if ($data) {
                $defValue = $data->$nmField;
                if (strpos($className, 'encrypt')) {
                    if (base64_decode($defValue))
                        $defValue = base64_decode($defValue);
                    else $defValue = '';
                }
                if (strpos($className, 'tanggalan'))
                    $defValue = date('d-m-Y', $this->tanggal_normal($defValue));
                if (strpos($className, 'tanggalPanjang'))
                    $defValue = $this->tanggal_panjang($defValue);

            }
            else if (array_key_exists($itemCol->Field, $theDefValue)) $defValue = $theDefValue[$itemCol->Field];
            else $defValue = "";
            if ($itemCol->Null == "NO") {
                $required = " has-info required";
                $className .= " required ";
            }
            else {
                $required = "";

            }

            #readonly
            if(array_key_exists($itemCol->Field, $theReadOnly)){
                $tipeField='span';
            }
            $frmBuild[$idxCol]['nmField'] = md5($this->keyApp . $itemCol->Field);
            $frmBuild[$idxCol]['judulField'] = str_replace("_", " ", $judulKolom);
            $frmBuild[$idxCol]['placeholder'] = $thePlaceholder;
            $frmBuild[$idxCol]['tipeField'] = $tipeField;
            $frmBuild[$idxCol]['isHidden'] = $isHidden;
            $frmBuild[$idxCol]['classAtas'] = $required;
            $frmBuild[$idxCol]['className'] = $className;
            $frmBuild[$idxCol]['defValue'] = $defValue;
            $frmBuild[$idxCol]['selOptions'] = $selectOptions;
        }

        $hasil->items = $data;
        $hasil->koloms = $frmBuild;
        $hasil->error = $this->error;


        return $hasil;
    }

    public
    function generateSelect($params)
    {
        $db = $params['db'];
        $table = $params['table'];
        $primaryKey = $params['primaryKey'];
        $displayKey = $params['displayKey'];
        $orderKey = $params['orderKey'];
        $groupBy = "";
        $syarat= "";
        if(isset($params['condition'])) $syarat= " WHERE ". $params['condition'];
        if (isset($params['groupBy'])) {
            $groupBy = " GROUP BY " . $params['groupBy'];
        }
        $sql = "SELECT $primaryKey as id,$displayKey as text FROM $db.$table $syarat $groupBy ORDER BY $orderKey ";
        $data = $this->query_all($sql);
        $hasil = new stdClass();
        $hasil->items = $data;
        $hasil->error = $this->error;
        $hasil->errno = $this->errno;

        return $hasil;
    }

}

?>