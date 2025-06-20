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
            <!-- <th>ID</th> -->
            <th>video</th>
            <th>Product</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $video)
        <tr>
            <td>{{ ++$i }}</td>
            <!-- <td>{{ $video->id  }}</td> -->
            <!-- <td><img src="/graph/{{ $video->product_id }}/{{ $video->video  }}" width="100px"></td> -->
            <td><a class="btn btn-info" href="{{ url($video->video) }}" style="width:100%">Download Datasheet</a></td>
            <td>{{ $video->product }}</td>
            <td>
                <form action="{{ route('videos.destroy',$video->id) }}" method="POST">
     
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