{{-- Extends layout --}}
@extends('layout.default')
@section('title', 'Detail Absensi')
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
                    <li class="breadcrumb-item"><a href="{{url('karyawan/riwayat-absensi')}}">Riwayat Absensi</a></li>
                    <li class="breadcrumb-item active">Detail Absensi</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Detail Absensi
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="absensi" class="table table-striped table-responsive-sm">
                                <thead class="thead-dark" align="center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Jam Masuk</th>
                                    <th scope="col">Jam Keluar</th>
                                    <th scope="col">Lokasi Masuk</th>
                                    <th scope="col">Lokasi Keluar</th>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if($d->jam_masuk != null)
                                                {{date("H:i:s", strtotime($d->jam_masuk))}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($d->jam_keluar != null)
                                                {{date("H:i:s", strtotime($d->jam_keluar))}}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($d->jam_masuk != null)
                                                <a href="{{$d->lokasi}}">{{$d->lokasi}}</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($d->jam_keluar != null)
                                                <a href="{{$d->lokasi}}">{{$d->lokasi}}</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row" style="margin-left: 10px">
                            <a href="{{url('karyawan/riwayat-absensi')}}">
                                <button type="button" class="btn btn-sm btn-secondary">KEMBALI</button>
                            </a>
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
@endsection