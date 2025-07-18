<form method="post" action="{{route('receive')}}">
    @csrf
    <input type="submit" value="Send Data" name='go'>
</form>