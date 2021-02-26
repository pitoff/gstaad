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
						<li><i class="fa fa-arrow-up"></i>Transfer Money</li>						  	
					</ol>
				</div>
			  </div>

<!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-6 col-lg-offset-3">
                      <section class="panel">
                      <div class="msg"><?php flashbad('invalid');?></div>
                          <header class="panel-heading">
                              Input details to generate otp and transfer funds
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?php echo URLROOT;?>/users/transferpin">
                                      <input type="hidden" name="token" value="<?php echo $data['token'];?>">
                                      <div class="form-group">
                                        <label for="email" class="control-label col-lg-3">Email:<span class="required">*</span></label>
                                        <div class="col-lg-9">
                                          <input type="email" name="email" placeholder="Email" autofocus class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" readonly value="<?php echo $data['email'];?>"><span class="invalid-feedback" style="color:red;"><?php echo $data['email_err'];?></span>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="password" class="control-label col-lg-3">Pin:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['pin_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="pin" placeholder="secret pin" value="<?php echo $data['pin'];?>" minlength="5" type="password" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['pin_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Generate OTP</button>
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
<script type="text/javascript">
  $('.msg').delay(2500).fadeOut(300);
</script>
<?php require APPROOT .'/view/include/footer'. '.php';?> 