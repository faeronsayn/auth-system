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



} else {

}


?>


    <div class="panel panel-success" style="max-width: 500px; margin: 0 auto; padding: 0 25px;">
    	<div class="panel-heading">Registration Form</div>
        
        <div class="panel-body">
            <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="input-name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="input-name" placeholder="Name">
                        </div>
                    </div>
        
                    <div class="form-group">            
                        <label for="input-email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="input-email" placeholder="Email">
                        </div>
                    </div>
                    
                    <hr />
                    <div class="form-group">        
                        <label for="input-pass" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="input-pass" placeholder="Password">
                        </div>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="input-pass-confirm" placeholder="Confirm password">
                        </div>
                    </div>
                    
                    <hr />
                    
                    <div class="form-group">
                        <div class="radio">
                          <label>
                            <input type="radio" name="gender" id="male" value="Male">
                            Male
                          </label>
                        </div>
                        
                        <div class="radio">
                          <label>
                            <input type="radio" name="gender" id="female" value="Female">
                            Female
                          </label>
                        </div>
                        
                        <div class="radio">
                          <label>
                            <input type="radio" name="gender" id="unspecified" value="" checked>
                            Unspecified
                          </label>
                        </div>
                    </div>
                    
                    <div class="form-group">    		
                        <button id="register" type="button" class="btn btn-primary">Register</button><div id="waiting"></div>
                    </div>
                </div>
            </form>
		</div>
	</div>

<?php include 'footer.php'; ?>

<script type="text/javascript">

	$('#register').click(function() { 
	
		var gender = $('input:checked').val();
		var password = $('#input-pass').val();
		var password_confirm = $('#input-pass-confirm').val();
		var name = $('#input-name').val();
		var email = $('#input-email').val();
		
		$('#waiting').addClass('loading');
		
		if (password != password_confirm) {
			password_confirm = $('#input-pass-confirm').parent().addClass('has-error');
			jQuery('#notify-user').html('Passwords don\'t match :(');				
		} else {			
			jQuery.post("functions/register-user.php", {gender:gender, password:password, name:name, email:email}, function(data) {
				//this is your response data from serv
				$('#waiting').removeClass('loading');
				console.log(data);
				jQuery('#notify-user').html(data);								
			});
		
		}
	
	});

</script>


<?php include 'footer.php'; ?>