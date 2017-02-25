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
										  
										 
                                    )					
                                     
               );
			   
	//$this->form_validation->set_rules('email', 'Email', 'callback_vendor_email_check');			   