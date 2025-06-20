@extends('layouts.admin')
     
@section('content')
    
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Graph</th>
            <th>Product</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $graph)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $graph->id  }}</td>
            <td><img src="{{ url('/storage/'.$graph->graph) }}" width="100px"></td>
            <td>{{ $graph->product }}</td>
            <td>
                <form action="{{ route('graphs.destroy',$graph->id) }}" method="POST">
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $data->links() !!}
        
@endsection