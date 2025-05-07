@extends('layouts.admin')
@section('page-title', 'Pengelolaan Outlet')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-dark shadow-dark border-radius-lg py-4 px-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize m-0">Outlet</h6>
                        <a href="{{ route('outlet.craete') }}" class="btn btn-sm btn-success m-0">Tambah Outlet Baru</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Telepon
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Berlaku
                                    </th>
                                    <th class="text-secondary opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($outlets as $outlet)
                                    <tr>
                                        <td>
                                            <h6 class="mb-0 text-sm">{{ $outlet->code }}</h6>
                                        </td>
                                        <td>
                                            <p class="text-secondary m-0">{{ $outlet->name }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-secondary m-0">{{ $outlet->email }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <p class="text-secondary m-0">
                                                {{ $outlet->effective_date . '-' . $outlet->expired_date }}</p>
                                        </td>
                                        <td>
                                            <p class="text-secondary m-0">{{ $outlet->wa_number }}</p>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-info m-0">Ubah</button>
                                            <button class="btn btn-sm btn-danger m-0">Hapus</button>
                                            <a href="{{ route('outlet.generate', ['outlet_id' => $outlet->id]) }}"
                                                class="btn btn-sm btn-secondary m-0">Generate</a>
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
@endsection
