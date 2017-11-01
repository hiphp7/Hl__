<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 微信登录
 */
class mweixin extends CI_Model {

    public $appId;
    public $appSecret;
    public $token;

    public function __construct() {
        parent::__construct();

        //审核通过的移动应用所给的AppID和AppSecret
        $this->appId = 'wx0000000000000000';
        $this->appSecret = '00000000000000000000000000000';
        $this->token = '00000000';
    }

    /**
     * 获取微信授权url
     * @param string 授权后跳转的URL
     * @param bool 是否只获取openid，true时，不会弹出授权页面，但只能获取用户的openid，而false时，弹出授权页面，可以通过openid获取用户信息
     *   
     */
    public function getOAuthUrl($redirectUrl, $openIdOnly, $state = '') {
        $redirectUrl = urlencode($redirectUrl);
        $scope = $openIdOnly ? 'snsapi_base' : 'snsapi_userinfo';
        $oAuthUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->appId}&redirect_uri={$redirectUrl}&response_type=code&scope=$scope&state=$state#wechat_redirect";
        return $oAuthUrl;
    }

    /**
     * 获取access_token
     */
    public function getoAuthAccessToken($code) {
        return json_decode(file_get_contents('https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $this->AppId . '&secret=' . $this->AppSecret . '&code={$authCode}&grant_type=authorization_code', true));
    }

    /**
     * 获取用户信息  
     */
    public function getUserInfo($openId, $accessToken) {
        $url = 'https://api.weixin.qq.com/sns/userinfo';
        //获取用户微信账号信息
        $userInfo = $this->callApi("$url?access_token=$accessToken&openid=$openId&lang=zh-CN");

        if ($userInfo['errcode']) {
            return array('msg' => '获取用户信息失败，请联系客服', $userInfo);
        }

        $userInfo['wx_id'] = $openId;

        return $userInfo;
    }

    /**
     * 发起Api请求，并获取返回结果
     * @param string 请求URL
     * @param mixed 请求参数 (array|string)
     * @param string 请求类型 (GET|POST)
     * @return array        
     */
    public function callApi($apiUrl, $param = array(), $method = 'GET') {
        $result = curl_request_json($error, $apiUrl, $params, $method);
        //假如返回的数组有错误码,或者变量$error也有值
        if (!empty($result['errcode'])) {
            $errorCode = $result['errcode'];
            $errorMsg = $result['errmsg'];
        } else if ($error != false) {
            $errorCode = $error['errorCode'];
            $errorMsg = $error['errorMessage'];
        }

        if (isset($errorCode)) {
            //将其插入日志文件
            file_put_contents("/data/error.log", "callApi:url=$apiUrl,error=[$errorCode]$errorMsg");

            if ($errorCode === 40001) {
                //尝试更正access_token后重试
                try {
                    $pos = strpos(strtolower($url), 'access_token=');
                    if ($pos !== false) {
                        $pos += strlen('access_token=');
                        $pos2 = strpos($apiUrl, '&', $pos);
                        $accessTokened = substr($apiUrl, $pos, $pos2 === false ? null : ($pos2 - $pos));
                        return $this->callApi(str_replace($accessTokened, $this->_getApiToken(true), $apiUrl), $param, $method);
                    }
                } catch (WeixinException $e) {
                    
                }
            }
            //这里抛出异常，具有的就不详说了
            throw new WeixinException($errorMessage, $errorCode);
        }
        return $result;
    }


}
