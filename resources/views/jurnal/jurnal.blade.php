@extends('layouts.main')
@section('isi')
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            Tambah atau Ubah Data Jurnal Disini kolom belum lengkap perlu konsul
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <div class="panel panel-indigo" id="panel-editable">
            <div class="panel-heading">
                <h2>Tabel Jurnal</h2>
                <div class="panel-ctrls"> 
                    <div class="DTTT btn-group pull-left mt-sm mr-3">
                    <a class="btn btn-indigo DTTT_button_text" id="ToolTables_crudtable_0"href="/jurnal/tambah"><i class="ti ti-plus"></i> <span>New</span></a>
                    </div>
                    
                </div>
            </div>
            <div class="panel-body no-padding">
            
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="crudtable">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center" width="5%">Submission</th>
                            <th class="text-center" width="10%">Judul</th>
                            <th class="text-center" width="10%">Nama</th>
                            <th class="text-center" width="10%">No.WA</th>
                            <th class="text-center" width="5%">Jenis Seminar</th>
                            <th class="text-center" width="5%">Status</th>
                            <th class="text-center" width="5%">Pembayaran</th>
                            <th class="text-center" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                       @forelse ($jurnal as $jur)
                       <tr>
                        <td>{{$jur ->submission}}</td>
                        <td>{{$jur ->judul}} </td>
                        <td>{{$jur ->nama}}</td>
                        <td><a href="https://wa.me/62{{$jur -> no_wa}}" target="_blank">{{$jur -> no_wa}}</a></td>
                        <td>{{$jur->dataSeminar->jenis_seminar}}</td>
                        @if ($jur->status == 1)
                        <td><span class="label label-primary">Submision</span></td>
                        @elseif($jur ->status == 2)
                        <td><span class="label label-info">Review</span></td>
                        @elseif($jur ->status == 3)
                        <td><span class="label label-warning">Menunggu Revisi</span></td>
                        @elseif($jur ->status == 4)
                        <td><span class="label label-success">Accepted</span></td>
                        @elseif($jur ->status == 5)
                        <td><span class="label label-info">CopyEditing</span></td>
                        @elseif($jur ->status == 6)
                        <td><span class="label label-info">Production</span></td>
                        @elseif($jur ->status == 7)
                        <td><span class="label label-success">Publish</span></td>   
                        @endif
                        @if ($jur ->pembayaran == 0)
                        <td><span class="label label-success">Belum Lunas</span></td>
                      @elseif($jur ->pembayaran == 1)
                       <td><span class="label label-success">Lunas</span></td>   
                      @endif
                        <td> 
                            <div class="btn-group">
                                <button type="button" data-toggle = "modal" data-target="#detailData" class="btn btn-primary btn-detail openModalButton" data-id="{{ $jur->submission }}"><i class="ti ti-user"></i></button>
                                <a type="button" class="btn btn-orange" href="/jurnaledit/{{ $jur ->submission }}"><i class="ti ti-pencil-alt"></i></a>
                                <a type="button" class="btn btn-danger btn-delete" href="/jurnal/destroy/{{ $jur ->submission}}" data-toggle="tooltip"><i class="ti ti-trash"></i></a>
                            </div>
                        </td>
                       </tr>
                       @empty
                        <tr>
                          <td>Data Kosong</td>
                        </tr>
                       @endforelse
                        
                       
                    </tbody>
                </table>
             
                
            </div>
        </div>
    </div>
</div>
@include('layouts.detail-modal')
@push('notif')
<script>
    
    
     $(".btn-delete").click(function(e) {
      var id=$(this).attr('data-deleteid');
   
      e.preventDefault();
      swal({
        title: 'Yakin ingin menghapus data?',
        text: "Data dengan kode ini:"+{{ $jur ->submission}}+" akan dihapus ",
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location="/jurnal/destroy/"+{{ $jur ->submission}}+""
          swal("Data anda berhasil dihapus", {
            icon: "success",
            });
          // form.submit();
          // console.log(id);
        } else {
          swal('Proses Hapus dibatalkan');
        }
      });
    });
  
  
  </script>
@endpush
@endsection
