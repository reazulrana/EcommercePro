@extends("admin.home")
@section("content")

<form method="Post" action="{{Route('send_user_email')}}">
    @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="card border-primary">
                    <div class="card-header">
                        <h5 class="card-title">Send Email To {{$order->email}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <input type="hidden" value="{{$order->id}}" name="id"/>
                        <div class="col-md-6">
                            <div class="form-grop">
                                <label for="greeting" class="control-label">Greeting</label>
                                <input type="text" id="greeting" class="form-control" name="greeting"/>
                            </div>

                            <div class="form-grop">
                                <label for="firstline" class="control-label">First line</label>
                                <input type="text" id="firstline" class="form-control" name="firstline"/>
                            </div>

                            <div class="form-grop">
                                <label for="body" class="control-label">Body</label>
                                <input type="text" id="body" class="form-control" name="body"/>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-grop">
                                <label for="button" class="control-label">Button</label>
                                <input type="text" id="button" class="form-control" name="button"/>
                            </div>

                            <div class="form-grop">
                                <label for="url" class="control-label">URL</label>
                                <input type="text" id="url" class="form-control" name="url"/>
                            </div>

                            <div class="form-grop">
                                <label for="lastline" class="control-label">Last line</label>
                                <input type="text" id="lastline" class="form-control" name="lastline"/>
                            </div>

                            <div class="form-grop mt-1">
                                <input type="submit"  class="btn btn-primary text-black-50" value="submit"/>
                            </div>
                        </div>
                    </div>   <!-- End First Row  -->
                    </div>
                    <div class="card-footer"><small>Last updateed 3 min ago</small>
                    </div>
                </div>
            </div>

        </div>


        <!-- End Col -->
    </form>


@endsection
