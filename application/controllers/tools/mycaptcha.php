<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * 工具类 验证码
 */
class mycaptcha extends CI_Controller {

	/*
         * 生成验证码
	 */
	public function code($d = 0) {
        $config = array(
            'width' => 80,
            'height' => 25,
            'codeLen' => 4,
            'fontSize' => 16
        );
        $this->load->library('code', $config);

        $this->code->show();
    }
}
