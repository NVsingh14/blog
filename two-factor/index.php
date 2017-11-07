<!doctype html>
<html>
<head>
    <title>SoftAOX | Google Two Factor Authentication Sign In and Join Now using jQuery, PHP & MySQL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/app_style.css" charset="utf-8" />
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Google Two Factor Authentication Sign In and Join Now using jQuery, PHP & MySQL</h2>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-body">
                    <ul class="nav nav-tabs final-login">
                        <li class="active"><a data-toggle="tab" href="#sectionA">Sign In</a>
                        </li>
                        <li><a data-toggle="tab" href="#sectionB">Join us!</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="sectionA" class="tab-pane fade in active">
                            <div class="innter-form">
                                <form name="login-form" id="login-form" class="sa-innate-form">
                                    <input type="hidden" id="process_name" name="process_name" value="user_login" />
                                    <div class="errorMsg errorMsgReg"></div>
                                    <label>Email Address</label>
                                    <input type="email" name="login_email" class="form-control" id="login_email" required />
                                    <label>Password</label>
                                    <input type="password" name="login_password" class="form-control" id="login_password" required />
                                    <button type="button" class="btn btn-success btn-login-submit">Sign In</button>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div id="sectionB" class="tab-pane fade">
                            <div class="innter-form">
                                <form name="signup-form" id="signup-form" class="sa-innate-form">
                                    <input type="hidden" id="process_name" name="process_name" value="user_registor" />
                                    <div class="errorMsg errorMsgReg"></div>
                                    <label>Name</label>
                                    <input type="text" name="reg_name" class="form-control" id="reg_name" required />
                                    <label>Email Address</label>
                                    <input type="email" name="reg_email" class="form-control" id="reg_email" required />
                                    <label>Password</label>
                                    <input type="password" name="reg_password" class="form-control" id="reg_password" required />
                                    <button type="button" class="btn btn-primary btn-reg-submit">Join Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
			$(document).on('click', '.btn-reg-submit', function(ev) {
				if ($("#signup-form").valid() == true) {
					var data = $("#signup-form").serialize();
					$.post('user_validation.php', data, function(data, status) {
						console.log("submitnig result ====> Data: " + data + "\nStatus: " + status);
						if (data == "done") {
							window.location = 'conformation.php';
						} else {
							alert("not done");
						}
		
					});
				}
			});
		
			$(document).on('click', '.btn-login-submit', function(ev) {
				if ($("#login-form").valid() == true) {
					var data = $("#login-form").serialize();
					$.post('user_validation.php', data, function(data, status) {
						console.log("submitnig result ====> Data: " + data + "\nStatus: " + status);
						if (data == "done") {
							window.location = 'conformation.php';
						} else {
							alert("not done");
						}
		
					});
				}
			});
		});
    </script>
</body>
</html>