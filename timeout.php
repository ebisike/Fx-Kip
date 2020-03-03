<!DOCTYPE html>
<html>
<head>
	<title>session timeout</title>
	<link rel="icon" type="image/ico" href="/fx-kip/mData/img/icon.png">
</head>
<body>
	<style type="text/css">
		body{
			text-align: center;
			background-image: url('mData/img/sleep.jpg');
			background-repeat: no-repeat;
			background-size: 100%;
		}
		h1{
			text-align: center;
			font-size: 100px;
			margin-top: -6%;
		}
		h1:hover{
			color: red;
			content: 'shit';
		}
		.container{
			width: 80%;
			margin: auto auto;
			margin-top: 5%;
		}
		img{
			width: 25%;
		}
		h3{
			margin-top: -5%;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<img src="mData/img/icon.png">
				<h1 id="msg" onmouseover="change()" onmouseout="cc()">Ooops!</h1>
				<h3>we're sorry your session has timed out. This is a follow through for security reasons.<br> Kindly click on the link below to continue</h3>
				<p>click <a href="login.php">here</a> to continue</p>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function change(){
			document.getElementById('msg').innerHTML='Sorry';
		}

		function cc(){
			document.getElementById('msg').innerHtnl='Ooops!';
		}
	</script>
</body>
</html>