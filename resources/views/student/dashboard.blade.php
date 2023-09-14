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
															<li class="breadcrumb-item d-inline-block"><a href="{{url('/teacher')}}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Dashboard</li>
														</ol>
														<h4 class="text-dark">Student Dashboard</h4>
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
						@foreach($announcement as $item)
						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 d-flex">
                                    <div class="card ctm-border-radius shadow-sm flex-fill">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">{{$item->announcement_name}}</h4>
                                    </div>
                                    <div class="card-body">
                                        {!! $item->content !!}
										<br>
										@if($item->attachment)
										<a href="{{asset('uploads/attachment')}}/{{$item->attachment}}" target="_blank">View Attachment</a>
										@endif
                                    </div>
                                    </div>
                                </div>
                            </div>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
			@include('sweetalert::alert')
@endsection
