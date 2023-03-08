launchApp("支付宝");
var farm=text("芭芭农场").findOnce();
if(farm){
    farm.click();
}else{
    toast("没找到");
}