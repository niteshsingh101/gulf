<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		if(!$this->session->userdata('auth'))
		{
			redirect(base_url()."auth/");
		}
		else if($this->session->userdata('auth')) 
		{
		  $userType=$this->session->userdata("userType");
		  if($userType==2)
		  {
			 redirect(site_url()."/vendor"); 
		  }
		 else if($userType==3)
		  {
			 redirect(site_url()."/user"); 
		  }
		}
		$this->load->helper("layout_helper");
	} 
	/*
	
	*/
	public function index()
	{
		_adminLayout("dashboard");
	}
	/*
	
	*/
	public function generalSetting()
	{
		_adminLayout("generalSetting");
	}
	/*
	
	*/
	public function addCountry()
	{
		_adminLayout("addCountry");
	}

	/*
	
	*/
	public function countryList()
	{
		_adminLayout("countryList");
	}
	/*
	
	*/
	public function addState()
	{
		_adminLayout("addState");
	}

	/*
	
	*/
	public function stateList()
	{
		_adminLayout("stateList");
	}
	/*
	
	*/
	public function addCity()
	{
		_adminLayout("addCity");
	}

	/*
	
	*/
	public function cityList()
	{
		_adminLayout("cityList");
	}
	/*
	*/
	public function salesSubcategoryList(){
		$sbucatquery= $this->db->query("Select * from sales_subcategory");
		$data = array();
		foreach($sbucatquery->result() as $result){
			$data['data'][]= $result;
		}
		_adminLayout('SalesSubcategoryList', $data);
	}
	/**/
	public function addSalessubcategory(){
		
		_adminLayout('addSalesSubcategory');
	}
	/*
	*/
	public function salesContentList()
	{
		$contentquery= $this->db->query("SELECT *, sales_content.id as content_id FROM `sales_content` inner join sales_subcategory on sales_content.cat_id=sales_subcategory.id ");
		$data=array();
		foreach($contentquery->result() as $obj)
		{
		$data['data'][]=$obj;
		}
		_adminLayout("salesContentList",$data);
	}
	/**/
	public function addSalesContent(){
		
		_adminLayout("addSalesContent");
	}
	/**/
	public function salesCategoryList(){
	
		
		$salesquery= $this->db->query("Select * from sales_category ");
		$data=array();
		foreach($salesquery->result() as $obj)
		{
		$data['data'][]=$obj;
		}
		_adminLayout("salesCategoryList", $data);
		//redirect(base_url()."admin/SalesCategoryList", $data);
	}
	/**/
	public function addSalesCategory(){
		_adminLayout("addSalesCategory");
	}
	/**/
	public function subCatValue(){
		$this->output->set_content_type('application/json');
		if(!empty($this->input->post('parentID'))){
			$parentID = $this->input->post('parentID');
			$pquery = $this->db->query("Select * from sales_subcategory where parent_id='$parentID' ");
			$data= array();
			echo json_encode($pquery->result());
			
		}
		//echo "aaaaaaaaaaaaa".$this->input->post('parentID'); die;
	}
	/**/
	public function insertSalesCategory(){
		$this->load->library('form_validation');
		if ($this->form_validation->run('categoryForm') == FALSE)
		{
		 _adminLayout("addSalesCategory");
		}
		else{
		$cat_title = $this->input->post('cat_title');
		$cat_desc = $this->input->post('cat_desc');
		//$cat_img = $this->input->post('cat_img');
		$data = array(
			'title' => $cat_title,
			'description' => $cat_desc,
			'image' => ''
		);
		if($this->db->insert('sales_category', $data)){
			$inser_id= $this->db->insert_id();
		}		
		$config['upload_path']          = './uploads/';
     	$config['allowed_types']        = 'gif|jpg|png|jpeg';
     	$config['max_size']             = 10210;
     	$config['max_width']            = 10254;
     	$config['max_height']           = 7682;

        $this->load->library('upload', $config);

         if ( ! $this->upload->do_upload('cat_img'))
         {
          	$error = array('error' => $this->upload->display_errors());

          	_adminLayout('addSalesCategory', $error);
          }
				else{
				$data = array('upload_data' => $this->upload->data(), 'id' => $inser_id);
				
				 _adminLayout('upload_success', $data);
				 
				 }
		
		}
	}
	/**/
	public function insertSalessubcategory(){
		$this->load->library('form_validation');
		if ($this->form_validation->run('subCategoryForm') == FALSE)
		{
		 _adminLayout("addSalessubcategory");
		}
		else{
		$cat_title = $this->input->post('cat_title');
		$cat_desc = $this->input->post('cat_desc');
		$parent_cat = $this->input->post('parent_cat');
		$data = array(
			'title' => $cat_title,
			'description' => $cat_desc,
			'parent_id' => $parent_cat,
			'image' => ''
		);
		if($this->db->insert('sales_subcategory', $data)){
			$inser_id= $this->db->insert_id();
		}		
		$config['upload_path']          = './uploads/';
     	$config['allowed_types']        = 'gif|jpg|png|jpeg';
     	$config['max_size']             = 10210;
     	$config['max_width']            = 10254;
     	$config['max_height']           = 7682;

        $this->load->library('upload', $config);

         if ( ! $this->upload->do_upload('cat_img'))
         {
			 //echo "uploadfail"; die;
          	$error = array('error' => $this->upload->display_errors());

          	_adminLayout('addSalesCategory', $error);
          }
				else{
				$data = array('upload_data' => $this->upload->data(), 'sid' => $inser_id);
				
				 _adminLayout('upload_success', $data);
				 
				 }
		
		}
	}
	/**/
	public function insertSalesContent(){
		/*$this->load->library('form_validation');
		if ($this->form_validation->run('subCategoryForm') == FALSE)
		{
		 _adminLayout("addSalessubcategory");
		}
		else{*/
		$content_title = $this->input->post('content_title');
		$content_desc = $this->input->post('content_desc');
		$sub_cat = $this->input->post('sub_cat');
		$data = array(
			'content_title' => $content_title,
			'content_description' => $content_desc,
			'cat_id' => $sub_cat,
			'content_image' => ''
		);
		if($this->db->insert('sales_content', $data)){
			$inser_id= $this->db->insert_id();
		}		
		$config['upload_path']          = './uploads/';
     	$config['allowed_types']        = 'gif|jpg|png|jpeg';
     	$config['max_size']             = 10210;
     	$config['max_width']            = 10254;
     	$config['max_height']           = 7682;

        $this->load->library('upload', $config);

         if ( ! $this->upload->do_upload('content_img'))
         {
			 //echo "uploadfail"; die;
          	$error = array('error' => $this->upload->display_errors());

          	_adminLayout('addSalesContent', $error);
          }
				else{
				$data = array('upload_data' => $this->upload->data(), 'scid' => $inser_id);
				
				 _adminLayout('upload_success', $data);
				 
				 }
		
		//}
	}
	
	/**/
	public function deleteSalesCategory(){
		 $rowId = $this->uri->segment(3); 
		if(!empty($rowId)){
			
			$tableName= "sales_category";
			$this->load->model("delete_model", "admin");
			
			if($this->admin->dataDelete($rowId, $tableName)){
				$msg='<h5 style="color:red">Sales category is deleted successfully</h5>';
		  		$this->session->set_flashdata('delmsg',$msg);
		  		redirect(base_url()."admin/SalesCategoryList");;
			}
			else{
				$msg='<h5 style="color:red">Sales category is not deleted </h5>';
		  		$this->session->set_flashdata('delmsg',$msg);
		  		//redirect(base_url()."admin/SalesCategoryList");
				_adminLayout('SalesCategoryList');
			}
		}
		
	}
	/**/
	public function deleteSalesContent(){
		 $rowId = $this->uri->segment(3); 
		if(!empty($rowId)){
			
			$tableName= "sales_content";
			$this->load->model("delete_model", "admin");
			//$imgquery = $this->db->query("select content_image from sales_content where id='$rowId'");
			$content_img = $this->db->query("select content_image from sales_content where id='$rowId'")->row()->content_image;
			if($this->admin->dataDelete($rowId, $tableName)){
				unlink("uploads/".$content_img);
				$msg='<h5 style="color:red">Sales category is deleted successfully</h5>';
		  		$this->session->set_flashdata('delmsg',$msg);
		  		redirect(base_url()."admin/salesContentList");;
			}
			else{
				$msg='<h5 style="color:red">Sales category is not deleted </h5>';
		  		$this->session->set_flashdata('delmsg',$msg);
		  		//redirect(base_url()."admin/SalesCategoryList");
				_adminLayout('salesContentList');
			}
		}
		
	
		
	}
	/**/
	public function deleteSalessubcategory(){
		 $rowId = $this->uri->segment(3); 
		if(!empty($rowId)){
			
			$tableName= "sales_subcategory";
			$this->load->model("delete_model", "admin");
			if($this->admin->dataDelete($rowId, $tableName)){
				$msg='<h5 style="color:red">Sales category is deleted successfully</h5>';
		  		$this->session->set_flashdata('delmsg',$msg);
		  		redirect(base_url()."admin/SalesSubcategoryList");
			}
			else{
				$msg='<h5 style="color:red">Sales category is not deleted </h5>';
		  		$this->session->set_flashdata('delmsg',$msg);
		  		//redirect(base_url()."admin/SalesSubcategoryList");
				_adminLayout('SalesSubcategoryList');
			}
		}
		
	}
	
	public function sales_category_check($category_name)
		{
		    $query = $this->db->query("SELECT * FROM sales_category where title='$category_name'");
		   	if($query->num_rows()>0)
		    {
			    $this->form_validation->set_message('sales_category_check', 'The category name field can not be duplicate');
				return FALSE;
		    }
			else
			{
				return TRUE;
			}
		}
	/*Subcategory validation*/
	public function sales_subcategory_check($subcategory_name)
		{
		    $query = $this->db->query("SELECT * FROM sales_subcategory where title='$subcategory_name'");
		   	if($query->num_rows()>0)
		    {
			    $this->form_validation->set_message('sales_subcategory_check', 'The category name field can not be duplicate');
				return FALSE;
		    }
			else
			{
				return TRUE;
			}
		}

	
	/*User name validation*/
	public function username_check($user_name)
		{
		    $query = $this->db->query("SELECT * FROM user where user_name='$user_name'");
		   	if($query->num_rows()>0)
		    {
			    $this->form_validation->set_message('username_check', 'The %s field can not be duplicate');
				return FALSE;
		    }
			else
			{
				return TRUE;
			}
		}			
		
}//end class
