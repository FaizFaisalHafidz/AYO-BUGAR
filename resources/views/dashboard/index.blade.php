@extends('layouts.admin')
@section('page-title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="fw-light">Selamat datang, <span class="fw-bold">{{ auth()->user()->name }}</span></h4>
                </div>
            </div>
        </div>
    </div>
@endsection
