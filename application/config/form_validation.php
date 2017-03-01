<?php 
$config = array(
                 'categoryForm' => array(
									array(
                                            'field' => 'cat_title',
                                            'label' => 'cat_title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'cat_title',
                                            'label' => 'cat_title',
                                            'rules' => 'callback_sales_category_check'
                                         ),
										  
										 
                                    ),
				'subCategoryForm' => array(
									array(
                                            'field' => 'cat_title',
                                            'label' => 'cat_title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'cat_title',
                                            'label' => 'cat_title',
                                            'rules' => 'callback_sales_subcategory_check'
                                         ),
										  
										 
                                    ),
				'salesContentForm' => array(
									array(
                                            'field' => 'content_title',
                                            'label' => 'content_title',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'content_title',
                                            'label' => 'content_title',
                                            'rules' => 'callback_sales_content_check'
                                         ),
									array(
                                            'field' => 'sales_content',
                                            'label' => 'sales_content',
                                            'rules' => 'required'
                                         ),	 
										  
										 
                                    )					
                                     
               );
			   
	//$this->form_validation->set_rules('email', 'Email', 'callback_vendor_email_check');			   