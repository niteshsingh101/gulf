<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller 
{
	/*
	@package travel/auth
	*/
	public function Auth()
	{
	 parent::__construct();
	}
	public function index()
	{
		$authInfo=$this->session->all_userdata();
		if(is_array($authInfo) && array_key_exists("auth",$authInfo))
		{
			if($authInfo['auth'])
			{
				$userType=$authInfo['userType'];
				if($userType==1)
				{
				 redirect(base_url()."admin/");	
				}
			}
			else 
			{
				$this->load->view("login");
			}
		}
		
		else 
		{
		    $this->load->view("login");
		}
    }	
    /*
      @it's used check weather the enter user exist or not if exist then make them login
    */	
	public function login()
	{
      
	  
	  $username=$this->input->post("username");
      $password=$this->input->post("password");	  
	  $this->load->model("login_model","auth");
	  if($this->auth->userExists($username,$password))
	  {
		  $userdata = array(
					   'username'  => $this->auth->userName,
					   'password'  => $this->auth->userPassword,
					   'userType'  =>$this->auth->userType,
					   'userId'    =>$this->auth->userId,
					   'auth' => TRUE
				   );
		  $this->session->set_userdata($userdata); 
		  if($this->auth->userType==1)
		  {
		  redirect(base_url()."admin/");
		  }
		  else if($this->auth->userType==2)
		  {
		  redirect(base_url()."vendor/");
		  }
		  else if($this->auth->userType==3)
		  {
		  redirect(base_url()."user/");
		  }
	  }
	  else 
	  {
		  $msg='<h5 style="color:red">Sorry entered username/password is wrong</h5>';
		  $this->session->set_flashdata('res',$msg);
		  redirect(base_url()."auth/");
	  }
	}
	/*
      @it's used to logout the user
    */	
	public function logout(){
		$userdata = array(
                   'username'  =>'',
                   'password'     =>'',
				   'userType'  =>'',
				   'userId'    =>'',
                   'auth' =>''
               );
        $this->session->unset_userdata($userdata);
		//$this->session->sess_destroy();
		$msg='<h5 style="color:green">you are successfully logged out</h5>';
		$this->session->set_flashdata('res',$msg);
		redirect(base_url()."auth");
		$this->session->sess_destroy();
	}//end method
}//end class

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */