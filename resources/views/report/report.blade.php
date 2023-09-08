@extends('layouts.main')
@section('isi')
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            Cetak Data Jurnal disini
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <div class="panel">
          <div class="panel-heading">
            <h3>Data Seminar Yang Ingin Dicari</h3>
            
            <form action="{{url('/report/search')}}" class="form-horizontal row-border" >
              {{-- <input type="hidden" name="kode" value="{{ $jurnal->kode_seminar }}"> --}}
              <select name="seminar" id="selector1" class="form-control">

                @forelse ($seminar as $item)    
             
                <option value="{{$item->jenis_seminar}}">{{$item->jenis_seminar}}</option>
                @empty
                <option value="">kosong</option> 
                @endforelse

              </select>
              <button type="submit" class="btn-indigo btn">Cari</button> 
              <a type="button" class="btn btn-indigo" href="/report" title="Reset Pencarian"><i class="ti ti-reload"></i></a>

            </form>
           
          </div>

        <br>
        </div>
        <div class="panel panel-indigo" id="panel-editable">
            <div class="panel-heading">
                <h2>Tabel Jurnal</h2>
                <div class="panel-ctrls"> 
                    <div class="DTTT btn-group pull-left mt-sm mr-3">
                      <div>
                        @if ($state)
                        <a href="/report/cetak/" class="btn btn-primary">Cetak</a>
                        @endif
                        <a href="/report/cetak/semua" class="btn btn-primary">Cetak All</a>
                      </div>
                    </div>

                </div>
            </div>
            <div class="panel-body no-padding">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" {!! $state ? 'id="crudtable"' : '' !!}>
                    <thead class="text-center">
                        <tr>
                            <th class="text-center" width="5%">Submission</th>
                            <th class="text-center" width="10%">Judul</th>
                            <th class="text-center" width="10%">Nama</th>
                            <th class="text-center" width="10%">Email</th>
                            <th class="text-center" width="10%">No.WA</th>
                            <th class="text-center" width="5%">Jenis Seminar</th>
                            <th class="text-center" width="5%">Status</th>
                            <th class="text-center" width="5%">Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                       @forelse ($jurnal as $jur)
                       <tr>
                        <td>{{$jur ->submission}}</td>
                        <td>{{limitJudul($jur ->judul)}} </td>
                        <td>{{$jur ->nama}}</td>
                        <td>{{$jur->email}}</td>
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
                        @if ($jur ->pembayaran == 1)
                        <td><span class="label label-warning">Belum Lunas</span></td>
                      @elseif($jur ->pembayaran == 2)
                       <td><span class="label label-success">Lunas</span></td>   
                      @endif
                       </tr>
                       @empty
                        <tr>
                          <td colspan="8">Data Kosong</td>
                        </tr>
                       @endforelse


                    </tbody>
                </table>
                <
            </div> 
        </div>
    </div>
</div>

@push('data-table')
    <script>
      new DataTable('#crudtable');
    

    </script>
@endpush

@endsection