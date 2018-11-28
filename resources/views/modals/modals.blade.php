@component('modal-tarefa')
    <!-- Modal to create task -->
    <div class="modal fade" id="tarefa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Nova tarefa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tasks.store', ['id' => $project->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome da tarefa</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Nome">
                        </div>

                        <div class="form-group">
                            <label for="description">Descrição da tarefa</label>
                            <textarea name="description" type="Description" class="form-control" id="description" placeholder="Descrição"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="difficult">Dificuldade</label>
                            <select class="form-control" name="difficult">
                                <option value="0">- Selecione -</option>
                                <option value="1">Fácil</option>
                                <option value="2">Média</option>
                                <option value="3">Difícil</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal to include a new member to the project -->
    <div class="modal fade" id="member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-user-plus"></i> Novo membro</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('include_member', $project->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">E-mail do novo membro</label>
                            <input name="email" type="text" class="form-control" id="email" placeholder="E-mail">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal to check a task -->
    <div class="modal fade" id="check" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Atenção!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tasks_update', ['id' => $task_id->id]) }}" method="PUT">
                        <p>
                            Você deseja concluir esta tarefa?
                        </p>
                        @csrf
                        <input name="code" id="code" type="hidden" value="1">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                            <button type="submit" class="btn btn-success">Concluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal to remove a task -->
    <div class="modal fade bd-example-modal-sm" id="remove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Atenção!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tasks_update', ['id' => $task_id->id]) }}" method="PUT">
                        <p>
                            Você realmente deseja remover esta tarefa?
                        </p>
                        @csrf
                        <input name="code" id="code" type="hidden" value="2">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                            <button type="submit" class="btn btn-danger">Remover</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
