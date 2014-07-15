@extends('_master')



@section('title')
	Random User Generator
@stop

@section('content')

<h1> Random User Generator </h1>


@if (isset($data))

	@for ($i = 1; $i < ($data[0]+1); $i++)
    
		@for ($j = 0; $j < 3; $j++)

			{{ $data[$i][$j] }} <br>

		@endfor

		{{ HTML::image($data[$i][3]) }} <br>


	@endfor


@endif



@stop