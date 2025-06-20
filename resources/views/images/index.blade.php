@extends('layouts.admin')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                
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
            <th>image</th>
            <th>Product</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $image)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $image->id }}</td>
            <td><img src=" {{ url('/storage/'.$image->file_name) }} " width="100px"></td>
            <td>{{ $image->product }}</td>
            <td>
            <form action="{{ route('images.destroy',$image->id) }}" method="POST">
            
            

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