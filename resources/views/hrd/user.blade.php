{{-- Extends layout --}}
@extends('layout.default')
@section('title', 'User')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/metroadmin/icons/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/metroadmin/vendor/datatables/css/jquery.dataTables.min.css') }}">
    <link href="{{ asset('/metroadmin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

{{-- Content --}}
@section('content')

    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi {{Auth::user()->nama}}, welcome back!</h4>
                    <!-- <p class="mb-0">Your business dashboard template</p> -->
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('hrd')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Daftar User
                        </h4>
                        <div class="card-action">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-user">
                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="user" class="table table-striped table-responsive-sm">
                                <thead class="thead-dark" align="center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Status</th>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->nama}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>
                                            @if($d->alamat != null)
                                                {{$d->alamat}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if($d->status == 1)
                                                <button type="button" class="btn btn-sm btn-success status" id="status-{{$d->id_user}}">
                                                    ACTIVE
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-sm btn-danger status" id="status-{{$d->id_user}}">
                                                    NON-ACTIVE
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Start Input User Modal --}}
    <div class="modal fade show" id="tambah-user" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-times-circle" style="color: white" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="basic-form">
                    <form action="{{url('hrd/tambah-user')}}" method="POST">
                    @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control input-default" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control input-default" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="pass1" class="form-control input-default" placeholder="Re-Password" required>
                            </div>
                            <div class="form-group">
                                <label>Re-Password</label>
                                <input type="password" id="pass2" class="form-control input-default" placeholder="Re-Password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Input User Modal --}}
			
@endsection

@section('extra-script')
    <script src="{{ asset('/metroadmin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/metroadmin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script>
        const urlStatus = "{{url('hrd/update-status-user')}}"
    </script>
    <script src="{{ asset('/assets/hrd/js/user.js') }}"></script>
@endsection