<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<!-- Load Bootstrap -->
</head>
<body>
   <div class="modal fade" id="detailData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content col-md-12 col-md-offset-2">
									<div class="modal-header">
										{{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
										<h3 class="modal-title">Submission - </h2>
									</div>
									<div class="modal-body">
										
										<div class="panel-body">
                                            <form class="form-horizontal row-border" >
                                              
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Judul</label>
                                                   
                                                   
                                                    <div class="col-md-8">
                                                        <textarea class="form-control autosize" name="catatan" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 120px;" value @disabled(true)>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, deleniti. Consequatur eligendi, necessitatibus cum sapiente ad laborum doloribus velit iure!</textarea>
                                                    </div>
                                                  
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Nama</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="nama"class="form-control"required autofocus value=""disabled>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Email</label>
                                                    <div class="col-md-8">
                                                        <input type="email" name="email"class="form-control" value="" disabled>
                                                    </div>
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Aviliasi</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="aviliasi"class="form-control" value=""disabled>
                                                    </div>
                                                    
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">No.WA</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="wa"class="form-control" value=""disabled>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Jenis Seminar</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="wa"class="form-control" value=""disabled>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Status</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="wa"class="form-control" value=""disabled>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Pembayaran</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="wa"class="form-control" value=""disabled>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Kehadiran</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="wa"class="form-control" value=""disabled>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Catatan</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control autosize" name="catatan" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 250px;" @disabled(true)></textarea>
                                                    </div>
                                                  
                                                </div>
                                                
                                            </form>
											
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-indigo" data-dismiss="modal">Close</button>
                                            
                                          </div>
									</div>
                                    
									
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					</div> <!-- #page-content -->
				</div>
</body>
<script type="text/javascript" src="{{ asset('assets/js/jquery-1.10.2.min.js') }}"></script> <!-- Load jQuery -->
{{-- <script type="text/javascript" src="{{ asset('assets/js/jqueryui-1.10.3.min.js') }}"></script> <!-- Load jQueryUI --> --}}
<script>
$(".btn-detail").click(function(e) {
      var id=$(this).attr('data-detailId');
      console.log(id);
      const modalTitleElement = document.querySelector('.modal-title');
            modalTitleElement.textContent = 'Submission -  ' + id;

            // Now you can show the modal
            // For example, using Bootstrap modal JS API:
           
    })
</script>
</html>
