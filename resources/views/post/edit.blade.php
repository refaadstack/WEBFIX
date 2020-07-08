@extends('includes.head')
@section('title','Edit Post')
@section('content')
<div class="container" style="margin-bottom: 60px">
    <div class="col-md-8" style="margin-left: 180px">
        <div><h3>Buat Postingan</h3></div>
        <form action="{{ route('posts.update',$posts->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-group">
              <label for="title">Judul:</label>
              <input type="text" name="title" value="{{ $posts->title }}" class="form-control"  placeholder="Judul Postingan..">
            </div>
            <div class="form-group">
              <label for="content">Isi Konten:</label>
              <textarea name="content" class="form-control"  placeholder="Konten Postingan..">{{ $posts->content}}</textarea>
            </div>
            <button class="btn btn-success" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection
