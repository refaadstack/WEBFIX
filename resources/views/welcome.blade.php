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
    <div class="row">

            @foreach ($posts as $post)
            <div class="col-md-3" style="margin-left: 5px">
                <div class="card" style="width: 16rem; margin-bottom: 20px">
                    <img src="{{ asset('images/post3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <small>{{date('j F Y ,h:ia', strtotime($post->created_at))}}</small>
                      <h5 class="card-title"><a href="{{url('posts/'.$post->slug)}}">{{ Str::limit($post->title,20) }}</a></h5>
                      <p class="card-text"><a href="{{url('posts/'.$post->slug)}}">{{ Str::limit($post->content,20)}}</a></p>
                      <a href="{{url('posts/'.$post->slug)}}" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            @endforeach

    </div>
</div>

@endsection
