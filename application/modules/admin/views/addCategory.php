        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Category Informations</h3>
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
					<?php $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'myform');
					echo form_open_multipart('/admin/insertVendor', $attributes);?>

                      <span class="section">Category Info</span>
					
						<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						<input id="category_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="1" name="category_name" placeholder="e.g JonDoe21" value="<?php //echo set_value('user_name'); ?>" required="required" type="text"><span style="color:#FF0000"><?php //echo form_error('user_name'); ?></span>
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
