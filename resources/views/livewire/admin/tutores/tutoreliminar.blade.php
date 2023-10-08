<div>
    <div wire:ignore.self class="modal fade" id="tutorliminar{{ $tutor->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white dark-mode">
                    <h5 class="modal-title font-weight-bold">Eliminar Tutor</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                <form wire:submit.prevent="eliminarTutor">
                    @csrf
                    <div class="modal-body text-center">

                        @if (session()->has('cerrarModal'))
                            <script>
                                $(document).ready(function() {
                                    $('#tutorliminar{{ $tutor->id }}').modal('hide');
                                })
                            </script>
                        @endif

                        <h4>¿Está seguro de eliminar a <span class="font-weight-bolder">{{ $tutor->apell }},
                                {{ $tutor->name }}</span>?</h4>
                        <p>Los estudiantes a cargo de este tutor se desvincularán pero no se borrarán del sistema.</p>
                        <p class="font-italic bg-danger rounded dark-mode">Esta acción no se podrá deshacer.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button wire:click.prevent="eliminarTutor" type="button" class="btn btn-danger">Eliminar
                            Tutor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
