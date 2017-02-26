        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Sales & Rental Content </h3>
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
             <!---------->
 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
					<input type="button" class="btn btn-success" onclick="location.href='<?php echo base_url();?>admin/addSalesContent/';" value="Add New Content " />
                     <div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     Sales & Rental Content List.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Image</th>
						  <th>Category name</th>
                          <th></th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php 
					  /*if( ! ini_get('date.timezone') )
					{
						date_default_timezone_set('Asia/Kolkata');
					}*/
					if(!empty($data)){
						foreach($data as $content){
					  ?>
                        <tr>
                          <td><?php echo $content->content_title;?></td>
                          <td><?php echo substr($content->content_description, 0,250);?></td>
                          <td><img src="<?php echo base_url()?>uploads/<?php echo $content->content_image;?>" style="width:100px;height:100px;"/></td>
						  <td><?php echo $content->title;?></td>
                           <td><img src="<?php echo base_url()?>images/icon/edit.png" /> | 
						  <a href="<?php echo base_url()?>admin/deleteSalesContent/<?php echo $content->content_id?>" > <img src="<?php echo base_url()?>images/icon/del.png"
						  onclick="return confirm('Are you sure you want to delete?');" /></a></td>
                         </tr>
					<?php }
					}
					?>	 
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>			 
			 <!--------->
              
            </div>
          </div>
        </div>
        <!-- /page content -->