@extends('layouts.main')
@section('isi')
<div class="panel panel-indigo">
    <div class="panel-heading">
        <h2>Edit Data Reviewer</h2>
    </div>
        <div class="panel-body">
            
            <form action="{{ url('/reviewer/update/'.$reviewer->id_reviewer) }}" class="form-horizontal row-border" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="col-md-3 control-label">ID Reviewer</label>
                    
                    <div class="col-md-6">
                        <input type="text" name="id_reviewer"class="form-control" value="{{ $reviewer->id_reviewer }}" disabled>
                    </div>
                </div>
                <div class="form-group 
                @error('nama')
                has-error
                @enderror">
                    <label class="col-md-3 control-label">Nama Reviewer</label>
                    <div class="col-md-6">
                        <input type="text" name="nama"class="form-control" value="{{ $reviewer->nama }}">
                    </div>
                    @error('nama')
                    <div class="col-md-3">
                        <p class="help-block"><i class="fa fa-times-circle"></i>
                            Nama Reviewer tidak boleh kosong</p>
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