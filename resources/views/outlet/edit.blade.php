@extends('layouts.admin')
@section('page-title', 'Buat Outlet Baru')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{ route('outlet.update', ['outlet' => $outlet->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row align-items-center mb-md-3 m-0">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" class="form-control border" id="inputName" name="name" required
                                    value="{{ old('name', $outlet->name) }}">
                            </div>
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputName" class="form-label">Email</label>
                                <input type="email" class="form-control border" id="inputName" required name="email"
                                    value="{{ old('email', $outlet->email) }}">
                            </div>
                        </div>
                        <div class="row align-items-center mb-md-3 m-0">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputEffective" class="form-label">Tanggal Berlaku</label>
                                <input type="date" class="form-control border" id="inputEffective" required
                                    name="effective_date"
                                    value="{{ old('effective_date', date('Y-m-d', strtotime($outlet->effective_date))) }}">
                            </div>
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputExpired" class="form-label">Tanggal Berakhir</label>
                                <input type="date" class="form-control border" id="inputExpired" required
                                    name="expired_date"
                                    value="{{ old('expired_date', date('Y-m-d', strtotime($outlet->expired_date))) }}">
                            </div>
                        </div>
                        <div class="row align-items-center mb-md-3 m-0">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputPhone" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control border" id="inputPhone" required name="wa_number"
                                    value="{{ old('wa_number', $outlet->wa_number) }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success m-0">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
