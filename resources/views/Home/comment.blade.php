<div class="container">
    <form action="{{Route('add_comment')}}" method="POST" style="margin:0;padding:0;text-align:left;display: inline;">
        @csrf

<div class="row">
    <div class="col-md-6 offset-md-3">
        {{-- <div class="form-group"> --}}
        <b>Comment</b>
        <textarea cols="25" name="comment" class="form-control col-md-12" rows="6"></textarea>
        <button class="col-md-6 offset-md-3 btn btn-primary btn-sm">Submit</button>
        {{-- </div> --}}
    </div>
</div>
</form>

<div class="row">
    <div class="col-md-12">
        <b>All Comments</b>
    </div>
</div>
</div>

<hr/>
<div class="container">
@foreach ($comments as $comment)

<div class="row comments mb-2">
    <div class="col-md-12">
        <b>{{$comment->user_name}}</b> <small>  <span> {{$comment->date}}  </span>   <span>  {{$comment->time}}</span>  </small>
        <p>{{$comment->comment}}
           <br/>
        <small class="text-muted"><b><a href="javascript::void(0)" data-comment_id="{{$comment->id}}" class="anchor_reply">Reply</a></b></small>
        </p>
    </div>
</div>
@foreach ($comment->replies as $reply )

<div class="row reply mb-3">
    <div class="col-md-12">
        <small class="text-muted"><b class="ml-4">{{$reply->user_name}}</b></small>
        <small class="text-muted"> <p class="ml-4">{{$reply->comment}}</p></small>
    </div>

</div>
@endforeach

@endforeach

<div class="row reply_div d-none">
    <div class="col-md-4">
        <form action="{{Route('reply_comment')}}" method="POST" class="form-inline">
        @csrf
        <input type="text" name="commentid" class="form-control commentid" />
        <textarea cols="25" rows="3" class="form-control" name="reply_on_comment"></textarea>
        <button type="submit" class="btn btn-primary btn-sm">Reply</button>
</form>

        <button type="submit" class="btn btn-danger btn-sm btn_close">Close</button>

    </div>
</div>
</div>


@section("js")

<script type="text/javascript">
$(document).ready(function(){

$(".anchor_reply").click(function(){
let element=$(this);

$(".reply_div").insertAfter(element);
$(".reply_div").removeClass("d-none");
$(".commentid").val(element.data("comment_id"))
})

$(".btn_close").click(function(){
$(".reply_div").addClass("d-none");

})

})

// jquery End



//javascript Start

document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };

</script>

@endsection
