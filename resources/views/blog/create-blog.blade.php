@extends('layouts.app')

@section('content')

<form method="POST" action="/home" enctype="multipart/form-data">
	    {{ csrf_field() }}
	<div class="container">
	    <div class="form-group">
			<div class="col-xs-5">
				<label for="ex1">Blog Name</label>
				<input class="form-control" value="{{Request::old('blog_name')}}" id="ex1" name="blog_name" type="text">
	    	</div>
	    </div>
	</div>
	<br>
	<div class="container">
		<div class="form-group">
		<div class="col-xs-10">
			<label for="description">Blog Description:</label><br>
			<textarea class="form-control" rows="10" name="blog_description" id="description">
				{{Request::old('blog_description')}}
			</textarea>
		</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="form-group">
			<div class="col-xs-10">
				<label for="image">Blog Image:</label><br>
					<input type="file" name="blog_image" accept="image/*">
					<br>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-xs-10">
			<input type="submit" class="pull-right">
		</div>
	</div>
</form>
@endsection
@section('javascript')
<script type="text/javascript">
	    $(document).ready(function() {
	    	$('#description').wysihtml5();
	    });
</script>
@endsection
