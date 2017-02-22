<?php 
function _adminLayout($filename,$data=null)
{
	   $obj=& get_instance();
	   $obj->load->view("common/header");
	   $obj->load->view($filename,$data);
	   $obj->load->view("common/footer");
}
function _vendorLayout($filename,$data=null)
{
	   $obj=& get_instance();
	   $obj->load->view("common/header");
	   $obj->load->view($filename,$data);
	   $obj->load->view("common/footer");
}
function _userLayout($filename,$data=null)
{
	   $obj=& get_instance();
	   $obj->load->view("common/header");
	   $obj->load->view($filename,$data);
	   $obj->load->view("common/footer");
}
function _user_metaLayout($usermeta,$user_id)
{
	   $obj=& get_instance();
	   $user_id= $user_id;
	   foreach ($usermeta as $key => $value)
	    {
   			$query = $obj->db->query("insert into user_meta set user_metakey='$key', user_metavalue='$value', user_id='$user_id' ;");
		}
	 if($query){
	 		return true;
	 	}	
}

?>