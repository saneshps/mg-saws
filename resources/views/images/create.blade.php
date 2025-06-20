@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New product image</h2>
            </div>
            <form action="{{ url('images/store/'.$Product->id) }}" method="POST" enctype="multipart/form-data">
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
            <!-- <div class="form-group">
                <strong>Upload product image:</strong>
                <input type="file" name="file_name" class="form-control" placeholder="product image">
            </div> -->
            <div class="image-upload-one py-5">
                <div class="center">
                    <div class="form-input">
                        <label for="file-ip-1">
                            <img id="file-ip-1-preview" src="{{ asset('image/add-img-02.jpg') }}" style=" height: 40vh; width:auto; margin: 2px;">
                        </label>
                        <input type="file" name="file_name" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                    </div>

                    <div class="form-group">
                        <strong>Alt:</strong>
                        <input type="text" name="image_alt" class="form-control" placeholder="Alt">
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <input type="text" readonly class="form-control" value="{{$Product->name}}">
                <input type="hidden" name="product_id" value="{{$product_id}}">

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        </div>
    </div>

    </form>
</div>

@endsection