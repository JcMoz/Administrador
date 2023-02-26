$(document).ready(function () {
  //
  let tabla;

  //++++++++++++++++++++++++++++++++++++++++++++++++
  let edit = false;

  combo();
  //mostrar();
  mostrar();

  function combo() {
    $.ajax({
      url: "performed/mostrar_combo.php",
      type: "GET",
      success: function (response) {
        //console.log(JSON.parse(response));
        const tasks = JSON.parse(response);
        let template = "";
        tasks.forEach((task) => {
          template += `
            <option value="${task.id}">${task.name_service}</option>
                    `;
        });
        $("#id_servicio").html(template);
      },
    });
  } //fin de mostrar en el combo

  $("#guardar").on("click", function () {
    var formData = new FormData();
    var id_servicio = $("#id_servicio").val();
    var cliente = $("#cliente").val();
    var descripcion = $("#descripcion").val();
    var files = $("#image")[0].files[0];
    var estado = null;
    edit == false ? estado : (estado = $("#estado").val());

    var _id = $("#_id").val();

    

    if (
      $("#id_servicio").val() == "" ||
      $("#cliente").val() == "" ||
      $("#descripcion").val() == "" ||
      edit === false
        ? $("#image").val() == ""
        : $("#name").val() == ""
    ) {
      Swal.fire({
        icon: "error",
        title: "error",
        text: "Campos Vacios",
      });
    } else {
      formData.append("id_servicio", id_servicio);
      formData.append("cliente", cliente);
      formData.append("descripcion", descripcion);
      formData.append("file", files);
      formData.append("estado", estado);
      formData.append("_id", _id);

      $.ajax({
        url: edit === false ? "performed/insertar.php" : "performed/editar.php",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          // console.log('hola'+JSON.parse(response));
          data = JSON.parse(response);
          if (data.success == 1) {
            Swal.fire({
              icon: "success",
              title: data.title,
              text: data.mensaje,
            });
            $("#performed").trigger("reset");
            //  mostrar();
            let $select = $("#imagen-edit");
            $select.empty();
            let estadoVacio = $("#estado");
            estadoVacio.empty();
            
            refrescarTable();

            
            edit = false;
            
          } else {
            //alert("Formato de imagen incorrecto.");
          }
        },
      });
      return false;
    }
  });

  function mostrar() {
   tabla = jQuery("#dataTable").DataTable({
      language: {
        decimal: ".",
        emptyTable: "No hay datos para mostrar",
        info: "Del _START_ al _END_ (_TOTAL_ total)",
        infoEmpty: "Del 0 al 0 (0 total)",
        infoFiltered: "(Filtrado de todas las _MAX_ entradas)",
        infoPostFix: "",
        thousands: "'",
        lengthMenu: "Mostrar _MENU_ entradas",
        loadingRecords: "Cargando...",
        processing: "Procesando...",
        search: "Buscar:",
        zeroRecords: "No hay resultados",
        paginate: {
          first: "Primero",
          last: "Último",
          next: "Siguiente",
          previous: "Anterior",
        },
        aria: {
          sortAscending: ": Ordenar de manera Ascendente",
          sortDescending: ": Ordenar de manera Descendente ",
        },
      },
      pagingType: "full_numbers",
      lengthMenu: [
        [5, 10, 20, 25, 50, -1],
        [5, 10, 20, 25, 50, "Todos"],
      ],
      iDisplayLength: 5,
      responsive: true,
      autoWidth: true,
      deferRender: true,
      ajax: {
        url: "performed/mostrar_table.php",
        method: "GET",
        dataSrc: function (json) {
          return json;
        },
      },
      columns: [
        { data: "i" },
        { data: "name_service" },
        { data: "cliente" },
        { data: "descripcion" },
        { data: "image" },
        { data: "estado" },
        { data: "botones" },
      ],
    });
  }

  function refrescarTable() {
    tabla.ajax.url("performed/mostrar_table.php").load();
  }

  $("#dataTable").on("click", ".edit-item", function () {
    let id = $(this).attr("id-item");
    $("#_id").val(id);
    console.log(id);
    var formData = new FormData();

    formData.append("id", id);
    let $select = $("#imagen-edit");
    $select.empty();
    let estado = $("#estado");
    estado.empty();
    //otro ajax
    $.ajax({
      url: "performed/editar_mostrar.php",
      type: "post",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        // console.log(JSON.parse(response));
        data = JSON.parse(response);
        Swal.fire({
          icon: "success",
          title: "Data displayed correctly",
          text: "See data above",
        });
        //console.log(data);
        $("#id_servicio").val(data.id_servicio);
        $("#descripcion").val(data.descripcion);
        $("#cliente").val(data.cliente);
        $("#_id").val(data.id);
        estado.append(
          '<label>Select the status of the publication</label><select class="form-control " name="estado" id="estado"><option value="">Seleccione</option><option value="Activo" selected>Activo</option><option value="Inactivo">Inactivo</option></select>'
        );
        $select.append(
          '<center><img height="80px" name="image_edit" src="data:image/png;base64,' +
            data.image +
            '"></center>'
        );
        edit = true;
      },
    });
  });
});
