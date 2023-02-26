<?php
include_once './Plantilla/cabecera.php';
include_once './Plantilla/sidebar.php';
include_once './Plantilla/topBar.php';
?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!--HEADING VACIO PARA MANTENER UN MARGEN-->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- formulario para registrar the service-->
        <div class="col-xl-2 col-md-2 mb-4">

        </div>

        <div class="col-xl-7 col-md-8 mb-4">
            <form class="user" action="" id="performed" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="hidden" id="_id" name="_id">
                        <label>Select the service</label>

                        <select class="form-control " name="id_servicio" id="id_servicio">
                            <option value="">Seleccione</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label></label>
                        <label>Description of the service performed</label>
                        <textarea class="form-control form-control-user" name="descripcion" id="descripcion" cols="10" rows="2"></textarea>
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label>Client to whom the service was performed</label>
                        <input type="text" name="cliente" id="cliente" class="form-control form-control-user" placeholder="Client to whom the service was performed" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0" id="estado">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="file" name="image" id="image" class="form-control form-control-user" placeholder="description" required>
                    </div>
                </div>
                <div class="form-group" id="imagen-edit">
                </div>
                <input type="submit" id="guardar" class="btn btn-primary btn-user btn-block" value="Send">
                <hr>
            </form>

        </div>

    </div>

    <div class="row">

        <!-- formulario para registrar the service-->


        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Questions registered on the website</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Service performed</th>
                                    <th>Client</th>
                                    <th>Service description</th>
                                    <th>Image</th>
                                    <th>State</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Service performed</th>
                                    <th>Client</th>
                                    <th>Service description</th>
                                    <th>Image</th>
                                    <th>State</th>
                                    <th>Action</th>

                                </tr>
                            </tfoot>
                            <tbody id="question">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>




</div>
<!-- /.container-fluid -->
<script src="./performed/perfor.js"></script>


<?php
include_once './Plantilla/footer.php';
include_once './Plantilla/fin.php';
?>