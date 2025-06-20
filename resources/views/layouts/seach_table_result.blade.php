<select class="hidden">
    @foreach ($product_data as $job)
    <option value="{{$job->slug}}">{{$job->name}}</li>
    <option value="{{$job->slug}}">{{$job->name}}</li>
        @endforeach
</select>