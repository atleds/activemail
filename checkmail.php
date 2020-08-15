<?php
set_time_limit(0);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=Windows-1251">
        <title>Active Email Checker</title>
        
    </head>
    <body>
		<?php
		
		if($_POST['email']!==''){
			include_once 'class.avEmail.php';

			$email = $_POST['email'];
	
			$vmail = new verifyEmail();
			$vmail->setStreamTimeoutWait(20);
			$vmail->Debug= TRUE;
			$vmail->Debugoutput= 'html';
	
			$vmail->setEmailFrom('root@$_SERVER["REMOTE_ADDR"]');
	
			if ($vmail->check($email)) {
				echo 'email &lt;' . $email . '&gt; exist!';
			} elseif (verifyEmail::validate($email)) {
				echo 'email &lt;' . $email . '&gt; valid, but not exist!';
			} else {
				echo 'email &lt;' . $email . '&gt; not valid and not exist!';
			}
		}
		?>    
    <form action="" method="post">
    <input type="text" name="email" />
    <input type="submit" value="submit"/>
    </form>

    </body>
</html>
