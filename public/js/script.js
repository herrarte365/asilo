// PARA EL FUNCIONAMIENTO DEL MENU LATERAL 
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
});

function menuBtnChange() {
    if(sidebar.classList.contains("open")){
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
    }else {
        closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
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

    // BOTON PARA AGREGAR NUEVO INTERNO.
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

    // BOTON PARA CERRAR SESIÓN
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

    // BOTON PARA AGREGAR NUEVA SOLICITUD DE CITA MEDICA.
    $('#btnAgregarVisitaMedica').click(function(){

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

        let datos = $('#agregarVisitaMedica').serialize(); 
        $.ajax({
            type: "POST",
            url:  "../../../Controller/SolicitudController.php",
            data: datos,
            success:function(r){
                
                if(r == 1){

                    Swal.fire({
                        text: 'Solicitud Enviada con éxito',
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {

                        if (result.isConfirmed) {
                            
                            location.reload();
                        }
                    });
                }else if( r == 2 ){
                    Swal.fire({
                        text: 'Solicitud Actualizada con éxito',
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

    // BOTON PARA NEGAR LA VISITA MEDICA
    $('#btnNegarVisita').click(function(){
    
            Swal.fire({
                title: '¿Esta seguro de rechazar esta solicitud?',
                showDenyButton: true,
                confirmButtonText: 'Aceptar',
                denyButtonText: `Cancelar`,
              }).then((result) => {

                if (result.isConfirmed) {
                    let datos = $('#negarVisita').serialize();

                    $.ajax({
                        type: "POST",
                        url:  "../../../Controller/SolicitudController.php",
                        data: datos,
                        success:function(r){
                            if(r == 1){
            
                                Swal.fire({
                                    text: 'Solicitud Cancelada con éxito',
                                    confirmButtonText: 'Aceptar',
                                }).then((result) => {
            
                                    if (result.isConfirmed) {
                                        
                                        location.reload();
                                    }
                                });
                            }
                        }
                    });
                }
              })

            
    });

    // BOTON PARA AGREGAR SOLICITUD DE EXAMEN.
    $('#btnAgregarExamen').click(function(){

        if($('#nombre_examen').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese el nombre del examen',
            });
            return 0;
        }

        if($('#descripcion').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese una descripción para el examen',
            });
            return 0;
        }

        let datos = $('#agregarExamen').serialize();
        $.ajax({
            type: "POST",
            url:  "../../../Controller/ExamenController.php",
            data: datos,
            success:function(r){
                alert(r);
                if(r == 1){

                    Swal.fire({
                        text: 'Examen solicitado con éxito',
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {

                        if (result.isConfirmed) {
                            
                            location.reload();
                        }
                    });
                    
                }else{

                }
            }
        });
    });

    // BOTON PARA REGISTRAR EL DIAGNOSTICO DEL MEDICO ESPECIALISTA
    $('#btnAgregarDiagnostico').click(function(){

        if($('#diagnostico').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese un diagnostico.',
            });
            return 0;
        }

        let datos = $('#agregarDiagnostico').serialize();
        $.ajax({
            type: "POST",
            url:  "../../../Controller/SolicitudController.php",
            data: datos,
            success:function(r){
                // alert(r);
                if(r == 1){

                    Swal.fire({
                        text: 'Diagnostico Registrado con Éxito',
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {

                        if (result.isConfirmed) {
                            
                            location.reload();
                        }
                    });
                    
                }else{
                    
                }
            }
        });
    });

    // BOTON PARA REGISTRAR MEDICINA PARA EL PACIENTE
    $('#btnAgregarMedicina').click(function(){

        if($('#nombre_medicina').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese el nombre de la medicina.',
            });
            return 0;
        }

        if($('#cantidad').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese una cantidad de medicina.',
            });
            return 0;
        }

        if($('#indicaciones').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese las indicaciones de consumo.',
            });
            return 0;
        }

        if($('#tiempo_aplicacion').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese el tiempo que debera tomar la medicina.',
            });
            return 0;
        }

        let datos = $('#agregarMedicina').serialize();
        $.ajax({
            type: "POST",
            url:  "../../../Controller/medicamentoController.php",
            data: datos,
            success:function(r){
                alert(r);
                if(r == 1){

                    Swal.fire({
                        text: 'Medicina Registrada con Éxito',
                        confirmButtonText: 'Aceptar',
                    }).then((result) => {

                        if (result.isConfirmed) {
                            
                            location.reload();
                        }
                    });
                    
                }else{
                    
                }
            }
        });
    });

    // BOTON PARA ACTUALIZAR LA AGENDA MEDICA
    $('#btnActualizarAgendaMedica').click(function(){

        // ESTO RECARGA LA PAGINA PARA REFRESCAR LOS  DATOS POR SI SE AGREGO ALGO MAS A LA BD
        location.reload();

    });

});


