<?php

class  redisTool{
    private  static $inst;
    private $host="127.0.0.1";
    private $port="6379";
    private $dbName=16;
    private $key='list';
    private $objRedis;
    private function __construct($config)
    {
        if(!empty($config['host'])){
            $this->host=$config['host'];
        }
        if(!empty($config['port'])){
            $this->port=$config['port'];
        }
        if(!empty($config['dbName'])){
            $this->dbName=$config['dbName'];
        }
        if(!empty($config['host'])){
            $this->host=$config['host'];
        }
        $this->objRedis=new redis();
        try {
            $this->objRedis.connect($this->host,$this->port,30);
        }catch (Exception $exception){
            die("connection error");

        }
        $this->objRedis.select($this->dbName);
    }

    public  static function getInst($config){
        
        if(self::$inst==null){
            self::$inst=new self();
        }
        return self::$inst;
    }




}
