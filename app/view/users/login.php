<style type="text/css">
  .login{

  background: url('../NiceAdmin/img/home.jpg') no-repeat center center fixed !important;
  height: 100%;
  color: #fff;

  -webkit-background-size: cover;

  -moz-background-size: cover;

  -o-background-size: cover;

  background-size: cover;

}
</style>
<?php require APPROOT .'/view/include/bheader'. '.php';?>
  <div class="container-fluid">
    <div class="row login">
    <div class="col-md-6 mx-auto" style="margin-top: 170px; opacity: 0.8;">
    
      <form action = "<?php echo URLROOT;?>/users/login" method="POST">
        <div class="form-group">
          <label for="email">Email: <sup>*</sup></label>
          <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email'];?>"><span class="invalid-feedback"><?php echo $data['email_err'];?></span>
        </div>
        <div class="form-group">
          <label for="password">Password: <sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password'];?>"><span class="invalid-feedback"><?php echo $data['password_err'];?></span>
        </div>
        <div class="row">
          <div class="col">
            <input type = "submit" id="btnstyle" value = "Login" class="btn btn-success btn-block">
          </div>
          
        </div>
      </form>

    </div>
    </div>
  </div>

<?php require APPROOT .'/view/include/bfooter'. '.php';?>
