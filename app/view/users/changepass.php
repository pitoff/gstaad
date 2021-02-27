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
                        <li><a href="index.html">User</a></li>
                        <li><i class="fa fa-arrow-up"></i>Update password</li>                          
                    </ol>
                </div>
              </div>

<!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-6 col-lg-offset-3">
                      <section class="panel">
                          <header class="panel-heading">
                              Change your security password 
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?php echo URLROOT;?>/users/changepass/<?php echo $data['id'];?>">
                                      <div class="form-group">
                                          <label for="password" class="control-label col-lg-3">Old-Password<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['old_password_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="old_password" value="<?php echo $data['old_password'];?>" minlength="5" type="password" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['old_password_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="password" class="control-label col-lg-3">New-Password<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['new_password_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="new_password" value="<?php echo $data['new_password'];?>" minlength="5" type="password" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['new_password_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="password" class="control-label col-lg-3">Retype New-Password<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['rnew_password_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="rnew_password" value="<?php echo $data['rnew_password'];?>" minlength="5" type="password" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['rnew_password_err'];?></span>
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