<?php
session_start();
if(isset($_SESSION['nombre'])){
    if($_SESSION['tipo_usuario'] != 'administrador'){
        echo "No tienes permitido entrar a esta página";
        exit();
    }
}else{
    header("Location:../../sistemas_login/login.php");
}
?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../pagina_Anterior/css/estilosInicio.css">
        <link rel="stylesheet" href="../../pagina_Anterior/css/estilosGenerales.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montaga'>
        <script src="../../calendario/js/jquery.min.js"></script>
        <script src="../../calendario/js/moment.min.js"></script>
        <link rel="stylesheet" href="../../calendario/css/fullcalendar.min.css">
        <link rel="stylesheet" href="../../calendario/css/mymodal.css">
        <script src="../../calendario/js/fullcalendar.min.js"></script>
        <script src="../../calendario/js/es.js"></script>
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
                        include("../../sistema_login/manejador_sesiones.php");
                        $menu = get_Menu();

                        foreach( $menu as $opcion => $link){
                            echo "<li><a href=\"$link\">$opcion</a></li>";
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </header>
        <div class = "middle-content">
            <div id = "CalendarioWeb"></div>
            <!-- The Modal  for modify, add or eliminate-->
            <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
            <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Evento</h2>
            <h4 id="tituloEvento"></h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="txtID"  name="txtID"/>
                Fecha: <input type="text" disabled id="txtFecha" name = "txtFecha"/><br/>
                Titulo: <input type="text" id="txtTitulo" placeholder="Titulo del evento"/><br/>
                Hora: <input type ="datetime" id="txtHora" value = "10:30"/><br/>
                Descripcion: <textarea id = "txtDescripcion" rows = "3" placeholder="Descripción del evento"></textarea><br/>
                Color:<input type="color" value="#ff0000" id ="txtColor" style="height:36px;" ><br/>
            
            </div>
            <div class="modal-footer">
            <h3>Modal Footer</h3>
            <button type="button" id="btnAgregar">Agregar</button>
            <button type="button" id="btnModificar">Modificar</button>
            <button type="button" id="btnBorrar">Borrar</button>
            <button type="button" id="btnCancelar">Cancelar</button>
            </div>
            </div>

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
                            <?php
                                include("../../sistema_login/manejador_sesiones.php");
                                $menu = get_Menu();

                                foreach( $menu as $opcion => $link){
                                    echo "<li><a href=\"$link\">$opcion</a></li>";
                                }
                            ?>
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
        
        <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        </script>
        <script>
        $(document).ready(function(){
            $('#CalendarioWeb').fullCalendar({
                dayClick:function(date, jsEvent, view){
                    $('#btnAgregar').prop("disable", false);
                    $('#btnModificar').prop("disable", true);
                    $('#btnBorrar').prop("disable", true);
                    limpiarFormulario();                    
                    $('#txtFecha').val(date.format());
                    document.getElementById('myModal').style.display = "block";
                },
                        events: 'eventos.php',
                        
                eventClick:function(calEvent,jsEvent, view){
                    $('#btnAgregar').prop("disable", true);
                    $('#btnModificar').prop("disable", false);
                    $('#btnBorrar').prop("disable", false);
                    $('#tituloEvento').html(calEvent.title);
                    $('#txtDescripcion').val(calEvent.descripcion);
                    $('#txtID').val(calEvent.id);
                    $('#txtTitulo').val(calEvent.title);
                    $('#txtColor').val(calEvent.color);
                    FechaHora =calEvent.start._i.split(" ");
                    $('#txtFecha').val(FechaHora[0]);
                    $('#txtHora').val(FechaHora[1]);
                    document.getElementById('myModal').style.display = "block";
                }
                
            });
        });

    </script>
    <script>
        var NuevoEvento;
        $('#btnAgregar').click(function(){
            RecolectarDatos();
            EnviarInformacion('agregar', NuevoEvento);
            
        });
        $('#btnBorrar').click(function(){
            RecolectarDatos();
            EnviarInformacion('eliminar', NuevoEvento);
            
        });
        $('#btnModificar').click(function(){
            RecolectarDatos();
            EnviarInformacion('modificar', NuevoEvento);
            
        });

        function RecolectarDatos(){
            NuevoEvento = {
                id:$('#txtID').val(),
                title:$('#txtTitulo').val(),
                start:$('#txtFecha').val() + " "+ $('#txtHora').val(),
                color:$('#txtColor').val(),
                descripcion:$('#txtDescripcion').val(),
                textColor:"#FFFFFF",
                end:$('#txtFecha').val() + " "+ $('#txtHora').val()
            };
        }

        function EnviarInformacion(accion, objEvento){
            $.ajax({
                type:'POST',
                url:'../../calendario/eventos.php?accion='+accion,
                data:objEvento,
                success:function(msg){
                    if(msg){
                        alert("Acción realizada con éxito.");
                        $('#CalendarioWeb').fullCalendar('refetchEvents');
                        document.getElementById('myModal').style.display = "none";
                    }else{
                        alert("Ocurrió un problema al querer realizar cambios en la base de datos");
                    }
                },
                error:function(){
                    alert("Hay un error");
                }
            });
        }

        function limpiarFormulario(){
            $('#txtDescripcion').val('');
            $('#txtID').val('');
            $('#txtTitulo').val('');
            $('#txtColor').val('');
        }

    </script>

</body>
</html>