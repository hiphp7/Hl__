<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 计算某时间与当前时间相差分钟数
 *
 * @param mixed $t1 
 * @return mixed 
 *
 */
function DiffMinute($t1){
	if ($t1 =='') return 0;
	
	$t2=date("Y-m-d H:i:s");

	//将时间转换为时间戳
	$str1=strtotime($t1);
	$str2=strtotime($t2);

	$diff= $str2-$str1;
	return  round($diff/(60));	
}

/**
 * 获取客户端IP
 *
 * @return 
 *
 */
function getIP(){
	//$ip=$_SERVER["REMOTE_ADDR"];
	$ip=$_SERVER["HTTP_X_REAL_IP"];
	return $ip;
}

/**
 * 获取缓存
 *
 * @param mixed $name This is a description
 * @return mixed This is the return value description
 *
 */
function getCookIE($name){	
	$cookie = empty($_COOKIE[$name]) ? '' : $_COOKIE[$name];
	return $cookie;
}

/**
 * 根据生日计算年龄
 *
 * @param mixed $birthday 生日
 * @return mixed 
 *
 */
function CalcAge($birthday){
	$age = strtotime($birthday); 
	if($age === false){ 
		return false; 
	} 
	list($y1,$m1,$d1) = explode("-",date("Y-m-d",$age)); 
	$now = strtotime("now"); 
	list($y2,$m2,$d2) = explode("-",date("Y-m-d",$now)); 
	$age = $y2 - $y1; 
	
	if((int)($m2.$d2) < (int)($m1.$d1)) 
		$age -= 1; 
	return $age; 	
}

/**
 * xml转Json数据
 *
 * @param mixed $source This is a description
 * @return mixed This is the return value description
 *
 */
function xml_to_json($source) { 
	if(is_file($source)){ //传的是文件，还是xml的string的判断 
		$xml_array=simplexml_load_file($source); 
	}else{ 
		$xml_array=simplexml_load_string($source);  
	} 
	$json = json_encode($xml_array); //php5，以及以上，如果是更早版本，请查看JSON.php 
	
	$json = json_decode($json,true);
	
	return $json; 
} 

function xml_to_arr($source){
	$fields = xml_to_json($source);
	 
	$arr = array(array());
	foreach($fields as $field => $value){
		$value = my_preg_match_all($source,"<{$field}><\!\[CDATA\[(.*?)\]\]><\/{$field}");
		
		array_walk($arr,'addkey',array('key'=>$field, 'val'=>$value));
	}
	return $arr[0];
}

/**
 * 递归将多维数组的键名都改为大写或者小写
 *
 * @param mixed $array This is a description
 * @param mixed $case This is a description
 * @return mixed This is the return value description
 *
 */
function array_case(&$array, $case=CASE_LOWER) {
	$array = array_change_key_case($array, $case);
	foreach ($array as $key => $value) {
		if ( is_array($value) ) {
			array_case($array[$key], $case);
		}
	}
}

/**
 * 对数组添加元素
 *
 * @param mixed $val 元素值
 * @param mixed $key 元素名称
 * @param mixed $param 参数
 * @return mixed 
 *
 */
function addkey(&$val, $key, $param){
	$val[$param['key']] = $param['val'];
}

/** 
 * 发送post请求 
 * @param string $url 请求地址 
 * @param array $post_data post键值对数据 
 * @return string 
 */  
function send_post($data, $url) {  
	$postdata = http_build_query($data);  
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);    //上传属性
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_TIMEOUT,1);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;	
} 

/**
 * 异步任务
 *
 * @param mixed $date This is a description
 * @return mixed This is the return value description
 *
 */
function asyntask($data){

	//$url = $_SERVER["REMOTE_ADDR"].':'.$_SERVER["SERVER_PORT"].'/AliPay/notify_url.php';	
	$url = 'm.bibi321.com/service/asyntask.php';
	//$url ='http://expandaccount.ticp.net:8099/AliPay/notify_url.php';
	
	$postdata = http_build_query($data);  
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);    //上传属性
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_TIMEOUT,1);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;	
}

/**
 * 异步任务
 *
 * @param mixed $date This is a description
 * @return mixed This is the return value description
 *
 */
function posttask($data, $url){	
	$postdata = http_build_query($data);  
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);    //上传属性
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_TIMEOUT,1);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;	
}

/**
 * 阴阳历转换
 *
 * @param mixed $date This is a description
 * @return mixed This is the return value description
 *
 */
function dateConversion($date){
	$Year = date('Y',strtotime($date));
	$Month = date('m',strtotime($date)); 
	$Day = date('d',strtotime($date));	
	
	$lunar = new Lunar;
	$result = $lunar->convertSolarToLunar($Year,$Month,$Day);
	
	$festival = $lunar ->getFestival($date);
	
	if (!empty($festival)) $result[2] = $festival;
	
	return $result;	
}

/**
 * 字符串拼接
 *
 * @param mixed $arr 需要拼接的字符串数组
 * @return mixed 拼接后的字符串
 *
 */
function stringBuilder($data, $key, $conn){
	$str = "";
	foreach ($data as $item) { 
		$str = $str.$item[$key].$conn;
	}
	
	return str_replace("&^&","", rtrim($str,$conn));
}

/**
 * 字符串拼接
 *
 * @param mixed $arr 需要拼接的字符串数组
 * @return mixed 拼接后的字符串
 *
 */
function splitjoint($data, $conn){
	$str = "";
	foreach ($data as $key) { 
		$str = $str.$key.$conn;
	}
	
	return str_replace("&^&","", rtrim($str,$conn));
}

/**
 * json转字符串
 *
 * @param mixed $json This is a description
 * @param mixed $conn This is a description
 * @return mixed This is the return value description
 *
 */
function jsonToStr($json, $conn){
	$str = "";	
	while(list($key,$val)=each($json)) {		
		$str .= $key."=".$val.$conn;
	}
	return rtrim($str,$conn);		 
}

/**
 * 日期转星期
 *
 * @param mixed $dt This is a description
 * @return mixed This is the return value description
 *
 */
function dateToWeek($dt){
	$weekarray=array("日","一","二","三","四","五","六");	
	$week = date("w",strtotime($dt));
	return $weekarray[$week];	
}

/**
 * 获取起飞时间段Id{1:06:00-12:00;2:12:00-18:00;3:18:00-24:00;0:00:06:00}
 *
 * @param mixed $deptime This is a description
 * @return mixed This is the return value description
 *
 */
function getDepTimeId($deptime){
	if (strtotime($deptime) >= strtotime("00:00") && strtotime($deptime) < strtotime("06:00")){
		return 0;	
	}else 	if (strtotime($deptime) >= strtotime("06:00") && strtotime($deptime) < strtotime("12:00")){
		return 1;	
	}else 	if (strtotime($deptime) >= strtotime("12:00") && strtotime($deptime) < strtotime("18:00")){
		return 2;	
	}else 	if (strtotime($deptime) >= strtotime("18:00") && strtotime($deptime) < strtotime("23:59")){
		return 3;	
	}
}

/**
 * 计算两个日期相差多少天
 *
 * @param mixed $dt1 This is a description
 * @param mixed $dt2 This is a description
 * @return mixed 返回相差的天数
 *
 */
function CalcDays($dt1,$dt2){
	$d1 = strtotime($dt1);
	$d2 = strtotime($dt2);
	$diff = round(($d2-$d1)/3600/24);	
	return $diff;
}

/**
 * 计算两个日期相差多少分钟
 *
 * @param mixed $dt1 This is a description
 * @param mixed $dt2 This is a description
 * @return mixed 返回相差的分钟
 *
 */
function CalcMinute($dt1,$dt2){
	$d1 = strtotime($dt1);
	if (!$d1) $d1 = $dt1;
	
	$d2 = strtotime($dt2);
	if (!$d2) $d2 = $dt2;
	
	$diff = round(($d2-$d1)/60);
			
	return $diff;
}

/**
 * 计算两个日期相差多少秒
 *
 * @param mixed $dt1 This is a description
 * @param mixed $dt2 This is a description
 * @return mixed 返回相差的秒
 *
 */
function CalcSecond($dt1,$dt2){
	$d1 = strtotime($dt1);
	if (!$d1) $d1 = $dt1;
	
	$d2 = strtotime($dt2);
	if (!$d2) $d2 = $dt2;
	
	$diff = round($d2-$d1);
	
	return $diff;	
}

/**
 * 修正数组
 *
 * @return mixed This is the return value description
 *
 */
function array_revise($arr){
	$keys = array_keys($arr);
	$Count = count($arr[$keys[0]]);
	
	$newArrs = array();	
	for ($i=0; $i < $Count; $i++){
		$newArr = array(array());
		foreach ($arr as $key=>$value) { 
			array_walk($newArr,'addkey',array('key'=>$key, 'val'=>$value[$i]));
		}
		$newArrs[] = $newArr[0];
	}	
	return $newArrs;
}

/**
 * 删除数组指定的key元素
 *
 * @param mixed $data This is a description
 * @param mixed $$keyArr This is a description
 * @return mixed This is the return value description
 *
 */
function array_remove($data, $keyArr){  
	foreach ($keyArr as $key) { 
		if(array_key_exists($key, $data)){  
			$keys = array_keys($data);  
			$index = array_search($key, $keys);  
			if($index !== FALSE){  
				array_splice($data, $index, 1);  
			} 			
		}  
	}
	return $data;  	
}  

/**
 * 数组搜索
 *
 * @param mixed $arr This is a description
 * @param mixed $key This is a description
 * @param mixed $value This is a description
 * @return mixed This is the return value description
 *
 */
function my_array_search_single($arr, $key, $value){
	foreach ($arr as $age) { 
		if ($value == $age[$key]){
			return  $age;
		} 
	}
	
	return null;	
}

/**
 * 数组搜索
 *
 * @param mixed $arr This is a description
 * @param mixed $key This is a description
 * @param mixed $value This is a description
 * @return mixed This is the return value description
 *
 */
function my_array_search_multi($arr, $key, $value){
	$rstArr = array();
	foreach ($arr as $age) { 
		if ($value == $age[$key]){
			$rstArr[] = $age;
		} 
	}
	if (count($rstArr)){
		return $rstArr;	
	}
	
	return null;	
}

/**
 * 数组搜索
 *
 * @param mixed $arr This is a description
 * @param mixed $key This is a description
 * @param mixed $value This is a description
 * @return mixed This is the return value description
 *
 */
function my_array_search(){
	//返回输入的元素数目  
	$num=func_num_args();  
	//返回输入元素列表的数组形式  
	$arr=func_get_args();  
	
	if($num==4){  
		return my_array_search_multi($arr[0], $arr[1], $arr[2]);
	}else {  
		return my_array_search_single($arr[0],$arr[1], $arr[2]);    
	}  
}

/**
 * 获取缓存
 *
 * @param mixed $key This is a description
 * @return mixed This is the return value description
 *
 */
function my_memcache_get($key){
	try{	
		$memcache_obj = memcache_connect("120.25.229.44", 11211); 
		$value = $memcache_obj->get($key);
			
		return $value;	
	}catch(exception $e){
		logError("memcache_get", $e->getMessage()); 
	} 	
}

/**
 * 设置缓存
 *
 * @return mixed This is the return value description
 *
 */
function my_memcache_set(){
	//返回输入的元素数目  
	$num=func_num_args();  
	//返回输入元素列表的数组形式  
	$arr=func_get_args();  
	
	try{		
		$key = $arr[0];
		$value = $arr[1];
		$expire = ($num==3) ? $arr[2] : 0 ;
			
		$memcache_obj = memcache_connect("120.25.229.44", 11211); 
		$memcache_obj->set($key, $value, MEMCACHE_COMPRESSED, $expire); 
		
	}catch(exception $e){
		logError("memcache_set", $e->getMessage()); 
	}	 
}

/**
 * 删除缓存
 *
 * @param mixed $key This is a description
 * @return mixed This is the return value description
 *
 */
function my_memcache_del($key){
	try{	
		$memcache_obj = memcache_connect("120.25.229.44", 11211); 
		$memcache_obj->delete($key, 10);
					
	}catch(exception $e){
		logError("memcacheDel", $e->getMessage()); 
	} 	
}

/**
 * 月份增加
 *
 * @param mixed $date This is a description
 * @param mixed $interval This is a description
 * @return mixed This is the return value description
 *
 */
function monthadd($date,$interval){
	$date1 = strtotime ("+".$interval." month", $date) ;
	$date2 = strtotime ("-".$interval." month", $date1) ;
	
	if (date("Y-m-d",$date) != date("Y-m-d",$date2)){
		$dayCount = date('t',$date2);
		$date1= strtotime(date('Y-m-'.$dayCount, $date2));
	}
	return $date1;
}

/**
 * 将内容进行UNICODE编码，编码后的内容格式：\u56fe\u7247 （原始：图片）
 *
 * @param mixed $name This is a description
 * @return mixed This is the return value description
 *
 */ 
function unicode_encode($name)  
{  
	$name = iconv('UTF-8', 'UCS-2', $name);  
	$len = strlen($name);  
	$str = '';  
	for ($i = 0; $i < $len - 1; $i = $i + 2)  
	{  
		$c = $name[$i];  
		$c2 = $name[$i + 1];  
		if (ord($c) > 0)  
		{    // 两个字节的文字  
			$str .= '\u'.base_convert(ord($c), 10, 16).base_convert(ord($c2), 10, 16);  
		}  
		else  
		{  
			$str .= $c2;  
		}  
	}  
	return $str;  
}  

/**
 * 将UNICODE编码后的内容进行解码，编码后的内容格式：\u56fe\u7247 （原始：图片）
 *
 * @param mixed $name This is a description
 * @return mixed This is the return value description
 *
 */  
function unicode_decode($name)  
{  
	// 转换编码，将Unicode编码转换成可以浏览的utf-8编码  
	$pattern = '/([\w]+)|(\\\u([\w]{4}))/i';  
	preg_match_all($pattern, $name, $matches);  
	if (!empty($matches))  
	{  
		$name = '';  
		for ($j = 0; $j < count($matches[0]); $j++)  
		{  
			$str = $matches[0][$j];  
			if (strpos($str, '\\u') === 0)  
			{  
				$code = base_convert(substr($str, 2, 2), 16, 10);  
				$code2 = base_convert(substr($str, 4), 16, 10);  
				$c = chr($code).chr($code2);  
				$c = iconv('UCS-2', 'UTF-8', $c);  
				$name .= $c;  
			}  
			else  
			{  
				$name .= $str;  
			}  
		}  
	}  
	return $name;  
} 

/**
 * 编码转换
 *
 * @param mixed $data This is a description
 * @param mixed $to This is a description
 * @return mixed This is the return value description
 *
 */
function get_encoding($data,$to) {
	$encode_arr=array('UTF-8','ASCII','GBK','GB2312','BIG5','JIS', 'eucjp-win','sjis-win','EUC-JP'); 
	$encoded = mb_detect_encoding($data, $encode_arr);
	$data = mb_convert_encoding($data,$to,$encoded);
	return $data;
}

/**
 * 我的正则
 *
 * @param mixed $subject This is a description
 * @param mixed $pattern This is a description
 * @return mixed This is the return value description
 *
 */
function my_preg_match_all($subject,$pattern){
	try{
		$pattern = "/".$pattern."/";
		
		preg_match_all($pattern, $subject, $matches);
		if (count($matches)){
			return $matches[1][0];
		}		
		return "";		
	}catch(exception $e){
		return "";
	} 
}

function checkCharType($char){
	if(preg_match("/^[a-zA-Z]+$/",$char)){
		return 1;
	}
	else if(preg_match("/^[0-9]+$/",$char)){
		return 2;
	}else{
		return 3;
	}
	return 0;
}

/**
 * 获取密码强度
 *
 * @param mixed $pwd This is a description
 * @return mixed This is the return value description
 *
 */
function  getPadLevel($pwd){

	$PwdLength=  strlen($pwd);
	$k=1;
	
	if(checkCharType($pwd)==1||checkCharType($pwd)==2){
		return $k;
	}  else {
		$data=array();
		for($i=0;$i<$PwdLength;$i++){
			$value= substr($pwd, 0, $i+1);
			$key=  checkCharType($pwd[$i]);
			
			if(1==$k&&count($data)==1&&!isset($data[$key])){
				$k=2;
			}
			if(2==$k&&count($data)==2&&!isset($data[$key])){
				return 3;
			}
			$data[$key]=true;
			
		}
		
		return $k;
	}

}

/**
 * 模拟post进行url请求
 * @param string $url
 * @param array $post_data
 */
function request_post($url = '', $post_data = array()) {
    if (empty($url) || empty($post_data)) {
        return false;
    }
    
    $o = "";
    foreach ( $post_data as $k => $v ) 
    { 
        $o.= "$k=" . urlencode( $v ). "&" ;
    }
    $post_data = substr($o,0,-1);

    $postUrl = $url;
    $curlPost = $post_data;
    $ch = curl_init();//初始化curl
    curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
    curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
    $data = curl_exec($ch);//运行curl
    curl_close($ch);
    
    return $data;
}

/**
 * 模拟get进行url请求
 * @param string $url
 * @param array $get_data
 */
function request_get($url = '') {
    if (empty($url)) {
        return false;
    }
    
    $postUrl = $url;
    $ch = curl_init();//初始化curl
    curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
    curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
    $data = curl_exec($ch);//运行curl
    curl_close($ch);
    
    return $data;
}

/*
 * 判断是否是微信
 *
*/
function is_weixin()
{
	if(strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger') !== false) {
		return true;
	}
	return false;
}



































