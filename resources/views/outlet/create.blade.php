@extends('layouts.admin')
@section('page-title', 'Buat Outlet Baru')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('outlet.store') }}" method="post">
                        @csrf
                        <div class="row align-items-center mb-md-3 m-0">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" class="form-control border" id="inputName" name="name" required>
                            </div>
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputName" class="form-label">Email</label>
                                <input type="email" class="form-control border" id="inputName" required name="email">
                            </div>
                        </div>
                        <div class="row align-items-center mb-md-3 m-0">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputEffective" class="form-label">Tanggal Berlaku</label>
                                <input type="date" class="form-control border" id="inputEffective" required
                                    name="effective_date">
                            </div>
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputExpired" class="form-label">Tanggal Berakhir</label>
                                <input type="date" class="form-control border" id="inputExpired" required
                                    name="expired_date">
                            </div>
                        </div>
                        <div class="row align-items-center mb-md-3 m-0">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputPhone" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control border" id="inputPhone" required name="phone">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success m-0">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
