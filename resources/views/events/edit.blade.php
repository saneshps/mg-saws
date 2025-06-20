@extends('layouts.admin')

@section('style')
<!-- <script src="https://cdn.tiny.cloud/1/w8f188m9n8lk28qvepfp9lmxz72dwrjdzpbkmpo19qbvkxn2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

@endsection
@section('content')
<div class="container">
    <form action="{{ route('events.update',$event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Blog</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('events.index') }}"> Back</a>
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
                        <input type="text" name="name" value="{{ $event->name }}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea class="form-control" id="text_editor" rows="20" name="detail" placeholder="Sub-headings should only come after the first 100 characters... ">{{ $event->detail }}</textarea>

                    </div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12">
                                 <div class="form-group">
                                     <label>Meta Title </label>
                                     <textarea name="meta_title" class="form-control" placeholder="Meta Title">{{ $event->meta_title }}</textarea>
                                 </div>
                             </div>
                            
            </div>
			
            <div class="col-md-6">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Slug:</strong>
                        <input type="text" name="slug" value="{{ $event->slug }}" class="form-control" placeholder="Slug">
                    </div>
                </div>
                <div class="image-upload-one py-5">
                    <div class="center">
                        <div class="form-input">
                            <label for="file-ip-1">
                                <img id="file-ip-1-preview" src="{{ url('/storage/'.$event->image) }}" style=" height: auto; width:100%; margin: 2px;">
                            </label>
                            <input type="file" name="image" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);" style="display:none;">
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Alt:</strong>
                        <input type="text" name="image_alt" value="{{$event->image_alt}}" class="form-control" placeholder="Alt">
                    </div>
                </div>
				 <div class="col-xs-12 col-sm-12 col-md-12">
                                 <div class="form-group">
                                     <label>Meta Description</label>
                                     <textarea name="meta_content" class="form-control" placeholder="Meta description">{{ $event->meta_content }}</textarea>
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
    CKEDITOR.replace('detail', {
        height: 400,
    });
</script>


@endsection