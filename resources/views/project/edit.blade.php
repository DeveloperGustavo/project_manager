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
    <p>ashdfiua</p>
</div>
    @stack('script')
@endsection
