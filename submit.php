	<?php			
			include("config.php");
			//Getting data from form
			$Name = $_POST['Candidate_Name'];
			$Email = $_POST['Email'];
			$Category = $_POST['Category'];
			$Caption = $_POST['Caption'];
			$DateofBirth = $_POST['DateofBirth'];
			$KeyWords = $_POST['Candidate_Name'] .",".$_POST['Email'].",".$_POST['DateofBirth'];
			$fileName = $_FILES['userfile']['name'];
			$tmpName = $_FILES['userfile']['tmp_name'];
			$fileSize = $_FILES['userfile']['size'];
			$fileType = $_FILES['userfile']['type'];			
			$filePath = "images/";
			$MAXIMUM_FILESIZE = 5 * 1024 * 1024;
			$rEFileTypes = "/^\.(jpg|jpeg){1}$/i";
			$isFile = is_uploaded_file($_FILES['Filedata']['tmp_name']);
			$isMove = false;
			if ($isFile)
			{
				$safe_filename = preg_replace( 
                     array("/\s+/", "/[^-\.\w]+/"), 
                     array("_", ""), 
                     trim($_FILES['Filedata']['name']));
					 
				if ($_FILES['Filedata']['size'] <= $MAXIMUM_FILESIZE && preg_match($rEFileTypes, strrchr($safe_filename, '.'))) 
				{
					$isMove = move_uploaded_file ($_FILES['Filedata']['tmp_name'], $filePath.$safe_filename);} 
				}
			}
			if (!$isMove) {
				echo "Error while uploading file";
				header("location: error.php");
				exit;				
			}
			else
			{
				$filePath = $filePath.$safe_filename;
				$sql = "INSERT INTO candidate (Candidate_Name, Email, Category, Caption, Nationality, Image, DateofBirth, KeyWords, CreatedDate) 
							   VALUES('$Name','$Email','$Category','$Caption','$Nationality','$filePath','$DateofBirth','$KeyWords',NOW())";
							   
				if ($conn->query($sql) === TRUE) {
					header("location: index.php");
					echo "New record created successfully";
				} else {
					echo "Error: " . $sql . "<br/>" . $conn->error;
				}
			}
			$conn->close();			   
	?>