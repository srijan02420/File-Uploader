<!-- file uploader
 Author: Srijan Gupta
 email: srijan02420@gmail.com
Feel free to contact -->

<html>
	<title>File Uploader</title>
	<head><link rel="stylesheet" type="text/css" href="style.css" /></head>
	<body>
	<h2>File Uploader</h2>
		<h3>Add your Files</h3>
		<div id="upload">
			<!--form contents and path for uploading-->
			<form action="#" method="post" enctype="multipart/form-data">
			
				<!--Your file to be uploaded on the server-->
				<label for="file">Your File To Be Uploaded:</label>
				<input type="file" name="file" id="file" /> <br/>
				
				<!--Path of file to be uploaded on the server leave it blank if want to upload it root-->
				<label for="path">Put Path For Upload:</label>
				<input type="text" name="path"/>
				<p>(leave it blank if wanna upload it to root folder)</p>
			
				<input type="submit" value="Upload" name="submit2" class="btn"/>
			</form>
		</div><br/><br/>
		<h3>Create New Folder</h3>
		<div id="folder">
			<!--form for making folder-->
			<form action="#" method="post">
				<!--Path where you want to make a new folder -->
				<label for="path">Name of New Folder with full path:</label>
				<input type="text" name="path" value="name with path">
				
				<input type="submit" name="submit1" value="Make New Folder">
			</form>
		</div>
		<div id="success">
<?php
	$file = NULL;
	//for uploading file
	if (isset($_POST['submit2'])) {
		$path = $_POST['path'];
		$file = $_FILES['file']['tmp_name'];
		
		//cheaking if any file is selected or not
		if($file==null)
			{	echo "Please select a file!";	}
			
		//cheaking if the given path exist or not
		else if (!file_exists($path)&&$path!=null)
			{	echo "Path is invalid!";	}
			
		else{
			//if path left blank it will upload file to root directory
			if ($path== null)
				{
				//cheaks whether the file already exists
				if(file_exists($_FILES["file"]["name"]))
						//if already exist, replace it
					{	echo "Folks '".$_FILES["file"]["name"]."' replaced!";	}
				else
						//if not upload it
					{	echo "Folks '".$_FILES["file"]["name"]."' uploaded in the same dir where uploader exists!";	}
					
					//uploading file to root directory
				move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
				}
			//if path given, will upload to specified path	
			else	
				{
				//cheak whether the file already exist
				if(file_exists($path.'/'.$_FILES["file"]["name"]))
						//if already exists replaces it
					{	echo "'/".$path ."/" .$_FILES["file"]["name"]. "' replaced!";	}
				else
						//if not upload it
					{	echo "File uploaded in '/".$path ."/" .$_FILES["file"]["name"]. "'!";	}
					
				//uploading file to specified path
				move_uploaded_file($_FILES["file"]["tmp_name"],
				$path ."/" .$_FILES["file"]["name"]);
				}
			}
	}

	//for making new folder
	$path = NULL;
	if (isset($_POST['submit1'])) 
		{
		//path of folder
		$path = $_POST['path'];
		
		//cheaking if there is any name given to folder
		if($path==NULL)
			{	echo "Give folder a name!";	}
			
		else{
			//cheaking whether the folder exist or not
			if(!file_exists($path))
				{
				//making folder in your specified path
				mkdir($path, 0700);
				echo "FOLDER '".$path."' Created :)";
				}
			else
				{ echo "'".$path."' already exist!"; }
			}
		}	
?>
		</div>
		<div id="footer">
			Developed By: SRIJAN GUPTA
		<div>
		<div class="srijan">
			<a href="srijan02420@gmail.com">SRIJAN GUPTA</a><br/>
			E-Mail : srijan02420@gmail.com<br/>
			For any suggestions feel free to contact !!
		</div>
	</body>
</html>	
