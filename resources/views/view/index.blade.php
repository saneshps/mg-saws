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
    
    
     
    
       
    
    
    

@endsection
@section('script')


@endsection