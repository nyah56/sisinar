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
	{{-- <div class="col-md-4">
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
	</div> --}}
	<div class="col-md-12">
	<div class="panel panel-indigo" id="panel-editable">
		<div class="panel-heading">
			<h2>SENIATI</h2>
		</div>
		<div class="panel-body p-3">
			<div class="col-md-4">
				<div class="info-tile tile-success">
					<div class="tile-icon"><i class="ti ti-clipboard"></i></div>
					<div class="tile-heading"><span>Jumlah Tahap Submission</span></div>
					<div class="tile-body"><span>{{ $subTI }}</span></div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="info-tile tile-info">
					<div class="tile-icon"><i class="ti ti-clipboard"></i></div>
					<div class="tile-heading"><span>Jumlah Tahap Review</span></div>
					<div class="tile-body"><span>{{ $revTI }}</span></div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="info-tile tile-info">
					<div class="tile-icon"><i class="ti ti-clipboard"></i></div>
					<div class="tile-heading"><span>Jumlah Tahap Publish</span></div>
					<div class="tile-body"><span>{{ $pubTI }}</span></div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-12">
		<div class="panel panel-indigo" id="panel-editable">
			<div class="panel-heading">
				<h2>SEMSINA</h2>
			</div>
			<div class="panel-body p-3">
				<div class="col-md-4">
					<div class="info-tile tile-success">
						<div class="tile-icon"><i class="ti ti-clipboard"></i></div>
						<div class="tile-heading"><span>Jumlah Tahap Submission</span></div>
						<div class="tile-body"><span>{{ $subNA }}</span></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="info-tile tile-info">
						<div class="tile-icon"><i class="ti ti-clipboard"></i></div>
						<div class="tile-heading"><span>Jumlah Tahap Review</span></div>
						<div class="tile-body"><span>{{ $revNA }}</span></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="info-tile tile-info">
						<div class="tile-icon"><i class="ti ti-clipboard"></i></div>
						<div class="tile-heading"><span>Jumlah Tahap Publish</span></div>
						<div class="tile-body"><span>{{ $pubNA }}</span></div>
					</div>
				</div>
			</div>
		</div>
	
		</div>
	
</div> 
@endsection
