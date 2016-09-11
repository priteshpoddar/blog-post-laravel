<?php

namespace App;
use Illuminate\Support\Facades\Input;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;
use Carbon\Carbon;

// use Illuminate\Foundation\Auth\User as Authenticatable;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_name', 'blog_description', 'blog_image', 'blog_created_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'blogs';


     // process the form here


    public function insertData($request)
    {
        // create the validation rules ------------------------
        $rules = [
            'blog_name'             => 'required',
            'blog_description'      => 'required',
            'blog_image'              => 'required'
            // 'password_confirm'      => 'required'
        ];
        // do the validation ----------------------------------
        // validate against the inputs from our form
        $validator = \Validator::make(Input::all(), $rules);

        // check if the validator failed -----------------------
        if ($validator->fails()) {

            // get the error messages from the validator
            $messages = $validator->messages();
            // redirect our user back to the form with the errors from the validator
            return \Redirect::to('/home/create')
                ->withErrors($validator)
                ->withInput(Input::all())
                ->send();

        } else {
            // validation successful ---------------------------

            // our blog has passed all tests!
            // let him enter the database
            // create the data for our blog
            $blog = new Blog();
            $blog->blog_name     = Input::get('blog_name');
            $blog->blog_description    = Input::get('blog_description');

            if($request->hasFile('blog_image')){

                $file = Input::file('blog_image');
                //getting timestamp
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

                $name = $timestamp. '-' .$file->getClientOriginalName();

                $blog->blog_image = $name;

                $file->move(public_path().'/images/', $name);
            }


            $blog->blog_created_by    = \Auth::user()->id;

            // save our blog
            $blog->save();

            // redirect ----------------------------------------
            // redirect our user back to the form so they can do it all over again
            \Session::flash('flash_message','Blog successfully saved.');
            return \Redirect::to('/home')->send();
        }
    }
}
