<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// 占座指令
class zanzuo extends CI_Controller {

    public function index()
    {
        $lvke = array();
        $l = new stdClass();
        $l->zhongwenming = '吴大富';
        $l->zhengjianhaoma = '123456';
        
        $lvke[] = $l;
        
        $l1 = new stdClass();
        $l1->zhongwenming = '吴大贵';
        $l1->zhengjianhaoma = '654321';
        
        $lvke[] = $l1;
        $result = $this->zz('hl12345', '阿勒泰机场', '巴马机场', '2016-6-5', 'K', $lvke, '13541167940');
        echo $result;
    }

    /**
     * $hangbanhao 航班号
     * $qifeijichang 起飞机场
     * $daodajichang 到达机场
     * $seatCode 仓位
     * $lvke 旅客列表
     * $lianxidianhua 联系电话 
     */
    public function zz($hangbanhao, $qifeijichang, $daodajichang, $qifeishijian, $seatCode, $lvke,
            $lianxidianhua) {

        $date = strtotime($qifeishijian);
        $airport = $this->config->item("airport_short");
        $zhangzuo = 'SS:' . $hangbanhao . ' ' . $seatCode . ' ' . date('d', $date) . date('M', $date) . ' ' .
                strval(array_search($qifeijichang, $airport)) . strval(array_search($daodajichang, $airport)) .
                ' '.strval(count($lvke));
        $zhangzuo .= 'NM ';
        // 扫描旅客
        $index = 1;
        foreach ($lvke as $v) {
            if ($index == count($lvke)) {
                $zhangzuo .= $index . $v->zhongwenming;
            } else {
                $zhangzuo .= $index . $v->zhongwenming . ' ';
            }
            $index++;
        }
        
        $index = 1;
        foreach ($lvke as $v) {
            $zhangzuo .= 'SSR FOID '.substr($hangbanhao, 0, 2).' HK/NI'.$v->zhengjianhaoma.'/p'.$index;
            $index++;
        }
        $zhangzuo .= 'OSI '.substr($hangbanhao, 0, 2).' CTCT '.$lianxidianhua;
        return $zhangzuo;
    }

}

