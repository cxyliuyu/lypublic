<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title>上传</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
</head>
<body>
	<form action="http://114.215.135.70/lypublic/1/index.php/CaiApi/File/upload" enctype="multipart/form-data" method="post" >
		<input type="text" name="name" />
		<input type="file" name="photo" />
		<input type="submit" value="提交" >
	</form>
</body>
</html>