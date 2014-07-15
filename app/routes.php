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

	return View::make('lorem_ipsum_generator');
	
});



Route::get('/lorem_ipsum_generator/{number}', function($number)
{
	// return "Here is Lorem Ipsum Generator $number";
	
	$generator = new Badcow\LoremIpsum\Generator();
	$paragraphs = $generator->getParagraphs($number);
	//echo implode('<p>', $paragraphs);
	// print_r($paragraphs);
	return View::make('lorem_ipsum_generator')->with('paragraphs', $paragraphs);
	
});

Route::get('/random_user_generator', function()
{


	return View::make('random_user_generator');
});



Route::get('/random_user_generator/{number}', function($number)
{
	// creating image links
	$images = array();  //Initialize once at top of script
	$dire = "images/";

	if(count($images) == 0)
	{
  		$images = glob($dire. '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
  		shuffle($images);
  	}


	$data = array(array());

	$data[0] = $number;

	// creating the object
	$faker = Faker\Factory::create();

	for ($i=0; $i < $number; $i++) 
	{ 
		$temp = array();
	
		$name = $faker->name;
		$addr = $faker->address;
		$dob = $faker->dateTimeThisCentury->format('Y-m-d');
		$randomImage = array_pop($images);

		$temp = array($name, $addr, $dob, $randomImage);
		array_push($data, $temp);

	}
	
		
		// echo '<img src="'.$randomImage.'">';
	return View::make('random_user_generator')->with('data', $data);

	//return $images;
});




