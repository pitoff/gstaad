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
                        <li><i class="fa fa-list"></i>Account credits</li>                          
                    </ol>
                </div>
              

                   <div class="col-lg-12">
                      <section class="table-responsive">
                          
                          <table class="table table-hover">

                              <thead>
                              <header class="panel-heading">
                              Most recent credit transactions on your account
                              </header>
                              <tr>
                                  <th>Transaction_id</th>
                                  <th>Sender</th>
                                  <th>Recieved_amount</th>
                                  <th>Sent_from</th>
                                  <th>Transaction time</th>
                              </tr>
                              </thead>
                            <?php foreach ($data['rcredit'] as $rcredit) :?>
                                <?php  if (($data['user']->id) == ($rcredit->user_id)) :?>
                              <tbody>
                              <tr>
                                  <td><?php echo $rcredit->transaction_id;?></td>
                                  <td><?php echo $rcredit->sender;?></td>
                                  <td> &#36;<?php echo number_format($rcredit->amount, 2);?></td>
                                  <td><?php echo $rcredit->sender_bank;?></td>
                                  <td><?php echo $rcredit->cdate;?></td>
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
