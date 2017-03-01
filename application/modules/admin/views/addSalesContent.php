        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Sales Content Informations</h3>
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
					<input type="button" class="btn btn-success" onclick="location.href='<?php echo site_url();?>admin/salesContentList/'" value="Back" />
					<?php $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'myform');
					echo form_open_multipart('/admin/insertSalesContent', $attributes);?>

                      <span class="section">Sales Content Info</span>
					
						<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<select name="parent_cat" id="parent_cat" class="form-control col-md-7 col-xs-12"
						 onchange="subCatValue(this.value)">
						<option value="">Select parent category</option>
						<?php 
						$query= $this->db->query("select * from sales_category");
						if($query->num_rows()>0){
							foreach($query->result() as $result){
							
						
						?>
						<option value="<?php echo $result->id;?>" ><?php echo $result->title;?></option>
						<?php 
							}
						}
						?>
						</select>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Subcategory <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<select name="sub_cat" id="sub_cat" class="form-control col-md-7 col-xs-12">
						<option value="">Select subcategory</option>
						
						</select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="content_title" class="form-control col-md-7 col-xs-12" name="content_title" placeholder="both name(s) e.g Jon Doe" value="<?php echo set_value('name'); ?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Image <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="content_img" class="form-control col-md-7 col-xs-12" name="content_img" required="required" type="file">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Content 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="editor" name="content_desc" class="form-control col-md-7 col-xs-12"><?php echo set_value('sales_content'); ?></textarea>
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
		function subCatValue(parentId){
			$("#sub_cat option").remove();
			var options;
			$.ajax({
				url :'<?php echo site_url()?>admin/subCatValue',
				type :'POST',
				data : {'parentID': parentId},
				success: function(result){
				//alert(result);
				$.each(result, function(key, value){
					//alert(key);
					options += '<option value="'+value.id+'">'+value.title+'</option>';
				});
				$("#sub_cat").append(options);				
				//$("#distric").show();	
			} 
			
			});
		}	
		</script>
