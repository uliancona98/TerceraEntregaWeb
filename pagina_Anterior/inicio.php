<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es-Mx">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilosInicio.css">
        <link rel="stylesheet" href="css/estilosGenerales.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montaga'>
        <title>Inicio</title>
    </head>
    <body>
        <header class="header-general">
            <div style="padding: 8px 16px; overflow: hidden;">
                <div class="tamano-5" id="logo"><span>HOLBOX</span></div>
                <div class="tamano-5" id="logo-derecho"><span>VIVE UNA EXPERIENCIA SIN IGUAL</span></div>
            </div>
            <div class="menu-general">
                <nav>
                    <ul class ="nav">
                        <li><a href="inicio.php">Inicio</a></li>
                        <li><a href="">Secciones</a>
                            <ul>
                                <li><a href="">Historia</a></li>
                                <li><a href="">¿Qué hacer?</a></li>
                                <li><a href="">Gastronomía</a></li>
                                <li><a href="">Flora y Fauna</a></li>
                            </ul>
                        </li>
                        
                        <?php
                        include("../sistema_login/manejador_sesiones.php");
                        $menu = get_Menu();

                        foreach( $menu as $opcion => $link){
                            echo "<li><a href=\"$link\">$opcion</a></li>";
                        }
                        ?>
                        <!--<li><a href="inicio.html">Inicio</a></li>
                        <li><a href="paginas/Historia.html">Historia</a></li>
                        <li><a href="paginas/LugaresHolbox.html">¿Qué hacer?</a></li>
                        <li><a href="paginas/Gastronomia.html">Gastronomía</a></li>
                        <li><a href="paginas/FloraFauna.html">Flora y Fauna</a></li> -->
                    </ul>
                </nav>
            </div>
            </header>
        <div class = "middle-content">
            <div class="slider">
                <ul>
                    <li>
                        <img src="images/Inicio/slider-inicio.jpg" alt="Inicio" title="Inicio">
                        <div><span>Bienvenido, disfrute de las maravillas de <b>Holbox</b>.</span></div>
                    </li>
                    <li>
                        <img src="images/Inicio/slider-historia.jpg" alt="Historia" title="historia">
                        <div><span>Conozca la fascinante historia de <b>Holbox</b>.</span></div>
                    </li>
                    <li>
                        <img src="images/Inicio/slider-todo.jpg" alt="que hacer?" title="¿Qué hacer?">
                        <div><span>Le proporcionamos una lista de lugares que debe conocer sobre <b>Holbox</b>.</span></div>
                    </li>
                    <li>
                        <img src="images/Inicio/slide-food2.jpg" alt="comida" title="Comida">
                        <div><span>La rica comida lo enamorará.</span></div>
                    </li>
                    <li>
                        <img src="images/Inicio/slider-flora-fauna.jpg" alt="flora y fauna" title="Flora y Fauna">
                        <div><span>Conozca la famosa luminiscencia.</span></div>
                    </li>
                </ul>
            </div>
            <div id="center">
                <div class="tamano-7" id="information">
                    <h2>Holbox</h2>
                    <p><b>Holbox</b> (en maya: hoyo negro, agujero negro) es una pequeña isla mexicana, peculiar por sus calles de arena blanca y platillos tradicionales, por su ubicación estratégica en límites del mar Caribe y Golfo de México. Sus aguas ricas en fitoplacton y otros pequeños crustáceos la hacen un santuario natural para el tiburon ballena, siendo el nado con el tiburon ballena una de las principales actividades recreativas de la isla.</p>
                </div>
                <div class="tamano-5" id="maps">
                    <h2>Ubicación</h2>
                    <div>
                        <iframe  class="maps" allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d237497.60465166878!2d-87.39438225116474!3d21.55076228611968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f4d9677b0abe2f1%3A0xa56edc4fcc77e54e!2sHolbox!5e0!3m2!1ses!2smx!4v1496856187824"></iframe>
                    </div>
                </div>
            </div>
            <!-- The Modal -->
            <div id="myModal" class="modal tamano-12">
                <span class="close">&times;</span>
                <video class="modal-content" id="vid01" controls></video>
            </div>

            <div class="tamano-12" id="video">
                <h3>Siente la experiencia.</h3>
                <video id="video-experiencia" src="video/To%20my%20Holbox.mp4" width="60%"></video>
                <div id="video-over">Toca el video para ampliar.</div>
            </div>
        </div>
        <footer>
            <div id="about">
                <div class="tamano-7" id="menu-footer">
                    <nav>
                        <ul>
                            <li><a href="inicio.html">Inicio</a></li>
                            <li><a href="paginas/Historia.html">Historia</a></li>
                            <li><a href="paginas/LugaresHolbox.html">¿Qué hacer?</a></li>
                            <li><a href="paginas/Gastronomia.html">Gastronomía</a></li>
                            <li><a href="paginas/FloraFauna.html">Flora y Fauna</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="tamano-5" id="nosotros">
                    <h3>Sobre Nosotros</h3>
                    <ul>
                        <li>Chuc Arcia Alejandro</li>
                        <li>Ancona Graniel Ulises</li>
                        <li>Interian Bojorquez Shaid</li>
                        <li>Pech Huchin Humberto</li>
                        <li>Sosa Lopez Wendy</li>
                    </ul>
                </div>
            </div>
            <p id="copyright">
                Todos los derechos reservados &copy;. Holbox 2018
            </p>
        </footer>

    <!---modal--->
        <script>

            document.getElementById("video-experiencia").addEventListener('click',llamarModal);
            // Get the modal
            const modal = document.getElementById('myModal');
            //variables img y caption del modal
            let modalImg = document.getElementById("vid01");
            //Modificar el contenido del modal
            function llamarModal(){
                modal.style.display = "block";
                modalImg.src = this.src;
                modalImg.play();
            }
            function playPause(myVideo) {
                if (myVideo.play)
                    myVideo.pause();
            }
            // Get the <span> element that closes the modal
            let spanMod = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            spanMod.onclick= function close() {
                modalImg.pause();
                modal.style.display = "none";

            }

        </script>
    </body>
</html>