<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('../parts/head-tag.php'); ?>
  <title>User Management - Update</title>
</head>

<body>
<div id="wrapper" class="w-bg">
  <?php include('../parts/side-menu.php'); ?>

  <div id="page-wrapper" class="gray-bg">
    <?php include('../parts/header.php'); ?>
    
    <div class="row wrapper border-bottom w-bg page-heading">
      <div class="col-lg-10">
        <h2>User Management - Update</h2>
        <ol class="breadcrumb">
          <li><a href="../auth/dashboard.php">Dashboard</a></li>
          <li><a href="../user/user-listing.php">User Listing</a></li>
          <li><a herf="#">User Management - Update</a></li>
        </ol>
      </div>
      <div class="col-lg-2"> </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-lg-12">
          <div class="ibox">
            <div class="ibox-content">
              <form autocomplete="off"  id="formID"> 
                <fieldset class="p-sm form-horizontal">
                  <div class="form-group">
                    <label class="col-md-2 control-label">User Type</label>
                    <div class="col-md-2">
                      <select name="role" class="mdt_feild form-control dropdown validate[required]"  id="user-type">
                      </select>
                    </div>
 
                  </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">User Name</label>
                    <div class="col-md-4">
                      <input 
 autocomplete="off" name='user_name' class="form-control mdt_feild " type="text" id="user_name" required="">
                    </div>
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-4">
                      <input 
 autocomplete="off" name="name" class="form-control mdt_feild" type="text" id="name" required>
                    </div>
                  </div>
                  <!--Group Change-->
                  <div class="form-group">
                    <label class="col-md-2 control-label">Middle Name</label>
                    <div class="col-md-4">
                      <input 
 autocomplete="off" name="middle_name" class="form-control" type="text" id="middle_name">
                    </div>
                    <label class="col-md-2 control-label">Last Name</label>
                    <div class="col-md-4">
                      <input 
 autocomplete="off" name="last_name" class="form-control  txtOnly" type="text" id="last_name">
                    </div>
                  </div>
                  <!--Group Change-->
                  <div class="form-group">
                    
                    <label class="col-md-2 control-label">Email id</label>
                    <div class="col-md-4">
                      <input autocomplete="off" name="email" class="form-control mdt_feild " type="email" id="email" required>
                    </div>
                    <label class="col-md-2 control-label">Mobile number</label>
                    <div class="col-md-4">
                      <input autocomplete="off" name="mobile" class="form-control" type="text" id="mobile" required="">
                    </div>
                  </div>
                  
                  
                  
                </fieldset>
                <!--Footer-->
              <div class="modal-footer clear_both">
                <button type="submit"  class="btn btn-primary btn-sm">Submit</button>
                <!--<a href="../auth/dashboard.php" class="btn btn-white btn-sm">Cancel</a>  --> 
				        <a href="javascript:window.history.back()" class="btn btn-white btn-sm">Cancel</a>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('../parts/js-files.php'); ?>

</body>
<script type="text/javascript" src="../assets/js/custom/user/user-edit.js?v=<?php echo time();?>"></script>
</html>
