@extends('layouts.admin')
   
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product) 
                <div class="col-md-6">
                    <h3 class="py-3"> <strong>{{ $product->name }}</strong> </h3>
                     <h5><span style="color:red">{{ $product->model_no }}</span></h5>
                    <!-- {{ $product->id }}   -->
                    <!-- {{ $product->status? 'Active': 'Inactive' }} -->
                    <div class="py-3 px-3">{!! $product->description !!} </div>
                </div>
                <div class="col-md-6">
                    <img class="py-2" src=" {{ url('/storage/'.$product->image) }} " width="100%" style="object-fit:cover; height:auto;">
                    @foreach ($graphs as $graph)   
                        <img src=" {{ url('/storage/'.$graph->graph) }}" width="10%" height="auto" style="object-fit:cover;" class="py-2">  
                    @endforeach
                    @foreach ($images as $image)    
                        <img class="py-2" src=" {{ url('/storage/'.$image->file_name) }} " style=" width:10%">            
                    @endforeach
                </div>
            @endforeach

        </div>

    </div>
             
               
        
                   
 
                           
                            
                       
                                       
            
                               
    
@endsection