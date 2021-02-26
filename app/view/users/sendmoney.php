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
						<li><i class="fa fa-arrow-up"></i>Deposit</li>						  	
					</ol>
				</div>
			  </div>

<!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-6 col-lg-offset-3">
                      <section class="panel">
                          <header class="panel-heading">
                              Credit account 
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="<?php echo URLROOT;?>/users/sendmoney/<?php echo $data['id'];?>">
                                      <div class="form-group">
                                          <label for="name" class="control-label col-lg-3">TransactionID:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['tid_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="tid" readonly value="<?php echo $data['tid'];?>" minlength="5" type="text" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['tid_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="name" class="control-label col-lg-3">Sender:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['sender_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="sender" value="<?php echo $data['sender'];?>" type="text" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['sender_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="name" class="control-label col-lg-3">Sender_bank:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['sender_bank_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="sender_bank" value="<?php echo $data['sender_bank'];?>" type="text" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['sender_bank_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="amount" class="control-label col-lg-3">amount:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['amount_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="amount" value="<?php echo $data['amount'];?>" type="text" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['amount_err'];?></span>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="acc_num" class="control-label col-lg-3">Account Num:<span class="required">*</span></label>
                                          <div class="col-lg-9">
                                              <input class="form-control <?php echo (!empty($data['acc_num_err'])) ? 'is-invalid' : ''; ?>" id="subject" name="acc_num" value="<?php echo $data['acc_num'];?>" type="text" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['acc_num_err'];?></span>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                          <label for="cemail" class="control-label col-lg-2">dod<span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control <?php echo (!empty($data['dod_err'])) ? 'is-invalid' : ''; ?>" id="cemail" type="date" name="dod" value="<?php echo $data['dod'];?>" required /><span class="invalid-feedback" style="color:red;"><?php echo $data['dod_err'];?></span>
                                          </div>
                                        </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Credit</button>
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