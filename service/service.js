$(document).ready(function () {
  /*$('#services').submit(e => {
        e.preventDefault();
        var foto = $('input[name="image"]')[0].files[0];
        const postData = {
          name: $('#name').val(),
          cost: $('#name').val(),
          description: $('#description').val(),
           image: foto
        };
        const url = 'http://localhost/Administrador/service/serviceInsertar.php';
        console.log(postData, url);
        $.post(url, postData, (response) => {
          console.log(response);
         // $('#task-form').trigger('reset');
         // fetchTasks();
        });
      });*/

  let edit = false;
  fetchTasks();

  $("#guardar").on("click", function () {
    var formData = new FormData();
    var name = $("#name").val();
    var costo = $("#cost").val();
    var _id = $("#_id").val();
    var description = $("#description").val();
    var files = $("#image")[0].files[0];
    if($("#name").val()==""  || $("#cost").val()=="" || $("#description").val()=="" || edit === false ? $("#image").val()=="":$("#name").val()=="" ){
      Swal.fire({
        icon: 'error',
        title: 'error',
        text: 'Empty fields'
      });

    }else{

    
    formData.append("file", files);
    formData.append("_id", _id);
    formData.append("name", name);
    formData.append("cost", costo);
    formData.append("description", description);
    $.ajax({
      url:
        edit === false
          ? "service/serviceInsertar.php"
          : "service/serviceEdit.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(JSON.parse(response));
        data = JSON.parse(response);
        if (data.success == 1) {
          Swal.fire({
            icon: 'success',
            title: data.title,
            text: data.mensaje
          });
          
          fetchTasks();
          $("#services").trigger("reset");
          let $select = $("#imagen-edit");
          $select.empty();
          edit=false;
        } else {
          //alert("Formato de imagen incorrecto.");
        }
      },
    });
    return false;
    }
  });

  //MOSTRANDO LOS SERVICIOS
  function fetchTasks() {
    $.ajax({
      url: "service/mostrar.php",
      type: "GET",
      success: function (response) {
        //console.log(JSON.parse(response));
        const tasks = JSON.parse(response);
        let template = "";
        tasks.forEach((task) => {
          template += `
                    <tr taskId="${task.id}">
                      <td>${task.name}</td>
                      <td>${task.description}</td>
                      <td>${task.cost}</td>
                      <td><img height="40px" src="data:image/png;base64,${task.image}"></td>
                      <td>${task.estado}</td>
                      <td>
                      <a title="Editar" class="nav-link edit-item" id-item="${task.id}">

                      <i class="fas fa-fw fa-edit"></i>
                      </a>
                      </td>
                      <td>
                      <a title="Cambio de Estado" class="nav-link estado-item " id-item="${task.id}">

                      <i class="fa fa-cog"></i>
                      </a>
                      </td>

                    </tr>
                  `;
        });
        $("#servicios").html(template);
      },
    });
  } //fin de mostrar en la tabla

  $("#dataTable").on("click", ".edit-item", function () {
    let id = $(this).attr("id-item");
    $("#_id").val(id);
    console.log(id);
    var formData = new FormData();

    formData.append("id", id);
    let $select = $("#imagen-edit");
    $select.empty();
    //otro ajax
    $.ajax({
      url: "service/edit.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        console.log(JSON.parse(response));
        data = JSON.parse(response);
        //console.log(data);
        $("#name").val(data.name_service);
        $("#cost").val(data.cost_service);
        $("#description").val(data.description);
        $("#_id").val(data.id);
        $select.append(
          '<center><img height="80px" name="image_edit" src="data:image/png;base64,' +
            data.image +
            '"></center>'
        );
        edit = true;
      },
    });
  });

  //PARA CAMBIAR EL ESTADO
  $(document).on("click", ".estado-item", function () {
    //muestra la alerta
    Swal.fire({
      title: 'Are you sure?',
      text: "The status will be changed and this service will no longer be displayed on the website!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes!'
    }).then((result) => {
      if (result.isConfirmed) {
        estado();
      }
    });
  });

  function estado(){
    
    let id = $(this).attr("id-item");
    $("#_id").val(id);
    console.log(id);
    var formData = new FormData();

    formData.append("id", id);
    
    //otro ajax
    $.ajax({
      url: "service/estado.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        data= JSON.parse(response);
        Swal.fire({
          icon: 'success',
          title: data.title,
          text: data.mensaje
        });
      },
    });
  }
  //FIN DE PARA CAMBIAR EL ESTADO

  //PARA EDITAR LA INFORMACION
  $(document).on("click", ".edit-ite", (e) => {
    e.preventDefault();

    //var id = $(this).attr("name");
    // var id= $(this).parent('tr').attr('taskId');
    alert(id);
    var data = $(this).attr("name");
    alert(data);

    //$('#_id').val(id);
  });
  //FIN DE EDIAR LA INFORMACION

  //<img height="70px" src="data:image/jpg;base64,base64_encode(${task.image});" alt=""></img>
});
