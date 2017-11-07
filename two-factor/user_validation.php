<?php
include("conn.php");

require_once 'googleLib/GoogleAuthenticator.php';
$gauth      = new GoogleAuthenticator();
$secret_key = $gauth->createSecret();

$process_name = $_POST['process_name'];

if ($process_name == "user_registor") {
    $reg_name     = $_POST['reg_name'];
    $reg_email    = $_POST['reg_email'];
    $reg_password = md5($_POST['reg_password']);
    
    $chk_user = mysql_query("select * from users_info where email='$reg_email'") or die(mysql_error());
    if (mysql_num_rows($chk_user) == 0) {
        $query = "insert into users_info(user_name, email, password, google_authentication) values('$reg_name', '$reg_email', '$reg_password', '$secret_key' )";
        $result = mysql_query($query) or die(mysql_error());
        $_SESSION['id'] = mysql_insert_id();
        echo "done";
    } else {
        echo "The email address you have entered is already registered..";
    }
}

if ($process_name == "user_login") {
    $login_email    = $_POST['login_email'];
    $login_password = md5($_POST['login_password']);
    
    $user_result = mysql_query("select * from users_info where email='$login_email' and password='$login_password'") or die(mysql_error());
    if (mysql_num_rows($user_result) == 1) {
        $user_row            = mysql_fetch_array($user_result);
        $_SESSION['id'] = $user_row['id'];
        echo "done";
    } else {
        echo "Incorrect signin information. Please check your credentials and try again.";
    }
}

if ($process_name == "verify_code") {
    $scan_code = $_POST['scan_code'];
    $id   = $_SESSION['id'];
    
    $user_result = mysql_query("select * from users_info where id='$id'") or die(mysql_error());
    $user_row   = mysql_fetch_array($user_result);
    $secret_key = $user_row['google_authentication'];
    
    $checkResult = $gauth->verifyCode($secret_key, $scan_code, 2); // 2 = 2*30sec clock tolerance
    
    if ($checkResult) {
        $_SESSION['googleVerifyCode'] = $scan_code;
        echo "done";
    } else {
        echo 'Note : Code not matched.';
    }
}
?>