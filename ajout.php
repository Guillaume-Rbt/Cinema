<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body id="bod">
    <div class="pusher">
<?php include("header.php");?>
<div class="content"></div>
    <form action="ajout.php" method="post" class="form1">
    <h2>Nouveau Film</h2>
        <div>
            <label for="titre">Titre du film </label>
            <input type="text" name="titre" placeholder="Ex:Titanic" class="field" />
        </div>
        <div>
            <label for="nomImg">Nom de l'image </label>
            <input type="text" placeholder="Ex:Titanic.jpg" class="field" name="nomImg"/>
        </div>
        <div>
            <label for="res"> Résumé du film </label>
            <textarea class="field" name="res"></textarea>
        </div>
        <input type="submit" value="Ajouter" class="sub"/>
</form>

<form action="ajout.php" method="post" class="form2">
    <h2>Supprimer film </h2>
    <div>
    <label for="filmSup" > Titre du film à supprimer </label>
    <input type="text" name="filmSup" class="field"> </div>
    <input type="submit" value="Supprimer" class="sub"/>
</form>

<?php


    $dbh = new PDO('mysql:host=localhost;dbname=vincent', 'Guillaume', 'GRobert70', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);


    
    if (isset($_POST['titre']) AND isset($_POST['nomImg']) AND isset($_POST['res']))
    {
       $titre = $_POST['titre'];
       $img = $_POST['nomImg'];
       $res = $_POST['res'];

      // var_dump($titre);
       // var_dump($img);
       // var_dump($titre);

       $q = $dbh ->prepare("INSERT INTO vincent_table (title, imageName, comment) VALUES (:titre,  :img, :res)");

        $q ->bindparam(':titre',$titre, PDO::PARAM_STR );
        $q ->bindparam(':img', $img, PDO::PARAM_STR);
        $q ->bindparam(':res', $res,PDO::PARAM_STR);

       $q->execute();


       echo "<div><h2>"."Le film a bien été ajouté </br>";
       // . $res."</h2></div>";
}

if (isset($_POST['filmSup'])) {
    $film = $_POST['filmSup'];
    $r = $dbh ->prepare("DELETE FROM vincent_table WHERE title = :tfilm");
    $r ->bindparam(':tfilm',$film, PDO::PARAM_STR );
    $r->execute();
    var_dump($r);
}
?>

<?php include("footer.php"); ?> 
</div>
</div>   
</body>
</html>
