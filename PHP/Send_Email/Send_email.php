<?php
session_start();
require_once ("phpmailer/class.phpmailer.php");
require_once ("phpmailer/class.smtp.php");
//接受数据
$email=$_POST["email"];
$code=rand(10000,99999);
$mail=new PHPMailer();
//$mail->SMTPDebug=1;
$mail->isSMTP();
$mail->SMTPAuth=true;
//连接qq邮箱的地址
$mail->Host='smtp.qq.com';
//使用ssl加密
$mail->SMTPSecure='ssl';
$mail->Port=465;
$mail->CharSet='UTF-8';
$mail->FromName='over';
$mail->Username='2632686733@qq.com';
$mail->Password='vjnvbpezhrpdebad';
$mail->From='2632686733@qq.com';
$mail->isHTML(true);
$mail->addAddress($email);
$mail->Subject='邮箱验证码';
$mail->Body='<p>亲爱的用户，您好：</p><p style="text-indent:28px">您的绑定邮箱的验证码为：<span style="color:#6027e0; font-weight:bold;">'.$code.'</span>，请在3分钟内完成邮箱绑定。</p>';   //邮件内容;
$status=$mail->send();
if (!$status){
    $result=array("status"=>3,"msg"=>"验证码发送失败". $mail->ErrorInfo);
    $result=json_encode($result);
    exit($result);
}else{
    $result=array("status"=>2,"msg"=>"验证码发送成功");
    $result=json_encode($result);
    $_SESSION['code']=$code;
    exit($result);
}

?>