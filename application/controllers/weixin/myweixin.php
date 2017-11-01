<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 微信三方登录
 */
class myweixin extends CI_Controller {

      public function __construct(){
            parent::__construct();

        }
        
	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        /**
         * 确保当前用户是在微信中打开，并且获取用户信息
         *
         * @param string $url 获取到微信授权临时票据（code）回调页面的URL
         */
        private function getWxUserInfo($url = '') {
            
        }
}
