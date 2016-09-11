@extends('layouts.app')

@section('content')

	<div class="container">
	    @foreach ($images as $image)
	        {{-- {{ $image->image_title }} --}}
	        <img src="{{$image->image_url}}" style="width:30%;height:20%;" alt="Blog Image"/>
	    @endforeach
	</div>

	<center>
		{{ $images->links() }}
	</center>

@endsection