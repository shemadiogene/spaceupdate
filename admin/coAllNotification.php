<?php
    require_once("includes/db.php");
    
?>
<!DOCTYPE html>
<html lang="en">


<!-- email-read.html  21 Nov 2019 03:51:00 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin | Spaceco</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
      <?php require_once("includes/headerCompany.php")?>
      <?php require_once("includes/left_nav2.php")?>
    <div class="main-wrapper main-wrapper-1">
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                  <div class="body">
                    <div id="mail-nav">
                      <ul class="" id="mail-folders">
                        <li>
                          <a href="" title="Inbox">Contact Messages &nbsp;
                              <?php
                                $fi = mysqli_query($conn,"SELECT *FROM conotification WHERE companyId='{$_SESSION['spacecompanies']}'") or die(mysqli_error($conn));
                                if (mysqli_num_rows($fi)>0) {
                                    $num = mysqli_num_rows($fi);
                                    echo "(<b>".$num."</b>)";
                                }else{
                                    echo "(<b>0</b>)";
                                }
                              ?>
                          </a>
                        </li>
                        <!-- <li>
                          <a href="javascript:;" title="Draft">Draft</a>
                        </li>
                        <li>
                          <a href="javascript:;" title="Bin">Bin</a>
                        </li>
                        <li>
                          <a href="javascript:;" title="Important">Important</a>
                        </li>
                        <li>
                          <a href="javascript:;" title="Starred">Starred</a>
                        </li> -->
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="card">
                    <div class="boxs mail_listing">
                        <div class="inbox-center table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        N<sup><u>o</u></sup>
                                    </th>
                                    <th>Names</th>
                                    <th>Date</th>
                                    <!-- <th>Date</th> -->
                                    <th class="hidden-xs" colspan="2">
                                    <div class="pull-right">
                                        <div class="email-btn-group m-l-15">
                                        <!-- <a href="#" class="col-dark-gray waves-effect m-r-20" title="previous"
                                            data-toggle="tooltip">
                                            <i class="material-icons">navigate_before</i>
                                        </a>
                                        <a href="#" class="col-dark-gray waves-effect m-r-20" title="next"
                                            data-toggle="tooltip">
                                            <i class="material-icons">navigate_next</i>
                                        </a> -->
                                        </div>
                                    </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $q = mysqli_query($conn,"SELECT *FROM conotification WHERE companyId='{$_SESSION['spacecompanies']}' AND status='read' ORDER BY id DESC limit 20") or die(mysqli_error($conn));
                                    if (mysqli_num_rows($q)>0) {
                                        $count = 1;
                                        while ($fe = mysqli_fetch_array($q)) {
                                           ?>
                                            <tr>
                                                <td class="tbl-checkbox">
                                                    <?= $count;?>
                                                </td>
                                                <!-- <td class="hidden-xs">
                                                <i class="material-icons text-warning">star</i>
                                                </td> -->
                                                <td class="hidden-xs"><a href="coUpdateStatus?id=<?= $fe['id']?>"><?= substr($fe['content'],0,15)."....";?></a></td>
                                                <td class="max-texts">
                                                <a href="coUpdateStatus?id=<?= $fe['id']?>"><?= $fe['notTime']?></a>
                                                </td>
                                                <!-- <td class="hidden-xs">
                                                <i class="material-icons">attach_file</i>
                                                </td> -->
                                                <!-- <td class="text-right"> May 10 </td> -->
                                            </tr>
                                           <?php
                                        $count++;}
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                        <div class="row">
                        <div class="col-sm-7 ">
                            <!-- <p class="p-15">Showing 1 - 15 of 200</p> -->
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="">&copy SpaceBooking Ltd | Rwanda</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/ckeditor/ckeditor.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/ckeditor.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
<script>
    $(function(){
        $("#notificationNav").addClass('active');
        $("#notificationNav2").addClass('active');
    });
</script>

<!-- email-read.html  21 Nov 2019 03:51:00 GMT -->
</html>