@extends('adminlte::page')
@include('modals.modals')
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
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-body box-profile">

                <h3 class="profile-username text-center">{{ $project->name }}</h3>

                <p class="text-muted text-center">{{ $project->description }}</p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Em andamento</b> <a class="pull-right">{{ $task_not_done }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Finalizadas</b> <a class="pull-right">{{ $task_done }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Total</b> <a class="pull-right">{{ $task_count }}</a>
                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

    <a class="btn btn-app">
        <i class="fa fa-user-plus" data-toggle="modal" data-target="#member"></i>
        Participante
    </a>

    <a class="btn btn-app" data-toggle="modal" data-target="#tarefa">
        <i class="fa fa-edit"></i>
        Tarefa
    </a>

    <div class="col-md-9">
        <div class="nav-tabs-custom">

            <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Tarefas</a></li>
                <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Timeline</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="activity">
                    <div class="row">
                        @foreach($task_all as $value)
                            @if($value->difficult === 1)
                                <div class="col-md-4">
                                    <div class="panel box box-success">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                {{ $value->name }}
                                            </h4>
                                        </div>
                                            <div class="box-body">
                                                {{ $value->description }}
                                            </div>
                                            <button type="button"
                                                    class="btn btn-success"
                                                    data-toggle="modal" data-target="#check">
                                                <i class="glyphicon glyphicon-ok"></i>
                                            </button>
                                            <button type="button"
                                                    class="btn btn-danger"
                                                    data-toggle="modal" data-target="#remove">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </button>
                                    </div>
                                </div>
                            @elseif($value->difficult === 2)
                                <div class="col-md-4">
                                    <div class="panel box box-warning">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                {{ $value->name }}
                                            </h4>
                                        </div>
                                        <div class="box-body">
                                            {{ $value->description }}
                                        </div>
                                        <button type="button"
                                                class="btn btn-success"
                                                data-toggle="modal" data-target="#check">
                                            <i class="glyphicon glyphicon-ok"></i>
                                        </button>
                                        <button type="button"
                                                class="btn btn-danger"
                                                data-toggle="modal" data-target="#remove">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-4">
                                    <div class="panel box box-danger">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                {{ $value->name }}
                                            </h4>
                                        </div>
                                        <div class="box-body">
                                            {{ $value->description }}
                                        </div>
                                        <button type="button"
                                                class="btn btn-success"
                                                data-toggle="modal" data-target="#check">
                                            <i class="glyphicon glyphicon-ok"></i>
                                        </button>
                                        <button type="button"
                                                class="btn btn-danger"
                                                data-toggle="modal" data-target="#remove">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                        <!-- timeline time label -->
                        <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-envelope bg-blue"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                <div class="timeline-body">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                    quora plaxo ideeli hulu weebly balihoo...
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-xs">Read more</a>
                                    <a class="btn btn-danger btn-xs">Delete</a>
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-user bg-aqua"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                </h3>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-comments bg-yellow"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                <div class="timeline-body">
                                    Take me to your leader!
                                    Switzerland is small and neutral!
                                    We are more like Germany, ambitious and misunderstood!
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                        </li>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <li>
                            <i class="fa fa-camera bg-purple"></i>

                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                <div class="timeline-body">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                </div>
                            </div>
                        </li>
                        <!-- END timeline item -->
                        <li>
                            <i class="fa fa-clock-o bg-gray"></i>
                        </li>
                    </ul>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>

</div>
    @stack('script')
@endsection
