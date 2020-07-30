@extends('includes.head')
@section('title','Anggota UMKM Merangin')
@section('content')
<div class="container" style="margin-bottom: 60px">
    <div class="col-md-8" style="margin-left: auto; margin-right: auto">
        <div class="text-center">
            <h3>Tambah Anggota baru</h3>
        </div>
       <div class="form-group">
        <form action="{{ route('member.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="nama">Nama Anggota</label>
              <input type="text" name="name" class="form-control"  placeholder="Masukkan Nama anggota">
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" name="address" class="form-control"  placeholder="Masukkan Alamat">
            </div>
            <div class="form-group">
                <label for="contact">No. HP</label>
                <input type="text" name="contact" class="form-control"  placeholder="Masukkan Nomor Handphone Anggota">
            </div>
            <button class="btn btn-success btn-block" type="submit">Simpan</button>
        </form>
       </div>
    </div>
    <br>
    <br>
      <div class="container">
          <div class="col-md-12">
            <div class="text-center"><h4> Semua Anggota UMKM Merangin</h4></div>
            <table class="table table-striped table-hover">
                    <thead>
                        <tr class="table-danger">
                            <th>NO.</th>
                            <th>Nama member</th>
                            <th>Alamat</th>
                            <th>No. Hp</th>
                            <th>Aksi</th>
                            <th>Diinput tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->address }}</td>
                                <td>{{ $member->contact }}</td>
                                <td><a href="#edit{{$member->id}}" class="btn btn-primary btn-sm" data-toggle="modal">Edit</a>
                                    <a href="#delete{{$member->id}}" class="btn btn-danger btn-sm" data-toggle="modal">Delete</a>
                                <td>{{ date('j F Y',strtotime($member->updated_at))}}</td>
                            </tr>
                            {{--  <!-- editModal -->  --}}
                            <div class="modal fade" id="edit{{$member->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Nama member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group">
                                        <form action="{{ route('member.update',$member->id) }}" method="POST" role="form">
                                            {{ csrf_field() }}
                                            {{ method_field('put') }}
                                            <div class="form-group">
                                                <label for="nama">Nama Anggota</label>
                                                <input type="text" name="name" class="form-control"  value="{{ $member->name }}">
                                              </div>
                                              <div class="form-group">
                                                  <label for="address">Alamat</label>
                                                  <input type="text" name="address" class="form-control"  value="{{ $member->address }}">
                                              </div>
                                              <div class="form-group">
                                                  <label for="contact">No. HP</label>
                                                  <input type="text" name="contact" class="form-control"  value="{{ $member->contact }}">
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
                            <div class="modal fade" id="delete{{$member->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Apakah Anda yakin menghapus data <b>"{{ $member->name }}"?</b></h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-group">

                                          <form action="{{ route('member.destroy',$member->id) }}" method="POST">
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
            <div class="container">
                <div class="text-center">
                    {{ $members->links() }}
                </div>
            </div>
          </div>

    </div>
</div>
@endsection
