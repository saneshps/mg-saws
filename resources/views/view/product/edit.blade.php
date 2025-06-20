@extends('layouts.admin')
@section('style')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                    <button type="submit" class="btn btn-primary">Save & Publish</button>
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
        <div class="col-md-6">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>description:</strong>
                    <!-- <textarea class="form-control" rows="6" name="description" placeholder="Detail">{{ $product->description }}</textarea> -->
                    <textarea name="desc">{{ $product->desc }}</textarea>
                </div>
            </div>
            @if($datasheet)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Datasheet</strong>
                    <div class="row mt-2">
                        <div class="col-md-10">
                            <a class="btn btn-info" style="width:100%" target="_blank" href="{{ asset('storage/datasheets/'.$datasheet->file_name) }}">View Datasheet</a>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-danger" width="100%" href="{{ route('removeDatasheet',$datasheet->id) }}">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Datasheet</strong>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-outline-info mt-2" style="width:100%; border-style:dashed;border-width:3px;" href="{{ url('pdf/create/'.$product->id) }}">Add Datasheet <i class="fa fa-plus-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Graph</strong>
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($graphs as $graph)
                            <div class="col-md-4 text-center">
                                <a href="{{ asset('storage/'.$graph->graph) }}" target="_blank"><img src=" {{ asset('storage/'.$graph->graph) }}" width="100%" height="auto" style="object-fit:cover;" class="py-2"></a>
                                <a href="{{ route('removeGraph',$graph->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</a>
                            </div>
                            @endforeach
                            @if(sizeof($graphs) < 3) <div class="col-md-4">
                                <a href="{{ url('graphs/create/'.$product->id) }}"><img src="{{ asset('assets/images/add-image.png') }}" class="py-2" alt="" width="25%"></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>video Link:</strong>
                <input type="text" name="video_link" class="form-control" placeholder="Video Link" value="{{ $product->video_link }}">
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <strong>Category</strong>
                <select type="text" name="category" class="form-control">
                    <option value="{{ $product->category }}">@foreach($cate as $cat){{ $cat->name }}@endforeach</option>
                    @if($categories)
                    @foreach($categories as $category)
                    <?php $dash = ''; ?>
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @if(count($category->subcategory))
                    @include('category.subcategoryList-option',['subcategories' => $category->subcategory])
                    @endif
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ $product->slug }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>model No:</strong>
                <input type="text" name="model_no" class="form-control" placeholder="Name" value="{{ $product->model_no }}">
            </div>
        </div>

        <div class="image-upload-one">
            <strong>Change Image</strong>
            <div class="center">
                <div class="form-input">
                    <label for="file-ip-1">
                        <img id="file-ip-1-preview" src="{{ url('/storage/'.$product->image) }}" style=" height: auto; width:100%; padding: 10px;">
                    </label>
                    <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="row">
                @foreach($images as $image)
                <div class="col-md-3">
                    <a href="{{ asset('storage/'.$image->file_name) }}" target="_blank"><img class="py-2" src="{{ asset('storage/'.$image->file_name) }}" width="100%" style="object-fit:cover; height:10vh"></a>
                    <a href="{{ route('removeImage',$image->id) }}" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</a>
                </div>
                @endforeach
                @if(sizeof($images) < 4) <div class="col-md-3">
                    <a href="{{ url('images/create/'.$product->id) }}"><img src="{{ asset('assets/images/add-image.png') }}" class="py-2" alt="" width="35%"></a>
            </div>
            @endif
        </div>
    </div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12 text-center">

</div>
</div>

</form>
</div>
@endsection
@section('script')
<script>
    CKEDITOR.replace('desc', {
        height: 400,
    });
</script>



@endsection