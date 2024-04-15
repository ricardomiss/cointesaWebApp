$(document).ready(function() {
    $('table').DataTable({
        'lengthChange': false,
        'searching': true,
        'language': {
            'emptyTable': 'No hay datos disponibles en la tabla',
        },
        'order': [[ 0, 'desc' ]],
        'pageLength': 6
    });
});
$('#editModal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget)
    const usuario = button.data('user')
    const contrasena = button.data('pass')
    const nombre = button.data('name')
    const apellido = button.data('last')
    const estado = button.data('state')

    var modal = $(this)
    modal.find('.modal-body #usuario').val(usuario)
    modal.find('.modal-body #contrasena').val(contrasena)
    modal.find('.modal-body #nombre').val(nombre)
    modal.find('.modal-body #apellido').val(apellido)
    modal.find('.modal-body #estado').val(estado)
  })
  $('#readModals').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget)
    const nombre = button.data('name')
    const correo = button.data('email')
    const asunto = button.data('subject')
    const mensaje = button.data('message')
    const fecha = button.data('date')

    var modal = $(this)
    modal.find('.modal-header #nombre').text(nombre)
    modal.find('.modal-body #correo').text(correo)
    modal.find('.modal-body #asunto').text(asunto)
    modal.find('.modal-body #mensaje').html(mensaje)
    modal.find('.modal-body #fecha').text(fecha)
  })
// Adaptador nose aber
$(document).ready(function(){
    $("#opcion-servicio").change(function(){
        var selectedOption = $(this).children("option:selected").val();
        if (selectedOption == "0") {
            $("#Servicios").show();
            $("#Equipos").hide();
        } else if (selectedOption == "1") {
            $("#Equipos").show();
            $("#Servicios").hide();
        }
    });
});

$("#label").select2({
    'tags': true
});

$(document).ready(function(){
    function cargarDatos(){
        $.ajax({
            url: '../php/obtenerMarcas.php',
            type: 'get',
            dataType: 'JSON',
            success: function(response){
                $("#marcaselect").empty();
    
                var len = response.length;
                for(var i=0; i<len; i++){
                    var id = response[i].id;
                    var nombre = response[i].nombre;
                    $("#marcaselect").append("<option value='"+id+"'>"+nombre+"</option>");
                }
            }
        });
    }

    $('#registerModal').on('shown.bs.modal', function () {
        // Llamas a la función cargarDatos cuando el modal se abre
        cargarDatos();
    });

    //onclickbutton
    $("#Enviar").click(function(){
        // Aquí va el código para recoger los datos del formulario
        var datos = $("#formularioMarca").serialize();

        // Envías los datos con AJAX
        $.ajax({
            url: '../php/registrarMarcas.php',
            type: 'post',
            data: datos,
            success: function(){
                // Cierras el modal
                $('#exampleModal').modal('hide');
                // Recargas los datos del select
                cargarDatos();
            }
        });
    });

});

ClassicEditor
.create( document.querySelector('#editor'), {
    ckfinder: {
        uploadUrl: '../php/ckeditorImageUpload.php'
    }
} )
.then( editor => {
    console.log( editor );
} )
.catch( error => {
    console.error( error );
} );

document.getElementById('portada').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const fileType = file['type'];
        const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!validImageTypes.includes(fileType)) {
            alert('Tipo de archivo no permitido');
            this.value = '';
        } else {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreviewContainer').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
});
