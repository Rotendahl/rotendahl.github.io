<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Huskespil</title>

        <style type="text/css">
        body {
        	margin:0; padding:0;
        	background-color:#E0E0E0;
        	color:#000; font-size:12px;
        	font-family: Arial, Helvetica;
        }
        .medium { font-size:15px; font-weight:bold; }
        .big { font-size:24px; font-weight:bold; }

        .rel { position: relative; }
        .overlay { position:absolute; top:20px; left:20px; width:50%; height:150px;
          padding:15px; background-color:#E0E0E0; opacity:0.6;
        }

        canvas { margin:0; padding:0; }
        canvas.small { width:300px; height:300px; }
        canvas.wide { width:100%; height:300px; }

        .col { margin-bottom:50px; }
        </style>

        <script type="text/javascript" src="jprocessingjs-0.9.min.js"></script>
        <script type="text/javascript" src="processing-1.4.1.min.js"></script>
        <script type="text/javascript">

        </script>

	</head>
	<body>
      <p>
        <?php
        //   rotendahl.dk/postScore.php?game=react&name=benja&score=10

        $game = $_GET["game"];
        $name = $_GET["name"];
        $score = $_GET["score"];

        $servername = "rotendahl.dk";
        $username = "rotendah_hjerne";
        $password = "xJjdXizs}23B7V[EGMZutmv[sU2";
        //INSERT INTO react (perName, score) VALUES ('benj', 314)
        $qry = "INSERT INTO " . $game . " (perName, score) VALUES ( '" . $name . "', " .$score . ")";

        //echo $qry;
        // Create connection
        $con = mysql_connect($servername, $username, $password);
        $db  = mysql_select_db("rotendahl_dk_db", $con);
        $res = mysql_query($qry);

        ?>
      </p>

      <canvas id="demo" data-processing-sources="score.pde">
      </canvas>
    </body>
</html>
