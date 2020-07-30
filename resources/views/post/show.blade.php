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
                                    <h2 class="handle text-capitalize">{{ $posts->title }}</h2>
                                    <div class="post-meta">
                                        <div class="asker-meta">
                                            <small>{{ date('j F Y',strtotime($posts->created_at)) }}</small>
                                            <small>by</small>
                                            <small><b>admin</b></small>
                                        </div>
                                        <div class="share">
                                            <small>Produk ini milik: <b> {{ $posts->member->name }}</b></small>

                                        </div>
                                        <small>Alamat: <b> {{ $posts->member->address }}</b></small>
                                        <div class="tags">
                                            <small>Sektor:</small>
                                            @foreach ($posts->sektors as $sektor)
                                            <span class="badge badge-success"> {{ $sektor->name }}</span>

                                            @endforeach
                                        </div>
                                        <div class="kategori text-right">
                                            <span class="badge badge-warning text-right">{{ $posts->category->name }}</span>
                                        </div>
                                        <hr>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="img-fluid">
                                    <a href="#"><img src="{{ asset('images/'.$posts->image) }}" class="img-fluid" alt="Responsive image" style="width: 800px; height:370px "></a>
                                </div>
                                <br>
                                <div class="post-content text-justify">
                                    <p>{!! $posts->content!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- comment form --}}
                <hr>
                <h5>Komentar:</h5>
                <div class="card" style="margin-bottom: 60px">
                    <div class="card-header bg-light">

                        <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Semua Komentar</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Tambah Komentar</a>
                        </div>
                        </nav>

                    </div>
                    <div class="card-body">
                         <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                               @foreach ($posts->comments as $comment)
                                <div class="col-xs-2">
                                    <img src="{{ asset('images/icon-avatar-default.png') }}" style="border-radius: 120px; width:60px">
                                    <strong>  {{ $comment->comment }}</strong>
                                </div>

                                <hr>
                                <p ><small>dikirim oleh</small> : <a href="" class="text-capitalize text-bold">{{ $comment->user->name }}</a></p>
                                <div class="pull-right">
                                    <small>{{$comment->created_at->diffForHumans()}}</small>
                                </div>
                                @endforeach

                            </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form action="{{ route('buatKomentar.store',$posts->id) }}" method="POST">
                            {{ csrf_field() }}
                            <label for="">Tulis Komentar</label>
                            <div class="form-group">
                                <textarea type="text" name="comment" class="form-control" placeholder="Tulis Komentar..."></textarea>
                            </div>
                            <button class="btn btn-success btn-block" type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...

                    </div>
                        </div>
                    </div>
                </div>
       </div>
                                @include('includes.sidebar')
    </div>
</div>

@endsection
