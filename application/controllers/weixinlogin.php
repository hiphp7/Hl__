<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class weixinlogin extends CI_Controller {

    public $appId;
    public $appSecret;
    public $access_token;
    public $openid;

    public function __construct() {
        parent::__construct();

        $this->load->helper('url');
        // 审核通过的移动应用所给的AppID和AppSecret
        $this->appId = 'wx4a86de4887a21961';
        $this->appSecret = '5048db5b1a1d2ad835316e46b39e6274';

        if (empty($_GET['code'])) {
            $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"]; //这是要回调地址可以有别的写法
            redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $this->appId . '&redirect_uri=' . $url . '&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect');
        } else {
            //回调成功,获取code,再做请求,获取openid
            $j_access_token = $this->http_request('https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $this->appId . '&secret=' . $this->appSecret . '&code=' . $_GET['code'] . '&grant_type=authorization_code');
            $a_access_token = json_decode($j_access_token, true);
            //虽然这里 也获取了一个access_token,但是和获取用户详情,还有发送模板信息所使用的access_token不同
            $this->access_token = $a_access_token["access_token"];
            $this->openid = $a_access_token["openid"];
        }
    }

    /**
     * 微信登录
     */
    public function index() {
        // 如果微信登录
        //$ps = $this->input->get('ps');
		$sf = $this->uri->segment(3);
	
        //$shangyig_url = $this->input->get('url');
		$shangyig_url = $this->uri->segment(4);
		if (strpos($shangyig_url, '.')){
			$shangyig_url[3] = '/';
		}	
		//parse_str($_SERVER['QUERY_STRING'], $_GET);

        $data = array();
        if (!empty($this->access_token)) {
            $data['access_token'] = $this->access_token;
        }
        if (!empty($this->openid)) {
            $data['openid'] = $this->openid;
        }

        $url = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $this->access_token . '&openid=' . $this->openid;
        $user = json_decode($this->http_request($url));
        //var_dump($user);
        // 获取微信用户的名字
        if (!empty($user) && !empty($user->openid) && !empty($user->nickname)) {
            $nickname = $user->nickname;
            $sex = $user->sex;
            $language = $user->language;
            $headimgurl = $user->headimgurl;
            $city = $user->city;
            $province = $user->province;

            //echo $nickname.' '.$sex.' '.$language.' '.$province.' '.$city.' '.$headimgurl;
			$sql = 'select m.id as id,m.OpenidWX as OpenidWX from yonghu as m where m.OpenidWX = ?';
			$res = $this->db->query($sql, array($user->openid));
			$row = $res->first_row();
			if(!empty($row)){
				$id = $row->id;
			}else{
				// 添加到数据库
				$this->db->insert('yonghu', array('zhuceriqi' => date("Y-m-d H:i:s"),'OpenidWX' => $user->openid));
				// 返回刚刚插入用户表的 Id
				$id = $this->db->insert_id();
			}
            
            //redirect('/h5/index?usid='.$id);
            // 跳转到原来页面，并且把原来的参数赋值进去
            //redirect('http://m.bibi321.com/hl/index.php#/'.$shangyig_url.'?ps='.$ps.'&userid='.$id);
			//redirect('http://m.bibi321.com/hl/index.php/h5/index/'.$ps.'/'.$id.'#/'.$shangyig_url);
			$this->input->set_cookie("ps",$ps,60); 
			$this->input->set_cookie("userid",$id,60); 
			if($sf != 'none' ){
				redirect('http://m.bibi321.com/hl/index.php/h5/index/'.$sf.'#/'.$shangyig_url);
			} else {
				redirect('http://m.bibi321.com/hl/index.php/h5/index#/'.$shangyig_url);
			}

        }
    }

    function http_request($url, $timeout = 30, $header = array()) {
        if (!function_exists('curl_init')) {
            throw new Exception('server not install curl');
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        if (!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        $data = curl_exec($ch);
        list($header, $data) = explode("\r\n\r\n", $data);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code == 301 || $http_code == 302) {
            $matches = array();
            preg_match('/Location:(.*?)\n/', $header, $matches);
            $url = trim(array_pop($matches));
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $data = curl_exec($ch);
        }

        if ($data == false) {
            curl_close($ch);
        }
        @curl_close($ch);
        return $data;
    }

    /*
     * 功能：php完美实现下载远程图片保存到本地
     * 参数：文件url,保存文件目录,保存文件名称，使用的下载方式
     * 当保存文件名称为空时则使用远程文件原来的名称
     */

    function getImage($url, $save_dir = '', $filename = '', $type = 0) {
        if (trim($url) == '') {
            return array('file_name' => '', 'save_path' => '', 'error' => 1);
        }
        if (trim($save_dir) == '') {
            $save_dir = './';
        }
        if (trim($filename) == '') {//保存文件名
            $ext = strrchr($url, '.');
            if ($ext != '.gif' && $ext != '.jpg') {
                return array('file_name' => '', 'save_path' => '', 'error' => 3);
            }
            $filename = time() . $ext;
        }
        if (0 !== strrpos($save_dir, '/')) {
            $save_dir.='/';
        }
        //创建保存目录
        if (!file_exists($save_dir) && !mkdir($save_dir, 0777, true)) {
            return array('file_name' => '', 'save_path' => '', 'error' => 5);
        }
        //获取远程文件所采用的方法 
        if ($type) {
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $img = curl_exec($ch);
            curl_close($ch);
        } else {
            ob_start();
            readfile($url);
            $img = ob_get_contents();
            ob_end_clean();
        }
        //$size=strlen($img);
        //文件大小 
        $fp2 = @fopen($save_dir . $filename, 'a');
        fwrite($fp2, $img);
        fclose($fp2);
        unset($img, $url);
        return array('file_name' => $filename, 'save_path' => $save_dir . $filename, 'error' => 0);
    }

}
