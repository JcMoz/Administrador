$(document).ready(function () {
   
  
    let edit = false;
    questions();
  
    $("#guardar").on("click", function () {
      var formData = new FormData();
      var reply = $("#reply").val();
      var name = $("#name").val();
      var _id = $("#_id").val();
      var correo = $("#email").val();

      if (
        $("#reply").val() == "" ||
        $("#name").val() == "" ||
        $("#email").val() == "" 
      ) {
        Swal.fire({
          icon: "error",
          title: "error",
          text: "Empty fields",
        });
      } else {
        formData.append("name", name);
        formData.append("_id", _id);
        formData.append("email", correo);
        formData.append("reply", reply);
        $.ajax({
          url:"question/enviar.php",
          type: "post",
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            console.log(JSON.parse(response));
            data = JSON.parse(response);
            if (data.success == 1) {
              Swal.fire({
                icon: "success",
                title: data.title,
                text: data.mensaje,
              });
  
              questions();
              $("#services").trigger("reset");
            } else {
              //alert("Formato de imagen incorrecto.");
            }
          },
        });
        return false;
      }
    });
  
    //MOSTRANDO LOS SERVICIOS
    function questions() {
      $.ajax({
        url: "question/mostrar_question.php",
        type: "GET",
        success: function (response) {
          console.log(JSON.parse(response));
          const tasks = JSON.parse(response);
          let template = "";
          let i=0;
          tasks.forEach((task) => {
            i++;
            template += `
                      <tr taskId="${task.id}">
                        <td>${i}</td>
                        <td>${task.name}</td>
                        <td>${task.correo}</td>
                        <td>${task.question}</td>
                        <td>${task.estado}</td>
                        <td>${task.reply}</td>

                        <td>
                        <a title="Reply" class="nav-link edit-item" id-item="${task.id}">
  
                        <i class="fas fa-fw fa-envelope"></i>
                        </a>
                        </td>
  
                      </tr>
                    `;
          });
          $("#question").html(template);
        },
      });
    } //fin de mostrar en la tabla
  
    $("#dataTable").on("click", ".edit-item", function () {
      let id = $(this).attr("id-item");
      $("#_id").val(id);
      console.log(id);
      var formData = new FormData();
  
      formData.append("id", id);
     
      //otro ajax
      $.ajax({
        url: "question/edit.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          //console.log(JSON.parse(response));
          data = JSON.parse(response);
          Swal.fire({
            icon: "success",
            title: "Data loaded successfully",
            text: "Proceed to respond to the email",
          });

          //console.log(data);
          $("#email").val(data.correo);
          $("#name").val(data.name);

         
        },
      });
    });
  
    //PARA CAMBIAR EL ESTADO
    $("#dataTable").on("click", ".estado-item", function () {
      //muestra la alerta
      Swal.fire({
        title: "Are you sure?",
        text: "The status will be changed and this service will no longer be displayed on the website!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes!",
      }).then((result) => {
        if (result.isConfirmed) {
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
              data = JSON.parse(response);
              Swal.fire({
                icon: "success",
                title: data.title,
                text: data.mensaje,
              });
              fetchTasks();
  
            },
          });
        }
      });
    });
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
  