<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 改签详情
 */
class mgaiqianxiangqing extends CI_Model {

    /**
     * 获取管理员名称
     */
    public function getObj($hangchengid, $gaiqiandingdanid) {

        $sql = 'select m.id as id, m.qifeishijian as qifeishijian,
                m.hangbanriqi as hangbanriqi, 
                m.didashijian as didashijian,
                m.hangbanhao as hangbanhao,
                m.chengrencangwei as chengrencangwei,
                m.chengrenshouxufei as chengrenshouxufei,
                m.chengrenshengcangfei as chengrenshengcangfei,
                m.ertongcangwei as ertongcangwei,
                m.ertongshouxufei as ertongshouxufei,
                m.ertongshengcangfei as ertongshengcangfei,
                m.beizhu as beizhu 
                from gaiqianxiangqing as m where m.hangchengid = ? and m.gaiqiandingdanid = ?';
        $res = $this->db->query($sql, array($hangchengid, $gaiqiandingdanid));
        return $res->result();
    }

}
