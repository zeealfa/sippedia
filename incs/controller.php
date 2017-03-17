<?php
include_once("class.MysqliDatabase.php");
class controllerBaru extends MysqliDatabase
{

	function insert_val($tabel, $stack)
	{
		$pairs = explode(';', $stack);
		$fields = '';
		$values = '';
		//print_r($pairs);
		foreach ($pairs as $pair) {
			$chunck = explode('=', $pair);
			if ($chunck[1] != '') {
				//echo $tabel.$chunck[0].$chunck[1];
				$valid = $this->cek_field($tabel, $chunck[0], $chunck[1]);
				if ($valid[0] != '') {
					$fields .= $valid[0] . ',';
					$values .=strip_tags($valid[1]) . ',';
				}
			}
		}
		$sql = 'INSERT INTO ' . $tabel . '(' . substr($fields, 0, -1) . ') VALUES (' . substr($values, 0, -1) . ')';
		$data = $this->query_one($sql);
		if ($this->errno != 0) {
			return '0' . $this->error;
		} else {
			return '1';
		}


	}

	function update_val($tabel, $stack, $kondisi)
	{
		$hasil=array();
		$pairs = explode(';', $stack);
		$fields = '';
		$updates = '';
		foreach ($pairs as $pair) {
			$chunck = explode('=', $pair);
			$fields .= $this->cek_field($tabel, $chunck[0], $chunck[1]);
			if ($chunck[1] != '') {
				$valid = $this->cek_field($tabel, $chunck[0], $chunck[1]);
				if ($valid[0] != '') {
					$updates .= $valid[0] . '=' . strip_tags($valid[1])  . ',';
				}
			}

		}
		$sql = 'UPDATE ' . $tabel . ' SET ' . substr($updates, 0, -1) . ' WHERE ' . $kondisi;
		$hasil['row']=$this->query_affected($sql);
		$hasil['errno']=$this->errno;
		$hasil['error']=$this->error;
		return $hasil;
	}

	function delete_val($tabel, $kondisi)
	{
		$sql = 'DELETE FROM ' . $tabel . '  WHERE ' . $kondisi;
		return $sql;
		$data = $this->query_one($this->sanitizeOne($sql, 'str'));
		echo $this->error;

		if ($this->errno != 0) {
			return '0' . $this->error;
		} else {
			return '1';
		}
	}
	function sanitizeOne($str) {
		return $this->real_escape_string($str);
	}
	function cek_field($tabel, $field, $value)
	{

		$sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='" . $tabel . "' AND COLUMN_NAME='" . $field . "'  AND TABLE_SCHEMA='" . $this->database() . "'";
		//echo $sql;
		$datas = $this->query_all($sql);
		$numrows = $this->query_affected($sql);
		if ($numrows > 0) {
			foreach ($datas as $data) {
				//echo $data->DATA_TYPE;
				if ($numrows == 1) {
					$datatype = $data->DATA_TYPE;
					switch ($datatype) {
						case 'int':
						case 'smallint':
						case 'bigint':
						case 'tinyint':
							$stack = ($value);
							break;
						case 'decimal':
						case 'char':
						case 'timestamp':
						case 'varchar':
							$stack = "'" . $stack = ($value). "'";
							if (($field == 'USERNAME') && (($value) == '')) {
								$stack = '"pas"';
							}
							break;
						case 'text':
							$stack = "'" . $value . "'";
							break;
						case 'date':
							include_once('func_mcm.php');
							//$tanggal=date('Y-m-d',$value));
							$stack = '"' . tanggal_db($value) . '"';
							break;
					}
					$pairs = array($data->COLUMN_NAME, $stack);
				}
			}
			return $pairs;
		} else {
			return '';
		}

	}


	function pilihan2($table, $fieldkey, $fieldshow, $order = '', $criteria, $select = '')
	{
		$sql = "SELECT * FROM " . strtolower($table) . " WHERE " . $criteria . " ";
		if ($order != '') {
			$sql .= 'ORDER BY ' . $order;
		}
		$results = $this->query_all($sql);
		$baris = $this->query_affected($sql);
		if ($baris > 0) {
			$opsi='';
			foreach ($results as $result) {
				$tampil = '';
				$fieldshows = explode(',', $fieldshow);
				foreach ($fieldshows as $show) {
					$tampil .= $result->$show . '-';
				}
				$tampil = substr($tampil, 0, -1);
				if ($result->$fieldkey == $select) {
					$opsi .= "<option value=" . $result->$fieldkey . " selected='selected'>" . $tampil . "</option>";
				} else {
					$opsi .= "<option value=" . $result->$fieldkey . ">" . $tampil . "</option>";
				}
			};
		}
		return $opsi;
	}

	function tahunajaran($tahun)
	{
		$tahun_sql = 'SELECT NM_TAHUN_AJARAN FROM r_tahun_ajaran where KD_TAHUN_AJARAN="' . $tahun . '"';
		$tahun_data = $this->query_one($tahun_sql);
		return $tahun_data->NM_TAHUN_AJARAN;
	}
}

?>