<div>
    <div wire:ignore.self class="modal fade" id="seguimientoCrear" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white dark-mode">
                    <h5 class="modal-title font-weight-bold">Nuevo Seguimiento</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                <form wire:submit.prevent="guardarSeguimiento">
                    @csrf
                    <div class="modal-body">

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <strong>Error</strong>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        @if (session()->has('cerrarModal'))
                            <script>
                                $(document).ready(function() {
                                    $('#seguimientoCrear').modal('hide');
                                })
                            </script>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="titulo">Título</label>
                                    <input wire:model="seg.titulo" type="text" class="form-control" id="titulo"
                                        placeholder="Título del seguimiento">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="obs">Observaciones</label>
                                    <textarea wire:model="seg.observaciones" class="form-control" rows="3"
                                        placeholder="Observaciones que desea registrar ..." id="obs"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button wire:click.prevent="guardarSeguimiento" type="button"
                            class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
