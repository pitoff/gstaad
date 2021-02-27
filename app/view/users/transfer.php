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
                      <div class="msgotp"><?php flash('otp');?></div>
                          <header class="panel-heading">
                              Wire a Transfer to beneficiary 
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?php echo URLROOT;?>/users/transfer/<?php echo $data['id'];?>">
                               
                                      <div class="form-group">
                                          <label for="name" class="control-label col-lg-3">Acc Name:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['acc_name_err'])) ? 'is-invalid' : ''; ?>" id="subject" placeholder="beneficiary account name" name="acc_name" value="<?php echo $data['acc_name'];?>" minlength="5" type="text" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['acc_name_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="name" class="control-label col-lg-3">Acc Number:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['acc_num_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="acc_num" placeholder="beneficiary account number" value="<?php echo $data['acc_num'];?>" minlength="5" type="text" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['acc_num_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="bank" class="control-label col-lg-3">Destination Bank:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['bank_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="bank" value="<?php echo $data['bank'];?>" type="text" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['bank_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="name" class="control-label col-lg-3">Amount:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['amount_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="amount" value="<?php echo $data['amount'];?>" type="text" required /><span class="invalid-feedback" style="color:#00a0df;" id="msg"><?php echo $data['amount_err'];?></span>
                                          </div>
                                      </div>
                                      <input type="hidden" name="tid" value="<?php echo $data['tid'];?>">
                                      <div class="form-group">
                                          <label for="token" class="control-label col-lg-3">Enter token:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['token_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="token" value="<?php echo $data['token'];?>" type="text" required /><span class="invalid-feedback" style="color:#ea3450;" id="mmsg"><?php echo $data['token_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Process</button>
                                          </div>
                                      </div>
                                  </form>
                                 
                              </div>
                          </div>
                      </section>
                       <a href="<?php echo URLROOT;?>/users/transferpin"><button class="btn btn-primary pull-right" type="submit">Generate another OTP</button></a>
                    </div>
               </div>


          </section>
</section>
<script type="text/javascript">
  $('#msg').delay(3500).fadeOut(300);
  $('#mmsg').delay(3500).fadeOut(400);
  $('.msgotp').delay(3500).fadeOut(400);
</script>
<?php require APPROOT .'/view/include/footer'. '.php';?> 