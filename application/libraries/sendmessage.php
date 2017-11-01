<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class sendmessage{
	private $corpid="wxc27ddb489017a49a";
	private $corpsecret="LmhfwRFsjur3ClPy4MYYRD4xpQi0Ejz6Oif1M3zwSakTsOItv6ujPkfNwBcvAQFp";
	
	public function send($userid,$msg){
		$corpid="wxc27ddb489017a49a";
		$corpsecret="LmhfwRFsjur3ClPy4MYYRD4xpQi0Ejz6Oif1M3zwSakTsOItv6ujPkfNwBcvAQFp";
	    //获取access_token
		$Url="https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$corpid&corpsecret=$corpsecret";
		$res = $this->curl_post($Url);
		$ACCESS_TOKEN=json_decode($res)->access_token;
		//发送消息接口
		$Url="https://qyapi.weixin.qq.com/cgi-bin/message/send?access_token=$ACCESS_TOKEN";
		$data="{\"touser\":\"$userid \",\"msgtype\":\"text\",\"agentid\":9,\"text\":{\"content\":\"$msg\"},\"safe\":0}";
		$res = $this->curl_post($Url,$data);
        $errmsg=json_decode($res)->errmsg;
        if($errmsg==="ok"){
	       return "发送成功！";
        }else{
	       return "发送失败，".$errmsg;
        }
	}
	function curl_post($url,$data=""){
	    $ch = curl_init();
	    $opt = array(
				CURLOPT_URL     => $url,            
	            CURLOPT_HEADER  => 0,
				CURLOPT_POST    => 1,
	            CURLOPT_POSTFIELDS      => $data,
	            CURLOPT_RETURNTRANSFER  => 1,
	            CURLOPT_TIMEOUT         => 20
	    );
	    $ssl = substr($url,0,8) == "https://" ? TRUE : FALSE;
	    if ($ssl){
	        $opt[CURLOPT_SSL_VERIFYHOST] = 2;
	        $opt[CURLOPT_SSL_VERIFYPEER] = FALSE;
	    }
	    curl_setopt_array($ch,$opt);
	    $data = curl_exec($ch);
	    curl_close($ch);
	    return $data;
	}
}

?>