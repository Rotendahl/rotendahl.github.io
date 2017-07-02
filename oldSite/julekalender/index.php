
<html><head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width initial-scale=1, maximum-scale=1">
		<title>Lær at Kode</title>
		<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,900,700,300" rel="stylesheet" type="text/css">
		<!-- StyleSheets -->
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="responsive.css" rel="stylesheet" type="text/css">
	</head>
<body class="cbp-spmenu-push">

	<!-- Header start-->
	<!-- Header -->
<header id="header">
	<nav>
		<a class="brand" href="http://laerkode.alinea.dk">
	  	<img src="images/logo.png">
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
    	<div class="col-md-6">
				<h1>Introvideo</h1>
				<iframe width="400" height="280" src="https://www.youtube.com/embed/Ee0_X9LAtVY" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="col-md-6 ">
					<div><h1>Scratch julekalender</h1>
					<p>	Kig forbi denne side hver skoledag i december hvor en ny låge åbner med
				en video der lærer dig hvordan du kan lave dine egne spil i scratch.
				</div>
			</p>
			</div>
		</div>

        <?php
          $day = getdate()["mday"];
		  $showCal = getdate()["month"] == "December";
          $htmlCode = "";
          $curRow = '<div class="row">';
          for ($i=1; $i < 23 ; $i = $i+1) {
			  $imgCode = '<img class=""';
			  $curRow = $curRow . '<div class="col-md-3">';
			  if($i == $day){
					$imgCode = $imgCode . '<img id=""';
		      }
			  else{
				$imgCode = $imgCode . '<img class=""';
			  }

			  if($i == 1 or $i == 2 or $i == 5 or $i == 6){
					$imgCode = $imgCode . ' src="images/monster1.png">';
				}
				elseif($i == 7 or $i == 8 or $i == 9 or $i == 12){
					$imgCode = $imgCode . ' src="images/monster2.png">';
				}
				elseif($i == 13 or $i == 14 or $i == 15 or $i == 16){
					$imgCode = $imgCode . ' src="images/monster3.png">';
				}
				elseif($i == 19 or $i == 20 or $i == 21 or $i == 22){
					$imgCode = $imgCode . ' src="images/monster4.png">';
				}
                $curRow = $curRow . '<a href="opgave/' . $i . '.php">'. $imgCode .
					'<h6 style="text-align:center; text-decoration:underline;"> Låge ' . $i . ' er åben</h6>'
				.'</a>';


			  $htmlCode = $htmlCode . $curRow . '</div>';
			  if($i == 2 or $i == 9 or $i == 16){
				  $i = $i +2;
			  }
			  if($i == 6 or $i == 12 or $i == 16){
				  $curRow = '</div><div class="row">';
			  }
			  else {
				  $curRow = "";
			  }
          }
		  echo $htmlCode . '</div>';
        ?>
	</div>
</div>





<footer>
	<section class="footer_header">
		<img src="images/alina_logo.jpg">
	</section>
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-6">
				<small class="heading">SALGSSUPPORT</small>
				<strong>33 69 46 66</strong>
				<small class="date">Skoledage: 10 - 15</small>
				<hr>
				<p>Få hjælp til køb af abonnementer mv.</p>
				<a href="mailto:info@alinea.dk"><img class="details" src="images/detail.jpg"></a>
			</div>
			<div class="col-md-1 hidden-xs"></div>
			<div class="col-md-2 col-sm-3 col-xs-6">
				<small class="heading">TEKNISK SUPPORT</small>
				<strong>36 91 70 00</strong>
				<small class="date" style="width:160px;">Skoledage: 9 - 15</small>
				<hr>
				<p>Få hjælp til teknik og adgange mv.</p>
				<a href="mailto:support@alinea.dk"><img class="details" src="images/detail.jpg"></a>
			</div>
			<div class="col-md-1 hidden-xs"></div>
			<div class="col-md-1 hidden-xs"></div>
			<div class="col-md-2 col-sm-3 col-xs-6 text-center">
				<a class="email_icon" href="http://www.alinea.dk/presse/nyhedsbrev" target="_blank">
					<img src="images/email_icon.jpg">
					<p>Få inspiration og viden til din undervisning</p>
				</a>
			</div>

			<div class="col-md-2 col-sm-3 col-xs-6 text-center">
				<a class="home_icon" href="http://www.alinea.dk/" target="_blank">
					<img src="images/home_icon.jpg">
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
					<img src="images/facebook_icon.jpg">
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
