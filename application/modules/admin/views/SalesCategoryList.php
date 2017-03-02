 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Sales Category List</h3>
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
                    
					<input type="button" class="btn btn-success" onclick="location.href='<?php echo site_url();?>admin/addSalesCategory/'" value="Add New Category" />
                     <div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     Category List.
                    </p>
					<p><?php echo $this->session->flashdata('delmsg');?></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Image</th>
						  <th>Action</th>
                          
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php 
					 /* if( ! ini_get('date.timezone') )
					{
						date_default_timezone_set('Asia/Kolkata');
					}*/
				if(!empty($data)){	
					 foreach($data as $salcat){
					 
					 
					  ?>
                        <tr>
                          <td><?php echo $salcat->title;?></td>
                          <td><?php echo substr(preg_replace("/&#?[a-z0-9]+;/i","",$salcat->description),0,550) ;?></td>
                          <td><img src="<?php echo site_url()?>uploads/<?php echo $salcat->image;?>" style="width:100px;height:100px;" /></td>
						  <td><a href="<?php echo site_url()?>admin/editSalescategory/<?php echo $salcat->id?>" >
						  <img src="<?php echo site_url()?>images/icon/edit.png" /></a> | 
						  <a href="<?php echo site_url()?>admin/deleteSalesCategory/<?php echo $salcat->id?>" > <img src="<?php echo site_url()?>images/icon/del.png"
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