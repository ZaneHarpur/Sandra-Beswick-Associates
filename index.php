 <head>
 
	<?php
		include 'connection.php';
		
		if($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			$id = $_REQUEST["id"];
			$settingId = $_REQUEST["settingId"];
			$settingDisable = $_REQUEST["settingDisable"];
			$category = $_REQUEST["category"];
			$type = $_REQUEST["type"];
			$item = $_REQUEST["item"];
			$value = $_REQUEST["value"];
			$disable = $_REQUEST["disable"];
			$newCategory = $_REQUEST["newCategory"];
			$question = $_REQUEST["question"];
			$answer1 = $_REQUEST["answer1"];
			$answer2 = $_REQUEST["answer2"];
			$answer3 = $_REQUEST["answer3"];
			$answer4 = $_REQUEST["answer4"];
			$answer5 = $_REQUEST["answer5"];
			$answer1Weight = $_REQUEST["answer1Weight"];
			$answer2Weight = $_REQUEST["answer2Weight"];
			$answer3Weight = $_REQUEST["answer3Weight"];
			$answer4Weight = $_REQUEST["answer4Weight"];
			$answer5Weight = $_REQUEST["answer5Weight"];
			
			$category = mysqli_real_escape_string($con, $category);
			$settingId = mysqli_real_escape_string($con, $settingId);
			$settingDisable = mysqli_real_escape_string($con, $settingDisable);
			$type = mysqli_real_escape_string($con, $type);
			$item = mysqli_real_escape_string($con, $item);
			$value = mysqli_real_escape_string($con, $value);
			$newCategory = mysqli_real_escape_string($con, $newCategory);
			$question = mysqli_real_escape_string($con, $question);
			$answer1 = mysqli_real_escape_string($con, $answer1);
			$answer2 = mysqli_real_escape_string($con, $answer2);
			$answer3 = mysqli_real_escape_string($con, $answer3);
			$answer4 = mysqli_real_escape_string($con, $answer4);
			$answer5 = mysqli_real_escape_string($con, $answer5);
			$answer1Weight = mysqli_real_escape_string($con, $answer1Weight);
			$answer2Weight = mysqli_real_escape_string($con, $answer2Weight);
			$answer3Weight = mysqli_real_escape_string($con, $answer3Weight);
			$answer4Weight = mysqli_real_escape_string($con, $answer4Weight);
			$answer5Weight = mysqli_real_escape_string($con, $answer5Weight);
			
			if($category == 'new' && $newCategory != '')
			{
				$category = $newCategory;
			}
			
			if($id == '' && $question != '' && $category != '' && $answer1 != '' && $answer2 != '' && $answer1Weight != '' && $answer2Weight != '')
			{
				$result = mysqli_query($con, "INSERT INTO questions VALUES ('', '$question', '$answer1', '$answer2', '$answer3', '$answer4', '$answer5', '$answer1Weight', '$answer2Weight', '$answer3Weight', '$answer4Weight', '$answer5Weight', '$category', 'yes', '".date('U')."')");
				$error = '<span class="error">Question successfully added.</span>';
			}
			else if($type != '' && $item != '' && $value != '' && $settingId == '')
			{
				$result = mysqli_query($con, "INSERT INTO settings VALUES ('', '$type', '$item', '$value', '".date('U')."')");
				$error = '<span class="error">Setting successfully added.</span>';
			}
			else if($id > 0 && $disable == 'disable')
			{
				$result = mysqli_query($con, "UPDATE questions SET active='no' WHERE id LIKE '".$id."'");
				$error = '<span class="error">Question successfully disabled.</span>';
			}
			else if($id > 0 && $disable == 'enable')
			{
				$result = mysqli_query($con, "UPDATE questions SET active='yes' WHERE id LIKE '".$id."'");
				$error = '<span class="error">Question successfully enabled.</span>';
			}
			else if($settingId > 0 && $settingDisable == 'settingDelete')
			{
				$result = mysqli_query($con, "DELETE FROM settings WHERE id LIKE '".$settingId."'");
				$error = '<span class="error">Setting successfully deleted.</span>';
			}
			else
			{
				$error = '<span class="error">There was an error updating the questionnaire. Make sure that you have filled in all the required information.</span>';
			}
		}
	?>
	
	<link rel="stylesheet" href="http://www.sbassociates.co.za/wp-content/themes/salient/style.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
	
</head>

<body>
	<?php					
		$result1 = mysqli_query($con, "SELECT * FROM settings WHERE item LIKE 'title' AND type LIKE 'content'");
		$res1 = mysqli_fetch_array($result1);
		$title = $res1['value'];
		
		$result1 = mysqli_query($con, "SELECT * FROM settings WHERE item LIKE 'description' AND type LIKE 'content'");
		$res1 = mysqli_fetch_array($result1);
		$description = $res1['value'];
		
		$result1 = mysqli_query($con, "SELECT * FROM settings WHERE item LIKE 'button' AND type LIKE 'content'");
		$res1 = mysqli_fetch_array($result1);
		$button = $res1['value'];
		
		$result1 = mysqli_query($con, "SELECT * FROM settings WHERE item LIKE 'complete' AND type LIKE 'content'");
		$res1 = mysqli_fetch_array($result1);
		$complete = $res1['value'];
		
		$result1 = mysqli_query($con, "SELECT * FROM settings WHERE item LIKE 'completeDescription' AND type LIKE 'content'");
		$res1 = mysqli_fetch_array($result1);
		$completeDescription = $res1['value'];
	?>

	<section>
		<div class="toolkitIntro">
			<h1 style="text-align: center; color: #A38529;"><?php echo $title; ?></h1>
			<p style="text-align: center;"><?php echo $description; ?></p>
			<a class="nectar-button regular-button accent-color startButton" onclick="nextToolkit();"><?php echo $button; ?></a>
		</div>
		
		<div class="toolkitQuestions">
			<form action="contactSubmit.php" method="post" id="toolkitForm">
				<div class="flexBox">
					<?php		
						$questionSet = 0;
						
						$result1 = mysqli_query($con, "SELECT * FROM settings WHERE type LIKE 'order' ORDER BY item ASC");
						while($res1 = mysqli_fetch_array($result1))
						{	
							$questionSet = $questionSet + 1;
							
							echo '<div class="row greyBackground questionSet" id="questionSet'.$questionSet.'">';
								echo '<h2>'.$res1['value'].'</h2>';
								
								echo '<table cellpadding=0 cellspacing=0 class="answerTable">';						
									$result2 = mysqli_query($con, "SELECT * FROM questions WHERE category LIKE '%".$res1['value']."%' AND active LIKE 'yes'");
									while($res2 = mysqli_fetch_array($result2))
									{
										echo '<tr>';
											echo '<td>'.$res2['question'].'</td>';
											echo '<td>';
												echo '<select name="'.$res2['id'].'" class="questionAnswer">';
													echo '<option value="">Answer</option>';
													
													if($res2['answer1'] != '')
													{
														echo '<option value="'.$res2['answer1'].'">'.$res2['answer1'].'</option>';
													}
													if($res2['answer2'] != '')
													{
														echo '<option value="'.$res2['answer2'].'">'.$res2['answer2'].'</option>';
													}
													if($res2['answer3'] != '')
													{
														echo '<option value="'.$res2['answer3'].'">'.$res2['answer3'].'</option>';
													}
													if($res2['answer4'] != '')
													{
														echo '<option value="'.$res2['answer4'].'">'.$res2['answer4'].'</option>';
													}
													if($res2['answer5'] != '')
													{
														echo '<option value="'.$res2['answer5'].'">'.$res2['answer5'].'</option>';
													}
												echo '</select>';
											echo '</td>';
										echo '</tr>';
									}
								echo '</table>';
								
								echo '<a class="nectar-button regular-button accent-color startButton" onclick="nextToolkit();">Next</a>';
								echo '<a class="backButton" onclick="backToolkit();">Back</a>';
								
							echo '</div>';
						}
						
						$questionSet = $questionSet + 1;
					?>
					<div class="row greyBackground questionSet" id="questionSet<?php echo $questionSet; ?>">	
					
						<h1 style="text-align: center; color: #A38529;"><?php echo $complete; ?></h1>
						<p style="text-align: center;" id="completeDescription"><?php echo $completeDescription; ?></p>
			
						<div class="column" style="width: 45%; margin-bottom: 30px;">
							<label>Name</label>
							<input type="text" name="name" style="width: 90%;">
						</div>									
						<div class="column" style="width: 45%; margin-bottom: 30px;">
							<label>Email</label>
							<input type="text" name="email" style="width: 90%;">
						</div>			
						
						<a class="nectar-button regular-button accent-color startButton" onclick="completeToolkit();">Done</a>
						<a class="backButton" onclick="backToolkit();">Back</a>
					</div>
				</div>
			</form>
		</div>
	</section>
	
	<div class="progress">	
		<?php
			$count = 0;
			
			$result2 = mysqli_query($con, "SELECT * FROM questions WHERE active LIKE 'yes'");
			while($res2 = mysqli_fetch_array($result2))
			{
				$count = $count + 1;
				
				echo '<div class="progressIndicator"><span>'.$count.'</span></div>';
			}
			
			echo '<div class="progressIndicator"><span><i class="fa fa-check"></i></span></div>';
			
			$count = $count + 1;
		?>
		
		<div class="progressBar"></div>
	</div>
		
	<script>
	
		var totalQuestions = <?php echo $count; ?>;
		var eachWidth = 100/totalQuestions;
		
		var questionSet = 0;
		var totalQuestionSets = $('.questionSet').length;
		
		function nextToolkit()
		{
			$('.toolkitIntro').hide();
			$('.toolkitQuestions').show();
			
			questionSet = questionSet + 1;
			
			if(questionSet <= totalQuestionSets)
			{
				$('.questionSet').hide();
				$('#questionSet' + questionSet).show();
			}
			else
			{
				questionSet = totalQuestionSets;
			}
		}	
		
		function backToolkit()
		{			
			questionSet = questionSet - 1;
			
			if(questionSet >= 1)
			{
				$('.questionSet').hide();
				$('#questionSet' + questionSet).show();
			}
			else
			{
				questionSet = 1;
			}
		}	
		
		function completeToolkit()
		{			
			var complete = 1;
			
			$(".questionAnswer").each(function() 
			{
				if ($(this).val() == '') 
				{
					complete = 0;
					
					$('#completeDescription').html('You must complete all the questions to proceed');
				} 
			});
			
			if(complete == 1)
			{
				$('#toolkitForm').submit();
			}
		}
		
		$(".questionAnswer").change(function()
		{
			var answerCount = 0;
			var indicatorCount = 0;
			
			$(".questionAnswer").each(function() 
			{
				if ($(this).val() != '') 
				{
					answerCount = answerCount + 1;
				} 
			});
			
			var totalWidth = eachWidth*answerCount - eachWidth/2;
			$('.progressBar').css('width', totalWidth + '%');
			$('.progressBar').css('width', totalWidth + '%');
			
			$(".progressIndicator").each(function() 
			{
				indicatorCount = indicatorCount + 1;
				
				if (indicatorCount <= answerCount) 
				{
					$(this).children('span').addClass('active');
				} 
				else
				{
					$(this).children('span').removeClass('active');
				}
			});
		});
		
	</script>

</body>