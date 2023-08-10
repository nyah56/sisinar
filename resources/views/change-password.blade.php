@extends('layouts.main')
@section('isi')

		<div class="tab-pane active" id="tab-edit">
			<div class="panel" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
				<div class="panel-heading">
					<h2>Ganti Password</h2>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<form class="form-horizontal tabular-form" action="{{ url('/update-password') }}" method="POST">
								@csrf
								<div class="form-group">
									<label for="form-confirmpass" class="col-sm-2 control-label">Username</label>
									<div class="col-sm-8 tabular-border">
										<input type="text" class="form-control" name="username" id="form-confirmpass" placeholder="username" value="{{ auth()->user()->username }}" disabled>
									</div>
								</div>
								<div class="form-group @error('password')
								has-error
								@enderror">
									<label for="form-password" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-8 tabular-border">
										<input type="password" class="form-control" name="password" id="form-password" placeholder="Password">
									</div>
									@error('password')
									<div class="col-sm-2">
										<p class="help-block"><i class="fa fa-times-circle"></i>
											Password Minimal 8 Digit</p>
									</div>
									@enderror
								</div>
								
								<div class="panel-footer">
									<div class="col-sm-8 col-sm-offset-2">
										<button name="simpan" type="submit" id="btn-submit"class="btn btn-indigo">Submit</button>
									</div>
								</div>
								
							</form>	
						</div>
					</div>
				</div>
				
			</div>
		</div>

	</div><!-- .tab-content -->


@endsection