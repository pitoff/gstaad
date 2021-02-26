<style type="text/css">
  #signup{
  background: url('../NiceAdmin/img/home.jpg') no-repeat center center fixed !important;
  width: 100%;
  color: #fff;
}
</style>
<?php require APPROOT .'/view/include/bheader'. '.php';?>
  <div class="container-fluid">
    <div class="row">
    <div id="signup">
    <div class="col-md-6 mx-auto" style="margin-top: 120px; opacity: 0.8;">

                    <section class="">
                          <header class="">
                              <h4 style="text-align: center;">Get started</h4>
                              <p style="text-align: center;">create a new account with <?php echo SITENAME;?></p>
                          </header>
                          <div class="">
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
