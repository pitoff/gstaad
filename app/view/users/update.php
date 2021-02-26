<?php require APPROOT .'/view/include/header'. '.php';?>      
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row" style="margin-top: 20px;">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><i class="fa fa-list"></i><a href="index.html">Users</a></li>
						<li><i class="fa fa-pencil"></i>Update User</li>						  	
					</ol>
				</div>
			  </div>

			<!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-6 col-lg-offset-3">
                      <section class="panel">
                          <header class="panel-heading">
                              Update user details
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?php echo URLROOT;?>/users/update/<?php echo $data['id'];?>" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">SurName<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['surname_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="surname" value="<?php echo $data['surname'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['surname_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">FirstName<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="firstname" value="<?php echo $data['firstname'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['firstname_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">E-Mail<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="email" name="email" value="<?php echo $data['email'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['email_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">Country<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['country_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="country" value="<?php echo $data['country'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['country_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">State<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['state_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="state" value="<?php echo $data['state'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['state_err'];?></span>
                                          </div>
                                      </div>
                									  <div class="form-group">
                										<label for="image" class="control-label col-lg-2">Image:</label>
                										<div class="col-lg-10">
                						                    <input type="file" id="" name="photo" multiple="multiple/*" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo'];?>">
                		                    				<span class="invalid-feedback"><?php echo $data['photo_err'];?></span>
                					                    </div>
                							      	   </div>
              									   <div class="form-group">
              									     <label for="image" class="control-label col-lg-2">Gender:</label>
              									     <div class="col-lg-10">
              									    	<input type="radio" value="male" name="gender"> Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="female" name="gender"> Female<br>
              									     </div>
              					                   </div>
                                       <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">DOB<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['dob_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="date" name="dob" value="<?php echo $data['dob'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['dob_err'];?></span>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">Occupation<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['occupation_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="occupation" value="<?php echo $data['occupation'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['occupation_err'];?></span>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="status" class="control-label col-lg-2">Status<span class="required">*</span></label>
                                            <div class="col-lg-10">
                                            <select name="status" class="form-control">
                                                <option value="single">Single</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="married">Married</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">Mother's name<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['mname_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="mname" value="<?php echo $data['mname'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['mname_err'];?></span>
                                          </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">AccNumber<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['acc_num_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="acc_num" value="<?php echo $data['acc_num'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['acc_num_err'];?></span>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">AccPin<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['pin_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="pin" value="<?php echo $data['pin'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['pin_err'];?></span>
                                          </div>
                                        </div>   
                                      <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">NextOfKin<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['nok_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="nok" value="<?php echo $data['nok'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['nok_err'];?></span>
                                          </div>
                                        </div>                                                                             
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Save</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>

			</section>
		</section>
<?php require APPROOT .'/view/include/footer'. '.php';?>