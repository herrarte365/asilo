<!-- MODAL PARA CREAR NUEVO INTERNO -->
<div class="modal fade" id="asignarFechaVisita" tabindex="-1" aria-labelledby="asignarFechaVisitaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="asignarFechaVisitaLabel">Asignar Fecha de Visita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="asignarFechaVisita" method="POST" action="../../../Controller/SolicitudController.php">
                <input name="operacion" type="hidden" value="3"> <!-- El tres es para asignar fecha -->
                <input name="id_cita_medica" type="hidden" value="<?php echo $solicitud[0]['id_cita_medica'] ?>">
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="fecha_visita" class="col-sm-2 col-form-label">Fecha de Visita</label>
                        <div class="col-sm-10">
                            <input name="fecha_visita" type="date" class="form-control" id="fecha_visita" value="<?php echo isset($interno[0]['cui']) ? $interno[0]['cui'] : '' ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="hora_visita" class="col-sm-2 col-form-label">Hora de Visita</label>
                        <div class="col-sm-10">
                            <input name="hora_visita" type="time" class="form-control" id="hora_visita" value="<?php echo isset($interno[0]['cui']) ? $interno[0]['cui'] : '' ?>">
                        </div>
                    </div>                    
                    <div class="row mb-3">
                        <label for="especialista" class="col-sm-2 col-form-label">Medico Especialista</label>
                        <div class="col-sm-10">
                            <select id="especialista" name="especialista" class="form-select">
                                <option selected>Seleccionar</option>
                                <?php foreach($especialistas as $especialista){ 
                                    if($solicitud[0]['medico_especialista_id_medico_especialista'] == $especialista['id_medico_especialista']){
                                ?>
                                    <option selected value="<?php echo $especialista['id_medico_especialista'] ?>">
                                        <?php echo $especialista['nombre'] ?>
                                    </option>
                                <?php }else{ ?>
                                    <option value="<?php echo $especialista['id_medico_especialista'] ?>">
                                        <?php echo $especialista['nombre'] ?>
                                    </option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>                                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button  type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>