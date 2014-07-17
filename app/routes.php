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

	// Home page Route
	Route::get('/', function()
	{
		return View::make('index');
	});

	// Route for lorem ipsum generator
	Route::get('/lorem_ipsum_generator', function()
	{
		// User input stored in the variable
		$num_paras = Input::get('number_of_paras');

		/* Making a flag variable $should_show to check if the user has acrtually given some 
		 * valid input and whether we need to display the output of the paragraphs  
		 */

		if ($num_paras > 0)
		{
			$should_show = true;
		}
		else
		{
			$should_show = false;
		}

		// Initially till the user gives some input - some the basic page with the form asking for input
		if (!$should_show)
		{
			return View::make('lorem_ipsum_generator')->with('should_show', $should_show);

		}
		
		// Using a package Badcow\LoremIpsum to generate random text
		$generator = new Badcow\LoremIpsum\Generator();

		// paragraph will store all the randomly generated paragraphs
		$paragraphs = $generator->getParagraphs($num_paras);

		
		// After all paragraphs generated - create the view 
		return View::make('lorem_ipsum_generator')->with('paragraphs', $paragraphs)
												  ->with('should_show', $should_show);
	});

	// Route for random user generator page
	Route::get('/random_user_generator', function()
	{
		// Puts all the data collected by user in this array stating the user requirements
		$user_req = array();
		$user_req['num_users'] = Input::get('num_users');
		$user_req['is_dob'] = Input::get('is_dob');
		$user_req['is_address'] = Input::get('is_address');
		$user_req['is_img'] = Input::get('is_img');
		$user_req['is_profile'] = Input::get('is_profile');


		/* Using a flag variable $should_show to decide whether the user ha s actually given some 
		   valid input and if we should actually show the user the data */
		if($user_req['num_users'] > 0)
		{
			$should_show = true;
		}
		else
		{
			$should_show = false;
		}

		// if no data received yet, show the basic page asking for user input
		if(!$should_show)
		{
			return View::make('random_user_generator')->with('should_show', $should_show);
		}

		// if data received from user - process based on that data
		else
		{
			// creating image links from the images folder where 50 pictures are saved
			$images = array();   //Initialize once at top of script
			$directory = "images/";  // directory address

			// if the array is empty (it will be empty in the beginning)
			if(count($images) == 0)
			{
				// filling the $images array with different image links
	  			$images = glob($directory. '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

	  			// randomizing the order of images
	  			shuffle($images);
	  		}

		  	// doubling the images array which currently is has only 50 pics to 100 picture links
		  	// temporarily storing data in another array
		  	$temp_images = $images;

		  	shuffle($temp_images); // shuffling this temporary array to make it random

		  	// merging both the arrays to make it double (but still is completely random)
		  	$images = array_merge($temp_images, $images); // now we have links to 100 pics



		  	# We use a package called Faker to produce the random data
			// creating the object which will create random data
			$faker = Faker\Factory::create();

			// Will contain all the data for the names
			$names = array();

			// will contain all date of birth data
			$dobs = array();

			// will contain all fake addresses
			$addresses = array();

			// will contain all fake profiles
			$profile = array();


			// iterating to create all the data
			for ($i=0; $i < $user_req['num_users']; $i++) 
			{ 
					
				// creating fake names and pushing it to its respective array	
				$name = $faker->name;
				array_push($names, $name);

				// if user wants to see date of births
				if ($user_req['is_dob'])
				{
					// create fake date of births
					$dob = $faker->dateTimeThisCentury->format('m-d-Y');

					// push them to respective array
					array_push($dobs, $dob);
				}

				// if user wants addresses also
				if ($user_req['is_address'])
				{
					// creating addresses
					$addr = $faker->address;

					// push them to respective array
					array_push($addresses, $addr);
				}

				// if user wants profiles
				if ($user_req['is_profile'])
				{
					// creating fake profiles
					$line = $faker->text(400);

					// pushing them to respective array
					array_push($profile, $line);
				}
			}
		
			// once all data is generated - crete VIEW and send all the data
			return View::make('random_user_generator')->with('user_req', $user_req)
													  ->with('names', $names)
													  ->with('dobs', $dobs)
													  ->with('addresses', $addresses)
													  ->with('profile', $profile)
													  ->with('images', $images)
													  ->with('should_show', $should_show);

		}
	});


