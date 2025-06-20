 @extends('layouts.admin')
   
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
                                    <input type="text" name="name" class="form-control" placeholder="Category name"  value="{{ $category->name }}" required />
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
                                    <textarea name="description" class="form-control" placeholder="Category description" >{{ $category->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 py-2">
                                <div class="form-group">
                                   
                                    <label>Select parent category*</label>
                                    <select type="text" name="parent_id" class="form-control">
                                        <option value="{{ $category->parent_id }}">{{ $category->parent_id }}</option>
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

                    </div>  -->
                    <div class="image-upload-one ">
                        <div class="center">
                            <div class="form-input">
                                <label for="file-ip-1">
                                <img id="file-ip-1-preview" src=" {{ asset('image/add-img-02.jpg') }}" style=" height: 40vh; width:auto; margin: 2px;">
                                </label>
                                <input type="file"  name="tumb" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                            </div>
                        
                        </div>
                    </div>
                </form>
        </div>
        <div class="col-md-12">
        <h4>Meta Contents</h4>
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addMetaModal">Add new</button>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Meta Title</th>
                <th>Description</th>
                <th>Edit</th>
            </thead>
            <tbody>
            @php
                $metaDetails = DB::table('meta_infos')->where('category_id',$category->id)->get();
            @endphp
            @foreach($metaDetails as $meta)
                <td>{{$loop->index + 1}}</td>
                <td>{{$meta->meta_title}}</td>
                <td>{{$meta->meta_content}}</td>
                <td><button class="btn btn-primary" type="button" data-toggle="modal" data-target="#editMetaModal_{{ $meta->id }}">Edit</button></td>
                <div class="modal fade" id="editMetaModal_{{ $meta->id }}" tabindex="-1" role="dialog" aria-labelledby="addMetaModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ddMetaModalTitle">Edit Meta Content</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('meta.update',$meta->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <label>Meta Title</label>
                                        <input name="meta_title" type="text" value="{{$meta->meta_title}}" class="form-control" placeholder="Meta Title">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Meta Content</label>
                                        <textarea name="meta_content" class="form-control">{{$meta->meta_content}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>        
        </div>
        
        <div class="modal fade" id="addMetaModal" tabindex="-1" role="dialog" aria-labelledby="addMetaModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ddMetaModalTitle">Add Meta Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('meta.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label>Meta Title</label>
                                <input name="meta_title" type="text" value="{{old('meta_title')}}" class="form-control" placeholder="Meta Title">
                            </div>
                            <div class="col-md-12">
                                <label>Meta Content</label>
                                <textarea name="meta_content" class="form-control">{{old('meta_content')}}</textarea>
                                <input type="hidden" name="category_id" value="{{ $category->id }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 
@section('script')
<script>
    CKEDITOR.replace('description', {
        height: 400,
    });
</script>



@endsection



 
