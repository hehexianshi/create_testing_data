<?php
namespace createTextData\create;

use createTextData\create\base\IntType;
use createTextData\create\base\CharType;
use createTextData\create\base\TinyintType;

class Create
{

    private $file;

    private $dbHost;
    private $dbUser;
    private $dbPass;
    private $dbName;

    public function exec()
    {
        $create = yaml_parse_file($this->file);
        
        // connect mysql
        mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
        mysql_select_db($this->dbName);
        mysql_query("set names utf8");

        //写入数据
        $dataLen = $create['dataLen'];
        while ($dataLen) {
            $this->insertDB($create);
            $dataLen--;
        }
        return true;
    }

    public function set($key, $val) {
    
        $this->$key = $val; 
        return $this;
    }

    public function insertDB($create) {
        $data = $create['data'];
        foreach($data as $k => $v) {

            $dbName = $k;
            $fileds = $v['fields'];
            $sql = "INSERT INTO ${dbName} ";

            $field = '';
            $values = '';
            foreach($fileds as $key => $val) {
                if($val['isAuto'])  {
                    continue;
                }

                $className = "\\createTextData\\create\\base\\" . ucfirst($val['type']). 'Type';
                $class = new $className;

                $val['unsign'] ? $class->set('unsign', true) : '';

                $values .= '"' . $class->getContent() . '",';
                $field  .= '`' . $key . '`,';

            }

            $sql .= '('. rtrim($field, ',') .') ';
            $sql .= 'VALUES ('. rtrim($values, ',') . ')';

            mysql_query($sql);
        }

        return true;
    }
}

