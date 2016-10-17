 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php if(isset($this->titulo))  echo $this->titulo;?></title>
		<link href="<?php echo $_layoutParams['ruta_css'];?>estilos1.css" rel="stylesheet" type="text/css" >
	</head>

	<body>
		<div id="main">
			<div id="header">
				<div id="logo">
					<h1><?php   echo APP_NAME;?></h1>
				</div>
			</div>
