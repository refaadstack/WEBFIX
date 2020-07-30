@extends('includes.head')
@section('title','Data Pengunjung')
@section('content')

<div class="container" style="margin-bottom: 300px">
    <div class="text-center">
        <div class="text-center"><h4> Semua Pengunjung</h4></div>
            <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr class="table-danger">
                            <th>NO.</th>
                            <th>Nama Pengunjung</th>
                            <th>Email</th>
                            <th>Jenis Akun</th>
                            <th>Tanggal Register</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-left">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles->implode('name') }}</td>
                                <td>{{ date('j F Y',strtotime($user->updated_at))}}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
            <div class="text-centr">
                {{ $users->links() }}
            </div>
    </div>
    </div>
</div>
@endsection

