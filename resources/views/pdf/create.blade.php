@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Datasheet</h2>
            </div>
            <form action="{{ route('datasheet.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                    <button type="submit" class="btn btn-primary">Save &Publish</button>
                </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif



    <div class="row">


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Upload datasheet for <br>{{$Product->name}}</strong>
                <input type="file" name="file" class="form-control mt-3">
                {{-- @error('pdf')
                <span class="text-danger">{{ $message }}</span>
                @enderror --}}
            </div>
            <!-- <div class="image-upload-one py-5">
                <div class="center">
                    <div class="form-input">
                        <label for="file-ip-1">
                        <img  src="{{ asset('image/add-img-02.jpg') }}"
                        <video id="file-ip-1-preview" src="http://media.w3.org/2010/05/sintel/trailer.mp4" style=" height: 40vh; width:auto; margin: 2px;" autoplay  ></video>
                        </label>
                        <input type="file"  name="video" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                    </div>
                
                </div>
            </div> -->
        </div>
        <input type="hidden" name="product_id" value="{{$product_id}}">

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        </div>
    </div>

    </form>
</div>

@endsection
