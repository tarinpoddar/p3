@extends('_master')


@section('title')
	Lorem Ipsum Generator
@stop


@section('content')





	<h1 class="headings"> Lorem Ipsum Generator </h1>
	<p class="info"> 
		How many paragraphs? (max 99)
	</p>


	{{ Form::open(array('url' => '/lorem_ipsum_generator', 'method' => 'GET')) }}

		<div class="loremform">
		<input id="textbox" maxlength=2 type="text" placeholder="#" name="number_of_paras">
		<span id="lorembutton">
		{{ Form::submit('Get Me!') }}
	</span>
		</div>
	{{ Form::close() }}




@if ($paragraphs)
	<h2 class="subheading"> Here is your Lorem Ipsum text </h2>
	
	@foreach($paragraphs as $paragraph)
		<p class="info"> {{ $paragraph }} </p>
	@endforeach

@endif

@stop