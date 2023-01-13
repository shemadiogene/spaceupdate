<?php
  require_once("db.php");
?>
<?php
  session_start();
    if (!$_SESSION['spaceco']) {
      header("location:../login");
    }
?>
<nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle">
              <i data-feather="mail"></i>
              <span class="badge headerBadge1">
                <?php
                  $se = mysqli_query($conn,"SELECT *FROM contacts WHERE status1='unread'") or die(mysqli_error($conn));
                  if (mysqli_num_rows($se)>0) {
                    $number = mysqli_num_rows($se);
                    echo $number;
                  }else{
                    echo "0";
                  }
                ?>
              </span>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <!-- <a href="#">Mark All As Read</a> -->
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <?php
                  $se = mysqli_query($conn,"SELECT *FROM contacts WHERE status1='unread' ORDER BY id DESC") or die(mysqli_error($conn));
                  if ($number = mysqli_num_rows($se)>0) {
                    while($message = mysqli_fetch_array($se)){
                      ?>
                        <a href="readMessages?id=<?= $message['id'];?>" class="dropdown-item dropdown-item-unread" data-toggle="tooltip" 
                          data-placement="top" title="<?php echo $message['messages']?>"> 
                          <span class="dropdown-item-avatar text-white">
                              <!-- <img alt="image" src="assets/img/co1.jpg" class="rounded-circle"> -->
                          </span>
                          <span class="dropdown-item-desc">
                            <span class="message-user">
                              <?php echo $message['fullnames']?>
                            </span>
                            <span class="time messege-text">
                              <?php echo $message['messages']?>
                            </span>
                            <span class="time">2 Days Ago</span>
                          </span>
                        </a>
                      <?php
                    }
                  }
                ?>
                <?php
                  $readed = mysqli_query($conn,"SELECT *FROM contacts WHERE status1='read' ORDER BY id DESC");
                  if (mysqli_num_rows($readed)) {
                    while ($readM = mysqli_fetch_array($readed)) {
                      ?>
                        <a class="dropdown-item" href="readMessages?id=" 
                          data-toggle="tooltip" data-placement="top" title="<?php echo $readM['messages']?>">
                          <span class="dropdown-item-avatar text-white">
                            <!-- <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle"> -->
                          </span>
                          <span class="dropdown-item-desc">
                            <span class="message-user">Names</span>
                            <span class="time messege-text">Subject</span>
                            <span class="time">2 Days Ago</span>
                          </span>
                        </a>
                      <?php
                    }
                  }
                ?>
              </div>
              <div class="dropdown-footer text-center">
                <a href="allMessages">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
            <!-- Modal for reading some contents -->
          <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link message-toggle nav-link-lg">
              <i data-feather="bell" class="bell"></i>
                <span class="badge headerBadge1">
                  <?php
                    $se = mysqli_query($conn,"SELECT *FROM adminnotification WHERE status = 'unread' ORDER BY id DESC") or die(mysqli_error($conn));
                    // $se1 = mysqli_query($conn,"SELECT *FROM adminnotification WHERE status = 'unread' ORDER BY id DESC") or die(mysqli_error($conn));
                    if ((mysqli_num_rows($se)>0)) {
                      $number = mysqli_num_rows($se);
                      //$number2 = mysqli_num_rows($se1);
                      //echo "<script>alert('".$number2."')</script>";
                      $total = $number;
                    echo $total;
                    }else{
                      echo "0";
                    }
                  ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <!-- <a href="#">Mark All As Read</a> -->
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <?php
                    $notif = mysqli_query($conn,"SELECT *FROM adminnotification WHERE status = 'unread' ORDER BY id DESC") or die(mysqli_error($conn));
                    // $notif2 = mysqli_query($conn,"SELECT *FROM carrentbookings WHERE status1 = 'unread' ORDER BY id DESC") or die(mysqli_error($conn));
                    if ((mysqli_num_rows($notif)>0)) {
                    while ($noti = mysqli_fetch_array($notif)) {
                      ?>
                      <a href="unreadNotification" class="dropdown-item dropdown-item-unread">
                        <span class="dropdown-item-icon bg-primary text-white">
                          <i class="fas fa-code"></i>
                        </span>
                        <span class="dropdown-item-desc"><b><?= $noti['content']?></b>
                          <span class="time">2 Min Ago</span>
                        </span>
                      </a> 
                      <?php
                    }
                  }
                ?>
                <?php
                  $notif1 = mysqli_query($conn,"SELECT *FROM adminnotification WHERE status='read' ORDER BY id DESC") or die(mysqli_error($conn));
                  // $notif3 = mysqli_query($conn,"SELECT *FROM carrentbookings WHERE status1='read' ORDER BY id DESC") or die(mysqli_error($conn));
                  // if ((mysqli_num_rows($notif)>0) || (mysqli_num_rows($notif3)>0)) {
                    while ($noti1=mysqli_fetch_array($notif1)) {
                      ?>
                        <a href="airportTaxSer" class="dropdown-item">
                          <span class="dropdown-item-icon bg-info text-white">
                            <i class="fa fa-user"></i>
                          </span>
                          <span class="dropdown-item-desc"><br><?= $noti1['content']?> <span class="time">10 Hours
                              Ago</span>
                          </span>
                        </a>
                      <?php
                      }?>

                
                <!-- <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                      class="fas
                        fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                    moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a>
                <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it! <span class="time">17 Hours Ago</span>
                  </span>
                </a>
                <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
                        fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Otika
                    template! <span class="time">Yesterday</span>
                  </span>
                </a> -->
              </div>
              <!-- <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div> -->
            </div>
          </li>
          <?php
            $m = mysqli_query($conn,"SELECT *FROM admin WHERE id = '{$_SESSION['spaceco']}'") or die(mysqli_error($conn));
            $pro = mysqli_fetch_array($m);
          ?>
          <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="assets/img/co1.png" style="height:100%;" class="user-img-radious-style"><span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              
              <div class="dropdown-title"><?php echo $pro['username'];?></div>
              <a href="profiles" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <!-- <a href="timeline.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i>
                Activities
              </a> -->
              <!-- <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i>
                Settings
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
  </nav>