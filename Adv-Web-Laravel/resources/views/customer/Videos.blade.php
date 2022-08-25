@foreach($data as $row)
<center>
<video controls src="{{asset('movies')}}/{{$row['movie']}}"></video> <br>
</center>
@endforeach