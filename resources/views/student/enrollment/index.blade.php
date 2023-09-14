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
															<li class="breadcrumb-item d-inline-block active">Enrollment</li>
														</ol>
														<h4 class="text-dark">Enrollment</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<ul class="list-group">
											<li class="list-group-item text-center active button-5"><a href="{{ url('/student/enrollment') }}" class="text-white">All</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">List Enrollment</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
										<li class="nav-item pl-3">
											<a href="{{route('report.enrollment')}}" target="_blank" class="btn btn-success text-white ctm-border-radius button-1"> <i class="fa fa-file-pdf-o"> Print</i></a>
										</li>
									</ul>
								</div>
							</div>
							<div class="ctm-border-radius shadow-sm card">
								<div class="card-body">
									<!--Content table-->
									<div class="table-back employee-office-table">
										<div class="table-responsive">
											<table id="data-table" class="table custom-table table-hover table-hover">
												<thead>
													<tr>
														<th>#</th>
														<th>Subject</th><th>Semester</th><th>Year</th>
														<th>Assignment Score (20%)</th>
														<th>Mid Term Score (25%)</th>
														<th>Final Term Score (40%)</th>
														<th>Attendance Score (15%)</th>
														<th>Final Score</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($academicReport as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>
                            							<td>{{ $item->subject_name }}</td>
														<td>{{ $item->semester }}</td>
														<td>{{ $item->year }}</td>
														<td>{{ strval($item->assignment_score) }}</td>
														<td>{{ strval($item->midterm_score) }}</td>
														<td>{{ strval($item->finalterm_score) }}</td>
														<td>{{ strval($item->attendance_score) }}</td>
														@php
															$assignment_weight = 0.2;
															$midterm_weight = 0.25;
															$finalterm_weight = 0.4;
															$attendance_weight = 0.15;
															$finalScore = ($item->assignment_score * $assignment_weight) + ($item->midterm_score * $midterm_weight) + ($item->finalterm_score * $finalterm_weight) + ($item->attendance_score * $attendance_weight);
														@endphp
														<td>{{strval($finalScore)}}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
									<!-- /Content Table -->
								</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
@endsection
