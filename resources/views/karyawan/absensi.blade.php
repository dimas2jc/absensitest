{{-- Extends layout --}}
@extends('layout.default')
@section('title', 'Absensi')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/metroadmin/icons/fontawesome/css/all.min.css') }}">
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
            <!-- <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Timetable</a></li>
                </ol>
            </div> -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Absensi
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div style="margin-bottom: 20px">
                                    <!-- Jakarta -->
                                    <iframe src="https://maps.google.com/maps?q=-6.1787019, 106.8295072&z=15&output=embed" id="maps-holder" width="100%" height="300" frameborder="0" style="border:0"></iframe>
                                </div>
                                <button type="button" class="btn btn-sm btn-secondary geolocation" style="margin-top: 10px">GEOLOCATION</button>
                            </div>
                            <div class="col-sm-6">
                                <form action="{{url('karyawan/insert-absensi')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Tanggal">Tanggal</label>
                                        @php
                                            $date = date("Y-m-d");
                                        @endphp
                                        <input type="text" name="tanggal" class="form-control" value="{{$date}}" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="hidden" name="latitude" id="latitude" class="form-control" placeholder="Latitude" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="longitude">Longitude</label>
                                        <input type="hidden" name="longitude" id="longitude" class="form-control" placeholder="Longitude" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="accuracy">Accuracy</label>
                                        <input type="hidden" name="accuracy" id="accuracy" class="form-control" placeholder="Accuracy" required>
                                    </div>
                                    <div style="text-align: right">
                                        <button type="submit" class="btn btn-sm btn-primary">SIMPAN</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
			
@endsection

@section('extra-script')
    <script src="{{ asset('/assets/karyawan/js/absensi.js') }}"></script>
@endsection