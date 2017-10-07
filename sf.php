<?php
set_time_limit(0);
ignore_user_abort(true); 
ini_set("display_errors","Off");
error_reporting(E_ALL | E_STRICT); $key=isset($_POST['key']) ? $_POST['key'] : urldecode($_GET['key']);
$kid=isset($_POST['kid']) ? $_POST['kid'] : urldecode($_GET['kid']);
if($key!='123456' or $kid==''){
echo '参数不完整';
exit;
}
$cookir=dirname(__FILE__).'/cookie/sf'.urlencode($kid).'.cookie';
$api2='https://m.sfacg.com/ajax/ashx/Common.ashx?op=signinNew&_='.time();
//print_r($ssion2);
$headtk=array('Accept'=>application/json, text/javascript, */*; q=0.01','X-Requested-With'=>XMLHttpRequest,'Cookie'=>'appNav=false; 68853uvCookieC=5; validateCodeR=C3E1046B43BF31E4EDE182E7F040C1D6; .SFCommunity=76DA677284B109B52359CFADBF7F7D4B1C5D34A6DDF576D655CD2AB78F1C6AC998637AC978A15770206B106B141256175D7E2770BC704A635209A81F958906E75973F550E8B9E0C99BFCFF957E48E8C779CDD49CAF6E3442AF6523B04D15422B; nickNameCookie=DCC4228C812A3532; dnt=userid=3947612&password=KsL2HC8wlF6vXEqUW%2bvcDHX0mefIdrG3GhXylLN0z3OoYjHjCOrGQg%3d%3d&avatar=%2favatars%2fupload%2fQQ%2f1710%2f1507413678563.jpg&tpp=0&ppp=0&pmsound=0&invisible=0&referer=index.aspx&sigstatus=0&expires=216000');
//print_r($headtk);

$info=json_decode(cget($api2,1,1,1,0,'http://m.sfacg.com/signin.html',$headtk),true);
//print_r($info);
if($info['status']!=200){
echo '<a id="msg">失败，原因:'.$info['msg']."</a>";
}else{
echo $info['msg'];
}
//print_r($info);
function cget($url,$cc=0,$cs=0,$ss=0,$ff=0,$ref='http://weixin.com/',$header=array('nok'=>'123')){
global $cookir,$proxy; 
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
if($cc==1){
curl_setopt($ch, CURLOPT_COOKIEFILE,$cookir);
}
curl_setopt($ch,CURLOPT_REFERER,$ref);
//curl_setopt($ch,CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4); 
if($proxy[0]!==''&&$proxy[1]!=''){

curl_setopt($ch, CURLOPT_PROXY,$proxy[0]);
curl_setopt($ch, CURLOPT_PROXYPORT,$proxy[1]);

}
curl_setopt($ch,CURLOPT_USERAGENT,'MQQBrowser/26 Mozilla/5.0 (Linux; U; Android 2.3.7; zh-cn; MB200 Build/GRJ22; CyanogenMod-7) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1');
curl_setopt($ch,CURLOPT_HTTPHEADER,$header); 
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

if($ss==1){
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false); 
}
if($cs==1){
curl_setopt($ch,CURLOPT_COOKIEJAR,$cookir);
}
if($ff!=1){
	$result=curl_exec($ch);
}else{
   $result=curl_getinfo($ch);
}
	curl_close($ch);
	return $result;
} 
function cpost($url,$data,$cc=0,$cs=0,$ss=0,$ff=0,$ref='http://weixin.com/',$header=array('nok'=>'123'),$fd=1){
global $cookir,$proxy;
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
if($cc==1){
curl_setopt($ch, CURLOPT_COOKIEFILE,$cookir);
}
//curl_setopt($ch,CURLOPT_REFERER,$ref);
//curl_setopt($ch,CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4); 
if($proxy[0]!==''&&$proxy[1]!=''){

curl_setopt($ch, CURLOPT_PROXY,$proxy[0]);
curl_setopt($ch, CURLOPT_PROXYPORT,$proxy[1]);

}
curl_setopt($ch,CURLOPT_USERAGENT,'MQQBrowser/26 Mozilla/5.0 (Linux; U; Android 2.3.7; zh-cn; MB200 Build/GRJ22; CyanogenMod-7) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1');
curl_setopt($ch, CURLOPT_HEADER, $fd);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
//curl_setopt($ch, CURLOPT_TIMEOUT,40);
if($ss==1){
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false); 
}
if($cs==1){
curl_setopt($ch, CURLOPT_COOKIEJAR,$cookir);
}
if($ff!=1){
	$result=curl_exec($ch);
}else{
   $result=curl_getinfo($ch);
}
//preg_match('/Set-Cookie:(.*);/iU',$res,$sur);

curl_close($ch);
return $result;
} 
function cssion($url,$cc=0,$cs=0,$ss=0,$ff=0,$ref='http://weixin.com/',$header=array('nok'=>'123')){
global $cookir,$proxy;
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
if($cc==1){
curl_setopt($ch, CURLOPT_COOKIEFILE,$cookir);
}
//curl_setopt($ch,CURLOPT_REFERER,$ref);
//curl_setopt($ch,CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4);
if($proxy[0]!==''&&$proxy[1]!=''){

curl_setopt($ch, CURLOPT_PROXY,$proxy[0]);
curl_setopt($ch, CURLOPT_PROXYPORT,$proxy[1]);

}
curl_setopt($ch,CURLOPT_USERAGENT,'MQQBrowser/26 Mozilla/5.0 (Linux; U; Android 2.3.7; zh-cn; MB200 Build/GRJ22; CyanogenMod-7) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1');
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//curl_setopt($ch, CURLOPT_TIMEOUT,40);
if($ss==1){
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false); 
}
if($cs==1){
curl_setopt($ch, CURLOPT_COOKIEJAR,$cookir);
}
if($ff!=1){
	$result=curl_exec($ch);
}else{
   $result=curl_getinfo($ch);
}
preg_match('/Set-Cookie: XSRF-TOKEN=(.*);/iU',$result,$sur);

curl_close($ch);
return $sur;
} 
function cssion2($url,$data,$cc=0,$cs=0,$ss=0,$ref='http://weixin.com/',$header=array('nok'=>'123')){
global $cookir,$proxy;
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
if($cc==1){
curl_setopt($ch, CURLOPT_COOKIEFILE,$cookir);
}
//curl_setopt($ch,CURLOPT_REFERER,$ref);
//curl_setopt($ch,CURLOPT_IPRESOLVE,CURL_IPRESOLVE_V4); 
if($proxy[0]!==''&&$proxy[1]!=''){

curl_setopt($ch, CURLOPT_PROXY,$proxy[0]);
curl_setopt($ch, CURLOPT_PROXYPORT,$proxy[1]);

}
curl_setopt($ch,CURLOPT_USERAGENT,'MQQBrowser/26 Mozilla/5.0 (Linux; U; Android 2.3.7; zh-cn; MB200 Build/GRJ22; CyanogenMod-7) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1');
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data); 
//curl_setopt($ch, CURLOPT_TIMEOUT,40);
if($ss==1){
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false); 
}
if($cs==1){
curl_setopt($ch, CURLOPT_COOKIEJAR,$cookir);
}

	$result=curl_exec($ch);

preg_match_all('/Set-Cookie: XSRF-TOKEN=(.*);/iU',$result,$sur);

curl_close($ch);
return $sur;
} 
?>
