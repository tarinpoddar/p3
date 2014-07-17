@extends('_master')



@section('title')
	Random User Generator
@stop

@section('content')


	<h1 class="headings"> Random User Generator </h1>
	<p class="info"> To generate random users, please retype the link in your brower. <br>
		 Add a slash in the current link, write the number of users you want and press enter </p>

		{{ Form::open(array('url' => '/random_user_generator', 'method' => 'GET')); }}

		How many users
		 {{	Form::text('num_users'); }} <br>

		 Include <br>

		 Date of Birth
		 {{ Form::checkbox('is_dob', '1', true, array('class' => 'name')); }} <br>

		 Address
		 {{ Form::checkbox('is_address', '1', true, array('class' => 'name')); }} <br>

		 Profile
		 {{ Form::checkbox('is_profile', '1', true, array('class' => 'name')); }} <br>

		 Image
		 {{ Form::checkbox('is_img', '1', true, array('class' => 'name')); }} <br>

		 {{ Form::submit('Go!') }}

		{{ Form::close(); }}

		<!-- form ends -->

		@if (isset($user_req['num_users']))

			@for ($i = 0; $i < $user_req['num_users']; $i++)
     		
				{{ $names[$i] }} <br>
				
				@if ($user_req['is_dob'])

					{{ $dobs[$i] }} <br>

				@endif	

				@if ($user_req['is_address'])

					{{ $addresses[$i] }} <br>

				@endif	

				@if ($user_req['is_profile'])

					{{ $profile[$i] }} <br>

				@endif	


				@if ($user_req['is_img'])

					{{ HTML::image($images[$i]); }} <br>

				@endif	





			@endfor

				






		@endif



@stop





