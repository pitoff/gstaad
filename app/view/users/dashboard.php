<?php require APPROOT .'/view/include/header'. '.php';?>

	<!--main content start-->
	<?php if($_SESSION['role'] == 1):?>
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
			  <div class="Msg"><?php flash('credited');?></div>
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-user"></i>
						<div class="count">6.674</div>
						<div class="title">total Users</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-plus"></i>
						<div class="count">7.538</div>
						<div class="title">Deposits</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-minus"></i>
						<div class="count">4.362</div>
						<div class="title">Withdrawals</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count">1.426</div>
						<div class="title">Stock</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
			</div><!--/.row-->
		</section>
		</section>
		
		   

		  <?php elseif($_SESSION['role'] == 2):?>

		  <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class=""></i>E-Banking</h3>
					<ol class="breadcrumb">
						<!-- <li><i class="fa fa-home"></i><a href="index.html">Home</a></li> -->
						<li><?php echo $_SESSION['surname'];?>, Welcome to <?php echo SITENAME;?></li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">

            <div class="Msg"><?php flash('success');?></div>
            <div class="updatemsg"><?php flash('updatesuccess');?></div>
            <div class="Msg"><?php flashbad('failed');?></div>

            	<a href="<?php echo URLROOT;?>/users/account/<?php echo $_SESSION['user_id'];?>">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="icon_wallet_alt"></i>
						<div class="count"></div>
						<div class="title" style="font-size: 20px;">my account</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				</a>

				
				<a href="<?php echo URLROOT;?>/users/recentcredit/<?php echo $_SESSION['user_id'];?>">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-plus"></i>
						<div class="count"></div>
						<div class="title" style="font-size: 20px;">credit</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				</a>
				
				<a href="<?php echo URLROOT;?>/users/debit/<?php echo $_SESSION['user_id'];?>">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-minus"></i>
						<div class="count"></div>
						<div class="title" style="font-size: 20px;">debits</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				</a>
				
			</div><!--/.row-->
			</section>
			</section>
		
       <?php endif;?>
<script type="text/javascript">
	$('.Msg').delay(4000).fadeOut(300);
	$('.updatemsg').delay(4000).fadeOut(300);
</script>
<?php require APPROOT .'/view/include/footer'. '.php';?>
