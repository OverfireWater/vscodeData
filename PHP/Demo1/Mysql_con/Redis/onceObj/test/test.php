<pre><?php
include_once "../Tools/MySQLTool.php";
include_once "../Tools/RedisTools.php";
include_once "../entity/admininfo.php";

//$arr=array("password"=>"root");
////var_dump($arr);
////var_dump($arr['password']);
//$tool=mySql_tool::getInst([]);
////INSERT INTO `bookinfo` VALUES ('106', '《水浒传》', '罗贯中', '1200-11-11', '梁山', '无', 'upload/2.jpg', '1');
 //  $tips=$tool->inserts(["Book_id"=>"111","Book_name"=>"《追风筝的人》","Book_Author"=>"萧红","Book_Date"=>"2001-10-15","remark"=>"无","Book_img"=>"无","uid"=>"1"]);

//页面提交过来的数据  进行组装为对象
//$book=new BookInfo();
//$book->setBookId(114);
//$book->setBookName("《服务器运维管理》");
//$book->setBookAuthor("唐明杰");
//$book->setBookDate("2001-10-15");
//$book->setRemark("无");
//$book->setBookImg("a.jpg");
//$book->setBookIntro("服务器管理");
////MySQL添加数据的时候把对象转换为数组
////$tips=$tool->inserts((array)$book);
//
//$redis=redisTools::getIns([]);
//$redis->addData($book);
//   echo $tips;
$mysql_tool=mySql_tool::getInst([]);
//查询mysql获取对象数组
$arr_bk= $mysql_tool->query();
//创建redis的对象
$redis=redisTools::getIns([]);
//循环对象集合
for ($i=0;$i<count($arr_bk);$i++){
    //把对象存入redis
    $redis->addData($arr_bk[$i]);
}

//查询redis
var_dump($redis->redisquery());




