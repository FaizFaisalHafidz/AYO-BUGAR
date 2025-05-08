@extends('main')
<style>
     .alert-sukses{
        background-color: #BBF246 !important;
    }
</style>
@section('content')
<div class="container-fluid py-2 mt-5">
    @if (session('success'))
    <div class="row mb-3">
        <div class="col-12">
            <div class="alert alert-sukses w-100">Checkin member berhasil!</div>
        </div>
    </div>
    @endif
    <div class="row">
      <div class="ms-3">
        <h3 class="mb-0 h4 font-weight-bolder">Clockin</h3>
      </div>
    </div>
    <div class="card p-4">
        <div class="row">
            <div class="col-12 text-center">
                <h3>Checkin GYM</h3>
            </div>
            <div class="col-12 mb-3">
                <label for="" class="form-label">Member Code</label><br>
                <input type="text" class="form-control border w-100" name="kode">
            </div>
            <div class="col-12 d-flex justify-content-center">
                <a href="{{route('checkin.store')}}" class="btn btn-primary">Checkin</a>
            </div>
        </div>
    </div>
</div>
@endsection