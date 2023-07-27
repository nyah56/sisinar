@extends('layouts.main')
@section('isi')
<div class="panel panel-indigo">
    <div class="panel-heading">
        <h2>Entry Data Jurnal</h2>
    </div>
        <div class="panel-body">
            
            <form action="{{ url('/jurnal/store') }}" id="form1" class="form-horizontal row-border" method="POST">
                @csrf
                <div class="form-group 
                @error('submission')
                    has-error
                @enderror">
                    <label class="col-md-3 control-label">Submission</label>
                    <div class="col-md-6">
                        <input type="text" name="submission"class="form-control"required autofocus value="{{ old('submission') }}">
                    </div>
                @error('kode_seminar')
                <div class="col-md-3">
                    <p class="help-block"><i class="fa fa-times-circle"></i>
                        Submission tidak boleh sama dengan kode yang sudah ada</p>
                </div>
                @enderror
                </div>
                <div class="form-group 
                @error('judul')
                has-error
                @enderror">
                    <label class="col-md-3 control-label">Judul</label>
                    <div class="col-md-6">
                        <input type="text" name="judul"class="form-control" value="{{ old('judul') }}">
                    </div>
                    @error('judul')
                    <div class="col-md-3">
                        <p class="help-block"><i class="fa fa-times-circle"></i>
                            Judul tidak boleh kosong</p>
                    </div>
                    @enderror
                </div>
                <div class="form-group 
                @error('nama')
                has-error
                @enderror">
                    <label class="col-md-3 control-label">Nama</label>
                    <div class="col-md-6">
                        <input type="text" name="nama"class="form-control" value="{{ old('nama') }}">
                    </div>
                    @error('nama')
                    <div class="col-md-3">
                        <p class="help-block"><i class="fa fa-times-circle"></i>
                            Nama tidak boleh kosong</p>
                    </div>
                    @enderror
                </div>
                <div class="form-group 
                @error('email')
                has-error
                @enderror">
                    <label class="col-md-3 control-label">Email</label>
                    <div class="col-md-6">
                        <input type="email" name="email"class="form-control" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <div class="col-md-3">
                        <p class="help-block"><i class="fa fa-times-circle"></i>
                            Masukkan Email yang sesuai</p>
                    </div>
                    @enderror
                </div>
                <div class="form-group 
                @error('aviliasi')
                has-error
                @enderror">
                    <label class="col-md-3 control-label">Aviliasi</label>
                    <div class="col-md-6">
                        <input type="text" name="aviliasi"class="form-control" value="{{ old('aviliasi') }}"placeholder="ITN Malang...">
                    </div>
                    @error('aviliasi')
                    <div class="col-md-3">
                        <p class="help-block"><i class="fa fa-times-circle"></i>
                            Aviliasi tidak boleh kosong</p>
                    </div>
                    @enderror
                </div>
              
                <div class="form-group 
                @error('wa')
                has-error
                @enderror">
                    <label class="col-md-3 control-label">No Whatsapp</label>
                    <div class="col-md-6">
                        <input type="text" name="wa"class="form-control" value="62{{ old('wa') }}">
                    </div>
                    <div class="col-sm-3"><p class="help-block">6281234567890</p></div>
                    @error('wa')
                    <div class="col-md-3">
                        <p class="help-block"><i class="fa fa-times-circle"></i>
                            Nomor Whatsapp tidak boleh kosong atau harus berupa angka</p>
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Jenis Seminar</label>
                    <div class="col-md-6">
                        <select  class="form-control" name="kode_seminar" id="seminar" >
                                <option value="0">Pilih Jenis Seminar</option>
                                @forelse ($seminar as $s)
                                <option value="{{$s->kode_seminar}}">{{ $s->jenis_seminar }}</option>
                                @empty         
                                <option value="">Kosong</option>
                                @endforelse
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Status</label>
                    <div class="col-md-6">
                        <select  class="form-control" name="status" id="status" >
                                <option value="0">Pilih Status</option>
                                <option value="1">Submission</option>
                                <option value="2">Review</option>
                                <option value="3">Menunggu Revisi</option>
                                <option value="4">Accepted</option>
                                <option value="5">CopyEditing</option>
                                <option value="6">Production</option>
                                <option value="7">Publish</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Pembayaran</label>
					<div class="col-md-6">
						<label class="radio-inline icheck">
							<div class="iradio_minimal-blue" style="position: relative;"><input type="radio" name ="pembayaran" id="inlineradio1" value="0" name="optionsRadiosInline" style="position: absolute; opacity: 0;" checked="checked"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Belum Lunas
						</label>
						<label class="radio-inline icheck">
							<div class="iradio_minimal-blue" style="position: relative;"><input type="radio" name ="pembayaran" id="inlineradio2" value="1" name="optionsRadiosInline" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Lunas
						</label>
					
					</div>
				</div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Kehadiran</label>
                    <div class="col-md-6">
                        <select  class="form-control" name="kehadiran" id="kehadiran" >
                                <option value="0">Pilih Kehadiran</option>
                                <option value="1">Offline</option>
                                <option value="2">Online</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Catatan</label>
					<div class="col-md-6">
						<textarea class="form-control autosize" name="catatan" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 237px;"></textarea>
					</div>
					<div class="col-sm-2"><p class="help-block">Tulis Catatan</p></div>
				</div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <button name="simpan" type="submit" id="btn-submit"class="btn btn-indigo">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
@push('notif')
  <script>
    let seminar = document.getElementById('seminar');
    let status =document.getElementById('status');
    let kehadiran =document.getElementById('kehadiran');
    $("#btn-submit").click(function(e) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    e.preventDefault();
    // console.log(seminar.value);
    if(seminar.value==0 || status.value==0|| kehadiran.value==0){
    swal({
        title: "Harap Pilih Jenis Seminar, Status dan Kehadiran",
        icon: 'warning'
    });
    }
    else{
     form.submit();
    }
    
  });
  </script>  
@endpush

@endsection
