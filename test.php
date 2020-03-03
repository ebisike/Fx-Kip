<?php
	if(isset($_GET['x'])){
		echo 'the number is: '. $_GET['x'];
	}

	$hold = 'This is my text';
	if(isset($_POST['test'])){
		$hold = $_POST['txt'];
		echo 'the text you entered is: '.$hold.'<br>';
		$image = $_FILES['image']['name'];
		//$size = $_FILES['image']['size'];
		//image file directory
  	$target = "images/".basename($image);
  	$size = filesize($target);
		echo $size .' Of image uploaded<br>';
  	// if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  	// 	$msg = "Image uploaded successfully";
  	// 	$name = basename($image);
  	// 	$fileType = pathinfo($target,PATHINFO_EXTENSION);
  	// 	echo $fileType;
  	// }else{
  	// 	$msg = "Failed to upload image";
  	// }


	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>tester</title>
</head>
<body>
	<form action="test.php" method="post" enctype="multipart/form-data">
		<input type="text" name="letters">
		<select>
			<option>Abia</option>
			<option>Yola</option>
			<option>Ondo</option>
		</select><br><br>

		
		<div class="form-group">
			<input type="file" name="image" class="form-control">
		</div>

		<input type="text" name="txt" placeholder="enter text" value="<?php echo $hold; ?>">
		<input type="submit" name="test">

		
	</form>
	<input type="button" name="" value="post" onclick="state()">
	<div id="test"></div>


	<script type="text/javascript">

		var x = document.forms[0].elements[0].value;
		document.write(x);

		function state(){
			if(window.XMLHttpRequest){
				xmlhttp = new XMLHttpRequest();
			}else{
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
					document.getElementById('test').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open('GET', 'timeout', true);
			xmlhttp.send();
		}
	</script>
</body>
</html>