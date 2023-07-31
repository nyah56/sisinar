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
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h3 class="modal-title">Submission - </h2>
									</div>
									<div class="modal-body">
										
										<div class="panel-body" id="modalDataContainer">
                                            <p>Loading</p>
											
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
{{-- <script>
// $(".btn-detail").click(function(e) {
//       var id=$(this).attr('data-detailId');
//       console.log(id);
    

//             // Now you can show the modal
//             // For example, using Bootstrap modal JS API:
           
//     })
    
</script> --}}
<!-- modal.blade.php -->
<!-- Your existing modal content here -->


<script type="text/javascript" src="{{ asset('assets/js/jurnal/app.js') }}" ></script> 

</html>
