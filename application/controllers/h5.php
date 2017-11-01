<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 三方接入的入口是
 * http://112.74.171.99/hl/index.php/h5/index/$sf
 */
class h5 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('tools');
        /*
         * 判断是否是微信登录，如果是微信登录，则默认的支付方式为微信支付
         */ 
        if(is_weixin() == true)
        {
            // 加载微信支付类
            $this->load->library('CI_Wechat'); 
        }
    }
    
    /**
     * H5 的首页
     * 
     * http://www.cnblogs.com/lxsweat/p/4290593.html
     * https://mp.weixin.qq.com/paymch/readtemplate?t=mp/business/course3_tmpl&lang=zh_CN%816%A49
     * http://www.cnblogs.com/txw1958/p/wxpayv3-jsapi.html
     * http://blog.csdn.net/u013723348/article/details/44852069
     * http://blog.sina.com.cn/s/blog_14955e3b70102wvmj.html
     */
    public function index($sf = '') {
        $this->load->library('Lunar');
		
		//$ps = $this->input->get('ps');
		//$ps = $this->uri->segment(3);
		$this->load->helper('cookie');
		$ps = get_cookie('ps');
		
		if(!empty($ps) || $ps != 'none')
		{
			$data['ps'] = $ps;
			delete_cookie("ps");  
		}else{
                    $data['ps'] = '';
                }
		//$userid = $this->input->get('userid');
		$userid = get_cookie('userid');
	
		if(!empty($userid))
		{
			$data['userid'] = $userid;
			delete_cookie("userid");  
		}else{
                    $data['userid'] = '';
                }
		
        // 时间
        $data['time'] = $this->lunar->getDateList();
        // 三方企业的加密字符串
        // $sf = 1;
        $data['sf'] = $sf;

        $this->load->view('h5/index', $data);
        //$this->load->view('h5/jiudian/index', $data);
    }
    public function getDate()
    {
        $this->load->library('Lunar');
        $data['time'] = $this->lunar->getDateList();
        //var_dump($data);
        $callback = $this->input->get('callback');
        //echo $callback."({'date' : '".$data['time']."'})";
        echo $callback."('".$data['time']."')";
    }
    public function mytest() {
        $name = $this->input->post('name');
        $ps = $this->input->post('ps');

        echo $name . ' 和 ' . $ps;
    }

}
