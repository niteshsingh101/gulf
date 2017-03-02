        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add Sales Subcategory </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <!--<form class="form-horizontal form-label-left" novalidate>-->
					<?php //echo validation_errors(); ?>
					<input type="button" class="btn btn-success" onclick="location.href='<?php echo site_url();?>admin/SalesSubcategoryList/'" value="Back" />
					<?php $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'myform');
					echo form_open_multipart('/admin/editSubcategory', $attributes);?>

                      <span class="section">Subcategory Info</span>
					
						<input type="hidden" name="action" value="editSubcategory">
						<input type="hidden" name="id" value="<?php echo $id;?>">
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Select Category <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="parent_cat" class="form-control col-md-7 col-xs-12" required="required">
							<option value="">Select parent category</option>
							<?php 
								$selquery= $this->db->query("select * from sales_category");
								if($selquery->num_rows()>0){
									foreach($selquery->result() as $result){?>
											<option value="<?php echo $result->id ;?>" <?php if($parent_id == $result->id){?> selected="selected" <?php }?>><?php echo $result->title;?></option>
								<?php	}
								}
							?>
						  </select>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cat_title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="cat_title" 
						  placeholder="both name(s) e.g Jon Doe" value="<?php echo $title; ?>" required="required" type="text">
						  <span style="color:#FF0000"><?php echo form_error('cat_title'); ?></span>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cat_img" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="cat_img" type="file">
						  <input type="hidden" name="img1" value="<?php echo $img;?>">
                        </div>
                      </div>
                      <div class="item form-group">
					    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                        </label>
							 <div class="col-md-6 col-sm-6 col-xs-12">
								<img src="<?php echo base_url();?>/uploads/<?php echo $img;?>" height="200" width="auto">
							 </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Descriptions <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="editor" required="required" name="cat_desc" class="form-control col-md-7 col-xs-12" ><?php echo $desc;?></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    <?php form_close();?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
		<script>
initSample();
</script>
