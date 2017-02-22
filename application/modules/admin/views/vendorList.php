        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Vendors</h3>
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
                    
					<input type="button" class="btn btn-success" onclick="location.href='<?php echo base_url();?>admin/addVendor/';" value="Add New Vendor" />
                     <div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                     Vender List.
                    </p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>User Name</th>
                          <th>Email</th>
						  <th>Phone</th>
                          <th>Date</th>
                          
                        </tr>
                      </thead>


                      <tbody>
					  <?php 
					  if( ! ini_get('date.timezone') )
					{
						date_default_timezone_set('Asia/Kolkata');
					}
					 foreach($data as $vendor){
					  ?>
                        <tr>
                          <td><?php echo $vendor->name;?></td>
                          <td><?php echo $vendor->user_name;?></td>
                          <td><?php echo $vendor->user_email;?></td>
						  <td><?php echo $vendor->phone;?></td>
                           <td><?php echo date ("d/M/Y",strtotime($vendor->create_date));?></td>
                         </tr>
					<?php }?>	 
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