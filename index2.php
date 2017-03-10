<?php
require_once ('./php/classPlayList.php');
$playList   =   new playList();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

    <nav>
        <div class="nav-wrapper light-blue darken-1">
            <ul class="right hide-on-med-and-down">
                <li><a href="#" title="Uploar video"><i class="material-icons">present_to_all</i></a></li>
                <li><a href="login.html" title="Login"><i class="material-icons">perm_identity</i></a></li>
            </ul>
        </div>
    </nav>

    <div class="row">


        <!-- Contenedor play list -->
        <div class="col s5 m8 offset-m2">
            <div class="card blue-grey darken-1">
                <div class="card-content white-black">
                    <!-- incia contenedor de lso video del playlist -->
                    <div id="lista" class="row"></div>
                    <?php foreach ($playList->get() as $lista){?>
                    <div id="lista" class="row" onclick="selectVideo('<? echo $lista['url'] ?>','<? echo $lista['id']?>');">
                        <!-- imagen video playList -->
                        <div class="col s5 m3 video-small" >
                            <a href="player.php" >
                            <div class="cubierta">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem dolores dicta debitis magni quaerat expedita, blanditiis facilis incidunt ullam ex pariatur eius aspernatur cupiditate facere commodi consequuntur, ipsum, nostrum laborum.
                            </div>
                            <iframe  width="180" height="113" src="https://www.youtube.com/embed/<?php echo $lista['url'];?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                            </a>
                        </div>

                        <!-- descripcion video PlayList -->
                        <div class="col s5 m7">
                            <ul>
                                <li><?php echo $lista['titulo']?></li>
                                <li><?php echo $lista['descripcion']?></li>
                                <li><?php echo $lista['like']?></li>
                                <li><?php echo $lista['nolike']?></li>
                            </ul>
                        </div>
                    </div>
                    <!-- fin contenedor video play list -->
                    <?php };?>


                </div>
            </div>
        </div>

        <!-- contenedor del reproductor de video -->

    </div>

    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="bower_components/materialize/dist/js/materialize.min.js"></script>
</body>
</html>
