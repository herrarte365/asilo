<!-- MODAL PARA CREAR NUEVO INTERNO -->
<div class="modal fade" id="solicitudVisitaMedica" tabindex="-1" aria-labelledby="solicitudVisitaMedicaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"> 
                <h5 class="modal-title" id="solicitudVisitaMedicaLabel">Crear Solicitud de Visita Medica</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="agregarVisitaMedica" method="POST">
                <input name="operacion" type="hidden" value="<?php echo isset($solicitud[0]['id_cita_medica']) ? '2' : '1' ?>">
                <input name="id_ficha_interno" type="hidden" value="<?php echo $interno[0]['id_ficha_interno'] ?>">
                <input name="id_cita_medica" type="hidden" value="<?php echo $solicitud[0]['id_cita_medica'] ?>">
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="motivo_visita" class="col-sm-2 col-form-label">Motivo de la Visita</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="motivo_visita" id="motivo_visita"><?php echo isset($solicitud[0]['motivo_visita']) ? $solicitud[0]['motivo_visita'] : "" ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="enfermero" class="col-sm-2 col-form-label">Enfermero</label>
                        <div class="col-sm-10">
                            <select id="enfermero" name="enfermero" class="form-select">
                                <option selected>Seleccionar</option>
                                <?php foreach($enfermeros as $enfermero){ 
                                    if($solicitud[0]['enfermero_id_enfermero'] == $enfermero['id_enfermero']){
                                ?>
                                    <option selected value="<?php echo $enfermero['id_enfermero'] ?>">
                                        <?php echo $enfermero['nombre_enfermero'] ?>
                                    </option>
                                <?php }else{ ?>
                                    <option value="<?php echo $enfermero['id_enfermero'] ?>">
                                        <?php echo $enfermero['nombre_enfermero'] ?>
                                    </option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="especialidad" class="col-sm-2 col-form-label">Especialidad</label>
                        <div class="col-sm-10">
                            <select id="especialidad" name="especialidad" class="form-select">
                                <option selected>Seleccionar</option>
                                <?php foreach($especialidades as $especialidad){ 
                                    if($solicitud[0]['especialidad'] == $especialidad['id_especialidad']){
                                ?>
                                    <option selected value="<?php echo $especialidad['id_especialidad'] ?>">
                                        <?php echo utf8_encode($especialidad['nombre_especialidad']) ?>
                                    </option>
                                <?php }else { ?>
                                    <option value="<?php echo $especialidad['id_especialidad'] ?>">
                                        <?php echo utf8_encode($especialidad['nombre_especialidad']) ?>
                                    </option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>                                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btnAgregarVisitaMedica" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>