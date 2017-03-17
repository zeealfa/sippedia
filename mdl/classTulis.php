<?php
error_reporting(E_ALL);
/**
 * For App Scope Variables.
 * User: Alfa
 * Date: 21/07/2016
 * Time: 3:20
 */


require_once("incs/class.MysqliDatabase.php");

class classTulis extends MysqliDatabase
{
    private $dataCS;
    public $sessid = '';
    public $keyApp = '';

    public function __construct()
    {
        include('config.php');
        $CS = explode(';', $db_param_write);
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
}

?>