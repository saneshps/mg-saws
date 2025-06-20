@extends('layouts.admin')
     
@section('content')
   
   <div class="container-fluid">
   <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
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
            <th >name & Model</th>
            <th>category</th>
            <th>image</th>
            <th>actions</th>
        </tr>
        @foreach ($data as $product)
        <tr>
        
            <td>{{ ++$i }}</td>
            <td>{{ $product->id }}</td>
            <td style="width:500px;" >
                <strong>{{ $product->model_no }}</strong>  
                <a class="" href="{{ route('products.show',$product->id) }}"> <p>{{ $product->name }}</p></a>
                <strong>{{ $product->status? 'Active': 'Inactive' }}</strong>
            </td>
           
            <td>{{ $product->category }}</td>
            
            <td><img src="{{ url('/storage/'.$product->image) }}" width="100px"></td>
            <td>
                <div class="row">
                    <a class="btn btn-primary" href="{{ route('products.show',$product->id) }}"><i class="fa fa-eye"></i></a>
                    &nbsp;&nbsp;&nbsp;
                    <a class="btn btn-info" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                    &nbsp;&nbsp;&nbsp;
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </form>
                </div>
            </td>
            <!--<td>
             <form action="{{ route('products.destroy',$product->id) }}" method="POST">
            
           

            <!-- <a class="btn btn-info" href="{{ url('images/create/'.$product->id) }}">Add <i class="fa fa-image"></i></a>

            <a class="btn btn-info" href="{{ url('graphs/create/'.$product->id) }}">Add Graph</a> --

            <a class="btn btn-info" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-pencil-square-o"></i></a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </form> 
            </td>-->
            
        </tr>
        @endforeach
    </table>
    </div> 
    
    {!! $data->links() !!}
        
@endsection