<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Blog;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogList = Blog::where('blog_created_by', '=', \Auth::user()->id)->get();

        return view('home', ['blogs' => $blogList]);
    }

    public function create()
    {
        return view('blog.create-blog');
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->insertData($request);
    }

    public function show($blogId)
    {
        if(empty($blogId))
            abort(404);
        $blog = Blog::find($blogId);
        if(empty($blog))
            abort(404);

        return view('blog.read-blog', ['blog' => $blog]);
    }

}
