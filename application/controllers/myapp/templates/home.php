<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{
            $this->load->view('h5/templates/home/index');
	}
	public function guodu()
	{
            $this->load->view('h5/templates/home/guodu');
	}
        
        public function place()
	{
            $this->load->view('h5/templates/home/place');
	}
        
        /**
         * 订单
         */
        public function order()
	{
            $this->load->view('h5/templates/home/order');
	}
	//支付
        public function wxpay() {
            $this->load->view('h5/templates/home/wxpay');
        }
        
        public function detail()
	{
            $this->load->view('h5/templates/home/detail');
	}
        
        public function jipiao()
	{
            $this->load->view('h5/templates/home/jipiao');
	}
        
        public function mydate()
	{
            $this->load->view('h5/templates/home/mydate');
	}
        
}
