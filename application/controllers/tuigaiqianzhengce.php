<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tuigaiqianzhengce extends CI_Controller {

	public function update()
	{
	    $this->load->model("zhengce/mtuigaiqianzhengce", "mtuigaiqianzhengce");
            $this->mtuigaiqianzhengce->update();
	}
        
}
