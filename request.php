<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>

        <div class="container" style="margin-top:3%">
            <div class="row justify-content-center">

                <div class="col-md-6 col-md-offset-3">
                	<h5 style="text-align:center">User Response Form</h5>
                	<br>
                	<?php
                	if(isset($_SESSION['status']) && $_SESSION['status'] != ""){
                		?>

                		<div class="alert alert-warning alert-dismissible fade show" role="alert">
                			<?php echo $_SESSION['status']?>
                			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                				<span aria-hidden="true">&times;</span>
                			</button>


                		</div>

                	<?php
                		unset($_SESSION['status']);
                	}
                	?>
                    <form action="save.php" method="POST">
                        <div class="form-group">
                            <textarea cols="10" rows="6" name="message" placeholder="Please type your message!" class="form-control" id="txtarea"></textarea>
                        </div>
                        <div class="form-group" style="text-align: center">
                            <button type="submit" name="submitdata" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-default" onclick="return clearit();">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     <!-- jQuery library -->
    <script src="jquery.min.js" type="text/javascript"></script>
    <script src="bootstrap.min.js" type="text/javascript"></script>
    <script src="popper.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    	function clearit(){
    		$("textarea").val('');
    	}
    </script>
</body>

</html>
