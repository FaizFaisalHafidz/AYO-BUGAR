@extends('main')
<style>
    
    .nav.nav-pills{
        border: 1px solid #192126;
    }
    .nav.nav-pills .nav-link:hover{
        cursor: pointer;
        background-color: #bcf2466e !important;
    }
    .nav.nav-pills .nav-link.active{
        background-color: #BBF246 !important;
    }
    .form-control{
        padding-left: 5px !important;
    }
    .form-select{
        padding-left: 5px !important;
    }
    .btn-blue{
        background-color: #047bff !important;
        color: #fff;
    }
    .alert-sukses{
        background-color: #BBF246 !important;
    }
</style>
@section('content')
<div class="container-fluid py-2 mt-5">
    <div class="row">
      <div class="ms-3">
        <h3 class="mb-0 h4 font-weight-bolder">Transaksi</h3>
      </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card py-4">
                <div class="container-fluid">
                    @if (session('success'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-sukses w-100">Data Berhasil Ditambahkan!</div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('transaction.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <label for="" class="form-label">Outlet</label><br>
                                        <input type="text" readonly class="form-control border w-100" value="{{$outlet->name}}">
                                        <input type="hidden" name="outlet_id" value="{{$outlet->id}}">
                                        <input type="hidden" name="is_kartu" value="0" id="is-kartu">
                                    </div>
                                    <div class="col-8 mx-auto mt-3">
                                        <label for="" class="form-label">Tanggal</label><br>
                                        <input type="text" class="form-control border w-100" name="tanggal" readonly value="{{now()->format('Y-m-d')}}">
                                    </div>
                                    <div class="col-8 mx-auto mt-3">
                                        <label for="" class="form-label">Kartu Kode</label><br>
                                        <input type="text" class="form-control border w-100" name="kartu_kode">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="row">
                                            <div class="col-4 offset-2">
                                                <label for="" class="form-label">Item</label>
                                            </div>
                                            <div class="col-4">
                                                <label for="" class="form-label">Total</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-wrapper">

                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="#" id="btn-plus" class="btn btn-primary text-bold text-dark">Tambah Transaksi</a>
                                        <button id="btn-simpan" class="btn btn-blue text-bold text-white" style="margin-left: 3px">Simpan</button>
                                    </div>  
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        let rowCount = 1;

        const priceMap = {
            member_card: 50000,
            1: 100000,
            3: 250000,
            6: 450000,
            12: 800000
        };

        $('#btn-plus').on('click', function (e) {

            const newRow = `
                <div class="row mb-2 align-items-center" id="row-${rowCount}">
                    <div class="col-4 offset-2">
                        <select name="item[]" class="form-select select-item" id="select-item-${rowCount}" data-index="${rowCount}">
                            <option value="">Pilih Item</option>
                            <option value="member_card">Kartu Member</option>
                            <option value="1">Paket 1 Bulan</option>
                            <option value="3">Paket 3 Bulan</option>
                            <option value="6">Paket 6 Bulan</option>
                            <option value="12">Paket 12 Bulan</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <input type="text" readonly value="0" name="total[]" class="form-control border" id="total-${rowCount}">
                    </div>
                    <div class="col-2">
                        <a href="#" class="btn btn-danger text-bold btn-remove" data-target="row-${rowCount}" style="margin-right: 55px">Hapus</a>
                    </div>
                </div>
            `;

            $('.input-wrapper').append(newRow);
            rowCount++;
        });

        // Handle remove button
        $(document).on('click', '.btn-remove', function (e) {
            e.preventDefault();
            const rowId = $(this).data('target');
            $('#' + rowId).remove();
        });
        
        // Handle select change and update total
        $(document).on('change', '.select-item', function () {
            const selected = $(this).val();
            const index = $(this).data('index');
            const price = priceMap[selected] || 0;
            $(`#total-${index}`).val(price);

            // Check if any select-item has value member_card
            let hasMemberCard = false;
            $('.select-item').each(function () {
                if ($(this).val() === 'member_card') {
                    hasMemberCard = true;
                }
            });

            // Update #is-kartu based on presence of member_card
            $('#is-kartu').val(hasMemberCard ? 1 : 0);
        });
        
    });
    
</script>

