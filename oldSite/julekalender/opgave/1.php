
<html><head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width initial-scale=1, maximum-scale=1">
		<title>Lær at Kode</title>
		<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900,700,300" rel="stylesheet" type="text/css">
		<!-- StyleSheets -->
		<link href="../bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="../style.css" rel="stylesheet" type="text/css">
		<link href="../responsive.css" rel="stylesheet" type="text/css">
	</head>
<body class="cbp-spmenu-push">

	<!-- Header start-->
	<!-- Header -->
<header id="header">
	<nav>
		<a class="brand" href="http://laerkode.alinea.dk">
	  	<img src="../images/logo.png">
		</a>

		<div class="container">
			<div class="navbar-header col-md-6 col-sm-6">
				<button type="button" class="navbar-toggle menu-left push-body jPushMenuBtn" aria-controls="navbar" aria-expanded="false" data-toggle="collapse" data-target="#responsive-nav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="responsive-nav">
				<ul class="nav navbar-nav navbar-right">
					<li class="visible-xs">
						<a href="javascript:void(0)" class="close-menu pull-right">
							<span class="glyphicon glyphicon-remove"></span>
						</a>
						<div class="clearfix"></div>
					</li>

					<li class="dropdown">
						<a class="dropdown-toggle" id="menu_down" href="#" data-toggle="dropdown" role="button">Vælg bog <span class="glyphicon glyphicon-menu-down"></span></a>
						<ul class="dropdown-menu" aria-labelledby="menu_down">
							<li><a href="/index.php?page=book_detail&amp;book=book_1">Lær at kode 1</a></li>
							<li><a href="/index.php?page=book_detail&amp;book=book_2">Lær at kode 2</a></li>
							<li><a href="/index.php?page=book_detail&amp;book=book_3">Lær at kode 3</a></li>
							<li><a href="/index.php?page=book_detail&amp;book=book_4">Lær at kode 4</a></li>
						</ul>
					</li>
					<li>
						<a href="/index.php?page=aboutweb">Om sitet</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<section class="book_section">
	<div class="container">
    <div class="row mt-50">
        <?php
        $day = (int) basename(__FILE__, '.php');
        $Curday = getdate()["mday"];
    	$vid = '<div class="col-md-6 col-sm-6">
				<h1>Julekalender dag: ' . $day . '</h1>
				<iframe src="https://player.vimeo.com/video/193069174" width="400" height="280" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
			<div class="col-md-6 col-sm-6">
					<h1>Dagens opgave</h1>
                    <p> Idag skal vi starte på vores første spil sammen med
                    Simon Rotendahl der viser os hvordan man starter på Spillet <em>Gave eller Kul</em>
                    </p>

					<p>Se videoen og hop ind på <a style="text-decoration: underline;" href="https://scratch.mit.edu/projects/editor/">scratch</a>
                    for at lave dit eget spil!</p>
			</div>
		</div>
		';
        
        echo $vid;


        ?>
	</div>
</div>





<footer>
	<section class="footer_header">
		<img src="../images/alina_logo.jpg">
	</section>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-6">
				<small class="heading">SALGSSUPPORT</small>
				<strong>33 69 46 66</strong>
				<small class="date">Skoledage: 10 - 15</small>
				<hr>
				<p>Få hjælp til køb af abonnementer mv.</p>
				<a href="mailto:info@alinea.dk"><img class="details" src="../images/detail.jpg"></a>
			</div>
			<div class="col-md-1 hidden-xs"></div>
			<div class="col-md-2 col-sm-3 col-xs-6">
				<small class="heading">TEKNISK SUPPORT</small>
				<strong>36 91 70 00</strong>
				<small class="date" style="width:160px;">Skoledage: 9 - 15</small>
				<hr>
				<p>Få hjælp til teknik og adgange mv.</p>
				<a href="mailto:support@alinea.dk"><img class="details" src="../images/detail.jpg"></a>
			</div>
			<div class="col-md-1 hidden-xs"></div>
			<div class="col-md-1 hidden-xs"></div>
			<div class="col-md-2 col-sm-3 col-xs-6 text-center">
				<a class="email_icon" href="http://www.alinea.dk/presse/nyhedsbrev" target="_blank">
					<img src="../images/email_icon.jpg">
					<p>Få inspiration og viden til din undervisning</p>
				</a>
			</div>

			<div class="col-md-2 col-sm-3 col-xs-6 text-center">
				<a class="home_icon" href="http://www.alinea.dk/" target="_blank">
					<img src="../images/home_icon.jpg">
					<p>Besøg vores webshop, og find hele vores udvalg</p>
				</a>
			</div>
		</div>
</div>

<section class="footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6 col-sm-6">
				<p><a target="_blank" href="http://www.alinea.dk/om-alinea/persondatapolitik">Cookiepolitik</a> . Alinea 2015</p>
			</div>
			<div class="col-xs-12 col-md-6 col-sm-6 facebook_icon">
				<a href="https://www.facebook.com/Alineaforlag" target="_blank">
					<img src="../images/facebook_icon.jpg">
					<span>Følg os på Facebook</span>
				</a>
			</div>
		</div>
	</div>
</section>
</footer>	<!--module_footer end-->

		<script src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/pushmenu.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>

</body></html>
