@extends('layouts.backend-student')

@section('content')
    <div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="{{url('/student')}}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Profile</li>
														</ol>
														<h4 class="text-dark">Profile</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">Update Profile</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
										<li class="nav-item pl-3">
											<a href="{{route('report.enrollment')}}" target="_blank" class="btn btn-success text-white ctm-border-radius button-1"> <i class="fa fa-file-pdf-o"> Print</i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="ctm-border-radius shadow-sm card">
								<div class="card-body">
									<form action="" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="" class="control-label">Old Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="control-label">New Password</label>
                                            <input type="password" name="new_password" class="form-control">
                                        </div>
                                        
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
@endsection
