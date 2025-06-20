 @extends('layouts.admin')
@section('style')
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@endsection
 @section('content')
 <section class="content" style="padding:20px">
     <div class="row">
         <div class="col-md-6">
             <div class="box box-primary">

                 <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="box-header with-border">
                         <h3 class="box-title">Edit Category</h3>
                     </div>

                     <div class="box-body">
                         <div class="row">
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">
                                     <label>Category name*</label>
                                     <input type="text" name="name" class="form-control" placeholder="Category name" value="{{ $category->name }}" required />
                                 </div>
                             </div>
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">
                                     <label>Category Slug*</label>
                                     <input type="text" name="slug" class="form-control" placeholder="Category slug" value="{{ $category->slug }}" required />
                                 </div>
                             </div>
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">
                                     <label>Category Description</label>
                                     <textarea name="desc" id="description" class="form-control" placeholder="Category description">{{ $category->description }}</textarea>
                                 </div>
                             </div>
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">
                                     <label>Meta Title </label>
                                     <textarea name="meta_title" class="form-control" placeholder="Meta Title">{{ $category->meta_title }}</textarea>
                                 </div>
                             </div>
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">
                                     <label>Meta Description</label>
                                     <textarea name="meta_content" class="form-control" placeholder="Meta description">{{ $category->meta_content }}</textarea>
                                 </div>
                             </div>
                             <div class="col-sm-12 py-2">
                                 <div class="form-group">

                                     <label>Select parent category*</label>
                                     <select type="text" name="parent_id" class="form-control">
                                         @if($category->parent_id!="")
                                         <option value="{{ $category->parent_id }}">-{{ $category->parent->name }}-</option>
                                         @else
                                         <option value="" selected disabled>Select a Category</option>
                                         @endif
                                         @if($parents)
                                         @foreach($parents as $cat)
                                         <?php $dash = ''; ?>
                                         <option value="{{$cat->id}}">{{$cat->name}}</option>
                                         @if(count($cat->subcategory))
                                         @include('category.subcategoryList-option',['subcategories' => $cat->subcategory])
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
         <div class="col-md-6 py-5">
             <!-- <div class="col-sm-12">
                        <div class="form-group">
                            <label>tumb image*</label>
                            <input type="file" name="tumb" class="form-control" placeholder="" value="" required />
                        </div>

                    </div>  -->
             <div class="image-upload-one ">
                 <div class="center">
                     <div class="form-input">
                         <label for="file-ip-1">
                             <img id="file-ip-1-preview" src=" {{ asset('image/add-img-02.jpg') }}" style="cursor:pointer; height: 40vh; width:auto; margin: 2px;">
                         </label>
                         <input type="file" name="tumb" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                     </div>
                     <img src=" {{ asset('storage/'. $category->tumb) }}" style=" width:50%; margin: 2px;">
                     <div class="form-group">
                         <strong>Alt:</strong>
                         <input type="text" name="image_alt" value="{{$category->image_alt}}" class="form-control" placeholder="Alt">
                     </div>
                 </div>
             </div>
             </form>
         </div>

     </div>
 </section>
 @endsection
 @section('script')
<script>
    CKEDITOR.replace('desc', {
        height: 400,
    });
</script>



@endsection