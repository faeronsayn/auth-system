<?php 
include 'header.php';

global $db_con;

$db_con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

$table_exist = $db_con->query('SELECT 1 from as_user');

if ($table_exist) {  
?>
    <div class="panel panel-default" style="max-width: 500px; margin: 0 auto;">
    	<div class="panel-heading">Login Form</div>
        
        <div class="panel-body"> 
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="input-email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="input-email" placeholder="Email">
                    </div>
               	</div>
                
                <div class="form-group">
                    <label for="input-pass" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="input-pass" placeholder="Password">
                    </div>
                </div>
                
                <div class="form-group" style="text-align: center;">
                    <button id="login" type="button" class="btn btn-primary btn-lg">Login</button><div id="waiting"></div>
               	</div>
            </form>
		</div>
	</div>
    
    <div id="login-notify" class="login-notify"></div>

<?php

} else {

}

?>

<script type="text/javascript">

	$('#login').click(function() { 
	
		var password = $('#input-pass').val();
		var email = $('#input-email').val();
		
		$('#waiting').addClass('loading');
					
			jQuery.post("functions/login-user.php", {password:password, email:email}, function(data) {
				$('#waiting').removeClass('loading'); // Remove the loading indicator
				// console.log(data); // Log the data for debugging
				
				if (data == 'true') { 
				
					$('#notify-user').html('Login successful');
					$('#login-notify').removeClass('sad');
					$('#login-notify').addClass('happy');
				
				} else { 
				
					$('#notify-user').html('Login failed, please check email and password.');
					$('#login-notify').removeClass('happy');
					$('#login-notify').addClass('sad');
					
				
				}
											
			});
		
	
	});
	
</script>

<?php include 'footer.php'; ?>