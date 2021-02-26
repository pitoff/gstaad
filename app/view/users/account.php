<style type="text/css">
  .detailstyle{
  font-weight: bold;
}
</style>
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
  						<li><i class="fa fa-list"></i><a href="index.html">Users</a></li>
  						<li><i class="fa fa-bank"></i>Account Summary</li>						  	
  					</ol>
  				</div>
        

          
			  	   <div class="col-lg-8 col-lg-offset-2">
                      <div class="table-responsive">
                          <header class="panel-heading">
                              Checking & Savings
                          </header>
                            <?php foreach($data['all'] as $all):?>
                            	<?php if(($data['user']->id) == ($all->user_id)):?>
                              <div style="padding-top: 5px; padding-left: 5px;">
                              <p><span class="detailstyle">Account Number: <?php echo $all->acc_num;?></span></p>
                              <p><span class="detailstyle">Current Balance: &#36;<?php echo number_format($all->current_bal, 2);?></span></p>
                              <p><span class="detailstyle">Available Balance: &#36;<?php echo number_format($all->available_bal, 2);?></span></p>
                              
                              
                              </div>
                            <?php endif;?>
                          	<?php endforeach;?>
			      <p><span class="detailstyle">Last credit transaction: <?php echo $data['lastcredit']->cdate;?></span></p>
                          <p>
                          <?php if(($data['exist'])):?>
	                           <a href="<?php echo URLROOT;?>/users/transferpin"><button class="btn btn-primary" type="submit" style="margin-top: 10px;">Transfer Funds</button></a>
                          <?php else:?>
                            <p style="padding-left: 10px;">Zero <span style="color: red;">funds,</span> please credit your account</p>
                          <?php endif;?>
  							         </p>
                      </div>
                      
                  </div>
                </div>
		</section>
</section>


<?php require APPROOT .'/view/include/footer'. '.php';?>
