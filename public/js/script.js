// PARA EL FUNCIONAMIENTO DEL MENU LATERAL 
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
    if(sidebar.classList.contains("open")){
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
    }else {
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
    }
}

$(document).ready(function() {
    
    // Esto inicializa las tablas de datatables library
    $('#tablas').DataTable({
        "scrollX": true,
        "pagingType": "simple",
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });

    // agregar nuevo interno
    $('#btnAgregarInterno').click(function(){

        if($('#nombres').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese el nombre del paciente',
            });
            return 0;
        }

        if($('#fecha_nac_interno').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese la fecha de nacimiento del paciente',
            });
            return 0;
        }

        if($('#apellidos').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese el apellido del paciente',
            });
            return 0;

        }
        
        if($('#nombre').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese el nombre del encargado',
            });
            return 0;

        }

        if($('#telefono').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese un numero de contacto para el encargado',
            });
            return 0;

        }

        if($('#direccion').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese una dirección para el encargado',
            });
            return 0;
        }

        let datos = $('#agregarInterno').serialize();
        $.ajax({
            type: "POST",
            url:  "../../../Controller/InternoController.php",
            data: datos,
            success:function(r){
                alert(r);
                if(r == 1){

                    Swal.fire({
                        text: 'Paciente Guardado con éxito',
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {

                        if (result.isConfirmed) {
                            
                            location.reload();
                        }
                    });
                }else if( r == 2 ){
                    Swal.fire({
                        text: 'Paciente Actualizado con éxito',
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {

                        if (result.isConfirmed) {
                            
                            location.reload();
                        }
                    });
                }
            }
        });
    });

    $('#log_out').click(function(){
        $.ajax({
            type: "POST",
            url:  "../../../Controller/UsuarioController.php",
            data: {'operador': 2},
            success:function(r){
                var rutaAbsoluta = self.location.href;   
                var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
                var rutaRelativa = rutaAbsoluta.substring( posicionUltimaBarra + "/".length , rutaAbsoluta.length );
                
                if(rutaRelativa == "dashboard.php"){
                    window.location.assign("../View/login/login.php");
                }else{
                    window.location.assign("../login/login.php");
                }
            }
        });
    });

});


