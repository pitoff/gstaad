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
						<li><i class="fa fa-list"></i>Account debits</li>						  	
					</ol>
				</div>
			  

			  	   <div class="col-lg-12">
                      <section class="table-responsive">
                          
                          <table class="table table-hover">

                              <thead>
                              <header class="panel-heading">
                              Most recent debit transaction on account
                              </header>
                              <tr>
                                  <th>transaction_id</th>
                                  <th>account number</th>
                                  <th>account name</th>
                                  <th>Amount</th>
                                  <th>Receiving bank</th>
                                  <th>Transaction time</th>
                              </tr>
                              </thead>
                            <?php foreach($data['debit'] as $debit):?>
                              <?php  if(($data['user']->id) == ($debit->user_id)):?>
                              <tbody>
                              <tr>
                                  <td><?php echo $debit->transaction_id;?></td>
                                  <td><?php echo $debit->acc_num;?></td>
                                  <td><?php echo $debit->acc_name;?></td>
                                  <td> &#36;<?php echo number_format($debit->amount, 2);?></td>
                                  <td><?php echo $debit->bank;?></td>
                                  <td><?php echo $debit->tdate;?></td>
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
<?php require APPROOT .'/view/include/footer'. '.php';?> 
