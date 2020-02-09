@if (\Session::has('success_msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! \Session::get('success_msg') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (\Session::has('error_msg'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! \Session::get('error_msg') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (\Session::has('info_msg'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {!! \Session::get('info_msg') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif