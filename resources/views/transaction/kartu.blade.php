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
</style>
@section('content')
<div class="container-fluid py-2 mt-5">
    <div class="row">
      <div class="ms-3">
        <h3 class="mb-0 h4 font-weight-bolder">Isi Data Kartu Member</h3>
      </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card py-4">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route('transaction.kartuStore')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <label for="" class="form-label">Member Name</label><br>
                                        <input type="text" name="member_name" class="form-control border w-100" >
                                        <input type="hidden" name="kartu_id" value="{{$id}}" class="form-control border w-100" >
                                    </div>
                                    <div class="col-8 mx-auto mt-3">
                                        <label for="" class="form-label">nik</label><br>
                                        <input type="text" class="form-control border w-100" name="nik">
                                    </div>
                                    <div class="col-8 mx-auto mt-3">
                                        <label for="" class="form-label">No. Whatsapp</label><br>
                                        <input type="text" class="form-control border w-100" name="wa_number">
                                    </div>
                                    
                                    <div class="col-12 d-flex justify-content-end">
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