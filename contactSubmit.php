<?php
	include('class.phpmailer.php');
	include 'connection.php';
	
	$link = 'http://www.sbassociates.co.za';
	
	$email = $_REQUEST['email'];
	$name = $_REQUEST['name'];
	
	$points = 0;
	
	$result1 = mysqli_query($con, "SELECT * FROM settings WHERE item LIKE 'title' AND type LIKE 'emailContent'");
	$res1 = mysqli_fetch_array($result1);
	$title = $res1['value'];
	
	$result1 = mysqli_query($con, "SELECT * FROM settings WHERE item LIKE 'description' AND type LIKE 'emailContent'");
	$res1 = mysqli_fetch_array($result1);
	$description = $res1['value'];
	
	
	$result1 = mysqli_query($con, "SELECT * FROM settings WHERE type LIKE 'order' ORDER BY item ASC");
	while($res1 = mysqli_fetch_array($result1))
	{			
		$result .= '<h2>'.$res1['value'].'</h2>';
		
		$result .= '<table cellpadding=0 cellspacing=0 width=100%>';						
			$result2 = mysqli_query($con, "SELECT * FROM questions WHERE category LIKE '%".$res1['value']."%' AND active LIKE 'yes'");
			while($res2 = mysqli_fetch_array($result2))
			{
				$result .= '<tr>';
					$result .= '<td style="border: 1px solid #e5e5e5; font-size: 14px; padding: 5px;">'.$res2['question'].'</td>';
					$result .= '<td bgcolor=#e5e5e5 style="border: 1px solid #fff; width:60px; padding: 10px; font-size: 14px; border: 1px solid #e5e5e5; padding: 5px;" width="30%"><b>';
						$result .= $_POST[$res2['id']];
					$result .= '</b></td>';
				$result .= '</tr>';
				
				if($_POST[$res2['id']] == $res2['answer1'])
				{
					$points = $points + $res2['answer1Weight'];
				}
				else if($_POST[$res2['id']] == $res2['answer2'])
				{
					$points = $points + $res2['answer2Weight'];
				}
				else if($_POST[$res2['id']] == $res2['answer3'])
				{
					$points = $points + $res2['answer3Weight'];
				}
				else if($_POST[$res2['id']] == $res2['answer4'])
				{
					$points = $points + $res2['answer4Weight'];
				}
				else if($_POST[$res2['id']] == $res2['answer5'])
				{
					$points = $points + $res2['answer5Weight'];
				}
			}
			
			$result .= '<tr><td></td><td><br/></td></tr>';
		$result .= '</table>';
	}
	
	$result1 = mysqli_query($con, "SELECT * FROM settings WHERE type LIKE 'result' ORDER BY item ASC");
	while($res1 = mysqli_fetch_array($result1))
	{
		if($points <= $res1['item'])
		{	
			$result2 = mysqli_query($con, "SELECT * FROM settings WHERE item LIKE '%".$res1['value']."%' AND type LIKE 'resultColour'");
			$res2 = mysqli_fetch_array($result2);
			
			$outcome = $res1['value'];
			$outcomeColour = $res2['value'];
		}
	}
	
	$result .= '<h2 style="color: #A38529;">Your Results</h2>';
	
	$result .= '<table cellpadding=0 cellspacing=0 width=100%>';
		$result .= '<tr>';
			$result .= '<td style="border: 1px solid '.$outcomeColour.'; font-size: 18px; color: '.$outcomeColour.'; padding: 5px;"><b>'.$outcome.'</b></td>';
			$result .= '<td bgcolor='.$outcomeColour.' style="width:60px; padding: 10px; font-size: 18px; color: #fff; border: 1px solid '.$outcomeColour.'; padding: 5px;" width="30%"><b>'.$points.'%</b></td>';
		$result .= '</tr>';
	$result .= '</table>';
	
	if($email != '')
	{						
		$email = str_replace("'", "", $email);
		$email = str_replace('"', "", $email);
		$name = str_replace("'", "", $name);
		$name = str_replace('"', "", $name);
		
		include('contactEmail.php');
	
		$mail = new PHPMailer(); // send to DFM
		$mail->isHTML(true);  
		$mail->From      = 'zane@theframework.co.za';
		$mail->FromName  = 'SB Associates';
		$mail->Subject   = 'Your Financial Stress Test';
		$mail->Body      = $body_message;
		$mail->AddAddress( 'john@dragonflymarketing.co.za' );
		$mail->AddEmbeddedImage('logo.jpg', 'img1', 'logo.jpg');
		
		//$mail->Send();	
	
		$mail = new PHPMailer(); // send to company
		$mail->isHTML(true);  
		$mail->From      = $email;
		$mail->FromName  = $name;
		$mail->Subject   = 'Your Financial Stress Test';
		$mail->Body      = $body_message;
		$mail->AddAddress( 'zane@theframework.co.za' );
		$mail->AddEmbeddedImage('logo.jpg', 'img1', 'logo.jpg');
		
		$mail->Send();	
	
		$mail = new PHPMailer(); // send to person
		$mail->isHTML(true);  
		$mail->From      = 'zane@theframework.co.za';
		$mail->FromName  = 'SB Associates';
		$mail->Subject   = 'Your Financial Stress Test';
		$mail->Body      = $body_message;
		$mail->AddAddress( $email );
		$mail->AddEmbeddedImage('logo.jpg', 'img1', 'logo.jpg');
		
		$mail->Send();	
	}
	
	header('Location: complete.php');
?>