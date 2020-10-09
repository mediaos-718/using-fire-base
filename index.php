<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="plugin/css/bootstrap.min.css" rel="stylesheet">

  <link href="plugin/fonts/css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="plugin/css/custom.css" rel="stylesheet">
  <!-- editor -->
  <link href="plugin/http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
  <!-- select2 -->
  <!-- switchery -->

  <script src="plugin/js/jquery.min.js"></script>
</head>

<body class="nav-md">

  <div class="container body">

    <div class="main_container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12" style="margin-top:20%">
              <?php
                          if(isset($_SESSION['status']) && $_SESSION['status'] == 0){
                            ?>

                            <div class="alert alert-success alert-dismissible fade in" id="myalert" role="alert">
                              
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                              </button>
                              <strong>Great!</strong>
                              <?php echo $_SESSION['status']?>

                            </div>

                          <?php
                            
                          }else if(isset($_SESSION['status']) && $_SESSION['status'] == 1){
                            ?>

                              <div class="alert alert-danger alert-dismissible fade in" id="myalert" role="alert">
                              
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                              </button>
                              <strong>Sorry!</strong>
                              <?php echo $_SESSION['status']?>

                            </div>


                            <?php
                          }

                          unset($_SESSION['status']);
                          ?>
              <div class="x_panel">
                <div class="x_title">
                  <h2>Generate Error Report</h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="text-center">
                    
                          <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Error Report</button>
                        </div>


                  </form>

                </div>
              </div>
            </div>
          </div>
    </div>

   

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Error Report</h4>
          </div>
          <div class="modal-body">
            <form id="demo-form2" action="save.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="message">Message <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea cols="6" rows="5" name="message" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-default" data-dismiss="modal" id="btnCancel">Cancel</button>
                        <button type="submit" name="submitdata" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
          </div>
          
        </div>
      </div>
    </div>
    

  </div>

  

  <script src="plugin/js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  
  <!-- textarea resize -->
  <script src="plugin/js/textarea/autosize.min.js"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="plugin/js/autocomplete/countries.js"></script>
  <script src="plugin/js/autocomplete/jquery.autocomplete.js"></script>
  <script type="text/javascript">

    setTimeout(function() { 
      if($("#myalert").length){      

        $("#myalert").fadeOut(); 
      }
    }, 5000);
  </script>
</body>

</html>
