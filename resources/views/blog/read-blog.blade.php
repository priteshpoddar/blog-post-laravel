@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('assets/css/read.css') }}">
<div class="container">
	<h1 class="text-center">{{ $blog->blog_name }}</h1>
</div>
<div class="container">
	<center>
		<img src="{!! '/images/'.$blog->blog_image !!}" style="width:50%;height:40%;" alt="Blog Image"/>
	</center>
</div><br><br><br>
<div class="container">
	<center>
		<p>
			{{ $blog->blog_description }}
		</p>
	</center>
</div>
@endsection