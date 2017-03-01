   <!-- Small modal -->
                  <div class="modal fade bs-example-modal-lg" id="myCustomFieldModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Add Custom Field</h4>
                        </div>
                        <div class="modal-body">
                        <!------------->
						<div class="item form-group">
                          <label class="control-label" for="name">Enter Field Title</label>
                          <input class="form-control" name="cFiledTitle" id="cFiledTitle" data-validate-length-range="6" type="text"><span style="color:red;display:none" id="titleValid">Please Enter Title</span>
                        </div>
					    <div class="item form-group">
                          <label class="control-label" for="name">Select Field Type</label>
                          <select name="cFiledType" id="cFiledType" class="form-control">
						    <option value="">-Select-</option>
						    <option value="1">Text</option>
							<option value="2">Image</option>
							<option value="3">TextArea</option>
						  </select><span style="color:red;display:none" id="typeValid">Please Select Field Type</span>
                        </div>
						<!------------->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button id="addCustomFieldBtn" onclick="addCustomFieldBtn();" type="button" class="btn btn-primary">Submit</button>
                        </div>

                      </div>
                    </div>
                  </div>
        <!-- /modals -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Edit Page</h3>
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
					<input type="button" class="btn btn-success" onclick="location.href='<?php echo site_url();?>admin/pageList/'" value="Back" />
					<?php $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'myform');
					echo form_open_multipart('/admin/editPage', $attributes);?>

                      <span class="section">Edit Page Info</span>
					
					  <input type="hidden" name="id" value="<?php echo $id;?>">
					  <input type="hidden" name="action" value="editPage">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cat_title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="title" 
						  value="<?php echo $title; ?>" required="required" type="text">
						  <span style="color:#FF0000"><?php echo form_error('title'); ?></span>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Image 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cat_img" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="img"  type="file">
                           <input type="hidden" name="img1" value="<?php echo $img;?>">
						</div>
                      </div>
					 <div class="item form-group">
					    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><span class="required"></span>
                        </label>
							 <div class="col-md-6 col-sm-6 col-xs-12">
								<img src="<?php echo base_url();?>/uploads/<?php echo $img;?>" width="200" height="auto">
							 </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Descriptions
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="editor"  name="desc" class="form-control col-md-7 col-xs-12" ><?php echo $desc; ?></textarea>
                        </div>
                      </div>
					  <!--------------------------->
                      <div id="myFiled">
					    <?php 
						if($metadata!='' && count($metadata)>0)
						{
								$totalType=count($metadata);
								foreach($metadata as $metaArr)
								{
								   if($metaArr['type']=='text')
								   {
								?>
								<div id="<?php echo $metaArr['name'];?>">
									<input type="hidden" name="type[]" value="text">
									  <div class="item form-group">
									   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $metaArr['title'];?><span class="required"></span></label>';
									   <div class="col-md-6 col-sm-6 col-xs-12"><input class="form-control col-md-6 col-xs-12" data-validate-length-range="6" name="<?php echo $metaArr['name'];?>"  value="<?php echo $metaArr['val'];?>" type="text"><span><a href="#" onclick="removeCustomField('<?php echo $metaArr['name'];?>')" style="color:blue;">Remove Field</a></span>
									</div></div>
								</div>
								<?php
								   }
								   else if($metaArr['type']=='image')
								   {
								?>
								<input type="hidden" name="type[]" value="image">
								<?php						
								   }
								   else if($metaArr['type']=='txtarea')
								   {
								?> 
								<div id="<?php echo $metaArr['name'];?>">
									<input type="hidden" name="type[]" value="txtarea">
									 <div class="item form-group">
									 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo $metaArr['title'];?><span class="required"></span></label>
									 <div class="col-md-6 col-sm-6 col-xs-12"><textarea name="<?php echo $metaArr['name'];?>" class="form-control col-md-7 col-xs-12" ><?php echo $metaArr['val'];?></textarea>
									 </div></div>
								 </div>
								<?php						
								   }
								}//end foreach
						}//end if 
						?>
					  </div>
					   <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea"></span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <a href="#" onclick="displayCustomField();" style="color:green;">Add Custom Field</a>
							</div>
                      </div>					  
					  <!-------------------------->
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
<script>
function displayCustomField()
{
	$("#titleValid").css("display",'none');  
	$("#typeValid").css("display",'none');  
	$('#myCustomFieldModal').modal("show");
	//alert("call");
}
function addCustomFieldBtn(){
	
  var title=$("#cFiledTitle").val();
  var type=$("#cFiledType").val();
  ///////////////////
  var textInput ='<div class="item form-group">';
      textInput +='<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">'+title+'  <span class="required"></span></label>';
      textInput +='<div class="col-md-6 col-sm-6 col-xs-12"><input id="title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="title_'+title+'" type="text">';
      textInput +='</div></div>';
///////////////////////////////
  var txtAreaInput='<div class="item form-group">';
      txtAreaInput +='<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">'+title+'  <span class="required"></span></label>';
      txtAreaInput +='<div class="col-md-6 col-sm-6 col-xs-12"><textarea name="title_'+title+'" class="form-control col-md-7 col-xs-12" ></textarea>';
      txtAreaInput +='</div></div>';
//////////////////////////////////	
  var fileInput='<div class="item form-group">';
      fileInput +='<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">'+title+' <span class="required"></span></label>';
      fileInput +='<div class="col-md-6 col-sm-6 col-xs-12"><input class="form-control col-md-7 col-xs-12" name="title_'+title+'" required="required" type="file">';
      fileInput +='</div></div>';
/////////////////////////////////////
  if(title=='' || title==null)
  {
	$("#titleValid").css("display",'');
    return false;	
  }
  if(type=='' || type==null)
  {
	$("#typeValid").css("display",'');  
    return false;
  }
  if(type==1)
  {
	  $("#myFiled").append(textInput);
	  $("#myFiled").append('<input type="hidden" name="type[]" value="text">');
  }
  else if(type==2)
  {
	  $("#myFiled").append(fileInput);
	  $("#myFiled").append('<input type="hidden" name="type[]" value="image">');
  }
  else if(type==3)
  {
	  $("#myFiled").append(txtAreaInput);
	  $("#myFiled").append('<input type="hidden" name="type[]" value="txtarea">');
  }
  $('#myCustomFieldModal').modal("hide");
  
}//end function here

function removeCustomField(fid)
{
	$("#"+fid).remove();
	
}
$(document).ready(function(){

	$("#cFiledTitle").keyup(function(){
		
		if($(this).val()!=''){
			$("#titleValid").css("display",'none');  
		}
	});
	$("#cFiledType").change(function(){
		
		if($(this).val()!=''){
			$("#typeValid").css("display",'none');  
		}
	});	
	
})


</script>