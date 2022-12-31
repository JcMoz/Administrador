$(document).ready(function() {

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
      fetchTasks();

      $("#guardar").on('click', function() {
        var formData = new FormData();
        var name = $('#name').val();
        var costo = $('#cost').val();
        var description = $('#description').val();
        var files = $('#image')[0].files[0];
        
        formData.append('file',files);
        formData.append('name',name);
        formData.append('cost',costo);
        formData.append('description',description);
        $.ajax({
            url: 'service/serviceInsertar.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                  fetchTasks();
                    //$(".card-img-top").attr("src", response);
                } else {
					alert('Formato de imagen incorrecto.');
				}
            }
        });
		return false;
    });

    //MOSTRANDO LOS SERVICIOS
    function fetchTasks() {
      $.ajax({
        url: 'service/mostrar.php',
        type: 'GET',
        success: function(response) {
      //console.log(JSON.parse(response));
          const tasks = JSON.parse(response);
          let template = '';
          tasks.forEach(task => {
            template += `
                    <tr taskId="${task.id}">
                    <td>${task.name}</td>
                    <td>${task.cost}</td>
                    <td>${task.description}</td>

                    <td><img height="50px" src="data:image/png;base64,${task.image}"></td>

                    <td>
                    <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-edit"></i>
                    </td>

                    </tr>
                  `
          });
          $('#servicios').html(template);
        }
      });
    }
//<img height="70px" src="data:image/jpg;base64,base64_encode(${task.image});" alt=""></img>

});