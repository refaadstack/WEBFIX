@extends('includes.head')
@section('title', "$posts->title")
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
                <div class="post-item">
                    <div class="post-inner">
                        <div class="post-head clearfix">
                            <div class="col-md-12">
                                <div class="detail">
                                    <h2 class="handle">{{ $posts->title }}</h2>
                                    <div class="post-meta">
                                        <div class="asker-meta">
                                            <small>{{ date('j F Y',strtotime($posts->created_at)) }}</small>
                                            <small>by</small>
                                            <small><a href="#">admin</a></small>
                                        </div>
                                        <div class="share">
                                            <small><a href="#">Share</a></small>
                                            <i class="fa fa-facebook"></i>
                                            <i class="fa fa-twitter"></i>
                                            <i class="fa fa-youtube"></i>
                                        </div>
                                        <div class="tags">
                                            <span class="badge badge-success">#Test</span>
                                        </div>
                                        <div class="kategori text-right">
                                            <span class="badge badge-warning text-right">Kategori</span>
                                        </div>
                                        <hr>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="img-fluid">
                                    <a href="#"><img src="{{ asset('images/post3.jpg') }}" class="img-fluid" alt="Responsive image" style="width: 800px; height:370px "></a>
                                </div>
                                <br>
                                <div class="post-content">
                                    <p>{{ ($posts->content) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
                                @include('includes.sidebar')
    </div>
</div>

@endsection
