<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 测试 阿里大鱼发短信
 */
class alidayu extends CI_Controller {

    public function index() {
       $this->load->library('myalidayu');
       $this->myalidayu->Send();
    }
    
    public function YanZhengMa()
    {
        $this->load->library('myalidayu');
        $result = $this->myalidayu->YanZhengMa('888888', '高先生', '13273890941');
        echo $result;
    }
    
    public function ChuPiaoTongZhi()
    {
        $this->load->library('myalidayu');
        $this->myalidayu->ChuPiaoTongZhi('13541167940', '吴大富', '2016-12-12', '深圳', '成都', '东方航空公司', '123456');
    }
    
    public function TouBaoChengGong2()
    {
        $this->load->library('myalidayu');
        $result = $this->myalidayu->TouBaoChengGong2('13541167940', '吴大富', '2016-12-12', '深圳', '成都', '东方航空公司', '123456', '保险', '保单号', '400-991-7909');
        if($result)
        {
            echo '保单投保成功！';
        }
        else
        {
            echo '保单投保失败！';
        }
    }
    
}
