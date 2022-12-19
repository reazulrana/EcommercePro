{{-- @dd($items) --}}
<div class="form-group">
    <label class="control-label">{{$labeltitle}}</label>
    <select class="form-control {{$name}}" name="{{$name}}">
       {{-- {{$slot}} --}}
       <option value="">Select {{$name}}</option>
       @foreach ($items as $cat )
       <option value="{{$cat[$val]}}">{{$cat[$fieldname]}}</option>
       @endforeach
    </select>
</div>
