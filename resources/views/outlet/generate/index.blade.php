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

                    <form action="#" method="post" id="my-form">
                        @csrf
                        <input type="hidden" name="outlet_id" value="{{ old('outlet_id', $outlet_id) }}">
                        <div class="row align-items-center mb-md-3 m-0">
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputCount" class="form-label">Jumlah Kartu</label>
                                <input type="number" class="form-control border mb-3" id="inputCount" name="count"
                                    required value="{{ old('count') }}">
                                <button type="submit" class="btn btn-sm btn-success m-0">Generate</button>
                            </div>
                            <div class="col-md-6 mb-md-0 mb-3">
                                <label for="inputName" class="form-label">Contoh kartu</label><br>
                                <img src="https://neoflash.sgp1.digitaloceanspaces.com/ayo-bugar/card/002.jpeg"
                                    alt="example-card" class="img img-fluid rounded-3 mb-3" style="max-width: 400px"><br>
                                @if (session('isGenerated'))
                                    <a href="#" class="btn btn-sm btn-secondary m-0">Unduh PDF</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
