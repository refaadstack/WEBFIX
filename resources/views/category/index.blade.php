@extends('includes.head')
@section('title', 'Kategori Index')
@section('content')

<div class="container" style="margin-bottom: 200px">
    <div class="text-center">
        <h3>Semua Kategori <small>({{ $categories->total() }})</small></h3>
    </div>
    <hr>
    @foreach ($categories as $category)

        <h4><a href="{{ route('category.show',$category->id) }}" class="fa fa-map-marker" > {{ $category->name }}</a></h4>
        <div style="border-bottom: 1px solid #099; margin-bottom: 11px" >
            <p>{{ $category->posts->count() }} <i class="fa fa-list-alt"> Post</i></p>
            <p><small class="text-muted"><i class="fa fa-clock-o"></i>{{ $category->created_at->diffForHumans()}}</small></p>
        </div>
    @endforeach

    <div>
        {!!$categories->links();!!}</>

    </div>

</div>

@endsection
