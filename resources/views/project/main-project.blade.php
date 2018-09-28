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
    <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Iniciar novo projeto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" class="form-horizontal">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nome do projeto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Nome do projeto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Descrição do projeto</label>
                        <div class="col-sm-10">
                            <textarea type="text"
                                      class="form-control"
                                      id="description" placeholder="Descrição" cols="40" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cost" class="col-sm-2 control-label">Custo do projeto (R$)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control money" id="cost">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="final" class="col-sm-2 control-label">Previsão de término</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control date placeholder" id="final">
                        </div>
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Sign in</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
    </div>
    @stack('script')
@endsection
