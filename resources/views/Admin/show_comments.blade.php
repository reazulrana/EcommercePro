@extends("admin.home")

@section("content")
<div class="container">
<x-message.success/>
<x-message.error/>

@foreach ($comments as $comment )
    <div class="row mb-3">
        <div class="col-lg-2">
            <b>Name</b>
            <h4 class="h4">{{$comment->users->name}}</h4>
        </div>
        <div class="col-lg-3">
            <b>Email</b>
            <h4 class="h4">{{$comment->users->email}}</h4>
        </div>
        <div class="col-lg-4">
            <b>Comments</b>
            <h4 class="h4">{{$comment->comment}}</h4>
        </div>
        <div class="col-lg-3">
            <form action="{{Route('delete_comment')}}" class="form-inline">
                <div class="row">
                <div class="form-group">
            <a href="javascript::void(0)" data-toggle="modal" data-target="#edit_comment_emodal" data-id="{{$comment->id}}" data-comment="{{$comment->comment}}" class="btn btn-info text-white btn_edit_comment col">Edit</a>

            <input type="hidden" value="{{$comment->id}}" name="commentid"/>
            <button type="submit" class="btn btn-danger text-white bg-danger col" onclick="return confirm('Do You Want To Delete Comments Note: Reply will be deleted from replies table according to comment_id')">Delete</button>
            </div>
        </div>
    </form>

        </div>

        </div>
<hr/>

@endforeach
</div>

@include("admin.modal.edit_comment")
@endsection


@section("js")

<script type="text/javascript">

$(document).ready(function(){

    $(".btn_edit_comment").click(function(){
        let element=$(this)

        $(".comment_id").val(element.data("id"))
        $(".edit_comment").val(element.data("comment"))


    })


})

</script>
@endsection
