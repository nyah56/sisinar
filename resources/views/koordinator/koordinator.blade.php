@extends('layouts.main')
@section('isi')
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            Penyelesaian Administrasi Seminar
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <div class="panel panel-indigo" id="panel-editable">
            <div class="panel-heading">
                <h2>Tabel Jurnal</h2>
                <div class="panel-ctrls"> 
                </div>
            </div>
            <div class="panel-body no-padding">
            
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="crudtable">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center" width="5%">Submission</th>
                            <th class="text-center" width="10%">Judul</th>
                            <th class="text-center" width="10%">Nama</th>
                            <th class="text-center" width="5%">Jenis Seminar</th>
                            <th class="text-center" width="5%">Status</th>
                            <th class="text-center" width="5%">Reviewer 1</th>
                            <th class="text-center" width="5%">Reviewer 2</th>
                            <th class="text-center" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                      @forelse ($jurnal as $jur)    
                      <tr>
                        <td>{{$jur -> submission}}</td>
                        <td>{{$jur -> judul}} </td>
                        <td>{{$jur -> nama}}</td>
                        
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
                        
                       <td>R1</td>
                       <td>R2</td>
                        <td> 
                            <div class="btn-group">
                              <button type="button" data-toggle = "modal" data-target="#detailData" class="btn btn-primary btn-detail openModalButton" data-id="{{ $jur->submission }}"><i class="ti ti-eye"></i></button>
                            @if ($jur -> pembayaran == 1)    
                            <a type="button" class="btn btn-orange" href="/kesekretariatan/edit/{{ $jur ->submission }}"><i class="ti ti-pencil-alt"></i></a>
                            @else
                            <a type="button" disabled class="btn btn-success" href="/kesekretariatan/edit/{{ $jur ->submission }}"><i class="ti ti-pencil-alt"></i></a>
                            @endif
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


@endsection