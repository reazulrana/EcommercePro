{{-- component consist of two tag label and input and dynamic property will
$labeltitle, $type, $placeholder, $name, $labelclass, $inputclass  --}}
{{-- @dd($labeltitle) --}}
<div class="form-group">

@if(isset($labeltitle))
    <label class="font-weight-bold {{$labelclass}}">{{$labeltitle}}</label>
@endif

@if($type=="submit")

<input type="{{$type}}" class="{{$inputclass}}" name="{{$name}}" value="{{$value}}" >

@elseif($type=="number")
<input type="{{$type}}" min="0" class="{{$inputclass}}" value="0" name="{{$name}}" placeholder="{{$placeholder}}" required>
@else
<input type="{{$type}}"  class="{{$inputclass}}" name="{{$name}}" placeholder="{{$placeholder}}" required>

@endif
</div>
