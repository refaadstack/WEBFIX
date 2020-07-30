@extends('includes.head')
@section('title','Buat Post')
@section('content')

<div class="container">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link text-dark fa fa-plus active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> Buat Post</a>
          <a class="nav-item nav-link text-dark fa fa-list" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Semua Post</a>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            {{--  Menu Buat Post  --}}
            <div class="container" style="margin-bottom: 60px">
                <br>
                <div class="col-md-8" style="margin-left: auto; margin-right: auto">
                    <div><h3 class="text-center">Buat Post Baru</h3></div>
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="title">Judul:</label>
                          <input type="text" name="title" class="form-control"  placeholder="Judul Postingan..">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Kategori:</label>
                            <select name="category_id" class="form-control">
                                <option value="" class="disable selected">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Upload Gambar:</label>
                            <br>
                            <input type="file" name="image" class="form_control">
                        </div>
                        <div class="form-group">
                          <label for="content">Isi Konten:</label>
                          <textarea name="content" class="form-control"  placeholder="Konten Postingan.."></textarea>
                        </div>
                        <button class="btn btn-success btn-block" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
            {{--  End Menu Buat Post  --}}
        </div>
        {{--  MENU DAFTAR POST  --}}
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><br>

            <h5 class="text-center">Semua Post</h5>

            <table class="table table-striped table-hover">
                <thead>
                    <tr class="table-danger">
                        <th>NO.</th>
                        <th>Judul Post</th>
                        <th>Aksi</th>
                        <th>Diinput tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td><a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary btn-sm" >Edit</a>
                            <a href="#delete{{$post->id}}" class="btn btn-danger btn-sm" data-toggle="modal">Delete</a>
                        <td>{{ $post->created_at->diffForHumans()}}</td>
                    </tr>
                    {{--  delete modal  --}}
                    <div class="modal fade" id="delete{{$post->id}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Apakah Anda yakin menghapus Post <b>"{{ $post->title }}"?</b></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">

                                  <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                      {{ csrf_field() }}
                                      {{ method_field('delete') }}
                                      <div class="form-group">

                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-danger">Konfirmasi Hapus</button>
                                  </form>
                                 </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    {{--  end delete modal  --}}
                        @endforeach
                </tbody>
            </table>
            <div class="container">
                <div class="text-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        {{--  END MENU DAFTAR POST  --}}
      </div>
</div>


@endsection

@section('js')
<script>
    CKEDITOR.replace( 'content' );
</script>
@endsection
