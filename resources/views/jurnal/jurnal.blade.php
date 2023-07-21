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
                    <a class="btn btn-indigo DTTT_button_text" id="ToolTables_crudtable_0"href="/parfum/tambah"><i class="ti ti-plus"></i> <span>New</span></a>
                    </div>
                    {{-- Mess Button --}}
                    {{-- <div class="DTTT btn-group pull-left mt-sm mr-3">
                        <a class="btn btn-default DTTT_button_text" id="ToolTables_crudtable_0"href="/parfum/mess"><i class="ti ti-plus"></i> <span>Mess</span></a>
                    </div> --}}
                </div>
            </div>
            <div class="panel-body no-padding">
            
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="crudtable">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center" width="5%">Submission</th>
                            <th class="text-center" width="10%">Judul</th>
                            <th class="text-center" width="10%">Nama</th>
                            <th class="text-center" width="10%">Email</th>
                            <th class="text-center" width="10%">Aviliasi</th>
                            <th class="text-center" width="10%">No.WA</th>
                            <th class="text-center" width="5%">Jenis Seminar</th>
                            <th class="text-center" width="5%">Status</th>
                            <th class="text-center" width="5%">Pembayaran</th>
                            <th class="text-center" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                       <tr>
                        <td>6139</td>
                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis molestias placeat suscipit </td>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>Lorem, ipsum.@emailcom</td>
                        <td>ITN Malang</td>
                        <td><a href="https://wa.me/62895601150286">+62895601150286</a></td>
                        <td>SENIATI</td>
                        <td><span class="label label-success">Paid</span></td>
                        <td><span class="label label-success">Lunas</span></td>
                        <td> 
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary"><i class="ti ti-user"></i></button>
                                <button type="button" class="btn btn-orange"><i class="ti ti-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-delete" data-toggle="tooltip"><i class="ti ti-trash"></i></button>
                            </div>
                        </td>
                       </tr>
                        
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
          window.location="/parfum/destroy/"+id+""
          swal("Data anda berhasil dihapus", {
            icon: "success",
            });
          // form.submit();
          console.log(id);
        } else {
          swal('Proses Hapus dibatalkan');
        }
      });
    });
  
  
  </script>
@endpush
@endsection
