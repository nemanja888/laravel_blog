@extends('layouts.app');


@section('content')

@include('admin.includes.errors')



    <div class="panel panel-default">
        <div class="panel-heading">
            Create a new CATEGORY
        </div>
    </div>

    <div class="panel-body">
        <form action="{{ route('category.store') }}" method="post" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Create Category
                    </button>
                </div>
            </div>
        </form>
    </div>

@stop