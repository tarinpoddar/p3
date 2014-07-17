@extends('_master')



@section('title')
	Random User Generator
@stop

@section('content')


	<h1 class="headings"> Random User Generator </h1>
	<div class="rand_user_form">
		{{ Form::open(array('url' => '/random_user_generator', 'method' => 'GET')); }}

		<span id="takeinput"> How many users (max 99)

		 <input id="textbox" maxlength=2 type="text" placeholder="#" name="num_users"> <br>

		</span>
		

		 <span class="form_elements"> Date of Birth 
		 {{ Form::checkbox('is_dob', '1', true, array('class' => 'a')); }}
		 </span>

		 <span class="form_elements"> Address 
 		 {{ Form::checkbox('is_address', '1', true, array('class' => 'a')); }}
 		 </span>

		 <span class="form_elements"> Profile 
		 {{ Form::checkbox('is_profile', '1', true, array('class' => 'a')); }} 
		 </span>

		 <span class="form_elements"> Image 
		 {{ Form::checkbox('is_img', '1', true, array('class' => 'a')); }} <br>
		 </span>

		 <span class="button">
		 {{ Form::submit('Go!') }}
		 </span>

		{{ Form::close(); }}
	</div>
		<!-- form ends -->

		@if (isset($user_req['num_users']))

			@for ($i = 0; $i < $user_req['num_users']; $i++)

			<h2 class="subheading" id="sub_user">  Here are your users </h2>
     		
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





