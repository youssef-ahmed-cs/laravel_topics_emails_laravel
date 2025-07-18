<form method="post" action="{{route('receive' , ['id'=>1])}}">
    @csrf
    <input type="submit" value="Send Data" name='go'>
</form>

{!! to_route('receive',['id'=>1]) !!}
