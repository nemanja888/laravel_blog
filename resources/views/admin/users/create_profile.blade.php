@extends('layouts.app');


@section('content')

    @include('admin.includes.errors')



    <div class="panel panel-default">
        <div class="panel-heading">
            Edit your profile
        </div>
    </div>

    <div class="panel-body">
        <form action="{{ route('store.profile') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Username</label>
                <input name="name" type="text" value="{{ $user->name }}" class="form-control">
            </div>
                <input name="user_id" type="hidden" value="{{ $user->id }}" class="form-control">
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" value="{{ $user->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="avatar">Upload new avatar</label>
                <input name="avatar" type="file" class="form-control">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook profile</label>
                <input name="facebook" type="text" value="http://facebook.com/..." class="form-control">
            </div>
            <div class="form-group">
                <label for="youtube">Youtube profile</label>
                <input name="youtube" type="text" value="http://youtube.com/..." class="form-control">
            </div>
            <div class="form-group">
                <label for="about">About you</label>
                <textarea name="about" id="about" cols="6" rows="6" class="form-control">Some description</textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Change
                    </button>
                </div>
            </div>
        </form>
    </div>

@stop