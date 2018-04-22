@extends('layouts.app');


@section('content')

    @include('admin.includes.errors')



    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new TAG
        </div>
    </div>

    <div class="panel-body">
        <form action="{{ route('tag.store') }}" method="post" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="tag">Tag</label>
                <input name="tag" type="text" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Create Tag
                    </button>
                </div>
            </div>
        </form>
    </div>

@stop