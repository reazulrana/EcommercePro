@if(session()->has("msg"))
<div class="col-md-12" id="myalert">
<div class="alert alert-{{session("type")}}">
    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
    {{session()->get("msg")}}
</div>
</div>
@endif
