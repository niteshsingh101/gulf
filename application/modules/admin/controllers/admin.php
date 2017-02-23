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
			redirect(site_url()."/auth/");
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
	public function CategoryList()
	{
		$categoryquery= $this->db->query("Select * from category");
		$data=array();
		foreach($categoryquery->result() as $obj)
		{
		$data['data'][]=$obj;
		}
		_adminLayout("categoryList", $data);
	}
	/*
	
	*/
	public function addCategory()
	{
		
		_adminLayout("addCategory");
	}
	/*
	*/
	public function deleteVendor()
	{
		
	}
	
	/* Insert Vendor details */
	public function insertCategory()
	 {
	    $this->load->library('form_validation');
		if ($this->form_validation->run('categoryForm') == FALSE)
		{
		 _adminLayout("addCategory");
		}
		else
		{
	 	$category_name=$this->input->post('category_name');
		$data= array(
						'category_name' => $category_name
						);
							
		if($this->db->insert('category', $data)){
			redirect(base_url()."admin/CategoryList"); 
						
		}		
		}
	}			
	public function category_check($category_name)
		{
		    $query = $this->db->query("SELECT * FROM category where category_name='$category_name'");
		   	if($query->num_rows()>0)
		    {
			    $this->form_validation->set_message('category_check', 'The category name field can not be duplicate');
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
