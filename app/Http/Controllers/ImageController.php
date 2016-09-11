<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Image;

class ImageController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	\DB::table('images')->truncate();

    	echo "Processing.Please wait...<br><br><br>";

    	$images = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/photos'));
    	foreach ($images as $image) {
    		$imageData = new Image();
    		$imageData->album_id =  $image->albumId;
    		$imageData->image_id =  $image->id;
    		$imageData->image_title =  $image->title;
    		$imageData->image_url =  $image->url;
    		$imageData->image_thumbnail_url = $image->thumbnailUrl;

    		try{
    			if($imageData->save()){
    				// echo "Image with title '.$image->title.' saved successfully\n";
    			} else {
    				echo "Unable to save image with title ".$image->title."\n";
    			}
    		} catch(Exception $e) {
    			echo 'Exception occured'.$e->getMessage();
    		}

    	}

    	echo "<a  href='http://localhost:8000/display/image'>Click here to view the images downloaded</a>";
    }

    public function show()
    {
		$imageData = \DB::table('images')->paginate(15);

    	return view('display-images', ['images' => $imageData]);
    }
}
