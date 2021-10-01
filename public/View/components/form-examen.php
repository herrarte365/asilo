<!-- MODAL PARA CREAR NUEVO INTERNO -->
<div class="modal fade" id="solicitarExamen" tabindex="-1" aria-labelledby="solicitarExamenLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="solicitarExamenLabel">Solicitud de Examen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="agregarExamen" method="POST">
                <input name="operacion" type="hidden" value="1">
                <input name="id_cita_medica" type="hidden" value="<?php echo $solicitud[0]['id_cita_medica'] ?>">
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="id_examen" class="col-sm-2 col-form-label">Examen</label>
                        <div class="col-sm-10">
                            <select id="id_examen" name="id_examen" class="form-select">
                                <option selected>Seleccionar</option>
                                <?php foreach($examenes as $examen){ ?>
                                    <option value="<?php echo $examen['id_examen'] ?>">
                                        <?php echo $examen['nombre_examen'] . ' ' . $examen['descripcion'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btnAgregarExamen" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>