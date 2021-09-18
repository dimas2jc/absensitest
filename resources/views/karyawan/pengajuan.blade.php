{{-- Extends layout --}}
@extends('layout.default')
@section('title', 'Pengajuan Izin')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/metroadmin/icons/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/metroadmin/vendor/toastr/css/toastr.min.css') }}">
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
                    <li class="breadcrumb-item"><a href="{{route('karyawan')}}">Absensi</a></li>
                    <li class="breadcrumb-item active">Pengajuan Izin</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Daftar Pengajuan Izin Pegawai
                        </h4>
                        <div class="card-action">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-pengajuan">
                                <i class="fa fa-plus-circle mr-1" aria-hidden="true"></i>
                                Pengajuan
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="pengajuan" class="table table-striped table-responsive-sm">
                                <thead class="thead-dark" align="center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Izin</th>
                                    <th scope="col">Tgl Mulai</th>
                                    <th scope="col">Tgl Selesai</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Status</th>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$d->jenis_izin}}</td>
                                        <td>{{date("d-m-Y", strtotime($d->tgl_mulai))}}</td>
                                        <td>{{date("d-m-Y", strtotime($d->tgl_selesai))}}</td>
                                        <td>{{$d->durasi}} hari</td>
                                        <td>
                                            @if($d->status == 0)
                                                Sending
                                            @elseif($d->status == 1)
                                                Approved
                                            @elseif($d->status == 2)
                                                Rejected
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

    {{-- Start Input Pengajuan Modal --}}
    <div class="modal fade show" id="tambah-pengajuan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light">Pengajuan</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-times-circle" style="color: white" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="basic-form">
                    <form action="{{url('karyawan/tambah-pengajuan')}}" method="POST">
                    @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Jenis Izin</label>
                                <select name="jenis_izin" class="form-control" required>
                                    <option selected disabled>Pilih Jenis Izin..</option>
                                    @foreach($jenis_izin as $ji)
                                        <option value="{{$ji->id_jenis_izin}}">{{$ji->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input type="date" name="tgl_mulai" class="form-control input-default" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="date" name="tgl_selesai" class="form-control input-default" required>
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
    {{-- End of Input Pengajuan Modal --}}
			
@endsection

@section('extra-script')
    <script src="{{ asset('/metroadmin/vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('/metroadmin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/metroadmin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/karyawan/js/pengajuan.js') }}"></script>
    
    @if (session('toast_msg_success'))
        <script defer>
            toastr.success('{{ session('toast_msg_success') }}')
        </script>
    @endif
@endsection