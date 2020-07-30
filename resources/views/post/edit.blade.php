@extends('includes.head')
@section('title','Edit Post')
@section('content')
<div class="container" style="margin-bottom: 60px">
    <div class="col-md-8" style="margin-left:auto; margin-right: auto">
        <div><h3>Buat Postingan</h3></div>
        <form action="{{ route('posts.update',$posts->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-group">
                <label for="title">Judul:</label>
                <input type="text" name="title" class="form-control" value="{{ $posts->title }}" placeholder="Judul Postingan..">
              </div>
              <div class="form-group">
                  <label for="category_id">Kategori:</label>
                  <select name="category_id" class="form-control">
                      <option value="" class="disable selected">Pilih Kategori</option>
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}" <?php if ($posts->category_id == $category->id){echo "selected";}?>
                      >{{ $category->name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="sektors">Sektor:</label>
                  <select name="sektors[]" multiple="multiple" class="form-control selectpicker">
                      @foreach ($sektors as $sektor)
                      <option value="{{ $sektor->id }}">{{ $sektor->name }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="member_id">Pemilik:</label>
                <select name="member_id" class="form-control">
                    <option value="" class="disable selected">Pilih Pemilik UKM</option>
                    @foreach ($members as $member)
                    <option value="{{ $member->id }}" <?php if ($posts->member_id == $member->id){echo "selected";}?>{{ $member->name }}</option>
                    @endforeach
                </select>
            </div>
              <div class="form-group">
                  <label for="image">Upload Gambar:</label>
                  <br>
                  <input type="file" name="image" class="form_control">
              </div>
              <div class="form-group">
                    <img src="{{ asset('images/'.$posts->image) }}" alt="" class="form-control" style="width: 100%; height: 300px">
              </div>
              <div class="form-group">
                <label for="content">Isi Konten:</label>
                <textarea name="content" class="form-control" placeholder="Konten Postingan..">{{ $posts->content }}</textarea>
              </div>
            <button class="btn btn-success" type="submit">Update</button>
        </form>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
            $(".selectpicker").selectpicker().val({!!json_encode($posts->sektors()->allRelatedIds())!!}).trigger('change');
            CKEDITOR.replace( 'content' );
    </script>
@endsection

