<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * ���ڻ�Ʊ  --  ��ǩ��Ʊ����
 */
class gaiqianchupiao extends CI_Controller {

    private $li;

    function __construct() {
        parent::__construct();

        // �����б���ʾ����
        $std1 = new stdClass();
        $std1->index = 0;
        $std1->display_name = '������';
        $std1->name = 'dingdanhao';
        $std1->show = true;
        $li[0] = $std1;

        $std2 = new stdClass();
        $std2->index = 1;
        $std2->display_name = '�������';
        $std2->name = 'wangfan';
        $std2->show = true;
        $li[1] = $std2;

        $std3 = new stdClass();
        $std3->index = 2;
        $std3->display_name = '��Ʊ����';
        $std3->name = 'chupiaobianma';
        $std3->show = true;
        $li[2] = $std3;

        $std4 = new stdClass();
        $std4->index = 3;
        $std4->display_name = '����ʱ��/�����/��λ(����,��ͯ)';
        $std4->name = 'hb';
        $std4->show = true;
        $li[3] = $std4;

        $std5 = new stdClass();
        $std5->index = 4;
        $std5->display_name = '���/����';
        $std5->name = 'qifei_daoda';
        $std5->show = true;
        $li[4] = $std5;

        $std6 = new stdClass();
        $std6->index = 5;
        $std6->display_name = '����״̬';
        $std6->name = 'dingdanzhuangtai';
        $std6->show = true;
        $li[5] = $std6;

        $std7 = new stdClass();
        $std7->index = 6;
        $std7->display_name = '�ܼ�/�˿���(����/��ͯ)';
        $std7->name = 'zongjia_sks';
        $std7->show = true;
        $li[6] = $std7;

        $std8 = new stdClass();
        $std8->index = 7;
        $std8->display_name = '������/����ʱ��';
        $std8->name = 'suodan';
        $std8->show = true;
        $li[7] = $std8;

        $this->li = $li;
    }

    public function index($hangchengid = '') {
        $data['li'] = $this->li;

        if ($hangchengid != '') {
            $this->load->library('mysimpleencrypt');
            $hangchengid = $this->mysimpleencrypt->de($hangchengid);
            $admin_session = $this->session->userdata('admin');
            
            $obj = array('suodan' => true, 'suodanid' => $admin_session ['id'], 'suodanshijian' => date("Y-m-d H:i:s"));
            $this->db->update('dingdan', $obj, array('id' => $hangchengid));
        }
        $this->load->view('admin/guoneijipiao/gaiqianchupiao/index', $data);
    }

    /**
     * ��ʾȫ������
     */
    public function all() {

        $admin_session = $this->session->userdata('admin');
        $mydata = array();
        $mycount = 0;
        $this->load->library('mysimpleencrypt');
        // ���ع���Ա
        $this->load->model("guanli/mguanliyuan", "mguanliyuan");
        // ��������
        $this->load->model("dingdan/msoudan", "msoudan");
        $this->load->model("dingdan/mgaiqian", "mgaiqian");
        $sql_ps = $this->mgaiqian->getIdByPs();
        
        if(!empty($sql_ps) && $sql_ps != '')
        {
        $myconfig = $this->config->item("����״̬");

        $start = $this->security->xss_clean($this->input->post('start'));
        $length = $this->security->xss_clean($this->input->post('length'));
        $sortid = $_POST['order'][0]['column'];
        $dir = $_POST['order'][0]['dir'];

        // ��Ʊ����
        $chupiaobianma = $this->input->post('chupiaobianma');
        // �������
        $dingdanhao = $this->input->post('dingdanhao');
        // �˿�����
        $zhongwenming = $this->input->post('zhongwenming');
        // ��������
        $wangfanhangcheng = $this->input->post('wangfanhangcheng');
        // ֧����ʽ
        $zhifufangshi = $this->input->post('zhifufangshi');
        // ����״̬
        $dingdanzhuangtai = $this->input->post('dingdanzhuangtai');
        // ����ʱ�� ��ʼ
        $fukuanshijian_begin = $this->input->post('fukuanshijian_begin');
        // ����ʱ�� ����
        $fukuanshijian_end = $this->input->post('fukuanshijian_end');

        $mysort = 'id';
        $mydir = 'desc';
        if (!empty($this->li[$sortid]) && !empty($this->li[$sortid]->name) && 'dingdanhao' == $this->li[$sortid]->name) {
            $mysort = $this->li[$sortid]->name;
            $mydir = $dir;
        }

        $sql = 'select m.id as id, h.id as hid, m.dingdanhao as dingdanhao,m.chupiaobianma as chupiaobianma,
            h.wangfanhangcheng as wangfan,
            h.qifeijichang as qifeijichang,
            h.daodajichang as daodajichang,
            h.hangbanhao as hangbanhao,
            h.cangwei as cangwei,
            h.qifeishijian as qifeishijian,
            m.dingdanzonge as dingdanzonge, m.dingdanzhuangtai as dingdanzhuangtai,
            m.chulishijian as chulishijian 
            from dingdan as m, hangcheng as h ';

        $sqlcount = 'select count(h.id) as id from dingdan as m, hangcheng as h ';

        $ps = array();
        // �˿����� and m.chupiaozhuangtai = 6 ��ǩ״̬ Ϊ 6 ��ʾ�û������ǩ��ͬʱ��ǩ�Ѿ�ͨ�������
        if (!empty($zhongwenming) && $zhongwenming != '') {
            $sql = $sql . ', hangchenglvke as lk where m.id = h.dingdanid and m.chupiaozhuangtai = 6 and m.id in '.$sql_ps.' and lk.dingdanid = m.id and lk.zhongwenming = ? ';
            $sqlcount = $sqlcount . ', hangchenglvke as lk where m.id = h.dingdanid and m.chupiaozhuangtai = 6 and m.id in '.$sql_ps.' and lk.dingdanid = m.id and lk.zhongwenming = ? ';
            $ps[] = $zhongwenming;
        } else {
            $sql = $sql . 'where m.id = h.dingdanid and m.chupiaozhuangtai = 6 and m.id in '.$sql_ps.' ';
            $sqlcount = $sqlcount . 'where m.id = h.dingdanid and m.chupiaozhuangtai = 6 and m.id in '.$sql_ps.' ';
        }

        // ��Ʊ����
        if (!empty($chupiaobianma) && $chupiaobianma != '') {
            $sql = $sql . 'and m.chupiaobianma = ? ';
            $sqlcount = $sqlcount . 'and m.chupiaobianma = ? ';
            $ps[] = $chupiaobianma;
        }

        // �������
        if (!empty($dingdanhao) && $dingdanhao != '') {
            $sql = $sql . 'and m.dingdanhao = ? ';
            $sqlcount = $sqlcount . 'and m.dingdanhao = ? ';
            $ps[] = $dingdanhao;
        }

        // ��������
        if (!empty($wangfanhangcheng) && $wangfanhangcheng != '' && $wangfanhangcheng != 'ȫ��') {
            $sql = $sql . 'and h.wangfanhangcheng = ? ';
            $sqlcount = $sqlcount . 'and h.wangfanhangcheng = ? ';
            $ps[] = $wangfanhangcheng;
        }

        // ֧����ʽ
        if (!empty($zhifufangshi) && $zhifufangshi != '' && $zhifufangshi != 'ȫ��') {
            $sql = $sql . 'and m.zhifufangshi = ? ';
            $sqlcount = $sqlcount . 'and m.zhifufangshi = ? ';
            $ps[] = $zhifufangshi;
        }

        // ����״̬
        if (!empty($dingdanzhuangtai) && $dingdanzhuangtai != '' && $dingdanzhuangtai != 'ȫ��') {
            $sql = $sql . 'and m.dingdanzhuangtai = ? ';
            $sqlcount = $sqlcount . 'and m.dingdanzhuangtai = ? ';
            $ps[] = $dingdanzhuangtai;
        }

        // ����ʱ��
        if (!empty($fukuanshijian_begin) && $fukuanshijian_begin != '' && !empty($fukuanshijian_end) && $fukuanshijian_end != '') {
            $sql = $sql . 'and m.fukuanshijian between ? and ? ';
            $sqlcount = $sqlcount . 'and m.fukuanshijian between ? and ? ';
            $ps[] = $fukuanshijian_begin;
            $ps[] = $fukuanshijian_end;
        }

        // �����
        $sql = $sql . 'order by m.' . $mysort . ' ' . $mydir . ' limit ' . $start . ', ' . $length;

        $sql = str_replace("where order", "order", $sql);
        $sql = str_replace("where and", "where", $sql);

        $sqlcount = str_replace("where order", "order", $sqlcount);
        $sqlcount = str_replace("where and", "where", $sqlcount);
        $newstr = substr(trim($sqlcount), 0, strlen(trim($sqlcount)) - 5);
        if (substr(trim($sqlcount), -5) == 'where') {
            $sqlcount = $newstr;
        }

        $res = $this->db->query($sql, $ps);
        $res_count = $this->db->query($sqlcount, $ps);

        $row = $res_count->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }

        if ($res->num_rows() > 0) {
            foreach ($res->result() as $r) {
                $obj = new stdClass();
                // id �򵥼���һ��
                $obj->id = $this->mysimpleencrypt->en($r->id);
                $obj->hid = $this->mysimpleencrypt->en($r->hid);
                $obj->dingdanhao = $r->dingdanhao;

                if ($r->wangfan == false) {
                    $obj->wangfan = '����';
                } else {
                    $obj->wangfan = '����';
                }
                // ����ʱ��/�����/��λ�����ˣ���ͯ��
                $obj->hb = $r->qifeishijian . ' ' . $r->hangbanhao . ' ' . $r->cangwei;
                // ��Ʊ����
                $obj->chupiaobianma = $r->chupiaobianma;
                // �������
                $obj->daodajichang = $r->daodajichang;
                // ��� ����
                $obj->qifei_daoda = $r->qifeijichang . '/' . $r->daodajichang;
                // �ܼ�/�˿���������/��ͯ��
                $obj->zongjia_sks = $r->dingdanzonge . '/' . $this->getPersonNum($r->id, 0) . '��' . $this->getPersonNum($r->id, 1) . '��';
                // ������/����ʱ��
                if($r->suodan == true)
                {
                     $obj->suodan = $this->mguanliyuan->getName($r->suodanid) . '/' . $r->suodanshijian;
                }
                else
                {
                    $obj->suodan = '';
                }
                
                if($r->suodanid == $admin_session['id'])
                {
                    $obj->suodan_self = '1';
                }
                else
                {
                    $obj->suodan_self = '0';
                }
                // ����״̬
                $obj->dingdanzhuangtai = $myconfig[$r->dingdanzhuangtai];
                $obj->dingdanzhuangtai_int = $r->dingdanzhuangtai;
                
                $mydata[] = $obj;
            }
        }
        }
        $result = new stdClass();
        $result->myData = $mydata;
        $result->iTotalDisplayRecords = $mycount;
        $result->iTotalRecords = $mycount;

        echo json_encode($result);
    }

    /**
     * ��ȡ�������ÿ�����
     * $id Ϊ���� id
     * $ertong �Ƿ��ͯ��Ĭ��Ϊ false
     */
    public function getPersonNum($id, $ertong) {
      
        $sql = 'select count(m.id) as id from hangchenglvke as m where m.dingdanid = ? and m.shifouertong = ?';
        $res = $this->db->query($sql, array($id, $ertong));
        $mycount = 0;
        $row = $res->first_row();
        if (!empty($row)) {
            $mycount = $row->id;
        }
        return $mycount;
    }

    /**
     * ����  
     * $en_id ���� id
     */
    public function xiangqing($en_id = '') {

        $this->load->library('mysimpleencrypt');
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $data['li'] = $this->li;

        $id = $this->mysimpleencrypt->de($en_id);
        $mydingdanid = $this->mhangcheng->getDingDanId($id);
        $obj = $this->mdingdan->getMyObj($mydingdanid);
        $data['obj'] = $obj;

        // ��ȡ����
        $hangcheng = $this->mhangcheng->getHangCheng($obj->id);

        if (!empty($hangcheng)) {
            $data['hangcheng'] = $hangcheng;
            if (count($hangcheng) > 0) {
                // ��ȡ�����ÿ�
                $hangchenglvke = $this->mhangchenglvke->getHangChengLvKe($hangcheng[0]->id);
                if (!empty($hangchenglvke)) {
                    $data['hangchenglvke'] = $hangchenglvke;
                }

                $hangchenglvke_tongji = $this->mhangchenglvke->tongji_hangcheng($hangcheng[0]->id, $mydingdanid);
                if (!empty($hangchenglvke_tongji)) {
                    $data['hangchenglvke_tongji'] = $hangchenglvke_tongji;
                }
                
                // ȼ��˰
                $ranyoushui = $hangcheng[0]->ranyoushui;
                $data['ranyoushui'] = $ranyoushui;
            }
        }
        $this->load->view('admin/guoneijipiao/gaiqianchupiao/xiangqing', $data);
    }

    /**
     * ��Ʊ���� 
     * $en_id ���� id
     */
    public function chupiaochuli($en_id = '') {
        $this->load->library('mysimpleencrypt');
        $this->load->model("hangcheng/mhangcheng", "mhangcheng");
        $this->load->model("dingdan/mdingdan", "mdingdan");
        $this->load->model("hangcheng/mhangchenglvke", "mhangchenglvke");
        $data['li'] = $this->li;

        $id = $this->mysimpleencrypt->de($en_id);
        $mydingdanid = $this->mhangcheng->getDingDanId($id);
        $obj = $this->mdingdan->getMyObj($mydingdanid);
        $data['obj'] = $obj;

        // ��ȡ����
        $hangcheng = $this->mhangcheng->getHangCheng($obj->id);

        if (!empty($hangcheng)) {
            $data['hangcheng'] = $hangcheng;
            if (count($hangcheng) > 0) {
                // ��ȡ�����ÿ�
                $hangchenglvke = $this->mhangchenglvke->getHangChengLvKe($hangcheng[0]->id);
                if (!empty($hangchenglvke)) {
                    $data['hangchenglvke'] = $hangchenglvke;
                }

                $hangchenglvke_tongji = $this->mhangchenglvke->tongji_hangcheng($hangcheng[0]->id, $mydingdanid);
                if (!empty($hangchenglvke_tongji)) {
                    $data['hangchenglvke_tongji'] = $hangchenglvke_tongji;
                }
                
                // ȼ��˰
                $ranyoushui = $hangcheng[0]->ranyoushui;
                $data['ranyoushui'] = $ranyoushui;
            }
        }
        
        $this->load->view('admin/guoneijipiao/gaiqianchupiao/chupiaochuli', $data);
    }
    
    /**
     * ��Ʊ���� 
     */
    public function cp()
    {
        $inde1_dingdanid = 0;
        $inde2_dingdanid = 0;
        $ps = $_POST;
        $this->db->trans_begin();
        
        foreach ($ps as $key => $v)
        {
            $sc = explode('_1_', $key);
   
            // ��ӳ�Ʊ����
            if(!empty($sc) && $sc[0] == 'chupiaobianma')
            {
                $ps = array('chupiaobianma' => $v, 
                    'chulishijian' => date("Y-m-d H:i:s"),
                    // ����״̬ ��ʾΪ�Ѿ���Ʊ
                    'dingdanzhuangtai' => 3);
                $this->db->update('dingdan', $ps, array('id' => $sc[1]));
                $inde1_dingdanid = intval($sc[1]);
            }
            
            // ��� Ʊ��
            if(!empty($sc) && $sc[0] == 'piaohao')
            {
                $this->db->update('hangchenglvke', array('piaohao' => $v), array('id' => $sc[1]));
            } 
            
            $sc1 = explode('_2_', $key);
            if(!empty($sc1) && $sc1[0] == 'chupiaobianma')
            {
                $ps = array('chupiaobianma' => $v, 
                    // ����״̬ ��ʾΪ�Ѿ���Ʊ
                    'dingdanzhuangtai' => 3);
                $this->db->update('dingdan', $ps, array('id' => $sc1[1]));
                $inde2_dingdanid = intval($sc1[1]);
            }
            
            // ��� Ʊ��
            if(!empty($sc1) && $sc1[0] == 'piaohao')
            {
                $this->db->update('hangchenglvke', array('piaohao' => $v), array('id' => $sc1[1]));
            } 
        }
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
            // ��Ʊ�ɹ���������
            $this->load->library('myalidayu');
            $this->load->model('dingdan/mdingdan', 'mdingdan');
            if($inde1_dingdanid != 0)
            {
                $fasong = $this->mdingdan->getDuanXinTongZhi($inde1_dingdanid);
                $this->myalidayu->ChuPiaoTongZhi($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);
            }
            
            if($inde2_dingdanid != 0)
            {
                $fasong = $this->mdingdan->getDuanXinTongZhi($inde2_dingdanid);
                $this->myalidayu->ChuPiaoTongZhi($fasong->tel, $fasong->name, $fasong->date, $fasong->dep, $fasong->arr, $fasong->airline, $fasong->flight);
            }
            
           redirect('/admin/guoneijipiao/gaiqianchupiao/success');
        }
    }
    
    public function success()
    {
        $this->load->view('admin/guoneijipiao/gaiqianchupiao/success');
    }

    /**
     * ��Ʊ���� 
     * $en_id ���� id
     */
    public function chupiaochuli0($en_id = '') {
        $data['li'] = $this->li;
        if (!empty($en_id) || $en_id != '') {
            // ��ȡ����
            $this->load->model("dingdan/mdingdan", "mdingdan");
            $obj = $this->mdingdan->getMyObj($id);
        }
        $this->load->view('admin/guoneijipiao/gaiqianchupiao/chupiaochuli0', $data);
    }

    /**
     * ����
     */
    public function suodan($hc_id) {
        $this->load->library('mysimpleencrypt');
        $this->load->model("dingdan/msoudan", "msoudan");
        $hangchengid = $this->mysimpleencrypt->de($hc_id);
        if ($this->msoudan->isSouDan($hangchengid, 'hangcheng') == 'δ����') {
            $this->msoudan->save($hangchengid, 'hangcheng');
            echo '1';
        } else {
            echo '0';
        }
    }

    public function xiangqing0() {
        $this->load->view('admin/guoneijipiao/gaiqianchupiao/xiangqing0');
    }

}

