@extends('layouts.admin')
@section('style')
<!-- <script src="https://cdn.tiny.cloud/1/w8f188m9n8lk28qvepfp9lmxz72dwrjdzpbkmpo19qbvkxn2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
 
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


@endsection
@section('content')

 <div class="container"> 
 <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>description:</strong>
                <textarea class="form-control" rows="6" name="description" placeholder="next line using text'<br>'"></textarea>
            </div>
        </div> -->



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <!-- <textarea name="description"></textarea> -->
                <textarea name="desc"></textarea> 
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>option:</strong>
                <textarea class="form-control" rows="8" name="option" ></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>package:</strong>
                <textarea class="form-control" name="package" ></textarea>
            </div>
        </div> -->
    </div>
    <div class="col-md-6">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>video_link:</strong>
                <input type="text" name="video_link" class="form-control" placeholder="SRC CODE">
            </div>
        </div>
      
        <div class="col-sm-12">
             <div class="form-group">
             <strong>Category</strong>
             <select type="text" name="category" class="form-control">
                                        <option value="">None</option>
                                        @if($categories)
                                            @foreach($categories as $category)
                                                <?php $dash=''; ?>
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
                <strong>model_no:</strong>
                <input type="text" name="model_no" class="form-control" placeholder="Name">
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div> -->
        <div class="image-upload-one px-4 ">
                <div class="center">
                    <div class="form-input">
                        <label for="file-ip-1" >
                        <img id="file-ip-1-preview" src="{{ asset('image/add-img-02.jpg') }}" style=" height: auto; width:100%; margin: 2px;">
                        </label>
                        <input type="file"  name="image" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                    </div>
                
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
        CKEDITOR.replace( 'desc',{
            height:400,
         });
    </script>

@endsection