<?php
//Se trae el archivo de encabezado para los estilos y las rutas
include 'encabezado.html';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h2>Formulario a firmar.</h2>
                    <br>
                    <form action="assets/php/datatopdf.php" method="post" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4">
                            <label for="ApePatAs" class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" name="apellidop" id="apellidop"  >
                        </div>

                        <div class="col-md-4">
                            <label for="ApeMatAs" class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" name="apellidom" id="apellidom" >           
                        </div>

                        <div class="col-md-4">
                            <label for="nombreAs" class="form-label">Nombre(s)</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"  >
                        </div>

                        <div class="col-md-4">
                            <label for="FechaNacAs" class="form-label">Fecha de Nacimiento</label>
                            <div class="input-group">
                                <input type="date" name="fechana" id="fechana" class="form-control"  >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="CurpAs" class="form-label">CURP</label>
                            <div class="input-group">
                                <input type="text" name="curp" id="curp" class="form-control"  minlength="18"
                                    maxlength="18" title="Tu CURP aparece de acuerdo a tu ficha"  >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="RfcAs" class="form-label">RFC</label>
                            <div class="input-group">
                                <input type="text" name="rfc" id="rfc" class="form-control"  minlength="13"
                                      maxlength="13"  >
                                     
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="Sexo" class="form-label">Sexo</label>
                            <input type="text" class="form-control" name="sexo" id="sexo" >
                                    
                        </div>

                        <div class="col-md-3">
                            <label for="SexoAs" class="form-label">Edad</label>
                            <input type="number" class="form-control" name="edad" id="edad" >
                        </div>

                        <div class="col-md-3">
                            <label for="Promedio" class="form-label">Promedio</label>
                            <input type="number" class="form-control" name="promedio" id="promedio" >
                        </div>

                        <div class="col-md-3">
                            <label for="EdoCivilAs" class="form-label">No Control</label>
                            <input type="text" class="form-control" name="nocontrol" id="nocontrol"  >
                            <br>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" name="pdf">Firmar</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>



<?php
//Se trae el archivo de encabezado para los estilos y las rutas
include 'pie.html';
?>