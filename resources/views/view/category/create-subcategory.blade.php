@extends('layouts.admin')
   
@section('content')
<section class="content" style="padding:20px 30%;">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
            <form role="form" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="box-header with-border">
                    <h3 class="box-title">Create Category</h3>
                </div>
                
                
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12 py-2">
                                <div class="form-group">
                                    <label>Category name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="Category name" value="{{old('name')}}" required />
                                </div>
                            </div>
                            <div class="col-sm-12 py-2">
                                <div class="form-group">
                                    <label>Category Slug*</label>
                                    <input type="text" name="slug" class="form-control" placeholder="Category name" value="{{old('slug')}}" required />
                                </div>
                            </div>
                            
                            
                            

                            <div class="col-sm-12 py-2">
                                <div class="form-group">
                                    <label>Select parent category*</label>
                                    <select type="text" name="parent_id" class="form-control">
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
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save & Publish</button>
                            </div>

                        </div>
                    </div>
                   

                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                @if(\Session::has('error'))
                    <div>
                        <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
                    </div>
                @endif

                @if(\Session::has('success'))
                    <div>
                        <li class="alert alert-success">{!! \Session::get('success') !!}</li>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-6 py-5" >
                    <!-- <div class="col-sm-12">
                        <div class="form-group">
                            <label>tumb image*</label>
                            <input type="file" name="tumb" class="form-control" placeholder="" value="" required />
                        </div>

                    </div> -->
                    <div class="image-upload-one ">
                        <div class="center">
                            <div class="form-input">
                                <label for="file-ip-1">
                                <img id="file-ip-1-preview" src="{{ asset('image/add-img-02.jpg') }}" style=" height: 40vh; width:auto; margin: 2px;">
                                </label>
                                <input type="file"  name="tumb" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                            </div>
                        
                        </div>
                    </div>
                    
                    
                </form>
        </div>
    </div>
</section>
@endsection 




