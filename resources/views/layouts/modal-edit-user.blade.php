<!-- Modal -->
<div class="modal fade" id="userEditModal" tabindex="-1" role="dialog"
     aria-labelledby="userEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userEditModalLabel">Editar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update', auth()->user()->id )}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nome</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   required
                                   value="{{ $user->name, old('name') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="email">E-mail</label>
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   required
                                   value="{{ $user->email, old('email') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
