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
            <form class="user" action="" id="services" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="name" id="name" class="form-control form-control-user" id="exampleFirstName" placeholder="Name">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="cost" id="cost" class="form-control form-control-user" id="exampleLastName" placeholder="Cost $">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="description" id="description" class="form-control form-control-user" id="exampleInputEmail" placeholder="description">
                </div>
                <div class="form-group">
                    <input type="file" name="image" id="image" class="form-control form-control-user" id="exampleInputEmail" placeholder="description">
                </div>

                <input type="submit" id="guardar" class="btn btn-primary btn-user btn-block" value="Save">
                <hr>
            </form>

        </div>

    </div>

    <div class="row">

        <!-- formulario para registrar the service-->


        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Cost</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Cost</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody id="servicios">
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </div>




</div>
<!-- /.container-fluid -->
<script src="./service/service.js"></script>


<?php
include_once './Plantilla/footer.php';
include_once './Plantilla/fin.php';
?>