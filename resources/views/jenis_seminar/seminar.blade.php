@extends('layouts.main')
@section('isi')
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            Tambah atau Ubah Data Jenis Seminar Disini 
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <div class="panel panel-indigo" id="panel-editable">
            <div class="panel-heading">
                <h2>Tabel Jenis Seminar</h2>
                <div class="panel-ctrls"> 
                    <div class="DTTT btn-group pull-left mt-sm mr-3">
                    <a class="btn btn-indigo DTTT_button_text" id="ToolTables_crudtable_0"href="/seminar/entry"><i class="ti ti-plus"></i> <span>New</span></a>
                    </div>
                
                </div>
            </div>
            <div class="panel-body no-padding">
            
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="crudtable">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center" width="15%">Kode Seminar</th>
                            <th class="text-center" width="30%">Jenis Seminar</th>
                            <th class="text-center" width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse($seminar as $s)
                       <tr>
                        <td>{{ $s->kode_seminar}}</td>
                        <td>{{ $s->jenis_seminar }} </td>
                        <td> 
                            <div class="btn-group">
                                
                                <a href="/seminar/edit/{{ $s->kode_seminar }}" class="btn btn-orange"><i class="ti ti-pencil-alt"></i></a>
                                <button type="button" class="btn btn-danger btn-delete" data-toggle="tooltip" data-deleteid="{{ $s->kode_seminar}}"><i class="ti ti-trash"></i></button>
                            </div>
                        </td>
                       </tr>
                        @empty
                        <tr>
                            <td colspan="3">Data Tidak ada</td>
                        </tr>
                        @endforelse

                      
                        
                        {{-- @php
                            $no=1+(($parfum->currentPage()-1)*$parfum->perPage()); 
                        @endphp
                        @forelse ($parfum as $p)

                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $p->kode_barang }}</td>
                            <td>{{ $p->nama_barang }}</td>
                            <td>Rp. {{ number_format($p->h_beli )}}</td>
                            <td>Rp. {{ number_format($p->h_agen) }}</td>
                            <td >
                                <a href="/parfum/edit/{{ $p->kode_barang}}" class="btn btn-warning btn-label d-inline"><i class="ti ti-pencil-alt"></i><span>Edit</span></a>
                        
                                    
                                <a class=" btn btn-danger btn-label btn-delete"href="#" data-toggle="tooltip" data-deleteid="{{ $p->kode_barang}}" title='Delete'><i class="ti ti-trash"></i><span>Delete</span></a>
                            
                            </td>
                            
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6">Data Tidak ada</td>
                            </tr>
                        @endforelse --}}
                    </tbody>
                </table>
                {{-- {{ $parfum->links() }} --}}
                <!--end table-->
                
            </div>
        </div>
    </div>
</div>

@push('notif')
<script>
    
  
     $(".btn-delete").click(function(e) {
      var id=$(this).attr('data-deleteid');
   
      e.preventDefault();
      swal({
        title: 'Yakin ingin menghapus data?',
        text: "Data dengan kode ini:"+id+" akan dihapus ",
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location="/seminar/destroy/"+id+""
          swal("Data anda berhasil dihapus", {
            icon: "success",
            });
          // form.submit();
        //   console.log(id);
        } else {
          swal('Proses Hapus dibatalkan');
        }
      });
    });
  
  
  </script>
@endpush
@endsection
