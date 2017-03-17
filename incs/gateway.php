<?php @session_start();
if (!isset($_SESSION['userid'])) {
	session_destroy();
	header('Location:../index.php');

}

include_once('controller.php');
include_once("class.MysqliDatabase.php");
include_once('../config.php');
$link = new controllerBaru($db_param_write, true);
if ($kunci == '') $kunci = 'kadal**';
include_once("sanitizeit.php");
$tables_sql = 'SHOW TABLES';
$tables_data = $link->query_all($tables_sql);
$array_table = 'Tables_in_' . $link->database();
$target = '';
if (sizeof($tables_data) > 0) {
    foreach ($tables_data as $tables) {
        if (sha1($kunci . $tables->$array_table) == $_REQUEST['target']) $target = $tables->$array_table;
    }

}
$kondisi = '';
if ($_REQUEST['kondisi'] != '')
    $kondisi = base64_decode($_REQUEST['kondisi']);
//echo 'ta' . $target . 'get';
$stack = '';
foreach ($_POST as $depan => $belakang) {
    $stack .= $depan . '=' . $link->real_escape_string($belakang) . ';';
}
switch ($action) {
    case sha1('kadal**' . '1'):
        //$sql='insert';
        $sql = $link->insert_val($target, $stack);
        //$sql=cek_field('t_pegawai','NIP',2);
        break;
    case sha1('kadal**' . '2'):
        $sql = $link->update_val($target, $stack, $kondisi);
        //$sql=$target.$stack.$kondisi;
        break;
    case sha1('kadal**' . '3'):
        $sql = delete_val($target, $kondisi);
        break;
}

echo json_encode($sql);

?>