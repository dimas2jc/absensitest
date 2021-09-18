{{-- Extends layout --}}
@extends('layout.default')
@section('title', 'Profile')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('/metroadmin/icons/fontawesome/css/all.min.css') }}">
@endsection

{{-- Content --}}
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <form action="{{url('edit-profile')}}" method="POST">
                        @csrf
                            <div class="auth-form">
                                
                                <h4 class="text-center mb-4">Selamat Datang {{Auth::user()->nama}} !</h4>
                                
                                <div class="form-group">
                                    <label><strong>Nama</strong></label>
                                    <input type="text" class="form-control" value="{{Auth::user()->nama}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label><strong>Email</strong></label>
                                    <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                                </div>
                                <div class="form-group">
                                    <label><strong>Alamat</strong></label>
                                    <textarea class="form-control" name="alamat" row="2">{{Auth::user()->alamat}}</textarea>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa fa-save mr-1" aria-hidden="true"></i>
                                    SIMPAN
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection