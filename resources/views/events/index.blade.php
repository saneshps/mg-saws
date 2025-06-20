@extends('layouts.admin')

@section('style')




@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('events.create') }}"> Create New Events</a>
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
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Slug</th>
		<th>Alt</th>
        <!-- <th>Details</th> -->
        <th width="280px">Action</th>
    </tr>
    @foreach ($events as $event)
    <tr>
        <td>{{ ++$i }}</td>
        <td><img src="{{ url('/storage/'.$event->image) }}" width="100px"></td>
        <td>{{ $event->name }}</td>
        <td>{{ $event->slug }}</td>
		<td>{{ $event->image_alt }}</td>
        <!-- <td>{{ $event->detail }}</td> -->
        <td>
            <form action="{{ route('events.destroy',$event->id) }}" method="POST">

                <!-- <a class="btn btn-info" href="{{ route('events.show',$event->id) }}"><i class="fa fa-desktop"></i></a> -->

                <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}"><i class="fa fa-pencil"></i></a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $events->links() !!}




@endsection
@section('script')




@endsection