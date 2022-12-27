@extends("Admin.home")

@section("content")

{{-- <div class="container"> --}}
    <div class="row">
        <div class="col-md-12">
            <x-message.error/>
            <x-message.success/>

            <div class="card">

                <div class="card-header bg-primary">
                    <h4 class="card-title">Test Monial</h4>
                </div>

                <div class="card-body">

                    <form action="{{Route('add_testimonial')}}" method="Post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                    <div class="row border-2">

                    <div class="col-md-5 border-right">
                        <div class="form-group">
                            <label class="control-label text-danger">Image ***</label>
                            <div class="border-2 col-md-6 div_image {{$errors->first("carousel_image") ? " border-danger " : ""}}">
                            <img height="150" id="image" class="image img-fluid" src="{{customclass::url_blank_photo()}}" />
                            </div>
                        </div>
                      <div class="form-group">
                            <input type="file" name="carousel_image" id="carousel_image" class="form-control form-control-file carousel_image">
                            <small class="text-muted">this field will change carousel Circle Image</small>

                        </div>

                        <div class="form-group">
                            <label class="control-label text-danger">Carousel Title ***</label>
                            <input type="text" class="form-control carousel_header_h5 {{$errors->first('carousel_header_h5') ? "border-danger border-2":"" }} " name="carousel_header_h5" placeholder="Enter Title">
                            <small class="text-muted">this field will change carousel h5 tag  </small>
                        </div>
                        <div class="form-group">
                            <label class="control-label text-danger">Carousel Sub Title ***</label>
                            <input type="text" class="form-control carousel_header_h6 {{$errors->first('carousel_header_h6') ? "border-danger border-2":"" }} " name="carousel_header_h6" placeholder="Enter Title">
                            <small class="text-muted">this field will change carousel h6 tag  </small>
                        </div>

                        <div class="form-group">
                            <label class="control-label text-danger">Description ***</label>
                            <textarea name="description" cols="25" rows="4" class="form-control description {{$errors->first('description') ? "border-danger border-2":"" }}"></textarea>
                            <small class="text-muted">this field will change carousel P tag  </small>
                        </div>
                        <div class="form-group">
                        <button class="btn btn-primary btn-sm">Add Testimonial</button>
                        </div>
                        </div>
                    </form>


                        <div class="col-md-7 mt-4" style="max-height: 550px; overflow-y:scroll; text-align:justify">
                            @foreach($testimonials as $testimonial)
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <img class="mx-auto d-block" style="height:200px; width:200px; border-radius:50%" src="{{customclass::url_testimonial_photo($testimonial->image)}}"/>
                                </div>
                                <div class="col-md-12 mb-1 text-center">
                                    <h6 class="text-bold">{{$testimonial->title}}</h6>
                                </div>
                                <div class="col-md-12  mb-3 text-center">
                                    <h6>{{$testimonial->sub_title}}</h6>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <p>{{$testimonial->description}}</p>
                                </div>
                                <div class="col-md-12 mb-4 text-center">
                                    <form action="{{Route('delete_testimonial')}}" method="Post">
                                        @csrf
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary bg-primary text-white btn_update_testimonial"  data-toggle="modal" data-target="#edit_testimonial_modal"
                                        data-id="{{$testimonial->id}}"
                                        data-title="{{$testimonial->title}}"
                                        data-sub_title="{{$testimonial->sub_title}}"
                                        data-description="{{$testimonial->description}}"
                                        data-image="{{$testimonial->image}}"

                                        ><i class="mdi mdi-pencil"><span> Edit</span></i></button>
                                        <input type="hidden" value="{{$testimonial->id}}" name="delete_id"/>
                                        <button onclick="return confirm('Do you wanto delete record?')"  type="submit" class="btn btn-danger bg-danger text-white"><i class="fa fa-trash"><span> Delete</span></i></button>

                                    </div>
                                </form>
                                </div>
                            </div>
                            @endforeach
                        </div> {{-- end first row div class=col-md-7 mt-4" --}}
                    </div> {{-- end first row div class=row border-2" --}}

                </div> {{-- end card-body" --}}
            </div>
        </div>
    </div>
{{-- </div> --}}

@include("admin.modal.edit_testimonial")

@endsection



@section("js")
<script type="text/javascript">
$(document).ready(function(){

    $(".carousel_header_h5").keyup(function(){
         element=$(this);
         alert_border_show(element)
    })

    $(".carousel_header_h6").keyup(function(){
         element=$(this);
         alert_border_show(element)
    })

    $(".description").keyup(function(){
         element=$(this);
         alert_border_show(element)
    })

    function alert_border_show(element)
    {
        if(element.val().length==0){

element.addClass("border-danger")
element.addClass("border-2")

element.focus();
}
else{
element.removeClass("border-danger")
element.removeClass("border-2")

}
    }

//hide automatically
    setTimeout(function(){
            $("div.alert-danger").hide("fade");
            $(".description").removeClass("border-danger");
            $(".carousel_header_h5").removeClass("border-danger");
            $(".carousel_header_h6").removeClass("border-danger");
            $(".div_image").removeClass("border-danger");



    },5000)


    $(".carousel_image").change(function(event){

        let val=URL.createObjectURL(event.target.files[0]);
        $(".image").attr("src",val);

    })


//Edit Anchor Tag
$(".btn_update_testimonial").click(function(){
let element=$(this);

let img_path="/images/testimonial/" + element.data("image")

$(".id").val(element.data("id"))
$(".title").val(element.data("title"))
$(".sub_title").val(element.data("sub_title"))
$(".description").val(element.data("description"))
$(".previous_image").attr("src",img_path)

$(".pre_image").val(element.data("image"));




})

//this event trigger edit modal new image
$(".change_image_file").change(function(event){

    let val=URL.createObjectURL(event.target.files[0])
    $('.new_image').attr("src",val);

})


})


// var input = document.getElementById("carousel_image");
// var fReader = new FileReader();
// fReader.readAsDataURL(input.files[0]);
// fReader.onloadend = function(event){
//     var img = document.getElementById("image");
//     img.src = event.target.result;

</script>
@endsection
