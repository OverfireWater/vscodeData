<?php
// //创建一个memcache对象
// $memcache = new Memcache;
// //连接Memcached服务器
// $memcache->connect('localhost', 11211) or die ("Could not connect");
// //设置一个变量到内存中，名称是key 值是test
// $memcache->set('name', 'memcached');
// //从内存中取出key的值
// $get_value = $memcache->get('name');
// echo "获取的键值为：".$get_value;
// //关闭memcache服务
// $memcache->close();

// $con    = new MongoDB\Driver\Manager('mongodb://127.0.0.1:27017');
// echo  "连接成功";
// $query  = new MongoDB\Driver\Query([]);
// $cursor = $con->executeQuery('sen.sen',$query);
// $it     = new IteratorIterator($cursor);
// $it->rewind();
// while ($doc=$it->current()) {
//    print_r($doc);
//    $it->next();
//    echo '<br/>';
// }
?>