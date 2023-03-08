<?php
class  redisTools{
    private static $redisIns;
    private  $host="127.0.0.1";
    private  $port="6379";
    private $database=16;
    private $key="list";
    private $objredis=null;
    private function __construct($config)
    {
        if(!is_array($config)){
            return "�����쳣";
        }
        if(!empty($config['host'])) {
            $this->host=$config['host'];

        }
        if(!empty($config['port'])) {
            $this->port=$config['port'];

        }
        if(!empty($config['database'])){
            $this->database=$config['database'];
        }
        if(!empty($config['key'])){
            $this->key=$config['key'];
        }
        $this->objredis=new Redis();
        try {
            $this->objredis->connect($this->host,$this->port);
        }catch (Exception $exception){
            echo  $exception;

        }
        $this->objredis->select(1);
       // echo "connection success";

    }
//redis �������
//redis �Ĳ���Ϊ bookinfo�Ķ���
    public  function  addData($value){
        //������
        $this->objredis->zAdd($this->key,array(),$value->getId(),json_encode($value));
//        $this->objredis->save();

    }

    public  function redisquery(){
        $bk=$this->objredis->zRange("list",0,-1,array());
        return $bk;

    }

    public static function getIns($config){
        if(self::$redisIns==null){
            self::$redisIns=new self($config);
        }
        return self::$redisIns;

    }


}
