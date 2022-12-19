@if(session()->has("msg"))
<div class="alert alert-{{session("type")}}" alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    {{session('msg')}}
</div>
@endif
