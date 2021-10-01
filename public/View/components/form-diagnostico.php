<!-- MODAL PARA REGISTRAR EL DIAGNOSTICO -->
<div class="modal fade" id="registrarDiagnostico" tabindex="-1" aria-labelledby="registrarDiagnosticoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registrarDiagnosticoLabel">Agregar Diagnostico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="agregarDiagnostico" method="POST">
                <input name="operacion" type="hidden" value="5">
                <input name="id_cita_medica" type="hidden" value="<?php echo $solicitud[0]['id_cita_medica'] ?>">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="diagnostico" class="col-sm-2 col-form-label">Diagnostico</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="diagnostico" id="diagnostico"><?php echo isset($solicitud[0]['diagnostico']) ? $solicitud[0]['diagnostico'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="observaciones_medicas" class="col-sm-2 col-form-label">Observaciones medicas</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="observaciones_medicas" name="observaciones_medicas"><?php echo isset($solicitud[0]['observaciones_medicas']) ? $solicitud[0]['observaciones_medicas'] : '' ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btnAgregarDiagnostico" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>