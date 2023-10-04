<div>
    <div wire:ignore.self class="modal fade" id="esteliminar{{ $est->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white dark-mode">
                    <h5 class="modal-title font-weight-bold">Eliminar Tutor</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                <form wire:submit.prevent="eliminarEst">
                    @csrf
                    <div class="modal-body text-center">

                        @if (session()->has('cerrarModal'))
                            <script>
                                $(document).ready(function() {
                                    $('#esteliminar{{ $est->id }}').modal('hide');
                                })
                            </script>
                        @endif

                        <h4>¿Está seguro de eliminar a <span class="font-weight-bolder">{{ $est->apell }},
                                {{ $est->name }}</span>?</h4>
                        <p>Todos los registros de este estudiante se eliminarán definitivamente del sistema.</p>
                        <p class="font-italic bg-danger rounded dark-mode">Esta acción no se podrá deshacer.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button wire:click.prevent="eliminarEst" type="button" class="btn btn-danger">Eliminar
                            Estudiante</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
