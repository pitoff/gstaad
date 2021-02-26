<style type="text/css">
  #signup{

  background: url('../NiceAdmin/img/home.jpg') no-repeat center center fixed !important;
  width: 100%;
  height: 100%;
  color: #fff;

  -webkit-background-size: cover;

  -moz-background-size: cover;

  -o-background-size: cover;

  background-size: cover;

}
</style>
<?php require APPROOT .'/view/include/bheader'. '.php';?>
  <div class="container-fluid">
    <div class="row">
    <div id="signup">
    <div class="col-md-6 mx-auto" style="margin-top: 120px; opacity: 0.8;">

                    <section class="panel">
                          <header class="panel-heading">
                              <h4 style="text-align: center;">Get started</h4>
                              <p style="text-align: center;">create a new account with <?php echo SITENAME;?></p>
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?php echo URLROOT;?>/users/signup">
                                      <div class="form-group">
                                          <label for="cemail" class="control-label">SurName<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['surname_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="surname" value="<?php echo $data['surname'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['surname_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="cemail" class="control-label">FirstName<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="firstname" value="<?php echo $data['firstname'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['firstname_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="cemail" class="control-label">E-Mail<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="email" name="email" value="<?php echo $data['email'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['email_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="password" class="control-label">Password<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="password" value="<?php echo $data['Password'];?>" minlength="5" type="password" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['password_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="password" class="control-label">Confirm-Pass<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="confirm_password" value="<?php echo $data['confirm_assword'];?>" minlength="5" type="password" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['confirm_password_err'];?></span>
                                          </div>
                                      </div>
                                      <!-- <div class="form-group">
                                          <label for="cemail" class="control-label">Country<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['country_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="country" value="<?php echo $data['country'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['country_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="cemail" class="control-label">State<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['state_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="state" value="<?php echo $data['state'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['state_err'];?></span>
                                          </div>
                                      </div>
                                    <div class="form-group">
                                    <label for="image" class="control-label">Image:</label>
                                    <div class="">
                                                <input type="file" id="" name="photo" multiple="multiple/*" class="<?php echo (!empty($data['photo_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['photo'];?>">
                                                <span class="invalid-feedback"><?php echo $data['photo_err'];?></span>
                                              </div>
                                         </div>
                                   <div class="form-group">
                                     <label for="image" class="control-label">Gender:</label>
                                     <div class="">
                                      <input type="radio" value="male" name="gender"> Male &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="female" name="gender"> Female<br>
                                     </div>
                                           </div>
                                       <div class="form-group">
                                          <label for="cemail" class="control-label">DOB<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['dob_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="date" name="dob" value="<?php echo $data['dob'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['dob_err'];?></span>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="cemail" class="control-label">Occupation<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['occupation_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="occupation" value="<?php echo $data['occupation'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['occupation_err'];?></span>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="status" class="control-label">Status<span class="required">*</span></label>
                                            <div class="">
                                            <select name="status" class="form-control">
                                                <option value="single">Single</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="married">Married</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="cemail" class="control-label">Mother's name<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['mname_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="mname" value="<?php echo $data['mname'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['mname_err'];?></span>
                                          </div>
                                        </div> 
                                        
                                        <div class="form-group">
                                          <label for="cemail" class="control-label">AccNumber<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['acc_num_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="acc_num" value="<?php echo $data['acc_num'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['acc_num_err'];?></span>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="cemail" class="control-label">AccPin<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['pin_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="pin" value="<?php echo $data['pin'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['pin_err'];?></span>
                                          </div>
                                        </div>   
                                      <div class="form-group">
                                          <label for="cemail" class="control-label">NextOfKin<span class="required">*</span></label>
                                          <div class="">
                                              <input class="form-control <?php echo (!empty($data['nok_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="text" name="nok" value="<?php echo $data['nok'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['nok_err'];?></span>
                                          </div>
                                        </div>                            -->                                                  
                                      <div class="form-group">
                                          <div class="">
                                              <button class="btn btn-primary" type="submit">Save</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>

    </div>
    </div>
    </div>
  </div>
<?php require APPROOT .'/view/include/bfooter'. '.php';?>