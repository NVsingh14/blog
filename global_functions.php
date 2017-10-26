
function MailObject($TO=array(), $FROM="", $CC=array(), $BCC=array(), $SUBJECT="", $BODY="", $ATTACHMENTS = array())
{
    //include("../library/class.phpmailernew.php");
    
    $mail = new phpmailer;
	$mail->IsSMTP();  // telling the class to use SMTP
    
        
    if($_SERVER['HTTP_HOST'] == "idsweb")
    {   
        $mail->IsSMTP();  // telling the class to use SMTP<br>
   	    //$mail->Host     = $_SESSION['SMTP']; // SMTP server
      	//$mail->Username = $_SESSION['INFO_EMAIL_USERNAME'];
        //$mail->Password = $_SESSION['INFO_EMAIL_PASSWORD'];
        //$mail->Port = 25;
    	//$mail->SMTPAuth=true;
        
        $mail->Host = "mail.iws.in";
        $mail->Username = "pranab@iws.in";
        $mail->Password = "Newpass@789";
        $mail->Port = 25;
        $mail->SMTPAuth = true; 
    }
    else
    { 
        
    }    
    
    if ( trim($FROM) != "" )
    {
        $mail->From = FROM_EMAIL;// "pranab@iws.in"; //$FROM;
    }
    else
    {
        $mail->From = FROM_EMAIL; //"pranab@iws.in";    
    }
    
    $mail->FromName = "The Blue Kite";
    $mail->ContentType = "text/html";
    $mail->Subject  = $SUBJECT;
    
    
    
    if(trim($TO)!="")
    {
        
        $to_array = explode(",", $TO);
        foreach($to_array as $eml)
        {
            $eml = trim($eml);
            $mail->AddAddress($eml);
        }       
        
    }
    
    
    
    if(trim($CC)!="")
    {
        $cc_array = explode(",", $CC);
        foreach($cc_array as $eml)
        {
            $eml = trim($eml);
            $mail->AddCC($eml);
        }      
        
    }
    
    
    if(trim($BCC)!="")
    {
        $bcc_array = explode(",", $BCC);
        foreach($bcc_array as $eml)
        {
            $eml = trim($eml);
            $mail->AddBCC($eml);
        }   
        
    } 
    
    $mail->Body = $BODY;
    
      ///echo "========";print_r($ATTACHMENTS);
    if(count($ATTACHMENTS) > intval(0))
    {
        //$ATT_array = explode(",", $ATTACHMENTS);
        foreach($ATTACHMENTS as $aCHUNK)
        {
            $aCHUNK = trim($aCHUNK);
            $mail->AddAttachment($aCHUNK);
        }   
        
    }
    
    if($mail->send())
    {
        $success = 1;
    }
    else
    {
        $success = 0;
    }
    
    $mail->ClearAddresses();
    
    return $success;
    
    
    
} 
