<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Delete_Model extends CI_Model
{
  public $rowId;
  public $tableName;

  public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  /*
  @desc: it's used to  check weather the user exists or not
  */
  public function dataDelete($rowId,$tableName)
  {
  	//echo "delete from $tableName where id='$rowId'"; die;
	if($this->db->query("delete from $tableName where id='$rowId'")){
		return true;
	}
	else
		return false;
	
	
  }//end method
}
?>