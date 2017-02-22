<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_Model extends CI_Model
{
  public $userType;
  public $userName;
  public $userPassword;
  public $userId;
  public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  /*
  @desc: it's used to  check weather the user exists or not
  */
  public function userExists($username,$password)
  {
	
	$query = $this->db->get_where('user', array('user_name' => $username,"password"=>$password));
    $res=$query->row();
	if ($query->num_rows() > 0)
	{
	$this->userName=$res->user_name;
	$this->userPassword=$res->password;
	$this->userType=$res->user_type;
	$this->userId=$res->id;
	return true;
	}
    else 
		return false;
  }//end method
}
?>