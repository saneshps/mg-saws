@extends('layouts.admin')
   
@section('content')
    
     
   
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 style="opacity:.4;" >Show Product</h2>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-pencil-square-o"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </form>
                </div>
                <div class="pull-right">

                   

                    <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <h4 style="color:black" >
                    <strong>{{ $product->name }}</strong>
                </h4>
                <h5>{{ $product->model_no }} <strong style="padding-left:20px;" >@foreach ($categories as $category)  {{ $category->name }}@endforeach</strong></h5>
                <p><strong><span style="padding-right:60px;">ID : {{ $product->id }}</span>   {{ $product->status? 'Active': 'Inactive' }}</strong></p>
                <strong>Description</strong>
                <div>{!! $product->desc!!}</div>
                <!-- <strong>option</strong>
                <p>{!! $product->option !!}</p> -->
                <!-- <div class="row">
                    <div class="col-md-6">
                        <strong>package</strong>
                        <p>{!! $product->package !!}</p>
                    </div> -->
                    <!-- <div class="col-md-12"> -->
                        <a href="{{ $product->video_link }}"><img src="../assets/images/play-01.svg" alt="" style="width:120px;"></a>
                    <!-- </div> -->
                <!-- </div>        -->
                <div class="col-md-12 py-2">
                <strong>Graph</strong>
                <div class="row py-2">    
                    @foreach ($graphs as $graph) 
                    <div class=col-md-4>        
                        <img src=" {{ asset('storage/'.$graph->graph) }}" width="100%" height="auto" style="object-fit:cover;" class="py-2"> 
                        {{-- <form action="{{ route('graphs.destroy',$graph->id) }}" method="POST" style="position:absolute; top: 0.5em; right:0.5em;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn " style="border-radius: 50px;"><i class="fa  fa-times-circle"  style="color:red; font-size:25px;"></i></button>
                        </form>        --}}
                    </div>      
                    @endforeach 
                    {{-- <div class="col-md-3 py-2">
                        <a href="{{ url('graphs/create/'.$product->id) }}"><img src="../assets/images/add-image.png" alt="" width="35%; image-position:center;"></a>
                    </div> --}}
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-10">
                        <img src="{{ asset('storage/'.$product->image) }}" width="100%" style="object-fit:cover; height:50vh">
                    </div> 
                    <div class="col-md-2">  
                        <div class="row py-1">
                            @foreach ($images as $image)    
                                <div class="col-md-12" >   
                                    <div style=" width:100%; height:10vh;">
                                        <img class="py-2" src=" {{ asset('storage/'.$image->file_name) }} " width="100%" style="object-fit:cover; height:10vh"> 
                                    </div> 
                                    {{-- <form action="{{ route('images.destroy',$image->id) }}" method="POST" style="position:absolute; top: 0.3em; right:0.3em;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn " style="border-radius: 50px;"><i class="fa  fa-times-circle"  style="color:red; font-size:20px;"></i></button>
                                    </form>                --}}
                                </div>          
                            @endforeach
                            {{-- <div class="col-md-12 py-2">
                                <a href="{{ url('images/create/'.$product->id) }}"><img src="../assets/images/add-image.png" alt="" width="35%"></a>
                            </div> --}}
                        </div>
                    </div>
                    @if($datasheet)
                     <div class="col-md-12 py-2">
                        <strong>Datasheet</strong>
                        <div class="row py-2">
                            <div class=col-md-12>        
                                <!-- <img src="" width="100%" height="200" style="object-fit:cover;" class="py-2">  -->
                                <a class="btn btn-info" href="{{ asset('storage/datasheets/'.$datasheet->file_name) }}" target="_blank" style="width:82%">Datasheet</a>

                                {{-- <form action="#" method="POST" style="position:absolute; top: 0.1em; right:0.5em;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn " style="border-radius: 50px;"><i class="fa fa-times-circle"  style="color:red; font-size:25px;"></i></button>
                                </form>        --}}
                            </div>
                            {{-- @foreach ($datasheets as $datasheet)       
                            @endforeach  --}}
                            {{-- <div class="col-md-3 py-2">
                                <a href="{{ url('pdf/create/'.$product->id) }}"><img src="../assets/images/add-image.png" alt="" width="35%; image-position:center;"></a>

                            </div> --}}
                        </div>
                    </div> 
                    @endif
                </div>
            </div>


             


          


            

        </div>
    </div>
    
@endsection