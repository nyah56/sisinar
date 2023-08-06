@extends('layouts.main')
@section('isi')
<div class="row">
	<div class="col-md-4">
		<div class="info-tile tile-orange">
			<div class="tile-icon"><i class="ti ti-clipboard"></i></div>
			<div class="tile-heading"><span>Jumlah Jurnal Saat ini</span></div>
			<div class="tile-body"><span>{{ $sumJurnal }}</span></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="info-tile tile-success">
			<div class="tile-icon"><i class="ti ti-notepad"></i></div>
			<div class="tile-heading"><span>Jumlah Jurnal SEMSINA</span></div>
			<div class="tile-body"><span>{{ $semsina }}</span></div>
			
		</div>
	</div>
	<div class="col-md-4">
		<div class="info-tile tile-info">
			<div class="tile-icon"><i class="ti ti-notepad"></i></div>
			<div class="tile-heading"><span>Jumlah Jurnal SENIATI</span></div>
			<div class="tile-body"><span>{{ $seniati }}</span></div>
			
		</div>
	</div>
	<div class="col-md-4">
		<div class="info-tile tile-info">
			<div class="tile-icon"><i class="ti ti-user"></i></div>
			<div class="tile-heading"><span>Jumlah Reviewer</span></div>
			<div class="tile-body"><span>{{ $reviewer }}</span></div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="info-tile tile-orange">
			<div class="tile-icon"><i class="ti ti-user"></i></div>
			<div class="tile-heading"><span>Jumlah Koordinator</span></div>
			<div class="tile-body"><span>{{ $koor }}</span></div>
			
		</div>
	</div>
	<div class="col-md-4">
		<div class="info-tile tile-success">
			<div class="tile-icon"><i class="ti ti-user"></i></div>
			<div class="tile-heading"><span>Jumlah Kesekretariat</span></div>
			<div class="tile-body"><span>{{ $kesek }}</span></div>
			
		</div>
	</div>
	
</div> 
@endsection
