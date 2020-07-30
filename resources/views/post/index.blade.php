@extends('includes.head')
@section('title','Post Index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            @foreach ($posts as $post)
            <ul class="list-unstyled">
                <div class="col-md-4">
                    <li class="media">
                        <img src="{{ asset('images/'.$post->image) }}" class="img-fluid" alt="Responsive image">
                    </li>
                </div>
                <div class="col-md-8">
                    <div class="media-body">
                        <h3 class="mt-0 mb-1 text-capitalize" ><a href="http://localhost:8000/posts/{{$post->slug}}">{{ $post->title }}</a></h3>
                        <small>{{ date('j F Y',strtotime($post->created_at)) }}</small>
                        @foreach ($post->sektors as $sektor)
                        <span class="badge badge-warning">{{ $sektor->name }}</span>
                        @endforeach
                        <p>{!! Str::limit($post->content)!!} <a href="http://localhost:8000/posts/{{$post->slug}}">Baca Selengkapnya..</a></p>
                       </div>
                </div>
            </ul>
            @endforeach

            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>

            @include('includes.sidebar')

    </div>
</div>
<br>

@endsection
