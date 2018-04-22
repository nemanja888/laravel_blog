@extends('layouts.app');


@section('content')

    @include('admin.includes.errors')



    <div class="panel panel-default">
        <div class="panel-heading">
            Edit blog settings
        </div>
    </div>

    <div class="panel-body">
        <form action="{{ route('settings.update') }}" method="post" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="site_name">Site name</label>
                <input name="site_name" value="{{ $settings->site_name }}" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input name="address" value="{{ $settings->address }}" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Phone</label>
                <input name="contact_number" value="{{ $settings->contact_number }}" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="contact_email">Email</label>
                <input name="contact_email" value="{{ $settings->contact_email }}" type="email" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">
                        Make changes
                    </button>
                </div>
            </div>
        </form>
    </div>

@stop