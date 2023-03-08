<?php
include_once "../Entily/admininfo.php";
class RedisTool{
    private $host='127.0.0.1';
    private $port='6379';
    private $database=1;
    private $key="list";
    private static $redisIns;
    private $redis_con;
    private function __construct($config)
    {
        if(!is_array($config)){
            return "Redis connect Data error";
        }
        if(!empty($config['host'])){
            $this->host=$config['host'];
        }
        if(!empty($config['key'])){
            $this->key=$config['key'];
        }
        if(!empty($config['port'])){
            $this->port=$config['port'];
        }
        if(!empty($config['database'])){
            $this->database=$config['database'];
        }
        try {
            $this->redis_con=new Redis();
            $this->redis_con->connect($this->host,$this->port);
        } catch (Exception $ex) {
            die($ex);
        }
        $this->redis_con->select($this->database);
    }
    public function insert_redis($arr_value){
        //存数据
        $this->redis_con->zAdd($this->key,array(),$arr_value->getId(),json_encode($arr_value));
    }
    public function RedisQuery(){
        //取数据
        $Data=$this->redis_con->zRange($this->key,0,-1,array());
        return $Data;
    }
    public function list_insert($key,$array){
        $this->redis_con->rPush($key,$array);
    }
    public function list_query($key){
        $data=$this->redis_con->lRange($key,0,10);
        return $data;
    }
    public static function getRedisIns($config){
        if(self::$redisIns==null){
            self::$redisIns=new self($config);
        }
        return self::$redisIns;
    }
}
$a=RedisTool::getRedisIns([]);
$a->list_insert("keys",1);
$b=$a->list_query("keys");
var_dump($b);
?>