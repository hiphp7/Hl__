<?php
class uploadimg extends CI_Controller  {
    
	//上传商店logo
	function addlogo($id='') {
		//$this->load->model('Gallery_model');
                 // 导入 model
                 $this->load->model('shangpinxinxiguanli/Gallery_model', 'Gallery_model');
                 $img = array() ; 
                 $mingcheng = "" ; 
                 $data['res'] = $id ; 
		if ($this->input->post('upload')) {
		    $img[]=$this->Gallery_model->do_upload($mingcheng,$id);
                    
                    //保存商品图片
                    $this->load->model('shangdianxinxi/mshangdian', 'mshangdian'); 
                    $ids = $this->mshangdian->UpdateLogo($id,$img[0]); 
		}
		$data['images'] = $this->Gallery_model->get_images($img,$id);
                
		//$this->load->view('webadmin/shangdian/uploadlogo', $data);
                $this->load->view('webadmin/ok');
		
	}
        //上传商品图片
        function addImg($id='') {
		//$this->load->model('Gallery_model');
                 $this->load->model('shangpinxinxiguanli/mshangpinxinxi', 'mshangpinxinxi'); 
                 $this->load->model('shangpinxinxiguanli/Gallery_model', 'Gallery_model');
                 $img = array() ; 
                 $data['shangpinId'] = $id ; 
                 //获取商品名称
                $res = $this->mshangpinxinxi->QueryById($id) ;
                
		if ($this->input->post('upload')) {
		      $img[]=$this->Gallery_model->do_upload($res->shangpinmingcheng,$id);
                      //保存商品图片
                      $this->load->model('shangpinxinxiguanli/mshangpintu', 'mshangpintu'); 
                      $ids = $this->mshangpintu->SaveImages($id,$img[0]);
		}
                $data['img'] = $img;
		$data['images'] = $this->Gallery_model->get_images($img,$id);
              
                $webadmin = $this->session->userdata('webadmin');
		if(!empty($webadmin)){
		   $this->load->view('webadmin/shangpinxinxi/addshangpintu', $data);
                }else{
                   $this->load->view('admin/shangpinxinxi/addshangpintu', $data);
                }
		
	}
        
	
}