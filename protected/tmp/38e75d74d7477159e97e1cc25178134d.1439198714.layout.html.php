<?php if(!class_exists("View", false)) exit("no direct access allowed");?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SpeedPHP新版</title>
</head>
<body>
<div class="container">
<?php include $_view_obj->compile($__template_file); ?>
</div>
</body>
</html>