<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendor extends CI_Controller {

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
		if(!$this->session->userdata('auth'))
		{
			redirect(site_url()."/auth/");
		}
		else if($this->session->userdata('auth')) 
		{
		  $userType=$this->session->userdata("userType");
		  if($userType==1)
		  {
			 redirect(site_url()."/admin"); 
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
		_vendorLayout("dashboard");
	}
	/*
	
	*/
	public function viewProfile()
	{
		_vendorLayout("profile");
	}
	/*
	*/
	/**/
	public function updateVendor()
	{
		
		
	}
	/**/
	public function hotelList()
	{
		_vendorLayout("hotelList");
	}
	/*  */
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
		
		_vendorLayout("userList");
	}
	

}//end class
