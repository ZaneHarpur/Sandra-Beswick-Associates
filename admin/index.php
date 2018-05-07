 <head>
 
	<?php
		include '../connection.php';
		
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
	<link rel="stylesheet" href="../style.css">
	
</head>

<body>

	<section>
		<h1>Update Toolkit Questionnaire</h1>
		<?php echo $error; ?>
		
		<form action="" method="post">
			<div class="row greyBackground">
				<h2>New Question</h2>
				<input type="text" name="id" hidden>
				
				<div class="column">
					<label>Category</label>
					<select name="category" id="category">
						<?php					
							$result1 = mysqli_query($con, "SELECT DISTINCT category FROM questions");
							while($res1 = mysqli_fetch_array($result1))
							{
								echo '<option value="'.$res1['category'].'">'.$res1['category'].'</option>';
							}
						?>
						<option value="new">Add New</option>
					</select>
				</div>	
				
				<div class="column hidden newCategory">
					<label>New Category</label>
					<input type="text" name="newCategory">
				</div>			
			
				<div class="column" style="width: 500px;">
					<label>Question</label>
					<input type="text" name="question" style="width: 500px;">
				</div>	
			
				<div class="column">
					<label><br/></label>
					<button type="submit" value="Add Question">Add Question</button>
				</div>
				
			</div>
			
			<div class="row greyBackground">
				<h2>Answer Options</h2>
			
				<div class="column">
					<label>Answer 1</label>
					<input type="text" name="answer1">
				</div>			
				<div class="column">
					<label>Answer 1 Weight</label>
					<input type="text" name="answer1Weight">
				</div>	
			
				<div class="column">
					<label>Answer 2</label>
					<input type="text" name="answer2">
				</div>			
				<div class="column">
					<label>Answer 2 Weight</label>
					<input type="text" name="answer2Weight">
				</div>	
			
				<div class="column">
					<label>Answer 3</label>
					<input type="text" name="answer3">
				</div>			
				<div class="column">
					<label>Answer 3 Weight</label>
					<input type="text" name="answer3Weight">
				</div>	
			
				<div class="column">
					<label>Answer 4</label>
					<input type="text" name="answer4">
				</div>			
				<div class="column">
					<label>Answer 4 Weight</label>
					<input type="text" name="answer4Weight">
				</div>	
			
				<div class="column">
					<label>Answer 5</label>
					<input type="text" name="answer5">
				</div>			
				<div class="column">
					<label>Answer 5 Weight</label>
					<input type="text" name="answer5Weight">
				</div>	
				
			</div>
		</form>
	</section>
		
	<section>
		<h1>Active Questions</h1>
		
		<table cellpadding=0 cellspacing=0>
			<tr><td></td><td><b>Category</b></td><td><b>Question</b></td><td><b>Answer 1</b></td><td><b>Answer 2</b></td><td><b>Answer 3</b></td><td><b>Answer 4</b></td><td><b>Answer 5</b></td><td></td></tr>
			<?php					
				$result1 = mysqli_query($con, "SELECT * FROM questions WHERE active LIKE 'yes'");
				while($res1 = mysqli_fetch_array($result1))
				{
					echo '<form action="" method="post">';
						echo '<input name="id" value="'.$res1['id'].'" hidden>';
						echo '<input name="disable" value="disable" hidden>';
						
						echo '<tr>';
							echo '<td>'.$res1['id'].'</td>';
							echo '<td>'.$res1['category'].'</td>';
							echo '<td>'.$res1['question'].'</td>';
							
							if($res1['answer1'] != '')
							{
								echo '<td>'.$res1['answer1'].' ('.$res1['answer1Weight'].' points)</td>';
							}
							else
							{
								echo '<td>-</td>';
							}
							
							if($res1['answer2'] != '')
							{
								echo '<td>'.$res1['answer2'].' ('.$res1['answer2Weight'].' points)</td>';
							}
							else
							{
								echo '<td>-</td>';
							}
							
							if($res1['answer3'] != '')
							{
								echo '<td>'.$res1['answer3'].' ('.$res1['answer3Weight'].' points)</td>';
							}
							else
							{
								echo '<td>-</td>';
							}
							
							if($res1['answer4'] != '')
							{
								echo '<td>'.$res1['answer4'].' ('.$res1['answer4Weight'].' points)</td>';
							}
							else
							{
								echo '<td>-</td>';
							}
							
							if($res1['answer5'] != '')
							{
								echo '<td>'.$res1['answer5'].' ('.$res1['answer5Weight'].' points)</td>';
							}
							else
							{
								echo '<td>-</td>';
							}
							
							echo '<td><button type="submit">Disable</button></td>';
						echo '</tr>';
					echo '</form>';
				}
			?>
		</table>
	</section>
			
	<section>
		<h1>Disabled Questions</h1>
		
		<table cellpadding=0 cellspacing=0>
			<tr><td></td><td><b>Category</b></td><td><b>Question</b></td><td><b>Answer 1</b></td><td><b>Answer 2</b></td><td><b>Answer 3</b></td><td><b>Answer 4</b></td><td><b>Answer 5</b></td><td></td></tr>
			<?php					
				$result1 = mysqli_query($con, "SELECT * FROM questions WHERE active LIKE 'no'");
				while($res1 = mysqli_fetch_array($result1))
				{
					echo '<form action="" method="post">';
						echo '<input name="id" value="'.$res1['id'].'" hidden>';
						echo '<input name="disable" value="enable" hidden>';
						
						echo '<tr>';
							echo '<td>'.$res1['id'].'</td>';
							echo '<td>'.$res1['category'].'</td>';
							echo '<td>'.$res1['question'].'</td>';
							
							if($res1['answer1'] != '')
							{
								echo '<td>'.$res1['answer1'].' ('.$res1['answer1Weight'].' points)</td>';
							}
							else
							{
								echo '<td>-</td>';
							}
							
							if($res1['answer2'] != '')
							{
								echo '<td>'.$res1['answer2'].' ('.$res1['answer2Weight'].' points)</td>';
							}
							else
							{
								echo '<td>-</td>';
							}
							
							if($res1['answer3'] != '')
							{
								echo '<td>'.$res1['answer3'].' ('.$res1['answer3Weight'].' points)</td>';
							}
							else
							{
								echo '<td>-</td>';
							}
							
							if($res1['answer4'] != '')
							{
								echo '<td>'.$res1['answer4'].' ('.$res1['answer4Weight'].' points)</td>';
							}
							else
							{
								echo '<td>-</td>';
							}
							
							if($res1['answer5'] != '')
							{
								echo '<td>'.$res1['answer5'].' ('.$res1['answer5Weight'].' points)</td>';
							}
							else
							{
								echo '<td>-</td>';
							}
							
							echo '<td><button type="submit">Enable</button></td>';
						echo '</tr>';
					echo '</form>';
				}
			?>
		</table>
	</section>

	<section>
		<h1>Toolkit Settings</h1>
		
		<form action="" method="post">
			<div class="row greyBackground">
				<h2>New Setting</h2>
				<input type="text" name="settingId" hidden>
				
				<div class="column">
					<label>Type</label>
					<select name="type" id="type">
						<?php					
							$result1 = mysqli_query($con, "SELECT DISTINCT type FROM settings");
							while($res1 = mysqli_fetch_array($result1))
							{
								echo '<option value="'.$res1['type'].'">'.$res1['type'].'</option>';
							}
						?>
					</select>
				</div>		
			
				<div class="column">
					<label>Item</label>
					<input type="text" name="item">
				</div>	
			
				<div class="column">
					<label>Value</label>
					<input type="text" name="value">
				</div>	
			
				<div class="column">
					<label><br/></label>
					<button type="submit" value="Add Question">Add Setting</button>
				</div>
				
			</div>
		</form>
	</section>
	
	<section>
		<h1>Current Settings</h1>	
		<table cellpadding=0 cellspacing=0>
			<tr><td><b>Type</b></td><td><b>Item</b></td><td><b>Value</b></td><td></td></tr>
			<?php					
				$result1 = mysqli_query($con, "SELECT * FROM settings");
				while($res1 = mysqli_fetch_array($result1))
				{
					echo '<form action="" method="post">';
						echo '<input name="settingId" value="'.$res1['id'].'" hidden>';
						echo '<input name="settingDisable" value="settingDelete" hidden>';
						
						echo '<tr>';
							echo '<td><b>'.$res1['type'].'</b></td>';
							echo '<td>'.$res1['item'].'</td>';
							echo '<td>'.$res1['value'].'</td>';
							
							echo '<td><button type="submit">Delete</button></td>';
						echo '</tr>';
					echo '</form>';
				}
			?>
		</table>
	</section>
	
	<script>
		$("#category").change(function()
		{
			if($(this).val() == 'new')
			{
				$('.newCategory').removeClass('hidden');
			}
			else
			{
				$('.newCategory').addClass('hidden');
			}
		});
	</script>

</body>