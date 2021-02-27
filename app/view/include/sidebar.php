          <!--sidebar start-->
      <?php if ($_SESSION['role'] == 1) :?>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?php echo URLROOT;?>/users/dashboard">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                          <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_profile"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                        <ul class="sub">
                          <li><a class="" href="<?php echo URLROOT;?>/users/allusers">All users</a></li>
                          <li><a class="" href="<?php echo URLROOT;?>/users/adduser">Add user</a></li>
                        </ul>
                  </li>       
                  <li>
                      <a href="<?php echo URLROOT;?>/users/allsendmoney" class="">
                          <i class="arrow_condense"></i>
                          <span>Send Money</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="#">
                          <i class="arrow_expand"></i>
                          <span>Withdraws</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="<?php echo URLROOT;?>/users/logout">
                          <i class="icon_key_alt"></i>
                          <span>Logout</span>
                      </a>
                  </li>
<!--                   <li>                     
                      <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Charts</span>
                          
                      </a>
                                         
                  </li>
                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.html">Basic Table</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          <li><a class="" href="profile.html">Profile</a></li>
                          <li><a class="" href="login.html"><span>Login Page</span></a></li>
                          <li><a class="" href="blank.html">Blank Page</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                      </ul>
                  </li> -->
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <?php elseif ($_SESSION['role'] == 2) :?>
            <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="<?php echo URLROOT;?>/users/dashboard">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo URLROOT;?>/users/profile/<?php echo $_SESSION['user_id'];?>" class="">
                          <i class="icon_profile"></i>
                          <span>My profile</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="<?php echo URLROOT;?>/users/account/<?php echo $_SESSION['user_id'];?>" class="">
                          <i class="icon_creditcard"></i>
                          <span>My account</span>
                      </a>
                  </li>
                  <!-- <li class="sub-menu">
                      <a href="<?php echo URLROOT;?>/users/transfer/<?php echo $_SESSION['user_id'];?>" class="">
                          <i class="arrow_expand"></i>
                          <span>Transfer funds</span>
                      </a>
                  </li> -->
                  <li class="sub-menu">
                      <a href="<?php echo URLROOT;?>/users/changepass/<?php echo $_SESSION['user_id'];?>" class="">
                          <i class="icon_pencil-edit"></i>
                          <span>Change password</span>
                      </a>
                  </li>
                  <li>
                      <a class="" href="<?php echo URLROOT;?>/users/logout">
                          <i class="icon_key_alt"></i>
                          <span>Logout</span>
                      </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <?php endif;?>
