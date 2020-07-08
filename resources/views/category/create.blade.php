@extends('includes.head')
@section('title','Create Category')
@section('content')
<div class="container" style="margin-bottom: 60px">
    <div class="col-md-8" style="margin-left: 180px">
        <div><h3>Buat Kategori baru</h3></div>
       <div class="form-group">
        <form action="{{ route('category.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nama">Nama kategori</label>
              <input type="text" name="name" class="form-control"  placeholder="Masukkan nama kategori(cth: Kegiatan)">
            </div>
            <button class="btn btn-success btn-block" type="submit">Simpan</button>
        </form>
       </div>
       <div class="text-center"><h4> Semua Kategori</h4></div>
            <table class="table table-striped table-hover">
                    <thead>
                        <tr class="table-danger">
                            <th>NO.</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                            <th>Diinput tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $showcat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $showcat->name }}</td>
                                <td><a href="#edit{{$showcat->id}}" class="btn btn-primary" data-toggle="modal">Edit</a>
                                    <a href="#delete{{$showcat->id}}" class="btn btn-danger" data-toggle="modal">Delete</a>
                                <td>{{ date('j F Y',strtotime($showcat->updated_at))}}</td>
                            </tr>
                            {{--  <!-- editModal -->  --}}
                            <div class="modal fade" id="edit{{$showcat->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Nama kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                        <form action="{{ route('category.update',$showcat->id) }}" method="POST" role="form">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <div class="form-group">
                                              <input type="text" name="name" class="form-control"  value="{{ $showcat->name}}">
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                       </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            {{--  end editModal  --}}
                            {{--  <!-- deleteModal -->  --}}
                            <div class="modal fade" id="delete{{$showcat->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Apakah Anda yakin menghapus kategori <b>"{{ $showcat->name }}"?</b></h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">

                                          <form action="{{ route('category.destroy',$showcat->id) }}" method="POST">
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
                              {{--  end deleteModal  --}}

                        @endforeach
                    </tbody>
            </table>
    </div>
</div>
@endsection
