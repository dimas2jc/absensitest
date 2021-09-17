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
                    <h4>Hi , welcome back!</h4>
                    <!-- <p class="mb-0">Your business dashboard template</p> -->
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('manajer')}}">Dashboard</a></li>
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="pengajuan" class="table table-striped table-responsive-sm">
                                <thead class="thead-dark" align="center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Izin</th>
                                    <th scope="col">Tgl Mulai</th>
                                    <th scope="col">Tgl Selesai</th>
                                    <th scope="col">Durasi</th>
                                    <th scope="col">Aksi</th>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td colspan="2" align="center">
                                            <button type="button" class="btn btn-sm btn-danger btn-reject" data-toggle="modal" data-target="#reject">
                                                REJECT
                                            </button>
                                            <button type="button" class="btn btn-sm btn-primary btn-approve" data-toggle="modal" data-target="#approve">
                                                APPROVE
                                            </button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    {{-- Start Reject Modal --}}
    <div class="modal fade show" id="reject" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-light">Tolak Pengajuan Izin</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-times-circle" style="color: white" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="basic-form">
                    <form action="{{url('manajer/pengajuan-reject')}}" method="POST">
                    @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                Apakah anda yakin tidak menyetujui pengajuan izin dari ... ?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Reject Modal --}}

    {{-- Start Approve Modal --}}
    <div class="modal fade show" id="approve" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light">Terima Pengajuan Izin</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="fa fa-times-circle" style="color: white" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="basic-form">
                    <form action="{{url('manajer/pengajuan-approve')}}" method="POST">
                    @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                Apakah anda yakin menyetujui pengajuan izin dari ... ?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Approve Modal --}}
			
@endsection

@section('extra-script')
    <script src="{{ asset('/metroadmin/vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('/metroadmin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/metroadmin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/manajer/js/pengajuan.js') }}"></script>
    
    @if (session('toast_msg_success'))
        <script defer>
            toastr.success('{{ session('toast_msg_success') }}')
        </script>
    @endif
@endsection