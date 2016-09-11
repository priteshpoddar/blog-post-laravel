@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ URL::asset('assets/css/home.css') }}">
{{-- <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container">
    <div class="well well-sm">
        <strong>View Type</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
        {{-- <button class="pull-right btn btn-info" href="{{ url('/home/create') }}">New Blog</button> --}}
        {{-- <a class="pull-right btn btn-info" href="{{ url('/home/create') }}">New Blog</a> --}}
    </div>
    @if (!empty($blogs))
    <div id="products" class="row list-group">
        @foreach ($blogs->all() as $blog)
            {{-- {{ $blog }}<br> --}}
            <div class="item  col-xs-4 col-lg-4">
                <div class="thumbnail">
                    <img class="group images" src="{!! '/images/'.$blog->blog_image !!}" alt="" />
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading">
                            {{$blog->blog_name}}</h4>
                        <p class="group inner list-group-item-text">
                            {{substr($blog->blog_description, 0, 200).' ....'}}
                        </p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <a href="{{ url('home/'.$blog->id) }}">Continue Reading ...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else
        <div class="container">
            <div class="content">
                <div class="title">No Blogs.Try Adding new blog.</div>
            </div>
        </div>
    @endif
</div>

@endsection
@section('javascript')
<script>
    $(document).ready(function() {
        $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
        $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    });
</script>
@endsection

