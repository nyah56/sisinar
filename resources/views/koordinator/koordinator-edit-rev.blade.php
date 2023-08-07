@extends('layouts.main')
@section('isi')
<div class="panel panel-indigo">
    <div class="panel-heading">
        <h2>Edit Kesekretariatan</h2>
    </div>
        <div class="panel-body">

            <form action="{{ url('/koordinator/update/sementara/'.$jurnal->submission) }}" id="form1" class="form-horizontal row-border" method="POST">
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
                                <option value="{{$s->kode_seminar}}" @selected(old('kode_seminar' == $jurnal->kode_seminar)) {{ old('kode_seminar', $jurnal->kode_seminar) == $s->kode_seminar ? 'selected' : '' }}>{{ $s->jenis_seminar }}</option>
                                @empty         
                                <option value="">Kosong</option>
                                @endforelse
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Status</label>
                    <div class="col-md-6">
                        <select  class="form-control" name="status" id="status">
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
					<label class="col-md-3 control-label">Catatan</label>
					<div class="col-md-6">
						<textarea class="form-control autosize" name="catatan" disabled style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 237px;" ">{{ $jurnal->catatan }}</textarea>
					</div>
					<div class="col-sm-2"><p class="help-block">Tulis Catatan</p></div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-3">
                            <button name="simpan" type="submit" id="btn-submit"class="btn btn-indigo">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
                <form action="{{url('/koordinatir/update/rev1/sementara/'.$jurnal->submission)}}" id="form1" class="form-horizontal row-border" method="POST">
                    <div class="form-group">
                            @csrf
                            @method('PUT')
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
                                    <option value="{{ $r->id_reviewer }}" @selected($r->id_reviewer == $detail1[0]->id_reviewer) >{{ $r->nama }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <input type="hidden" class="status" name="inputstatus1" value="0">
                            </div>
                            <br>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-3">
                                        <button name="simpan" type="submit" id="btn-submit"class="btn btn-indigo">Tambah Reviewer 1</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-3">
                                    <button name="simpan" type="submit" id="btn-submit"class="btn btn-indigo">Submit</button>
                                </div>
                            </div> --}}
                        
                    </form>
                    <br>
                    <form action="{{url('/koordinatir/update/rev2/sementara/'.$jurnal->submission)}}" id="form2" class="form-horizontal row-border" method="POST">
                        <div class="form-group">
                                @csrf
                                @method('PUT')
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
                                <br>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-3">
                                            <button name="simpan" type="submit" id="btn-submit"class="btn btn-indigo">Tambah Reviewer 2</button>
                                        </div>
                                    </div>
                                </div>
                            </form>   
        </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <a href="/koordinator" name="simpan" type="submit" id="btn-submit"class="btn btn-indigo">Kembali</a>
                                    </div>
                                </div>
                            
                         
                              
    </div>
</div>

{{-- @push('add')
    <script>
        const btnAdd= document.getElementById('btn-add');
        const newInput= document.getElementById('add');
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

                // const inputElement = document.createElement('input');
                // inputElement.classList.add('status');
                // inputElement.setAttribute("type", "hidden");
                // inputElement.name = 'inputstatus[1]';
                // inputElement.value = '2';
                
                });
                // Add the select element with options to the newInput div
                newInput.innerHTML = `<div class="form-group">
                        <label class="col-md-3 control-label">Reviewer 2</label>
                        <div class="col-md-6">
                            ${selectElement.outerHTML}
                            </div>
                            <input type="hidden" class="status" name="inputstatus[1]" value="1">
                    </div>`;
         }
         else{
            newInput.innerHTML='';
         }
        })
    </script>
@endpush --}}
{{-- @push('notif')
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
@endpush --}}
@endsection