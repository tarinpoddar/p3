	<?php

	/*
	|--------------------------------------------------------------------------
	| Application Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register all of the routes for an application.
	| It's a breeze. Simply tell Laravel the URIs it should respond to
	| and give it the Closure to execute when that URI is requested.
	|
	*/

	Route::get('/', function()
	{
		return View::make('index');
	});


	Route::get('/lorem_ipsum_generator', function()
	{
		$num_paras = Input::get('number_of_paras');

		
		if (!isset($num_paras))
		{
			return View::make('lorem_ipsum_generator');

		}
		
		
		$generator = new Badcow\LoremIpsum\Generator();
		$paragraphs = $generator->getParagraphs($num_paras);
		
		return View::make('lorem_ipsum_generator')->with('paragraphs', $paragraphs);


		
		
	});

	Route::get('/random_user_generator', function()
	{
		// Puts all the data collected by user in this array
		$user_req = array();
		$user_req['num_users'] = Input::get('num_users');
		$user_req['is_dob'] = Input::get('is_dob');
		$user_req['is_address'] = Input::get('is_address');
		$user_req['is_img'] = Input::get('is_img');
		$user_req['is_profile'] = Input::get('is_profile');


		if(!isset($user_req['num_users']))
		{
			return View::make('random_user_generator');
		}


		else
		{
			// creating image links from the images folder where 50 picture links are saved

			$images = array();   //Initialize once at top of script
			$directory = "images/";  // directory address

			if(count($images) == 0)
			{
				// filling the $images array with different image links
	  			$images = glob($directory. '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

	  			// randomizing the order of images
	  			shuffle($images);
	  		}

		  	// doubling the images array which currently is only 50 pics
		  	$temp_images = $images;
		  	shuffle($temp_images); // shuffling it again to make it random

		  	// merging both the arrays to make it double but random
		  	$images = array_merge($temp_images, $images);


			// creating the object which will create random data
			$faker = Faker\Factory::create();

			// Will contain all the data for the names
			$names = array();
			$dobs = array();
			$addresses = array();
			$profile = array();




			// iterating to create all the data
			for ($i=0; $i < $user_req['num_users']; $i++) 
			{ 

					
				$name = $faker->name;
				array_push($names, $name);

				if ($user_req['is_dob'])
				{
					$dob = $faker->dateTimeThisCentury->format('m-d-Y');
					array_push($dobs, $dob);
				}

				if ($user_req['is_address'])
				{
					$addr = $faker->address;
					array_push($addresses, $addr);
				}

				if ($user_req['is_profile'])
				{
					$line = $faker->text(400);
					array_push($profile, $line);
				}


			}
		
			
			return View::make('random_user_generator')->with('user_req', $user_req)
													  ->with('names', $names)
													  ->with('dobs', $dobs)
													  ->with('addresses', $addresses)
													  ->with('profile', $profile)
													  ->with('images', $images);


		}

	
	});


