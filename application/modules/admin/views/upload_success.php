<?php 
	if(!empty($upload_data) && $sid!=null){
		$file_name= $upload_data['file_name'];
		$id= $sid;
		$this->db->set('image', $file_name);  
		$this->db->where('id', $id); 
		if($this->db->update('sales_subcategory')){
			redirect(base_url()."admin/SalesSubcategoryList");
		}
	}
	else if(!empty($upload_data['file_name']) && $id!=null){
		$file_name= $upload_data['file_name'];
		$id= $id;
		$this->db->set('image', $file_name);  
		$this->db->where('id', $id); 
		if($this->db->update('sales_category')){
			redirect(base_url()."admin/SalesCategoryList");
		}
					 
	}else if(!empty($upload_data['file_name']) && $scid!=null){
		$file_name= $upload_data['file_name'];
		$id= $scid;
		$this->db->set('content_image', $file_name);  
		$this->db->where('id', $id); 
		if($this->db->update('sales_content')){
			redirect(base_url()."admin/salesContentList");
		}
					 
	}
	else if(!empty($upload_data['file_name']) && $slid!=null){
		$file_name= $upload_data['file_name'];
		$id= $slid;
		$this->db->set('slider_image', $file_name);  
		$this->db->where('id', $id); 
		if($this->db->update('slider')){
			$msg='<h5 style="color:green">Slider Added Successfully</h5>';
		  	$this->session->set_flashdata('slidermsg',$msg);
			//_adminLayout("admin/sliderList");
			redirect(base_url()."admin/sliderList");	
		}
					 
	}
	else{
		echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	}
	

?>