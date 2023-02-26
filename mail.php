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
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="hidden" id="_id" name="_id">
                        <input type="text" name="email" id="email" class="form-control form-control-user" placeholder="Email" required disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" name="name" id="name" class="form-control form-control-user" placeholder="Name" required disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <textarea class="form-control form-control-user" name="reply" id="reply" cols="10" rows="2"></textarea>
                    </div>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Questions</th>
                                    <th>State</th>
                                    <th>Reply</th>
                                    <th>Send</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>N°</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Questions</th>
                                    <th>State</th>
                                    <th>Reply</th>
                                    <th>Send</th>

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
<script src="./question/question.js"></script>


<?php
include_once './Plantilla/footer.php';
include_once './Plantilla/fin.php';
?>