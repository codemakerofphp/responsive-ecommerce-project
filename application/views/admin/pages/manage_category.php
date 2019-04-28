<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Category ID</th>
								  <th>Category Name</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<?php
						  	foreach ($all_category as $v_category) {
						  		
						  	?>
							<tr>
								<td><?php echo $v_category->category_id?></td>
								<td class="center"><?php echo $v_category->category_name?></td>
								<?php
								if ($v_category->category_status==1) {
									?>
									<td class="center">
									<span class="label label-success">Active</span>
								    </td>
								<?php    
								}else{
								?>
								<td class="center">
									<span class="label label-important">Inactive</span>
								</td>
							   <?php }?>
								<td class="center">
									<?php
									if ($v_category->category_status==1) {
										?>
										<a class="btn btn-danger" href="<?php echo base_url();?>super_admin/unpublished_category/<?php echo $v_category->category_id?>">
										<i class="halflings-icon white thumbs-down"></i>  
									    </a>
									<?php
									}else{ ?> 
                                          <a class="btn btn-success" href="<?php echo base_url();?>super_admin/published_category/<?php echo $v_category->category_id?>">
										  <i class="halflings-icon white thumbs-up"></i>  
							              </a>
								<?php	      
									}
									?>
									
									<a class="btn btn-info" href="<?php echo base_url();?>Super_admin/edit_category/<?php echo $v_category->category_id?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="<?php echo base_url();?>Super_admin/delete_category/<?php echo $v_category->category_id?>">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							<?php }?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
