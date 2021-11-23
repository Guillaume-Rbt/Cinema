<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Film</title>
</head>
<body id="bod">
<div class="pusher">

  <?php include("header.php"); ?>
    <div class="content">
    <div class="container">
    <div class="masque" id="ms" style="display:none;">
            <div class="pop" id="pop">
                <div><button onclick='fermer()' class='fermer'>X</button></div>
            </div>
        </div>
    <?php 
      $dbh = new PDO('mysql:host=localhost;dbname=vincent', 'Guillaume', 'GRobert70', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $req = $dbh->query("SELECT * FROM vincent_table");

    while ($rep = $req->fetch()) {
        $char = "";
        $char .="<div class='aff' onclick=\"pop('".$rep['imageName']."','res_". str_replace("'","",$rep['title'])."')\">";
        $char .="<img class='aff_img' src='Images/".$rep['imageName']."'/>";
        $char.="<p class='titre'>".$rep['title']."</p>";
        $char.="<div class='res' id='res_".str_replace("'","",$rep['title']) ."'>".$rep['comment']."</div></div>";
        echo $char;
    }

    ?>
      
</div>
   
   
    <script src="script.js"></script>
    <?php include("footer.php"); ?>
    </div>
</div>

</body>
</html>