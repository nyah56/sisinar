@extends('layouts.main')
@section('isi')
<div class="panel panel-indigo">
    <div class="panel-heading">
        <h2>Entry Data Jenis Seminar</h2>
    </div>
        <div class="panel-body">
            
            <form action="{{ url('/seminar/update/'.$seminar->kode_seminar) }}" class="form-horizontal row-border" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="col-md-3 control-label">Kode Seminar</label>
                    
                    <div class="col-md-6">
                        <input type="text" name="kode_seminar"class="form-control" value="{{ $seminar->kode_seminar }}" disabled>
                    </div>
                </div>
                <div class="form-group 
                @error('jenis_seminar')
                has-error
                @enderror">
                    <label class="col-md-3 control-label">Jenis Seminar</label>
                    <div class="col-md-6">
                        <input type="text" name="jenis_seminar"class="form-control" value="{{ $seminar->jenis_seminar }}">
                    </div>
                    @error('jenis_seminar')
                    <div class="col-md-3">
                        <p class="help-block"><i class="fa fa-times-circle"></i>
                            Nama Seminar tidak boleh kosong</p>
                    </div>
                    @enderror
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button name="simpan" type="submit" class="btn btn-indigo">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>

@endsection

{{-- <form action="{{ url('/seminar/store') }}" method="POST">
    @csrf
    <input type="text" name="kode_seminar"class="form-control" placeholder="kode">
    <input type="text" name="jenis_seminar"class="form-control" placeholder="jenis">
    <button name="simpan" type="submit" class="btn btn-indigo">Submit</button>
</form> --}}