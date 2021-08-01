<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('../parts/head-tag.php'); ?>
  <title>User Profile</title>
</head>

<body>
<div id="wrapper" class="w-bg">
  <?php include('../parts/side-menu.php'); ?>

  <div id="page-wrapper" class="gray-bg">
    <?php include('../parts/header.php'); ?>
    
    <div class="row wrapper border-bottom w-bg page-heading">
      <div class="col-lg-10">
        <h2>User Profile</h2>
        <ol class="breadcrumb">
          <li><a href="../auth/dashboard.php">Dashboard</a></li>
          <li><a herf="#">User Profile</a></li>
        </ol>
      </div>
      <div class="col-lg-2"> </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
      <div class="row">
        <div class="col-lg-12">
          <div class="ibox">
            <div class="ibox-content">
              <form 
 autocomplete="off"  id="formID">
                <fieldset class="p-sm form-horizontal">
                  <div class="form-group">
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-4">
                      <input 
 autocomplete="off" class="form-control mdt_feild" type="text" id="name">
                    </div>
                    <label class="col-md-2 control-label">Middle Name</label>
                    <div class="col-md-4">
                      <input 
 autocomplete="off" class="form-control" type="text" id="middle_name">
                    </div>
                  </div>
                  <!--Group Change-->
                  <div class="form-group">
                    <label class="col-md-2 control-label">Last Name</label>
                    <div class="col-md-4">
                      <input 
 autocomplete="off" class="form-control  txtOnly" type="text" id="last_name">
                    </div>
                    <label class="col-md-2 control-label">Email id</label>
                    <div class="col-md-4">
                      <input 
 autocomplete="off" class="form-control mdt_feild validate[required,custom[email]]" type="text" id="email">
                    </div>
                  </div>
                  <!--Group Change-->
                  <div class="form-group">
                    <label class="col-md-2 control-label">Mobile Number</label>
                    <div class="col-md-4">
                      <input 
 autocomplete="off" class="form-control mdt_feild validate[required,minSize[10], maxSize[10]] numericOnly" type="text" id="mobile_no" maxlength="10">
                    </div>


                  </div>

                 
                </fieldset>


            

               

                <!--Footer-->
              <div class="modal-footer clear_both">
                <button type="submit"  class="btn btn-primary btn-sm">Submit</button>
                <a href="../auth/dashboard.php" class="btn btn-white btn-sm">Cancel</a>   
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

<script type="text/javascript" src="../assets/js/custom/user/user-profile.js?v=<?php echo time(); ?>"></script>
<script>
    $(document).ready(function(){
      $('.data-calendar .input-group.date').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
       });
    });
</script>
</body>
</html>
