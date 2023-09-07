<table>
    <thead>
        <tr>
          <th  width="100%">Submission</th>
          <th  width="100%">Judul</th>
          <th  width="100%">Nama</th>
          <th  width="100%">Email</th>
          <th  width="100%">No.WA</th>
          <th  width="100%">Jenis Seminar</th>
          <th  width="100%">Status</th>
          <th  width="100%">Pembayaran</th>
        </tr>
    </thead>
    <tbody>
       @forelse ($jurnal as $jur)
       <tr>
        <td>{{$jur ->submission}}</td>
        <td>{{ $jur ->judul }}</td>
        <td>{{$jur ->nama}}</td>
        <td>{{$jur->email}}</td>
        <td>{{$jur -> no_wa}}</td>
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
        <td><span class="label label-success">Belum Lunas</span></td>
      @elseif($jur ->pembayaran == 2)
       <td><span class="label label-success">Lunas</span></td>   
      @endif
       </tr>
       @empty
        <tr>
          <td>Data Kosong</td>
        </tr>
       @endforelse
    </tbody>
</table>  