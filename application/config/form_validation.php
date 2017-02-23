<?php 
$config = array(
                 'categoryForm' => array(
									array(
                                            'field' => 'category_name',
                                            'label' => 'category_name',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'category_name',
                                            'label' => 'category_name',
                                            'rules' => 'callback_category_check'
                                         ),
										  
										 
                                    )
                                     
               );
			   
	//$this->form_validation->set_rules('email', 'Email', 'callback_vendor_email_check');			   