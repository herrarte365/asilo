<!-- MODAL PARA CREAR NUEVO INTERNO -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Interno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="agregarInterno" method="POST">
                <input name="operacion" type="hidden" value="<?php echo isset($interno[0]['id_ficha_interno']) ? '2' : '1' ?>">
                <input name="id_ficha_interno" type="hidden" value="<?php echo isset($interno[0]['id_ficha_interno']) ? $interno[0]['id_ficha_interno'] : '' ?>">
                <input name="id_encargado" type="hidden" value="<?php echo isset($interno[0]['id_encargado']) ? $interno[0]['id_encargado'] : '' ?>">
                <div class="modal-body">
                    <h4>Datos del Paciente</h4>
                    <hr>

                    <div class="row mb-3">
                        <label for="nombres" class="col-sm-2 col-form-label">Nombres</label>
                        <div class="col-sm-10">
                            <input 
                                name="nombres" 
                                type="text" 
                                class="form-control" 
                                id="nombres" 
                                value="<?php echo isset($interno[0]['nombres']) ? $interno[0]['nombres'] : '' ?>"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                        <div class="col-sm-10">
                        <input name="apellidos" type="text" class="form-control" id="apellidos" value="<?php echo isset($interno[0]['apellidos']) ? $interno[0]['apellidos'] : '' ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dpi_interno" class="col-sm-2 col-form-label">Número de DPI</label>
                        <div class="col-sm-10">
                        <input name="dpi_interno" type="text" class="form-control" id="dpi_interno" value="<?php echo isset($interno[0]['cui']) ? $interno[0]['cui'] : '' ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fecha_nac_interno" class="col-sm-2 col-form-label">Fecha de Nacimiento</label>
                        <div class="col-sm-10">
                        <input name="fecha_nac_interno" type="date" class="form-control" id="fecha_nac_interno" value="<?php echo isset($interno[0]['fecha_nacimiento']) ? $interno[0]['fecha_nacimiento'] : '' ?>">
                        </div>
                    </div>       
                    <div class="row mb-3">
                        <label for="medico_personal" class="col-sm-2 col-form-label">Médico Personal</label>
                        <div class="col-sm-10">
                        <input name="medico_personal" type="text" class="form-control" id="medico_personal" value="<?php echo isset($interno[0]['medico_personal']) ? $interno[0]['medico_personal'] : '' ?>">
                        </div>
                    </div>   
                    <div class="row mb-3">
                        <label for="telefono_medico" class="col-sm-2 col-form-label">Telefono del Médico Personal</label>
                        <div class="col-sm-10">
                        <input name="telefono_medico" type="text" class="form-control" id="inputEmail3" value="<?php echo isset($interno[0]['telefono_medico']) ? $interno[0]['telefono_medico'] : '' ?>">
                        </div>
                    </div>  
                        
                    <h4>Antecedentes Médicos</h4>
                    <hr>
                    <div class="row mb-3">
                        <label for="grupo_sanguineo" class="col-sm-2 col-form-label">Grupo Sanguíneo</label>
                        <div class="col-sm-10">
                        <input name="grupo_sanguineo" type="text" class="form-control" id="grupo_sanguineo" value="<?php echo isset($interno[0]['grupo_sanguineo']) ? $interno[0]['grupo_sanguineo'] : '' ?>">
                        </div>
                    </div> 


                    <div class="row mb-3">
                        <label for="alergia" class="col-sm-2 col-form-label">Alergias</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="alergia" id="alergia"><?php echo isset($interno[0]['alergias']) ? $interno[0]['alergias'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="enfermedades_cronicas" class="col-sm-2 col-form-label">Enfermedades Crónicas</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="enfermedades_cronicas" name="enfermedades_cronicas"><?php echo isset($interno[0]['enfermedades_cronicas']) ? $interno[0]['enfermedades_cronicas'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="receta_medica" class="col-sm-2 col-form-label">Receta Medica</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="receta_medica" id="receta_medica"><?php echo isset($interno[0]['receta_medico']) ? $interno[0]['receta_medico'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="observaciones" class="col-sm-2 col-form-label">Observaciones</label>
                        <div class="col-sm-10">
                            <textarea name="observaciones" class="form-control" id="observaciones" rows="3"><?php echo isset($interno[0]['observaciones']) ? $interno[0]['observaciones'] : '' ?></textarea>
                        </div>
                    </div>
                    <h4>Datos del Encargado</h4>
                    <hr>
                    <div class="row mb-3">
                        <label for="nombre_encargado" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input name="nombre_encargado" type="text" class="form-control" id="nombre_encargado" value="<?php echo isset($interno[0]['nombre']) ? $interno[0]['nombre'] : '' ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dpi_encargado" class="col-sm-2 col-form-label">Número de DPI</label>
                        <div class="col-sm-10">
                            <input name="dpi_encargado" type="text" class="form-control" id="dpi_encargado" value="<?php echo isset($interno[0]['cui_encargado']) ? $interno[0]['cui_encargado'] : '' ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="telefono_encarado" class="col-sm-2 col-form-label">Número de Telefono</label>
                        <div class="col-sm-10">
                            <input name="telefono_encargado" type="text" class="form-control" id="telefono_encarado" value="<?php echo isset($interno[0]['telefono']) ? $interno[0]['telefono'] : '' ?>">
                        </div>
                    </div>                        
                    <div class="row mb-3">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                            <input name="direccion" type="text" class="form-control" id="direccion" value="<?php echo isset($interno[0]['direccion']) ? $interno[0]['direccion'] : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btnAgregarInterno" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>