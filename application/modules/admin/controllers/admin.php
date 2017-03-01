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
			redirect(site_url()."auth/");
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
		$pid=$this->input->post('parentID');
		if(!empty($pid)){
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
    /*
     @author: Aditya 
	 @desc: displaying all page list
    */	
	/**Page module code start from here**/
	public function pageList()
	{
		$this->db->order_by("id", "desc"); 
		$query=$this->db->get("page");
		$data=array();
		if(!empty($query))
		{
			foreach($query->result_array() as $pageObj)
			{
				$pageObj['parent_page']='none';
				$data['data'][]=$pageObj;

			}
		
		}
		_adminLayout("pageList",$data);
	}
	public function addPage()
	{
		$action=$this->input->post("action");
		if(!empty($action) && $action=="addPage")
		{
			
			$title = $this->input->post('title');
		    $desc = $this->input->post('desc');
		    ////////////////////
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 10210;
			$config['max_width']            = 10254;
			$config['max_height']           = 7682;
			$this->load->library('upload', $config);
		    if(!$this->upload->do_upload('img'))
			  {
				$error = array('error' => $this->upload->display_errors());
				_adminLayout('addPage', $error);
			  }
			 else
			  {
				$image =$this->upload->data();
			  }
		  $data = array(
				'title' => $title,
				'description' => $desc,
				'featured_image' => $image['file_name'],
			);
		    $this->db->insert('page', $data);
			$query=$this->db->query("select max(id) as num from page");
			$row=$query->row_array();
		    $pageid=$row['num'];
			$type=$_POST['type'];
			if($_POST['type']!='' && count($_POST['type'])>0)
			{
					foreach($_POST as $k=>$v)
					{
						
						if($k!='title' && $k!='desc' && $k!='action' && $k!='type')
						  { 
							 list($k1,$v1)=each($type);
							 if($v1!='')
							 {
									 if($this->db->query("insert into `page_metadata` set page_id='$pageid', meta_key='$k', meta_value='$v1'"))
									 {
										$query1=$this->db->query("select max(id) as num1 from page_metadata");
										$row1=$query1->row_array();
										$pageid1=$row1['num1'];
										$ppid="field_".$pageid1;
										$this->db->query("insert into `page_metadata` set page_id='$pageid', meta_key='$ppid', meta_value='$v'");
										
									 }
							 }
						  }
					}//end foreach here!
			}//end if here!
			
			$this->session->set_flashdata("res","New page is added successfully");
			redirect("/admin/pageList");
			////////////////////
		}//end action if here
		
		_adminLayout("addPage");
	}
	public function editPage()
	{
		$action=$this->input->post("action");
		
		if(!empty($action) && $action=="editPage")
		{
		
         //////////////////////////
            $title = $this->input->post('title');
		    $desc = $this->input->post('desc');
			$id = $this->input->post('id');
		    ////////////////////
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 10210;
			$config['max_width']            = 10254;
			$config['max_height']           = 7682;
			$this->load->library('upload', $config);
		    if(!$this->upload->do_upload('img'))
			  {
				$error = array('error' => $this->upload->display_errors());
				_adminLayout('addPage', $error);
			  }
			 else
			  {
				$image =$this->upload->data();
			  }
			if(is_array($image) && $image['file_name']!='')  
			  {
				$img=$image['file_name'];
			  }
			  else
			  {
				$img=$this->input->post("img1");  
			  }
		    $data = array(
				'title' => $title,
				'description' => $desc,
				'featured_image' => $img,
			);
		   // $this->db->insert('page', $data);
			$this->db->where('id', $id);
            $this->db->update('page', $data); 
			/////////////////////////////////////////////////////////////////////////////////////////
		    $pageid=$id;
			$type=$_POST['type'];
			$this->db->query("delete from page_metadata where page_id='$pageid'");
			if($_POST['type']!='' && count($_POST['type'])>0)
			{
					foreach($_POST as $k=>$v)
					{
						if($k!='title' && $k!='desc' && $k!='action' && $k!='id'  && $k!='img1' && $k!='type')
						  { 
							 list($k1,$v1)=each($type);
							 if($v1!='')
							 {
									 if($this->db->query("insert into `page_metadata` set page_id='$pageid', meta_key='$k', meta_value='$v1'"))
									 {
										$query1=$this->db->query("select max(id) as num1 from page_metadata");
										$row1=$query1->row_array();
										$pageid1=$row1['num1'];
										$ppid="field_".$pageid1;
										$this->db->query("insert into `page_metadata` set page_id='$pageid', meta_key='$ppid', meta_value='$v'");
										
									 }
							 }
						  }
					}//end foreach here!
			}//end if here!
			////////////////////////////////////////////////////////////////////////////////////////////
			$this->session->set_flashdata("res","Page is edited successfully");		 
		 /////////////////////////////
		 redirect("admin/pageList");		
		}
		$id=$this->uri->segment(3);
    	$query=$this->db->get_where("page",array("id"=>$id));
		$row=$query->row_array();
		$meta_query=$this->db->query("select * from page_metadata where page_id='$id'");
		$metadata=array();
		$count=0;
		foreach($meta_query->result_array() as $meta_arr)
		{
			if(preg_match("/^title.*/",$meta_arr['meta_key'],$matchAll))
				{
					foreach($meta_query->result_array() as $metaSubArray)
					{
						
						if($metaSubArray['meta_key']=="field_".$meta_arr['id'])
						{
							$val=$metaSubArray['meta_value'];
							$field_title=str_replace("title_",'',$matchAll[0]);
						}
					}
					
					$metadata[]=array('title'=>$field_title,'name'=>$matchAll[0],'type'=>$meta_arr['meta_value'],'val'=>$val);
					$count++;
				}
			
		}
	
		$data=array("id"=>$id,"title"=>$row['title'],"desc"=>$row['description'],"img"=>$row['featured_image'],'metadata'=>$metadata);
		_adminLayout("editPage",$data);
		
		
	}
	public function deletePage()
	{
		$id=$this->uri->segment(3);
		$flag=$this->db->delete('page', array('id' => $id)); 
		if($flag)
		{
		  $this->session->set_flashdata("res","Page is deleted successfully");	
		  redirect("admin/pageList");	
		}
		else
		{
		redirect("admin/pageList");		
		}
	}
	/**Page module code end over here**/
		
}//end class
