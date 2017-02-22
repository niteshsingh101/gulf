<?php 
$config = array(
                 'vendorAdminForm' => array(
                                    array(
                                            'field' => 'user_name',
                                            'label' => 'user_name',
                                            'rules' => 'required'
                                         ),
									array(
                                            'field' => 'user_name',
                                            'label' => 'user_name',
                                            'rules' => 'callback_username_check'
                                         ),
									 array(
                                            'field' => 'name',
                                            'label' => 'name',
                                            'rules' => 'required'
                                         ),	 	 
                                    array(
                                            'field' => 'password',
                                            'label' => 'Password',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'email',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'email',
                                            'label' => 'email',
                                            'rules' => 'callback_email_check'
                                         ),
										  
										 
                                    )
                                     
               );
			   
	//$this->form_validation->set_rules('email', 'Email', 'callback_vendor_email_check');			   