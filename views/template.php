<html>
<head>
  
    <title>UTA</title>
    <link rel="stylesheet" type="text/css" href="jquery/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery/themes/color.css">
    <link rel="stylesheet" type="text/css" href="jquery/demo/demo.css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.easyui.min.js"></script>

</head>

<body>

    <header>
        <img src="./images/header.png" width="100%" height="150" alt="Logo UTA">
    </header>

    <section>
        <?php 
            $mvc = new MvcController();
            $mvc -> enlacesPaginasController();
        ?> 
	</section>

<hr><br>

    <footer>
		Derechos Reservados @Cuarto Software
	</footer>
</body>
</html>