<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mlvkei extends CI_Model {

    /**
     * 获取管理员名称
     */
    public function getObj($id = 0) {
        $result = new stdClass();
        if ($id != 0) {
            $sql = 'select m.zhongwenming as zhongwenming, m.yingwenming as yingwenming,
               m.shifouertong as shifouertong from lvke as m where m.id = ?';
            $res = $this->db->query($sql, array($id));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    if (!empty($r->yingwenming)) {
                        $result->yingwenming = $r->yingwenming;
                    } else {
                        $result->yingwenming = '';
                    }
                    $result->zhongwenming = $r->zhongwenming;
                    $result->shifouertong = $r->shifouertong;
                }
            }
        }
        return $result;
    }
    
    /**
     * 保存或者更改
     */
    public function UpdateSave($yonghuid, $zhongwenming, $chushengriqi, $zhengjianhaoma, $zhengjianleixing, $shifouertong)
    {
        $myid = $this->Exist($yonghuid, $zhengjianleixing, $zhengjianhaoma);
        $obj = array('yonghuid' => $yonghuid,
		'zhongwenming' => $zhongwenming,
		'chushengriqi' => $chushengriqi,
		'zhengjianhaoma' => $zhengjianhaoma,
		'zhengjianleixing' => $zhengjianleixing,
		'shifouertong' => $shifouertong);
        if($myid > 0)
        {
            // 存在就修改
			$this->db->update('lvke', $obj, array('id' => $myid));
        }
        else
        {           
            // 不存在就添加
            $this->db->insert('lvke', $obj);
        }
    }
   
    /**
     * 判断是否存在
     */
    public function Exist($yonghuid, $zhengjianleixing, $zhengjianhaoma)
    {
            $sql = 'select m.id as id from lvke as m where m.yonghuid = ? and m.zhengjianleixing = ? and m.zhengjianhaoma = ?';
            $res = $this->db->query($sql, array($yonghuid, $zhengjianleixing, $zhengjianhaoma));
            if ($res->num_rows() > 0) {
                foreach ($res->result() as $r) {
                    if (!empty($r->id) && intval($r->id) > 0) {
                        return intval($r->id);
                    } 
                }
            }
            
            return 0;
    }
}
