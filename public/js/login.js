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


$(document).ready(function() {
    
    // agregar nuevo interno
    $('#btnIniciarSesion').click(function(){

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

				if(r == 1){
					window.location.assign("../dashboard.php");
				}

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
