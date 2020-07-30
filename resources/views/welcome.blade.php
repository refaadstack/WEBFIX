@extends('includes.head')
@section('title', 'Welcome')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Selamat Datang</h1>
      <p class="lead">Ini adalah Website Promosi UMKM Merangin</p>
    </div>
  </div>
  <div class="container">
      <h5>Produk dan kegiatan UMKM Merangin</h5>
      <br>
      <div class="row row-cols-1 row-cols-md-3">
        @foreach ($posts as $post)
        <div class="col mb-4">
            <div class="card h-100">
              <img src="{{ asset('images/'.$post->image) }}" class="card-img-top" alt="...">
              <div class="card-body">
                <small>{{date('j F Y,h:ia', strtotime($post->created_at)) }}</small></a>
                <h5 class="card-title"><a href="http://localhost:8000/posts/{{$post->slug}}">{{ $post->title }}</a></h5>
                <p class="card-text">{!! Str::limit($post->content,50)!!} <a href="http://localhost:8000/posts/{{$post->slug}}"> baca selengkapnya..</a></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
  </div>
@endsection
