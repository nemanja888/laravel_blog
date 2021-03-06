@extends('layouts.app');


@section('content')

    @include('admin.includes.errors')



    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new post
        </div>
    </div>

    <div class="panel-body">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input name="featured" type="file" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Title</label>
                <select name="category_id" id="category" class="form-control">

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="tags">Select Tags</label>
                @foreach($tags as $tag)
                    <div class="checkbox">
                        <label for=""><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label>
                    </div>
                @endforeach
            </div>
                 <div class="form-group">
                    <label for="summernote">Content</label>
                    <textarea name="contents" id="summernote" cols="5" rows="5" class="form-control"></textarea>
                </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Store Post
                    </button>
                </div>
            </div>
        </form>
    </div>

@stop


@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@stop

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
@stop
