<?php
class MysqlTools{
    //静态方法
    private static $ins=null;
    private $username='root';
    private $userpwd='root';
    private $host='localhost';
    private $dbname='shopdb';
    private $tablename="admininfo";
    private $port='3306';
    //连接对象
    private $Mysql_obj=null;
    private function __construct($config=false)
    {
        if(!empty($config['host'])){
            $this->host=$config['host'];
        }
        if(!empty($config['username'])){
            $this->username=$config['username'];
        }
        if(!empty($config['userpwd'])){
            $this->userpwd=$config['userpwd'];
        }
        if(!empty($config['dbname'])){
            $this->dbname=$config['dbname'];
        }
        if(!empty($config['tablename'])){
            $this->tablename=$config['tablename'];
        }
        if(!empty($config['port'])){
            $this->port=$config['port'];
        }
        $this->Mysql_obj=new mysqli($this->host,$this->username,$this->userpwd,$this->dbname,$this->port);
        if($this->Mysql_obj->error){
            exit("连接失败,".$this->Mysql_obj->error);
        }
    }
    
    public static function Mysql($config=false){
        if(self::$ins==null){
            self::$ins=new self($config); 
        }
        return self::$ins;
    }
    public function query_data(){
        $sql="select * from ".$this->tablename;
        $result=$this->Mysql_obj->query($sql);
        $arr_obj = null;
        $i = 0;
        if ($result->num_rows > 0) {
            while ($arr = $result->fetch_assoc()) {
                $arr_obj[$i] = $arr;
                $i++;
            }
        }
        return $arr_obj;
    }
    public function update_data($array){
        //判断是否为空,如果不为空
        if(!empty($array)){
            //定义一个空值
            $arr_key_value=null;
            //获取所有的键
            $keys_arr=array_keys($array);
            //循环便利数组的所有键   去掉最后一个键和值
            for($i=0;$i<count($keys_arr)-1;$i++){        
                //判断当前的键是否等于倒数第二个                                            
                    if($i==count($keys_arr)-2){
                        //如果是，就执行下面方法
                        $arr_key_value.="`".$keys_arr[$i]."`='".$array[$keys_arr[$i]]."'";
                    }else{
                        //如不是，执行下面方法
                        $arr_key_value.="`".$keys_arr[$i]."`='".$array[$keys_arr[$i]]."',";
                    }
            }
            //获取最后一个键
            $arr_last_key=$keys_arr[count($array)-1];
            //获取最后一个键值
            $arr_last_val=$array[$keys_arr[count($array)-1]];
            //拼接sql语句
            $sql="update ".$this->tablename." set ".($arr_key_value)." where ".$arr_last_key."=".$arr_last_val;
            // array("name"=>"admin1","age"=>"18","id"=>2);
            // "update table set (`name`='admin',`age`='18') where 'id'='2' ";
            $flag=$this->Mysql_obj->query($sql);
            if($flag){
                echo 'su';
            }else{
                echo 'er'.$sql;
            }
        }else{
            echo "没有数据";
        }
    }
    public function insert_data($array){
        if(!empty($array)){
            $key1=null;
            $val1=null;
            end($array);
            $array_last_key=key($array);
            foreach($array as $key=>$val){           
                if($key==$array_last_key){
                    $key1.="`".$key."`";
                    $val1.="'".$val."'";
                }else{
                    $key1.="`".$key."`,";
                    $val1.="'".$val."',";
                }
            }    
            $sql="insert into ".$this->tablename."(".$key1.") values (".$val1.")";
            $flag=$this->Mysql_obj->query($sql);
            if($flag){
                echo 'su';
            }else{
                echo 'er'.$sql;
            }
        }
    }
    public function delete_data($array){
        if(!empty($array)){
            foreach($array as $key=>$val){           
                $sql="delete from ".$this->tablename." where ".$key."=".$val;              
                $flag=$this->Mysql_obj->query($sql);
            } 
            if($flag){
                echo 'su';
            }else{
                echo 'er'.$sql;
            }
        }
    }
} 
// $array=array("host"=>"192.168.1.102");
$a=MysqlTools::Mysql([]);
// $array_up=array("id"=>2,"username"=>"admin1","userpwd"=>"admin1");
// $b=$a->insert_data($array_up);
// $arr=array("id"=>2);
// $a->delete_data($arr);
$arr=$a->query_data();
// for($i=0;$i<count($arr);$i++){
//      echo $arr[$i]['id'].":";
// }
// var_dump($arr[0][0]);
print_r($arr);

// $a->update_data();
//修改
// $array_up=array("username"=>"admin1","userpwd"=>"123456","id"=>2);
// $a->update_data($array_up);
 

