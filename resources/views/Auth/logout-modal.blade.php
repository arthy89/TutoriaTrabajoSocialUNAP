<div id="logoutModal" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Cerrar Sesión</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">x
                </button>
            </div>
            <div class="modal-body text-center">
                <h5 class="">Estás por salir del sistema de Tutoría ¿Estás seguro de cerrar la sesión?</h5>
                <p class="mb-0">Vuelve pronto</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>
