{{-- Extends layout --}}
@extends('layout.default')
@section('title', 'Riwayat Absensi')
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
                    <li class="breadcrumb-item"><a href="{{route('karyawan')}}">Absensi</a></li>
                    <li class="breadcrumb-item active">Riwayat Absensi</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Riwayat Absensi
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="absensi" class="table table-striped table-responsive-sm">
                                <thead class="thead-dark" align="center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{date("d-m-Y", strtotime($d->tanggal))}}</td>
                                        <td>
                                            @if($d->status == 0)
                                                Invalid
                                            @else
                                                Valid
                                            @endif
                                        </td>
                                        <td align="center">
                                            <a href="{{url('karyawan/detail-absensi/'.$d->id_absensi)}}"><button type="button" class="btn btn-sm btn-primary">DETAIL</button></a>
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

@endsection

@section('extra-script')
    <script src="{{ asset('/metroadmin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/metroadmin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/karyawan/js/riwayat_absensi.js') }}"></script>
@endsection