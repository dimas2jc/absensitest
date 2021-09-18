{{-- Extends layout --}}
@extends('layout.default')
@section('title', 'Laporan')
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
                    <h4>Hi , welcome back!</h4>
                    <!-- <p class="mb-0">Your business dashboard template</p> -->
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('manajer')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Laporan
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="laporan" class="table table-striped table-responsive-sm">
                                <thead class="thead-dark" align="center">
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Detail</th>
                                </thead>
                                <tbody>
                                    
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td align="center">
                                            <a href="{{url('/laporan')}}"><button type="button" class="btn btn-sm btn-primary">
                                                DETAIL
                                            </button></a>
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
			
@endsection

@section('extra-script')
    <script src="{{ asset('/metroadmin/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('/metroadmin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/hrd/js/laporan.js') }}"></script>
@endsection