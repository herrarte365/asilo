<!-- MODAL PARA ASIGNAR MEDICINA A LA CITA MEDICA -->
<div class="modal fade" id="formularioMedicia" tabindex="-1" aria-labelledby="formularioMediciaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formularioMediciaLabel">Agregar Medicina</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="agregarMedicina" method="POST">
                <input name="operacion" type="hidden" value="1">
                <input name="id_cita_medica" type="hidden" value="<?php echo $solicitud[0]['id_cita_medica'] ?>">
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="nombres" class="col-sm-2 col-form-label">Nombre Medicina</label>
                        <div class="col-sm-10">
                            <input 
                                name="nombre_medicina" 
                                type="text" 
                                class="form-control" 
                                id="nombre_medicina" 
                                value="<?php echo isset($interno[0]['nombres']) ? $interno[0]['nombres'] : '' ?>"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cantidad" class="col-sm-2 col-form-label">Cantidad</label>
                        <div class="col-sm-10">
                        <input name="cantidad" type="text" class="form-control" id="cantidad" value="<?php echo isset($interno[0]['apellidos']) ? $interno[0]['apellidos'] : '' ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tiempo_aplicacion" class="col-sm-2 col-form-label">Tiempo de aplicación</label>
                        <div class="col-sm-10">
                        <input name="tiempo_aplicacion" type="text" class="form-control" id="tiempo_aplicacion" value="<?php echo isset($interno[0]['cui']) ? $interno[0]['cui'] : '' ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="indicaciones" class="col-sm-2 col-form-label">Indicaciones</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="indicaciones" id="indicaciones"><?php echo isset($interno[0]['alergias']) ? $interno[0]['alergias'] : '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btnAgregarMedicina" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>