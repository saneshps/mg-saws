@extends('layouts.admin')
  
@section('style')


@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-3">
            <a class="btn " href="{{ route('product-show.edit',$category->id) }}"> 
            <img src="{{ url('/storage/'.$category->tumb) }}" width="100%">
            <!-- {{ $category->id }} -->
            <!-- {{ $category->name }} -->
            
            <h5 class="px-2 py-4"> <strong>{{ $category->slug }}</strong></h5></a>          
            </div>
        @endforeach 
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3" style="    display: flex; justify-content: center;align-items: center;background: #fff;">
            <a class="btn " href="{{ route('product-show.show',$product->id) }}"> 
            <img src="{{ url('/storage/'.$product->image) }}" width="100%">
            <h5 class="px-2 py-4"> <strong>{{ $product->name }}</strong></h5>
            <!-- <p>{{ $product->category }}</p> -->
            </a>          
            </div>
        @endforeach 
    </div>
</div>
    
    
     
    
       
    
    
    

@endsection
@section('script')


@endsection