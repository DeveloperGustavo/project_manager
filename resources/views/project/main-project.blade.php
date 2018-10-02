@extends('adminlte::page')

@push('script')
    <script>
        //Input mask
        $(document).ready(function($){
            $('.date').mask('00/00/0000');
            $('.money').mask("#.##0,00", {reverse: true});
            $('.percent').mask('##0,00%', {reverse: true});
            $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
            $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
        });
    </script>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Iniciar novo projeto</h3>
                <div class="box-tools pull-right">
                        <button type="button"
                                class="btn btn-box-tool"
                                data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="/projects" class="form-horizontal">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nome do projeto</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nome do projeto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Descrição do projeto</label>
                        <div class="col-sm-10">
                            <textarea type="text"
                                      class="form-control"
                                      id="description" name="description" placeholder="Descrição" cols="40" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cost" class="col-sm-2 control-label">Custo do projeto (R$)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control money" id="cost" name="cost">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="final" class="col-sm-2 control-label">Previsão de término</label>
                        <div class="col-sm-10">
                            <input name="final" type="text" class="form-control date placeholder">
                        </div>
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Cadastrar</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>

        <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Lista de projetos</h3>

                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                        <th>Nome</th>
                        <th>Custo (R$)</th>
                        <th>Data de entrega</th>
                    </tr>
                    @foreach($project_pagination as $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td>R$ {{ $value->cost }}</td>
                        <td>{{ $value->final }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {{ $project_pagination->links() }}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
    </div>
    @stack('script')
</div>
@endsection
