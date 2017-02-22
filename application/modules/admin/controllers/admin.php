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
	public function vendorList()
	{
		$vendorquery= $this->db->query("Select *, getUserName(id) as name, getPhone(id) as phone from user where user_type=2");
		$data=array();
		foreach($vendorquery->result() as $obj)
		{
		$data['data'][]=$obj;
		}
		_adminLayout("vendorList",$data);
	}
	/*
	
	*/
	public function addVendor()
	{
		
		_adminLayout("addVendor");
	}
	/*
	*/
	public function deleteVendor()
	{
		
	}
	/**/
	public function updateVendor()
	{
		
		
	}
	/**/
	public function hotelList()
	{
		_adminLayout("hotelList");
	}
	/*  */
	public function vendorHotel()
	{
		
		
	}
	/**/
	public function hotelRoom()
	{
		
	}
	/**/
	public function room()
	{
		
		
	}
	/**/
	public function userList()
	{
		
		_adminLayout("userList");
	}
	/* Insert Vendor details */
	public function insertVendor()
	 {
	    $this->load->library('form_validation');
		if ($this->form_validation->run('vendorAdminForm') == FALSE)
		{
		 _adminLayout("addVendor");
		}
		else
		{
	 	$user_name=$this->input->post('user_name');
		$name= $this->input->post('name');
		$user_email= $this->input->post('email');
		$password= $this->input->post('password');
		$phone= $this->input->post('phone');
		$address= $this->input->post('address');
		$create_date= date('Y-m-d H:i:s');
		$ip_address = $this->input->ip_address();
		$user_type= 2;
		$data= array(
						'user_name' => $user_name,
						'password' => $password,
						'user_type' => $user_type,
						'user_email' => $user_email,
						'create_date' => $create_date,
						'ip_address' => $ip_address
						);
							
		if($this->db->insert('user', $data)){
				$user_id= $this->db->insert_id();
				$userMeta= array(
						'name'=> $name,
						'address'=> $address,
						'phone'=>$phone,
		
						);
						if(_user_metaLayout($userMeta, $user_id))
						{
							redirect(site_url()."/admin/vendorList"); 
						}
			  	}		
		}
	}			
	public function email_check($email)
		{
		    $query = $this->db->query("SELECT * FROM user where user_email='$email'");
		   	if($query->num_rows()>0)
		    {
			    $this->form_validation->set_message('email_check', 'The %s field can not be duplicate');
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
