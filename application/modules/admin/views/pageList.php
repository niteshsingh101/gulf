<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Page List</h3>
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
                    
					<input type="button" class="btn btn-success" onclick="location.href='<?php echo site_url();?>admin/addPage/'" value="Add New Page " />
                     <div class="clearfix"></div>
					</div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30" style="color:green;">
                     <?php echo $this->session->flashdata("res");?>
                    </p>
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
						  <th>S.NO</th>
                          <th>title</th>
                          <th>Description</th>
                          <th>Image</th>
						  <th>Parent Page</th>
						  <th>Add Child Page</th>
						  <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
					 <?php 
					 if(!empty($data) && is_array($data) && count($data)>0)
					 {
					     $sno=1;
						 foreach($data as $pageArray)
						 {
					?>
					 <tr>
					      <td><?php echo $sno;?></td>
                          <td><?php echo $pageArray['title'];?></td>
						  <td><?php echo $pageArray['description'];?></td>
                          <td><img src="<?php echo base_url();?>/uploads/<?php echo $pageArray['featured_image'];?>" width="200" height="auto"></td>
                          <td><?php  echo $pageArray['parent_page'];?></td>
						  <td><a href="#">Add Child Page</a></td>
						  <td><a href="<?php echo site_url();?>admin/editPage/<?php echo $pageArray['id'];?>"><img src="<?php echo base_url()?>images/icon/edit.png" /></a> | 
						  <a href="<?php echo site_url();?>admin/deletePage/<?php echo $pageArray['id'];?>" ><img src="<?php echo base_url()?>images/icon/del.png"
						  onclick="return confirm('Are you sure you want to delete?');" /></a></td>
                    </tr>
                    <?php	
                          $sno++;					
						 }//end foreach
					 }///end if
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