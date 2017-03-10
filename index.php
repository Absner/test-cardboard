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
        <div class="col s5 m4">
            <div class="card blue-grey darken-1">
                <div class="card-content white-black">
                    <!-- incia contenedor de lso video del playlist -->
                    <div id="lista" class="row" onclick="selectVideo('e');">
                        <!-- imagen video playList -->
                        <div class="col s5 m5 video-small" >
                            <div class="cubierta">

                            </div>
                            <iframe  width="150" height="113" src="https://www.youtube.com/embed/uEKDcJPWhzg?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <!-- descripcion video PlayList  -->
                        <div class="col s5 m7">
                            <ul>
                                <li>Titulo</li>
                                <li>Descripción</li>
                                <li>Like</li>
                                <li>No like</li>
                            </ul>
                        </div>
                    </div>
                    <!-- fin contenedor video play list -->


                </div>
            </div>
        </div>

        <!-- contenedor del reproductor de video -->
        <div class="col s5 m8">
            <!-- contenedor del reproductor de video -->
            <div class="row">
                <div class="col s5 m10 offset-m1 video-larg">
                    <iframe id="video-larg-tv" width="718" height="400" src="https://www.youtube.com/embed/uEKDcJPWhzg?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>

            </div>

            <!-- contenedor de la descripcion del video-->
            <div class="row">
                <div class="col s5 m10 offset-m1">
                    <div class="row">
                        <div class="col m6">
                            <h5>Titulo</h5>
                            <h7>Descripcion</h7>
                        </div>
                        <div class="col m6">
                            <button class="btn"><i class="material-icons left">thumb_up</i>Me gusta</button><span>38</span>
                            <button class="btn"><i class="material-icons left">thumb_down</i>No me gusta</button><span>60</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="bower_components/materialize/dist/js/materialize.min.js"></script>
</body>
</html>
