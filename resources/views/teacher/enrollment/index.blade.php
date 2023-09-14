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
											<li class="list-group-item text-center active button-5"><a href="{{ url('/admin/enrollment') }}" class="text-white">All</a></li>
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
														<th>Class Group</th>
														<th>Subject</th>
														<th>Semester</th>
														<th>Year</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($enrollment as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>
                            							<td>{{ $item->classGroup->class->name }}</td>
														<td>{{ $item->subject->subject_name }}</td>
														<td>{{ $item->semester }}</td>
														<td>{{ $item->year }}</td>
														<td class="text-left" align="center">
															<div class="table-action">
															<a href="{{ url('/teacher/enrollment/' . $item->id) }}" title="Enrollment Detail"><button class="btn btn-sm btn-primary"><span class="lnr lnr-eye"></span> View</button></a>
														</td>
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
