<!-- MODAL PARA ASIGNAR MEDICINA A LA CITA MEDICA -->
<div class="modal fade" id="registrarResultadoExamen" tabindex="-1" aria-labelledby="registrarResultadoExamenLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registrarResultadoExamenLabel">REGISTRAR RESULTADO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="agregarResultadoExamen" method="POST">
                <input name="operacion" type="hidden" value="3">
                <input name="id_detalle_cita_examen" type="hidden" value="<?php echo $detalleExamen[0]['id_detalle_cita_examen'] ?>">
                <div class="modal-body">

                    <div class="row mb-3">
                        <label for="resultado" class="col-sm-2 col-form-label">Resultado</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="resultado" id="resultado"><?php echo $detalleExamen[0]['resultado'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btnAgregarResultadoExamen" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>