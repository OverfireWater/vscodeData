<?php
class Demo{
    private $name;
    private $age;
    private static $cc;
    private function __construct()
    {

    }
    private function __clone()
    {
        
    }
    public function getName(){
       return $this->name;
    }
    public function setName($name){
        $this->$name=$name;
    }
    public function getAge(){
        return $this->age;
    }
    public function setAge($age){
        $this->$age=$age;
    }
    public static function test(){
        if(self::$cc==null){
            self::$cc=new self(); 
        }
        return self::$cc;
    }
}
$a=Demo::test();
$a->setName(111111);
echo $a->getName();
?>