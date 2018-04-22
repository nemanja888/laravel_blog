@extends('layouts.app');


@section('content')

    @include('admin.includes.errors')



    <div class="panel panel-default">
        <div class="panel-heading">
            Edit {{ $tag->tag }}
        </div>
    </div>

    <div class="panel-body">
        <form action="{{ route('tag.update', ['id' => $tag->id]) }}" method="post" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tag">Tag</label>
                <input name="tag" type="text" value="{{ $tag->tag }}" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Update Tag
                    </button>
                </div>
            </div>
        </form>
    </div>

@stop