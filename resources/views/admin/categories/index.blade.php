@extends('layouts.app')


@section('content')
    <div class="panel panel-default">

        <div class="panel-heading">
            Categories
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Category name</th>
                        <th>Editing</th>
                        <th>Deleting</th>
                    </tr>

                </thead>
                <tbody>
                   @if($categories->count() > 0)
                       @foreach($categories as $category)
                           <tr>
                               <td>{{ $category->name }}</td>
                               <td>
                                   <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-xs btn-info">
                                       Edit
                                   </a>
                               </td>

                               <td>
                                   <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-xs btn-danger">
                                       Delete
                                   </a>
                               </td>
                           </tr>

                       @endforeach
                   @else
                       <th colspan="3" class="text-center">No categories yet</th>
                   @endif

                </tbody>
            </table>
        </div>
    </div>
@stop