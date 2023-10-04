<div>
    <div wire:ignore.self class="modal fade" id="tutorestado{{ $tutor->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info text-white dark-mode">
                    <h5 class="modal-title font-weight-bold">Cambiar Estado del Tutor</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                <form wire:submit.prevent="cambiarEstado">
                    @csrf
                    <div class="modal-body text-center">

                        @if (session()->has('cerrarModal'))
                            <script>
                                $(document).ready(function() {
                                    $('#tutorestado{{ $tutor->id }}').modal('hide');
                                })
                            </script>
                        @endif

                        @if ($tutor->estado == 1)
                            <h4>¿Está seguro de <i class="font-weight-bolder">Deshabilitar</i> a <span
                                    class="font-weight-bolder">{{ $tutor->apell }},
                                    {{ $tutor->name }}</span>?</h4>
                            <p>El tutor será deshabilitado y no podrá acceder al sistema.</p>
                        @else
                            <h4>¿Está seguro de <i class="font-weight-bolder">Habilitar</i> a <span
                                    class="font-weight-bolder">{{ $tutor->apell }},
                                    {{ $tutor->name }}</span>?</h4>
                            <p>El tutor será habilitado y podrá acceder nuevamente al sistema.</p>
                        @endif
                    </div>
                    @if ($tutor->estado == 1)
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button wire:click.prevent="cambiarEstado" type="button" class="btn btn-danger">
                                Deshabilitar Tutor
                            </button>
                        </div>
                    @else
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button wire:click.prevent="cambiarEstado" type="button" class="btn btn-info">
                                Habilitar Tutor
                            </button>
                        </div>
                    @endif

                </form>
            </div>
        </div>
    </div>
</div>
