<html>
<head></head>
<body>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    try {
        $base = new PDO('mysql:host=localhost; dbname=symfony', 'root', '');
    }
    catch(exception $e) {
        die('Erreur '.$e->getMessage());
    }
    $base->exec("SET CHARACTER SET utf8");
    $retour = $base->query("SELECT * FROM programme WHERE promotion_id=$id");
    $searchPromo = $base->query("SELECT * FROM promotion WHERE id=$id");
    if($promotion = $searchPromo->fetch()){
        $nomPromo= $promotion['nom_promotion'];
    }
    ?>

    <div class="row">

        <div class="panel panel-default">
            <div class="bs-callout bs-callout-danger" style="   -moz-border-bottom-colors: none;
                    -moz-border-left-colors: none;
                    -moz-border-right-colors: none;
                    -moz-border-top-colors: none;
                    border-color: #eee;
                    border-image: none;
                    border-radius: 3px;
                    border-style: solid;
                    border-width: 1px 1px 1px 5px;
                    margin-bottom: 5px;
                    border-left-color: #122e48;
                    padding: 20px;">
                <h4>Collège : Qu'allez-vous apprendre en classe de <?php echo $nomPromo; ?> ?</h4>
                <p class="text-justify">
                    Vous voulez en savoir plus sur ce qui vous attend au programme, cette année, en <?php echo $nomPromo; ?> ? Suivez le
                    guide.
<!--
                <div>
                    <li class="nav-item">
                        <a class="nav-link" style="color:#c92e48" href="{{ path('link_sixieme') }}">Télécharger tout le programme</a>
                    </li>
                </div>
-->
                </p>

            </div>
        </div>

    </div>

<?php

    while ($data = $retour->fetch()){
       $coef= $data['coef'];
        $idmat= $data['matiere_id'];
        $promid= $data['promotion_id'];
        $massh= $data['masse_horaire'];
        $description= $data['description'];
        $searchMat = $base->query("SELECT * FROM matiere WHERE id=$idmat");
        if($matiere = $searchMat->fetch()){
            $nomMat= $matiere['nom_matiere'];
        }


?>


        <div class="row">
            <p>
            <blockquote style="    font-size: 80% !important;
                page-break-inside: avoid;
                border: 3px solid #fff;
                width: 100%;
                -webkit-box-shadow: inset 5px 0px 0px 0px #f60, 8px 8px 8px 2px #888;
                -mox-box-shadow: inset 5px 0px 0px 0px #f60, 8px 8px 8px 2px #888;
                -ms-box-shadow: inset 5px 0px 0px 0px #f60, 8px 8px 8px 2px #888;
                box-shadow: inset 5px 0px 0px 0px #f60, 8px 8px 8px 2px #888;

                padding: 10px 20px;
                margin: 0 0 20px;
                font-size: 17.5px;
                border-left: none;">
                <h3><?php echo $nomMat; ?> <span style="float:right;">Coef: <?php echo$coef; ?></span> </h3> <span style=" font-weight:700;
                color:#c7254e;float: right;
                font-family: Menlo, Monaco, Consolas, " Courier New", monospace">4h 30 hebdomadaire</span>
            </blockquote>

            <p class="center">
                <a class="btn btn-info" href="#">Telecharger le guide</a>
                <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Ouvrages au programme</a>
                </p>
                <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                    C'est ici que nous allons afficher les ouvrages en fonction de la matière er de la promotion selectionnée
                  </div>
                </div>



            

            </p>
            <span class="text-justify">
                         Des œuvres littéraires variées pour vous assurer une autonomie suffisante en lecture et écriture :
                    des contes et récits mythologiques pour découvrir le monstre, aux limites de l'humain ; des fables
                    et des pièces de théâtre sur le thème de la ruse qu'invente le faible pour résister au plus fort ;
                    des récits de voyage pour vous tenir en haleine.

                    </span>

        </div>

<?php


    }
?>

            <p style="text-align: center;">
                <a href="" ="#" class="btn btn-info">Telecharger la liste des matières au programme</a>
            </p>
<?php
}

?>
</body>
</html>