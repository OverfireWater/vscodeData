<pre>
<?php
include_once "Mysql.php";
include_once "RedisTool.php";
include_once "../Entily/admininfo.php";
// include_once "../Entily/admininfo.php";
$redis=RedisTool::getRedisIns([]);
$mysql=MysqlTools::Mysql([]);
// $admin=new admininfo();
// $admin->setId('101');
// $admin->setAdminName("大1");
// $admin->setAdminPwd("123456");
// $redis->insert_redis($admin);
$adminInfo=$mysql->Query_DaTa_fetch_all();
for($i=0;$i<count($adminInfo);$i++){
    $redis->list_insert($adminInfo[$i]);
}
$redis->list_query();
// for($i=0;$i<count($ad);$i++){
//     $admin[$i]=json_decode($ad[$i],true);
// }
// var_dump($ad);
?>