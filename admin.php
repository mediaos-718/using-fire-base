<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <link href="plugin/css/bootstrap.min.css" rel="stylesheet">

  <link href="plugin/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="plugin/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="plugin/css/custom.css" rel="stylesheet">
  <link href="plugin/css/icheck/flat/green.css" rel="stylesheet">

  <link href="plugin/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="plugin/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="plugin/js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="plugin/js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="plugin/js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

  
    
</head>

<body style="font-size:15px !important">

        <div class="row" style="margin:10px">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Error Messages Report</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
           
                    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align:center; width:10%">ID</th>
                                <th style="text-align:center; width:50%">Message</th>
                                <th style="text-align:center; width:20%">Reported Time</th>
                                <th style="text-align:center; width:30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include('includes/dbconfig.php');
                                $ref = 'report_messages/';
                                $fetchdata = $database->getReference($ref)->getValue();
                                $i=0;
                                $maxchar = 200;
                                foreach($fetchdata as $key => $row){
                                        $i++;
                                        $time = strtotime($row["reported_at"]);
                                    ?>

                                    <tr>
                                        <td style="text-align:center;width:10%"><?php echo $i; ?></td>
                                        <td style="width:50%"><?php 
                                            if(strlen($row["message"]) > $maxchar){
                                                echo substr($row["message"], 0, $maxchar) . "...";
                                            }else{
                                                echo $row["message"];
                                            }

                                        ?></td>
                                        <td style="text-align:center;width:20%"><?php  echo humanTiming($time) . ' ago' ?></td>
                                        <td style="text-align:center;width:20%">
                                            <?php
                                             echo "<a href='#' class='btn btn-primary' onclick='ViewMessage(\"".$row["message"]."\")'>View</a></td>";
                                            ?>
                                    </tr>
                                <?php
                                }
                            ?>
                        </tbody>
                    </table>
               
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="myModal">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Error Report Message</h4>
                      </div>
                      <div class="modal-body" id="body">
                        <h4>Text in a modal</h4>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        
                      </div>

                    </div>
                  </div>
                </div>

                <script src="plugin/js/jquery.min.js"></script>
                <script src="plugin/js/bootstrap.min.js"></script>
     <!-- jQuery library -->
    <script src="plugin/js/datatables/jquery.dataTables.min.js"></script>
    <script src="plugin/js/datatables/dataTables.bootstrap.js"></script>
    <script src="plugin/js/datatables/dataTables.buttons.min.js"></script>
    <script src="plugin/js/datatables/buttons.bootstrap.min.js"></script>
    <script src="plugin/js/datatables/jszip.min.js"></script>
    <script src="plugin/js/datatables/pdfmake.min.js"></script>
    <script src="plugin/js/datatables/vfs_fonts.js"></script>
    <script src="plugin/js/datatables/buttons.html5.min.js"></script>
    <script src="plugin/js/datatables/buttons.print.min.js"></script>
    <script src="plugin/js/datatables/dataTables.fixedHeader.min.js"></script>
    <script src="plugin/js/datatables/dataTables.keyTable.min.js"></script>
    <script src="plugin/js/datatables/dataTables.responsive.min.js"></script>
    <script src="plugin/js/datatables/responsive.bootstrap.min.js"></script>
    <script src="plugin/js/datatables/dataTables.scroller.min.js"></script>
    <script type="text/javascript">
            

        $('#myTable').DataTable();
        function ViewMessage(message){
            //$(obj).parent().parent().find("td:eq(1)").text();
            var msg = message;
            $("#body").html("");
            $("#body").html("<p>" +msg+ "</p>");
            $("#myModal").modal("show");
        }
    </script>

    <?php
        function humanTiming ($time)
        {

            $time = time() - $time; // to get the time since that moment
            $time = ($time<1)? 1 : $time;
            $tokens = array (
                31536000 => 'year',
                2592000 => 'month',
                604800 => 'week',
                86400 => 'day',
                3600 => 'hour',
                60 => 'minute',
                1 => 'second'
            );

            foreach ($tokens as $unit => $text) {
                if ($time < $unit) continue;
                $numberOfUnits = floor($time / $unit);
                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
            }

        }

    ?>
</body>

</html>
