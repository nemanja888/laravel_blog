@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Published Posts
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Trash</th>
                </tr>

                </thead>
                <tbody>
                    @if($posts->count() > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px">  </td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <a href="{{ route('post.single', ['slug' => $post->slug]) }}" class="btn btn-xs btn-success">
                                        View
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-xs btn-info">
                                        Edit
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-xs btn-danger">
                                        Trash
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                    @else
                        <th colspan="4" class="text-center">No Published Post</th>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@stop