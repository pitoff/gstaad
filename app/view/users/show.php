<style type="text/css">
.personal-info{
    background-color: #394a59;
    height: 30px;
    border-radius: 18px;
    text-align: center;
    text-transform: uppercase;
    box-shadow: 2px 2px;
    color: #fff;
    padding-top: 4px;
    margin-top: 5px;
    font-weight: bold;
}
.family-info{
	color: #394a59;
	font-weight: bold;
	text-align: center;
	text-transform: uppercase;
}
.details{
	border:none !important;
	margin-top: 5px;
}

.detailstyle{
	font-weight: bold;
}
</style>
<?php require APPROOT .'/view/include/header'. '.php';?>
<section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row" style="margin-top: 20px;">
				<div class="col-lg-12">
					<ol class="breadcrumb">
						<li><a href="index.html">User</a></li>
						<li><i class="fa fa-user"></i>Profile</li>						  	
					</ol>
				</div>
			  </div>

			  <div class="row">
			  	<div class="col-lg-6"> 
			  		<div class="studentcircle"><img data-src="holder.js/300x200" class="img-responsive" style="width: 250px; height: 200px; border-radius: 10px;" src="<?php echo URLROOT;?>/images/<?php echo $data['user']->image?>" alt="..."/></div>
			  	</div>
			  	<div class="col-lg-6"> 
			  		<div class="well well-sm">
			  			<p>Name: <?php echo $data['user']->surname .' '. $data['user']->firstname;?></p>
			  			<p>E-mail: <?php echo $data['user']->email;?></p>
			  		</div>
			  	</div>
			  </div>

			  <div class="row">
			  	<div class="col-lg-6 col-lg-offset-3 family-info">personal details</div>
			  	<div class="col-lg-8 col-lg-offset-2">
 			  		<div class="details well well-sm">
			  			<p>Country of origin: <span class="detailstyle"><?php echo $data['user']->country;?></span></p>
			  			<p>State of origin: <span class="detailstyle"><?php echo $data['user']->state;?></span></p>
			  			<p>Date of birth: <span class="detailstyle"><?php echo $data['user']->dob;?></span></p>
			  			<p>Gender: <span class="detailstyle"><?php echo $data['user']->gender;?></span></p>
			  			<p>Occupation: <span class="detailstyle"><?php echo $data['user']->occupation;?></span></p>
			  			<p>Status: <span class="detailstyle"><?php echo $data['user']->status;?></span></p>
			  		</div>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col-lg-6 col-lg-offset-3 family-info">Family Background</div>
			  	<div class="col-lg-8 col-lg-offset-2">
 			  		<div class="details well well-sm">
			  			<p>Mother's maiden name: <span class="detailstyle"><?php echo $data['user']->mname;?></span></p>
			  			<p>Next of Kin: <span class="detailstyle"><?php echo $data['user']->nok;?></span></p>
			  		</div>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col-lg-6 col-lg-offset-3 family-info">Account details</div>
			  	<div class="col-lg-8 col-lg-offset-2">
 			  		<div class="details well well-sm">
			  			<p>Account Number: <span class="detailstyle"><?php echo $data['user']->acc_num;?></span></p>
			  			<p>Account Type: <span class="detailstyle"></span></p>
			  		</div>
			  	</div>
			  </div>			  
			</section>
</section>
<?php require APPROOT .'/view/include/footer'. '.php';?>