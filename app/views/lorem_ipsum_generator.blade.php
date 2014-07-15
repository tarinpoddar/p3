@extends('_master')


@section('title')
	Lorem Ipsum Generator
@stop


@section('content')




@if (!isset($paragraphs))
	<h1 class="headings"> Lorem Ipsum Generator </h1>
	<p class="info"> 
		To generate lorem ipsum text, please retype the link in your brower. <br>
		 Add a slash in the current link, write the number of paragraphs you want and press enter
	</p>
@endif


@if (isset($paragraphs))
	<h1 class="headings"> Here is your Lorem Ipsum text </h1>
	
	@foreach($paragraphs as $paragraph)
	<p> {{ $paragraph }} </p>
	@endforeach

@endif

@stop