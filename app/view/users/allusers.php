<?php require APPROOT .'/view/include/header'. '.php';?> 
<section id="main-content">
          <section class="wrapper">
        <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class=""></i>E-Banking</h3>
          
        </div>
      </div>             
              <!--overview start-->
			  <div class="row" style="margin-top: 20px;">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><a href="index.html">Users</a></li>
						<li><i class="fa fa-list"></i>All</li>						  	
					</ol>
				</div>
			  

			  	   <div class="col-lg-12">
             <div class="msg"><?php flash('clear');?></div>
                      <section class="table-responsive">
                          <!-- <header class="panel-heading">
                              Striped Table
                          </header> -->
                          <table class="table table-hover">
                              <thead>
                              <tr>
                               
                                  <th>SurName</th>
                                  <th>FirstName</th>
                                  <th>Email</th>
                                  <th>Country</th>
                                  <th>State</th>
                                  <th>View</th>
                                  <th>Update</th>
                                  <th>Credit</th>
                                  <th>status</th>
                                  <th>activate</th>
                                  <th>deactivate</th>
                                  
                                  <th>Remove</th>
                              </tr>
                              </thead>
                            <?php foreach($data['users'] as $users):?>
                              <?php if(($users->role) == 2):?>
                              <tbody>
                              <tr>
                                  
                                  <td><?php echo $users->surname;?></td>
                                  <td><?php echo $users->firstname;?></td>
                                  <td><?php echo $users->email;?></td>
                                  <td><?php echo $users->country;?></td>
                                  <td><?php echo $users->state;?></td>
                                  <!-- <td><?php echo $users->image;?></td> -->
                                  <td><a href="<?php echo URLROOT;?>/users/show/<?php echo $users->id;?>"><span class="fa fa-eye" style="color: #14614f;margin-left: 20px;"></span></a>
                                  </td>
                                  <td><a href="<?php echo URLROOT;?>/users/update/<?php echo $users->id;?>"><span class="fa fa-arrow-up" style="color: #14614f;margin-left: 20px;"></span></a>
                                  </td>
                                  <td><a href="<?php echo URLROOT;?>/users/credit/<?php echo $users->id;?>"><span class="fa fa-plus" style="color: #14614f;margin-left: 20px;"></span></a>
                                  </td>
                                  <td><?php echo $users->acc_status;?></td>
                                  <td>
                                    <form action="<?php echo URLROOT;?>/users/updateaccstatus/<?php echo $users->id;?>" method="POST">
                                    <?php  if(($users->acc_status) == 'active'):?>
                                      <button class="btn btn-primary" disabled="disabled"><i class="fa fa-plus"></i></button>
                                      <?php else:?>
                                      <button class="btn btn-primary" value="active" name="status"><i class="fa fa-plus"></i></button>
                                       <?php endif;?>
                                    </form>
                                  </td>
                                  <td>
                                    <form action="<?php echo URLROOT;?>/users/updateaccstatus/<?php echo $users->id;?>" method="POST">
                                    <?php  if(($users->acc_status) == ''):?>
                                      <button class="btn btn-primary" disabled="disabled"><i class="fa fa-minus"></i></button>
                                      <?php else:?>
                                      <button class="btn btn-primary" value=" " name="status"><i class="fa fa-minus"></i></button>
                                       <?php endif;?>
                                    </form>
                                  </td>
                                  
                                  <td>
	                                <form action="<?php echo URLROOT;?>/users/deleteuser/<?php echo $users->id;?>" method="POST">
	  									          <button type="submit" style="border: none; margin-left: 20px;"><span class="icon_trash_alt" style="color: red;"></span></button>
	  								             </form>
  								            </td>
                              </tr>
                            <?php endif;?>
                          	<?php endforeach;?>
                              </tbody>
                          </table>
                      </section>
                  </div>
			  </div>

			</section>
</section>
<script type="text/javascript">
  $('.msg').delay(3000).fadeOut(300);
</script>
<?php require APPROOT .'/view/include/footer'. '.php';?> 
