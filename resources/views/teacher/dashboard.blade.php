@extends('layouts.backend-teacher')

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
															<li class="breadcrumb-item d-inline-block"><a href="{{url('/teacher')}}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Dashboard</li>
														</ol>
														<h4 class="text-dark">Teacher Dashboard</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="user-card card shadow-sm bg-white text-center ctm-border-radius">
									<div class="user-info card-body">
										<div class="user-avatar mb-4">
                                            <img src="{{asset('vendor/lakers')}}/img/profiles/img-13.jpg" alt="User Avatar" class="img-fluid rounded-circle" width="100">
										</div>
										<div class="user-details">
											<h4><b>Welcome {{Auth::user()->name}}</b></h4>
										</div>
									</div>
								</div>
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8 col-md-12">
						
							<!-- Widget -->
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="card dash-widget ctm-border-radius shadow-sm">
										<div class="card-body">
											<div class="card-icon bg-primary">
												<i class="fa fa-users" aria-hidden="true"></i>
											</div>
											<div class="card-right">
												<h4 class="card-title">Teacher</h4>
												<p class="card-text">{{$teacher}}</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-sm-6 col-12">
									<div class="card dash-widget ctm-border-radius shadow-sm">
										<div class="card-body">
											<div class="card-icon bg-warning">
												<i class="fa fa-user"></i>
											</div>
											<div class="card-right">
												<h4 class="card-title">Student</h4>
												<p class="card-text">{{$student}}</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- / Widget -->
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
@endsection
