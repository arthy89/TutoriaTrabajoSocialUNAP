<div>
    <div wire:ignore.self class="modal fade" id="estcrear" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white dark-mode">
                    <h5 class="modal-title font-weight-bold">Nuevo Estudiante</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                <form wire:submit.prevent="guardarEst">
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
                                    $('#estcrear').modal('hide');
                                })
                            </script>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="dni">Código de estudiante</label>
                                    <input wire:model="user.dni" type="text" class="form-control" id="dni"
                                        placeholder="Código de estudiante" onkeypress="validate()" inputmode="numeric"
                                        maxlength="6">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="apell">Apellidos</label>
                                    <input wire:model="user.apell" type="text" class="form-control text-uppercase"
                                        id="apell" placeholder="Apellidos">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Nombres</label>
                                    <input wire:model="user.name" type="text" class="form-control text-uppercase"
                                        id="name" placeholder="Nombres">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button wire:click.prevent="guardarEst" type="button" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
