@extends("Admin.home")

@section("content")

<div class="row">
<div class="col-md-12">
    <x-message.error/>
    <x-message.success/>

<div class="card">
    <div class="card-header bg-white">
        <h5 class="card-title">Card title</h5>
        {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
    </div>
    <div class="card-body">
        <form action="{{Route("add_catagory")}}" method="POST">
            @csrf
            {{-- component consist of two tag label and input and dynamic property will
                parameters $labeltitle, $type, $placeholder, $name, $labelclass, $inputclass
                (label property = $labeltitle and $labelclass)
                (inpub = $type, $placeholder, $name, $inputclass) --}}

                <x-input labeltitle="Category"  type="text" placeholder="Enter Category" name="catagory" labelclass="control-label" inputclass="form-control"/>
                <x-input  labeltitle="" placeholder="" labelclass=""  type="submit" name="btnadd"   inputclass="btn btn-rounded btn-success col-md-3" value="Add"/>

        </form>
    </div>
    <div class="card-footer">
        {{-- <p class="card-text d-inline"><small class="text-muted">Last updated 3 mins ago</small> --}}
        </p><a href="#" class="card-link float-right"><small>Card link</small></a>
    </div>
</div>
</div>
</div>

{{-- card row end  --}}



    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $cat )

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$cat->catagory_name}}</td>
                                    <td><a data-id="{{$cat->id}}"
                                        data-dataname="{{$cat->catagory_name}}"
                                         class="btn btn-danger btn_delete" href="" data-type="category" data-toggle="modal" data-target="#deletemodal">Delete</a></td>

                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- end table row --}}


@include("Admin.modal.delete_data",["type"=>"Category"])
@endsection


@section("js")
<script>
    $(document).ready(function(){
$(".btn_delete").click(function(){
var data=$(this);
$(".del_id").val($(data).data("id"))
$(".del_data").val($(data).data("dataname"))


})
    })
</script>

@endsection
