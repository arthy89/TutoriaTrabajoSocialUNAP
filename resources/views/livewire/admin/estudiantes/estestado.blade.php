<div>
    <div wire:ignore.self class="modal fade" id="estestado{{ $est->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white dark-mode">
                    <h5 class="modal-title font-weight-bold">Cambiar Estado del Estudiante</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                <form wire:submit.prevent="cambiarEstado">
                    @csrf
                    <div class="modal-body text-center">

                        @if (session()->has('cerrarModal'))
                            <script>
                                $(document).ready(function() {
                                    $('#estestado{{ $est->id }}').modal('hide');
                                })
                            </script>
                        @endif

                        @if ($est->estado == 1)
                            <h4>¿Está seguro de <i class="font-weight-bolder">Deshabilitar</i> a <span
                                    class="font-weight-bolder">{{ $est->apell }},
                                    {{ $est->name }}</span>?</h4>
                            <p>El estudiante será deshabilitado y no podrá acceder al sistema.</p>
                        @else
                            <h4>¿Está seguro de <i class="font-weight-bolder">Habilitar</i> a <span
                                    class="font-weight-bolder">{{ $est->apell }},
                                    {{ $est->name }}</span>?</h4>
                            <p>El estudiante será habilitado y podrá acceder nuevamente al sistema.</p>
                        @endif
                    </div>
                    @if ($est->estado == 1)
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button wire:click.prevent="cambiarEstado" type="button" class="btn btn-danger">
                                Deshabilitar Estudiante
                            </button>
                        </div>
                    @else
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button wire:click.prevent="cambiarEstado" type="button" class="btn btn-info">
                                Habilitar Estudiante
                            </button>
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
