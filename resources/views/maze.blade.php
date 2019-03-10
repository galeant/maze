<form method="GET" action="{{ url('/') }}">
    S: <br />
    <input type="number" name="length" max=150 /><br />
    Pintu masuk: <br />
    <!-- <input type="number" name="masuk" max=25><br /> -->
    <input type="submit"/><br />
</form>
<div style="width:100%">
@foreach($data as $a)
    <div style="width:1500px;float:left">
    @foreach($a as $k=>$b)
        @if($b != null)
            <div style="width:10px;height:10px;background-color:black;float:left"></div>
        @else
            <div style="width:10px;height:10px;background-color:white;float:left"></div>
        @endif
    @endforeach
    </div>
@endforeach