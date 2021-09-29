//FUNCIONES PARA LA FUNCIONALIDAD RESPONSIVA DEL LOGIN 

    const inputs = document.querySelectorAll(".input");

    function addcl(){
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl(){
        let parent = this.parentNode.parentNode;
        if(this.value == ""){
            parent.classList.remove("focus");
        }
    }


    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });

// BOTON INICIAR SESIÓN EN EL LOGIN, CON ESTE SE INICIA LA SESIÓN, SE ENVIAN LOS DATOS POR AJAX
$(document).ready(function() {
    
    // agregar nuevo interno
    $('#btnIniciarSesion').click(function(){

        //SE VALIDA QUE SE INGRESE USUARIO Y CONTRASEÑA
        if($('#usuario').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese tu usuario',
            });
            return 0;
        }

        if($('#pass').val() == ""){
            Swal.fire({
                text: 'Por favor ingrese tu contraseña',
            });
            return 0;
        }

    
        let datos = $('#iniciarSesion').serialize();
        $.ajax({
            type: "POST",
            url:  "../../../Controller/UsuarioController.php",
            data: datos,
            success:function(r){

                //SE ENVIA AL DASHBOARD SI LOS DATOS SON CORRECTOS
				if(r == 1){
					window.location.assign("../dashboard.php");
				}

                //SE MUESTRA MENSAJE SI LOS DATOS SON INCORRECTOS. 
                if(r == 2){
					Swal.fire({
						text: 'Usuario o Contraseña incorrectos.',
					});
                }

				return 0;
            }
        });
    });

});
