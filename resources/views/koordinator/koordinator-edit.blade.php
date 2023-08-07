@extends('layouts.main')
@section('isi')
<div class="panel panel-indigo">
    <div class="panel-heading">
        <h2>Edit Koordinator</h2>
    </div>
        <div class="panel-body">
            
            <form action="{{ url('/koordinator/update/'.$jurnal->submission) }}" id="form1" class="form-horizontal row-border" method="POST">
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
                        <input type="text" name="wa"class="form-control" value="62{{ $jurnal->no_wa }}" disabled>
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
                                <option value="{{$s->kode_seminar}}"@selected($s->kode_seminar==$jurnal->kode_seminar)>{{ $s->jenis_seminar }}</option>
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
                <div class="form-group">
					<label class="col-md-3 control-label">Pembayaran</label>
					<div class="col-md-6">					
                        <label class="checkbox-inline icheck">
							<div class="icheckbox_minimal-blue checked" style="position: relative;"><input type="checkbox" name="pembayaran"id="pembayaran" value="2" style="position: absolute; opacity: 0;"@checked($jurnal->pembayaran==2) @disabled(true)><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Lunas
						</label>
					</div>
				</div>
                <div class="form-group">
                           
                    <label class="col-md-3 control-label">Reviewer 1</label>
                    <div class="col-md-6">
                        <select  class="form-control" name="reviewer1" id="kehadiran" >
                            @if($detail1->isEmpty())
                                <option value="0">Pilih Reviewer</option>
                                @foreach ($reviewer as $r)
                                <option value="{{ $r->id_reviewer }}">{{ $r->nama }}</option>
                                @endforeach
                            @else
                                <option value="0">Pilih Reviewer</option>
                                @foreach ($reviewer as $r)
                                <option value="{{ $r->id_reviewer }}"  @selected($r->id_reviewer == $detail1[0]->id_reviewer)>{{ $r->nama }}</option>
                                @endforeach
                            @endif
                            
                        </select>
                        
                    </div>
                    <br>
                   
                </div>
                <div class="form-group">
                       
                        <label class="col-md-3 control-label">Reviewer 2</label>
                        <div class="col-md-6">
                            <select  class="form-control" name="reviewer2" id="kehadiran" >
                                @if($detail2->isEmpty())
                                    <option value="0">Pilih Reviewer</option>
                                    @foreach ($reviewer as $r)
                                    <option value="{{ $r->id_reviewer }}">{{ $r->nama }}</option>
                                    @endforeach
                                @else
                                    <option value="0">Pilih Reviewer</option>
                                    @foreach ($reviewer as $r)
                                    <option value="{{ $r->id_reviewer }}" @selected($r->id_reviewer == $detail2[0]->id_reviewer) >{{ $r->nama }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                
                
              </div>
                <div class="form-group">
					<label class="col-md-3 control-label">Catatan</label>
					<div class="col-md-6">
						<textarea class="form-control autosize" name="catatan" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 237px; overflow-y: auto;"  >{{ $jurnal->catatan }}</textarea>
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
@push('add')
    <script>
        const btnAdd= document.getElementById('btn-add');
        const newInput= document.getElementById('add');
        const iconElement = btnAdd.querySelector('.ti');
        let state=true;
        const fetchReviewer=async()=>{
            try {
            const response = await fetch(`/reviewer/fetch`);
                const data = await response.json();
                return data;
                // console.log(data);
            } 
            catch (error) {
                return {}; // Return an empty object if there's an error
        }
        }
        btnAdd.addEventListener("click", async function(){
        state =!state;
        let optionsData=await fetchReviewer();
        // console.log(state);
         if (!state){
            iconElement.classList.remove('ti-plus');
            iconElement.classList.add('ti-minus')
            // options.array.forEach(option => {
            //     const optionElement = document.createElement('option');
            //     optionElement.value=option.id_reviewer;
            //     optionElement.textContent=option.nama_reviewer;
                
            // });
                const selectElement = document.createElement('select');
                selectElement.classList.add('form-control');
                selectElement.name = 'reviewer[1]';
                

                const defaultOption = document.createElement('option');
                defaultOption.value = '0';
                defaultOption.textContent = 'Pilih Reviewer';
                selectElement.appendChild(defaultOption);

                optionsData.forEach(option => {
                const optionElement = document.createElement('option');
                optionElement.value = option.id_reviewer;
                optionElement.textContent = option.nama;
                selectElement.appendChild(optionElement);
                });

                // Add the select element with options to the newInput div
                newInput.innerHTML = `<div class="form-group">
                        <label class="col-md-3 control-label">Reviewer 2</label>
                        <div class="col-md-6">
                            ${selectElement.outerHTML}
                        </div>
                    </div>`;
         }
         else{
            iconElement.classList.remove('ti-minus');
            iconElement.classList.add('ti-plus')
            newInput.innerHTML='';
         }
        })
    </script>
@endpush
@push('notif')
  <script> 
    let kehadiran =document.getElementById('kehadiran');
    $("#btn-submit").click(function(e) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    e.preventDefault();
    // console.log(seminar.value);
    if(kehadiran.value==0){
    swal({
        title: "Harap Mengisi Kehadiran",
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