@extends('layouts.main')
@section('isi')
<div class="panel panel-indigo">
    <div class="panel-heading">
        <h2>Edit Kesekretariatan</h2>
    </div>
        <div class="panel-body">
            
            <form action="{{ url('/kesekretariatan/update/'.$jurnal->submission) }}" id="form1" class="form-horizontal row-border" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group 
                @error('submission')
                    has-error
                @enderror">
                    <label class="col-md-3 control-label">Submission</label>
                    <div class="col-md-6">
                        <input type="text" name="submission"class="form-control"required autofocus value="{{ $jurnal->submission }}" disabled>
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
                        <input type="text" name="judul"class="form-control" value="{{ $jurnal->judul }}" disabled>
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
                        <input type="text" name="nama"class="form-control" value="{{ $jurnal->nama }}" disabled>
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
                        <input type="email" name="email"class="form-control" value="{{ $jurnal-> email }}" disabled>
                    </div>
                    @error('email')
                    <div class="col-md-3">
                        <p class="help-block"><i class="fa fa-times-circle"></i>
                            Masukkan Email yang sesuai</p>
                    </div>
                    @enderror
                </div>
                <div class="form-group 
                @error('prodi')
                has-error
                @enderror">
                    <label class="col-md-3 control-label">Prodi</label>
                    <div class="col-md-6">
                        <input type="text" name="prodi"class="form-control" value="{{ $jurnal->prodi }}"placeholder="Teknik Informatika" disabled>
                    </div>
                    @error('prodi')
                    <div class="col-md-3">
                        <p class="help-block"><i class="fa fa-times-circle"></i>
                            Prodi tidak boleh kosong</p>
                    </div>
                    @enderror
                </div>
                <div class="form-group 
                @error('pt')
                has-error
                @enderror">
                    <label class="col-md-3 control-label">Perguruan Tinggi</label>
                    <div class="col-md-6">
                        <input type="text" name="pt"class="form-control" value="{{ $jurnal->pt }}"placeholder="ITN Malang..." disabled>
                    </div>
                    @error('pt')
                    <div class="col-md-3">
                        <p class="help-block"><i class="fa fa-times-circle"></i>
                            Perguruan Tinggi tidak boleh kosong</p>
                    </div>
                    @enderror
                </div>
              
                <div class="form-group 
                @error('wa')
                has-error
                @enderror">
                    <label class="col-md-3 control-label">No Whatsapp</label>
                    <div class="col-md-6">
                        <input type="text" name="wa"class="form-control" value="{{ $jurnal->no_wa }}" disabled>
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
                        <select  class="form-control" name="kode_seminar" id="seminar" disabled>
                                <option value="0">Pilih Jenis Seminar</option>
                                @forelse ($seminar as $s)
                                <option value="{{$s->kode_seminar}}"@selected($s->kode_seminar == $jurnal->kode_seminar)>{{ $s->jenis_seminar }}</option>
                                @empty         
                                <option value="">Kosong</option>
                                @endforelse
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Status</label>
                    <div class="col-md-6">
                        <select  class="form-control" name="status" id="status" disabled>
                                <option value="0">Pilih Status</option>
                                <option value="1"@selected($jurnal->status == 1)>Submission</option>
                                <option value="2"@selected($jurnal->status == 2)>Review</option>
                                <option value="3"@selected($jurnal->status == 3)>Menunggu Revisi</option>
                                <option value="4"@selected($jurnal->status == 4)>Accepted</option>
                                <option value="5"@selected($jurnal->status == 5)>CopyEditing</option>
                                <option value="6"@selected($jurnal->status == 6)>Production</option>
                                <option value="7"@selected($jurnal->status == 7)>Publish</option>
                        </select>
                    </div>
                </div>
                <input name = "pembayaran"type="hidden" value="{{$jurnal->pembayaran}}">
                
                <div class="form-group">
					<label class="col-md-3 control-label">Pembayaran</label>
					<div class="col-sm-8">

						<label class="radio icheck">
							<div class="iradio_minimal-blue checked" style="position: relative;"><input type="radio" name="pembayaran" id="optionsRadios1" value="1"  style="position: absolute; opacity: 0;"@checked($jurnal->pembayaran==1)><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
							 Belum Lunas
						</label>

						<label class="radio icheck">
							<div class="iradio_minimal-blue" style="position: relative;"><input type="radio" name="pembayaran" id="lunas" value="2" style="position: absolute; opacity: 0;"@checked($jurnal->pembayaran==2)><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
							Lunas
						</label>

					</div>
				</div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Kehadiran</label>
                    <div class="col-md-6">
                        <select  class="form-control" name="kehadiran" id="kehadiran">
                                <option value="0">Pilih Kehadiran</option>
                                <option value="1"@selected($jurnal->kehadiran==1)>Offline</option>
                                <option value="2"@selected($jurnal->kehadiran==2)>Online</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" data-kehadiran="{{ $jurnal->kehadiran }}">
                <div class="form-group">
					<label class="col-md-3 control-label">Catatan</label>
					<div class="col-md-6">
						<textarea class="form-control autosize" name="catatan"  style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 237px; overflow-y: auto;">{{ $jurnal->catatan }}</textarea>
					</div>
					<div class="col-sm-2"><p class="help-block">Tulis Catatan</p></div>
				</div>
                <div class="panel-footer">
                    <div class="row">
                        @if (auth()->user()->role == "Admin" || $jurnal->pembayaran==1)
                        <div class="col-sm-8 col-sm-offset-2">
                            <button name="simpan" type="submit" id="btn-submit"class="btn btn-indigo">Submit</button>
                        </div>
                        @endif
                    </div>
                </div>
            </form>
    </div>
</div>
@push('notif')
  <script>
    // Wait for the document to be ready

    

    let kehadiran =document.getElementById('kehadiran');
  
    const pembayaran = document.querySelector("#lunas");
    // console.log(pembayaran.checked);

    $("#btn-submit").click(function(e) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    e.preventDefault();
    
    if(kehadiran.value==0){
        swal({
            title: "Harap Mengisi Kehadiran",
            icon: 'warning'
        });
    }
    
    else if(pembayaran.checked){
        
        swal({
        title: 'Apakah anda yakin melunaskan Pembayaran ?',
        text: 'Pembayaran yang sudah Lunas datanya tidak dapat diubah maupun dihapus',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willValid) => {
        if (willValid) {
            $("#btn-submit").attr("disabled",true);
            form.submit();
        } else {
            swal('Proses Submit dibatalkan');
        }
        });
     }
     else if(!pembayaran.checked){
     $("#btn-submit").attr("disabled",true);
     form.submit();
  } 
  });
 
  </script>  
@endpush

@endsection