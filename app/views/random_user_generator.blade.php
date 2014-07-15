@extends('_master')



@section('title')
	Random User Generator
@stop

@section('content')

@if (!isset($data))
	<h1 class="headings"> Random User Generator </h1>
	<p class="info"> To generate random users, please retype the link in your brower. <br>
		 Add a slash in the current link, write the number of users you want and press enter </p>
@endif

@if (isset($data))
	<h1 class="headings"> Here are your random users </h1>

	@for ($i = 1; $i < ($data[0]+1); $i++)
    <p class="userinfo">
		@for ($j = 0; $j < 3; $j++)

		
			{{ $data[$i][$j] }} <br>
		
		@endfor
	</p>
	
	
		{{ HTML::image($data[$i][3]) }} <br>
	

	@endfor
	

@endif



@stop