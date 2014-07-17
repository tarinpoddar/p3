@extends('_master')


@section('title')
	Lorem Ipsum Generator
@stop


@section('content')





	<h1 class="headings"> Lorem Ipsum Generator </h1>
	<p class="info"> 
		To generate lorem ipsum text, please retype the link in your brower. <br>
		 Add a slash in the current link, write the number of paragraphs you want and press enter
	</p>


	{{ Form::open(array('url' => '/lorem_ipsum_generator', 'method' => 'GET')) }}

		Search: 
		{{ Form::text('number_of_paras') }}
		
		{{ Form::submit('Go!') }}
	
	{{ Form::close() }}




@if (isset($paragraphs))
	<h1 class="headings"> Here is your Lorem Ipsum text </h1>
	
	@foreach($paragraphs as $paragraph)
	<p class="info"> {{ $paragraph }} </p>
	@endforeach

@endif

@stop