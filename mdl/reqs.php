<?php

/**
 * Created by PhpStorm.
 * User: Alfa
 * Date: 17/08/2016
 * Time: 23.38
 * Untuk handle database post
 */
require_once("mdl/classTulis.php");

class reqs extends classTulis
{

    public function processThis($target, $data)
    {
        #bongkarField
        foreach ($data as $index => $item) {
            if (!$item['value']) continue;
            $fields[] = array("var" => $item['name'], "val" =>$item['value']);
        }
        switch ($target['tipe']) {
            case 'login':
                $exec = $this->insertThis($target, $fields);
                break;
            case 'insert':
                $exec = $this->insertThis($target, $fields);
                break;
            case 'update':
                $exec = $this->updateThis($target, $fields);
                break;
        }

        return $exec;
    }

    private function insertThis($target, $fields)
    {
        $db = $target['db'];
        $tb = $target['tb'];
        foreach ($fields as $index => $field) {
            if(!$field['val']) continue;

            $check = $this->cektype($target, $field['var'], $field['val']);
            $theFields[] = $check->var;
            $theValues[] = $check->val;
        }
        $nmF = implode(",", $theFields);
        $nmV = implode(",", $theValues);
        $sql = "INSERT INTO $db.$tb ($nmF) VALUES ($nmV)";
        $this->query_one($sql);
        $hasil = new stdClass();
        $hasil->errno = $this->errno;
        $hasil->error = $this->error;
        $hasil->str =$sql;

        return $hasil;
    }

    private function updateThis($target, $fields)
    {

        $db = $target['db'];
        $tb = $target['tb'];
        $syarat = " ";
        $ix = 0;
        foreach ($target['con'] as $nmCon => $itCon) {
            if ($ix > 0) $syarat .= " AND ";
            $syarat .= " $nmCon='$itCon'";
            $ix++;
        }

        $nmF = "";
        $ix = 0;
        foreach ($fields as $index => $field) {
            if(!$field['val']) continue;
            if ($ix > 0) $nmF .= ",";
            $check = $this->cektype($target, $field['var'], $field['val']);
            $nmF .= "$check->var=$check->val";
            $ix++;
        }
        $sql = "UPDATE $db.$tb set $nmF WHERE $syarat";
        $this->query_one($sql);
        $hasil = new stdClass();
        $hasil->errno = $this->errno;
        $hasil->error = $this->error;
        $hasil->str = $sql;

        return $hasil;
    }


    private function cektype($target, $field, $value)
    {
        $hasil = new stdClass();
        $db = $target['db'];
        $tb = $target['tb'];
        $sql = "SHOW COLUMNS from $db.$tb ";
        $data = $this->query_all($sql);
        $fieldType = null;
        $var = null;
        foreach ($data as $idxCol => $itemCol) {
            if ($itemCol->Field === strtoupper($field)) {
                $fieldType = explode("(", $itemCol->Type);
                $hasil->var = $itemCol->Field;
                break;
            }
        }

        $theType = $fieldType[0];

        switch ($theType) {
            default:
                $val = "'" . $this->cleanThis($value) . "'";
                break;
            case 'date':
                $val = "'" . $this->tanggal_db($value) . "'";
                break;
            case 'longblob':
            case 'longtext':
            case 'mediumtext':
            case 'mediumblob':
                $val = "'".base64_encode(str_replace('script','',str_replace('<input','',$value)))."'";
                break;
            case 'int':
            case 'tinyint':
            case 'smallint':
            case 'decimal':
            case 'bigint':
                $val = $this->cleanThis($value);
                break;
        }
        $hasil->val = $val;

        return $hasil;
    }

    private function cleanThis($var)
    {
        $var = $this->real_escape_string($var);

        return $var;
    }


}