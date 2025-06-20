@extends('layouts.admin')
   
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
        <th>NO</th>
            <th>ID</th>
            <th>name</th>
            <th>slug</th>
            <th>tumb</th>
            <th>Parent category</th>
           
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $category)
        <tr>
        <td>{{ $i++ }}</td>
            <td>{{ $category->id }}</td>
            
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td> <img src="{{ url('/storage/'.$category->tumb) }}" width="100px"></td>
            <td>{{ $category->parent }}</td>
           
            <td>
                <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                  <a class="btn btn-info" href="{{ route('category.edit',$category->id) }}"><i class="fa fa-pencil-square-o"></i></a> 
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $data->links() !!}
        
@endsection