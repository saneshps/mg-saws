<?php $dash .= '-- '; ?>
@foreach($subcategories as $subcategory)
<option value="{{$subcategory->id}}">{{$dash}}{{$subcategory->name}}</option>
@if(count($subcategory->subcategory))
@include('category.subcategoryList-option',['subcategories' => $subcategory->subcategory])
@endif
@endforeach