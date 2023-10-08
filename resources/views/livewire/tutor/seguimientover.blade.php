<div>
    <div wire:ignore.self class="modal fade" id="segVer{{ $seguimiento->id_seg }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Ver seguimiento {{ $seguimiento->num_seg }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control disabled" id="titulo"
                                    placeholder="Título del seguimiento" disabled value="{{ $seguimiento->titulo }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="obs">Observaciones</label>
                                <textarea class="form-control disabled" rows="3" placeholder="Observaciones que desea registrar ..."
                                    id="obs" disabled>{{ $seguimiento->observaciones }}</textarea>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="tutor">Tutor registrador</label>
                                <input type="text" class="form-control disabled" id="tutor"
                                    placeholder="Título del seguimiento" disabled value="{{ $seguimiento->tutor }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="fechac">Fecha creada</label>
                                <input type="text" class="form-control disabled" id="fechac"
                                    placeholder="Título del seguimiento" disabled
                                    value="{{ date('d/m/Y', strtotime($seguimiento->created_at)) }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="fechau">Fecha actualizada</label>
                                <input type="text" class="form-control disabled" id="fechau"
                                    placeholder="Título del seguimiento" disabled
                                    value="{{ date('d/m/Y', strtotime($seguimiento->updated_at)) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
