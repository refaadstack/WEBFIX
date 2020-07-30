@extends('includes.head')
@section('title','Buat Sektor')
@section('content')
<div class="container" style="margin-bottom: 60px">
    <div class="col-md-8" style="margin-left: auto; margin-right: auto">
        <div><h3>Buat Sektor baru</h3></div>
       <div class="form-group">
        <form action="{{ route('sektors.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nama">Nama Sektor</label>
              <input type="text" name="name" class="form-control"  placeholder="Masukkan nama Sektor(cth: Bangko)">
            </div>
            <button class="btn btn-success btn-block" type="submit">Simpan</button>
        </form>
       </div>
       <div class="text-center"><h4> Semua Sektor</h4></div>
            <table class="table table-striped table-hover">
                    <thead>
                        <tr class="table-danger">
                            <th>NO.</th>
                            <th>Nama Sektor</th>
                            <th>Aksi</th>
                            <th>Diinput tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sektors as $sektor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sektor->name }}</td>
                                <td><a href="#edit{{$sektor->id}}" class="btn btn-primary btn-sm" data-toggle="modal">Edit</a>
                                    <a href="#delete{{$sektor->id}}" class="btn btn-danger btn-sm" data-toggle="modal">Delete</a>
                                <td>{{ date('j F Y',strtotime($sektor->updated_at))}}</td>
                            </tr>
                            {{--  <!-- editModal -->  --}}
                            <div class="modal fade" id="edit{{$sektor->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Nama Sektor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                        <form action="{{ route('sektors.update',$sektor->id) }}" method="POST" role="form">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <div class="form-group">
                                              <input type="text" name="name" class="form-control"  value="{{ $sektor->name}}">
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
                            <div class="modal fade" id="delete{{$sektor->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Apakah Anda yakin menghapus kategori <b>"{{ $sektor->name }}"?</b></h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">

                                          <form action="{{ route('sektors.destroy',$sektor->id) }}" method="POST">
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
