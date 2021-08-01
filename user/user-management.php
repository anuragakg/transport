<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('../parts/head-tag.php'); ?>
  <title>User Entry</title>
  <style type="text/css">
    #errorProof {
      color: red;
    }
  </style>
</head>

<body>
  <div id="wrapper" class="w-bg">
    <?php include('../parts/side-menu.php'); ?>

    <div id="page-wrapper" class="gray-bg">
      <?php include('../parts/header.php'); ?>

      <div class="row wrapper border-bottom w-bg page-heading">
        <div class="col-lg-10">
          <h2>User Entry</h2>
          <ol class="breadcrumb">
            <li><a href="../auth/dashboard.php">Dashboard</a></li>
            <li><a href="../user/user-listing.php">User Listing</a></li>
            <li><a href="../user/user-management.php">User Entry</a></li>
          </ol>
        </div>
        <div class="col-lg-2"> </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
      <span class="error"><strong>* Mandatory fields marked as red</strong></span>
        <div class="row">
          <div class="col-lg-12">
            
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox">
              <div class="ibox-content">
                <form autocomplete="off"  id="formID"> 
                <fieldset class="p-sm form-horizontal">
                  <div class="form-group">

                      <label class="col-md-2 control-label">User Type</label>
                      <div class="col-md-4">
                        <select name="role" class="mdt_feild form-control dropdown " id="user-type" required>

                        </select>
                      </div>
                    </div>
                  <div class="form-group">
                    <label class="col-md-2 control-label">User Name</label>
                    <div class="col-md-4">
                      <input autocomplete="off" name="user_name" class="form-control mdt_feild " type="text" id="user_name" maxlength="150" required="">
                    </div>
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-4">
                      <input autocomplete="off" name="name" class="form-control mdt_feild txtOnly" type="text" id="name" maxlength="250" required>
                    </div>
                  </div>
                  <!--Group Change-->
                  <div class="form-group">
                    <label class="col-md-2 control-label">Middle Name</label>
                    <div class="col-md-4">
                      <input autocomplete="off" name="middle_name" class="form-control txtOnly" type="text" id="middle_name" maxlength="250">
                    </div>
                    <label class="col-md-2 control-label">Last Name</label>
                    <div class="col-md-4">
                      <input autocomplete="off" name="last_name" class="form-control  txtOnly" type="text" id="last_name" maxlength="250">
                    </div>
                  </div>
                  <!--Group Change-->
                  <div class="form-group">
                   
                    <label class="col-md-2 control-label">Email id</label>
                    <div class="col-md-4">
                      <input autocomplete="off" name="email" class="form-control mdt_feild " maxlength="191" type="email" id="email" required>
                    </div>
                     <label class="col-md-2 control-label">Mobile Number</label>
                    <div class="col-md-4">
                      <input autocomplete="off" name="mobile" class="form-control  numericOnly mdt_feild" type="text" id="mobile" maxlength="11" required>
                    </div>
                  </div>

                </fieldset>
                <!--Footer-->
                <div class="modal-footer clear_both">
                  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                  <a href="#" onclick="window.history.back(-1);" class="btn btn-white btn-sm">Cancel</a>
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

<script type="text/javascript" src="../assets/js/custom/user/user-management.js?v=<?php echo time(); ?>"></script>

</html>