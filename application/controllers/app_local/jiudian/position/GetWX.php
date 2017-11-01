<?php
    include "Cache.php";
    define($APPID, "wxc27ddb489017a49a");
    define($SECRET, "nZkUHupnnI7ad0bSkuUnjzW1TeJrLPm-8z9_kUUKjj9TdITOtOuobEe5k757Bmsr");
    if($_GET['Type'] == "access_token"){
//      echo getAccess_token();
    }
    else if($_GET['Type'] == "jsapi_ticket"){
//      echo getJsapi_ticket();
    }
    else if($_GET['Type'] == "config"){
        $jsapi_ticket = getJsapi_ticket();
        $nonceStr = "x".rand(10000,100000)."x";    //随机字符串
        $timestamp = time();   //时间戳
        $url = $_GET['url'];
        $signature = getSignature($jsapi_ticket,$nonceStr, $timestamp, $url);

        $result = array("jsapi_ticket"=>$jsapi_ticket, "nonceStr"=>$nonceStr,"timestamp"=>$timestamp,"url"=>$url,"signature"=>$signature);
        echo json_encode($result);
    }

    function getSignature($jsapi_ticket,$noncestr, $timestamp, $url){
        $string1 = "jsapi_ticket=".$jsapi_ticket."&noncestr=".$noncestr."&timestamp=".$timestamp."&url=".$url;
        $sha1 = sha1($string1);
        return $sha1;
    }

    function getJsapi_ticket(){
        $cache = new Cache();
        $cache = new Cache(7000, 'cache/');    //需要创建cache文件夹存储缓存文件。
        //从缓存从读取键值 $key 的数据
        $jsapi_ticket = $cache -> get("jsapi_ticket");
        $access_token = getAccess_token();
        //如果没有缓存数据
        if ($jsapi_ticket == false) {
            $access_token = getAccess_token();
            $url = 'https://qyapi.weixin.qq.com/cgi-bin/ticket/getticket'; 
            $data = array('type'=>'jsapi','access_token'=>$access_token); 
            $header = array(); 
            $response = json_decode(curl_https($url, $data, $header, 5)); 
            $jsapi_ticket = $response->ticket;
            //写入键值 $key 的数据
            $cache -> put("jsapi_ticket", $jsapi_ticket);
        }
        return $jsapi_ticket;
    }

    function getAccess_token(){
        $cache = new Cache();
        $cache = new Cache(7000, 'cache/');
        //从缓存从读取键值 $key 的数据
        $access_token = $cache -> get("access_token");

        //如果没有缓存数据
        if ($access_token == false) {
            $url = 'https://qyapi.weixin.qq.com/cgi-bin/token'; 
            $data = array('grant_type'=>'client_credential','corpid'=>$APPID,'corpsecret'=>$SECRET); 
            $header = array(); 

            $response = json_decode(curl_https($url, $data, $header, 5)); 
            $access_token = $response->access_token;
            //写入键值 $key 的数据
            $cache -> put("access_token", $access_token);
        }
        return $access_token;
    }

    /** curl 获取 https 请求 
    * @param String $url 请求的url 
    * @param Array $data 要發送的數據 
    * @param Array $header 请求时发送的header 
    * @param int $timeout 超时时间，默认30s 
    */ 
    function curl_https($url, $data=array(), $header=array(), $timeout=30){ 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
        curl_setopt($ch, CURLOPT_POST, true); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); 

        $response = curl_exec($ch); 

        if($error=curl_error($ch)){ 
        die($error); 
        } 

        curl_close($ch); 

        return $response; 

    } 
?>