@extends("admin.home")

@section("content")
<div class="container">
<x-message.success/>
<x-message.error/>

<div class="card">
    <div class="card-header bg-light">
        <h2 class="card-title">Comments' Reply</h2>
    </div>
    <div class="card-body">
@foreach ($replies as $reply )
    <div class="row mb-3">
        <div class="col-lg-2">
            <b>Name</b>
            <h4 class="h4">{{$reply->name}}</h4>
        </div>
        <div class="col-lg-3">
            <b>Email</b>
            <h4 class="h4">{{$reply->email}}</h4>
        </div>
        <div class="col-lg-4">
            {{-- <b>Comments</b> --}}
            <h4 class="h4"><b>Comments:</b> {{$reply->comments}}</h4>
            {{-- <b>Reply</b> --}}
            <h4 class="h4"><b>Reply:</b> {{$reply->comment}}</h4>
        </div>
        <div class="col-lg-3">
            <form action="{{Route('delete_reply')}}" method="Post" class="form-inline">
                @csrf
                <div class="row">
                <div class="form-group">
            <a href="javascript::void(0)" data-toggle="modal" data-target="#edit_reply_modal" data-id="{{$reply->id}}" data-comment="{{$reply->comment}}" class="btn btn-info text-white btn_edit_comment col">Edit</a>

            <input type="hidden" value="{{$reply->id}}" name="reply_id"/>
            <button type="submit" class="btn btn-danger text-white bg-danger col" onclick="return confirm('Do You Want To Delete Reply')">Delete</button>
            </div>
        </div>
    </form>

        </div>

        </div>
<hr/>

@endforeach
</div>
</div>
</div>

@include("admin.modal.edit_reply")
@endsection


@section("js")

<script type="text/javascript">

$(document).ready(function(){

    $(".btn_edit_comment").click(function(){
        let element=$(this)

        $(".reply_id").val(element.data("id"))
        $(".edit_reply").val(element.data("comment"))


    })


})

</script>
@endsection
