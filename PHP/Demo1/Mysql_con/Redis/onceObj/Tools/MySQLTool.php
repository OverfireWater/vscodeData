<?php
include_once "../entity/admininfo.php";
class  mySql_tool{
    //当前类单例模式对象
    private  static  $ins=null;
    private $username="root";
    private $password="root";
    private $port=3306;
    private $host="127.0.0.1";
    private $dataBase="shopdb";
    private $table="adminInfo";
    private $objsql=null;//数据库连接对象
    //构造函数传入一个配置文件数据类型为为数组
    private function __construct($config)
    {
        if(!empty($config['host'])){
            $this->host=$config['host'];
        }
        if(!empty($config['port'])){
            $this->port=$config['port'];
        }
        if(!empty($config['username'])){
            $this->username=$config['username'];
        }
        if(!empty($config['password'])){
            $this->password=$config['password'];
        }
        if(!empty($config['dataBase'])){
            $this->dataBase=$config['dataBase'];
        }
        if(!empty($config['table'])){
            $this->table=$config['table'];
        }
        $this->objsql=new mysqli($this->host,$this->username,$this->password,$this->dataBase,$this->port);
        if($this->objsql->connect_error){
            die("error");
        }
    }
    //修改
    public  function  inserts($data){
        if (!is_array($data)){
            return "arg error";
        }
        foreach ($data as $key=>$vale){
            $fieldstr.=$key.",";
            $valuesstr.="'".$vale."',";
        }
        $fieldstr=substr($fieldstr,0,strlen($fieldstr)-1);
        $valuesstr=substr($valuesstr,0,strlen($valuesstr)-1);
        $sql="insert into ".$this->table."(".$fieldstr.") values (".$valuesstr.")";
        $flag=$this->objsql->query($sql);
        if($flag){
            return "add Success";
        }else{
            return "add error";

        }
    }


    //查询数据库所有的数据
    public  function  query(){
        $sql="select * from ".$this->table;
        $result=$this->objsql->query($sql);
        $bk_arr=$result->fetch_all();
        $arr_bk=array();
        for($i=0;$i<count($bk_arr);$i++){
            $adminInfo=new admininfo();
            $adminInfo->setId($bk_arr[$i][0]);
            $adminInfo->setAdminName($bk_arr[$i][1]);
            $adminInfo->setAdminPwd($bk_arr[$i][2]);
            $arr_admin[$i]=$adminInfo;
            $arr_bk[$i]=$adminInfo;
        }
        return $arr_bk;

    }
    //删除
    //添加



    //创建单例模式

    public static function getInst($config){
        if(self::$ins==null){
            //实例化当前类，在实例化的时候需要调用构造函数  传递配置文件进去
            self:: $ins=new self($config);
        }
        return self::$ins;
    }


}