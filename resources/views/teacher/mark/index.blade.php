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
															<li class="breadcrumb-item d-inline-block active">Student Mark List</li>
														</ol>
														<h4 class="text-dark">Student Mark List</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<ul class="list-group">
											<li class="list-group-item text-center active button-5"><a href="{{ url('/teacher/mark') }}" class="text-white">All</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">List Student Mark</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
										<li class="nav-item pl-3">
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
														<th>Student ID</th>
														<th>Student Name</th>
														<th>Assignment Score</th>
														<th>Mid Term Score</th>
														<th>Final Term Score</th>
														<th>Attendance Score</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($students as $i => $item)
												@php
													$mark = \App\Models\Mark::where('student_id', $item->id)->where('enrollment_id', $enrollment->id)->first();
												@endphp
													<tr>
														<td>{{ $i+1 }}</td>
                            							<td>{{ $item->student_id }}</td>
														<td>{{ $item->student_name }}</td>
														@if($mark)
														<td>{{ strval($mark->assignment_score) }}</td>
														<td>{{ strval($mark->midterm_score) }}</td>
														<td>{{ strval($mark->finalterm_score) }}</td>
														<td>{{ strval($mark->attendance_score) }}</td>
														@else
														<td> - </td>
														<td> - </td>
														<td> - </td>
														<td> - </td>
														@endif
														<td class="text-left" align="center">
															<div class="table-action">
																@if(!$mark)
																<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#giveMark{{$item->id}}"><span class="fa fa-pencil"> Give Score</span></button>
																	<div class="modal fade" id="giveMark{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																		<div class="modal-dialog modal-sm">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h4 class="modal-title" id="myModalLabel">Scoring Confirmation</h4>
																				</div>
																				<div class="modal-body">
																					<form action="{{route('give.mark', $item->id)}}" method="post">
																						{{ csrf_field() }}
																						<div class="form-group">
																							<input type="hidden" name="student_id" value="{{$item->id}}">
																							<input type="hidden" name="enrollment_id" value="{{$enrollment->id}}">
																							<label for="" class="control-label">Assignment Score (20%)</label>
																							<input type="number" name="assignment_score" id="" class="form-control">
																						</div>
																						<div class="form-group">
																							<label for="" class="control-label">Midterm Score (25%)	</label>
																							<input type="number" name="midterm_score" id="" class="form-control">
																						</div>
																						<div class="form-group">
																							<label for="" class="control-label">Finalterm Score (40%)</label>
																							<input type="number" name="finalterm_score" id="" class="form-control">
																						</div>
																						<div class="form-group">
																							<label for="" class="control-label">Attendance Score (15%)</label>
																							<input type="number" name="attendance_score" id="" class="form-control">
																						</div>
																						<button type="submit" class="btn btn-success">Save</button>
																					</form>
																				</div>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																@else
																<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editMark{{$item->id}}"><span class="fa fa-pencil"> Edit Score</span></button>
																	<div class="modal fade" id="editMark{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																		<div class="modal-dialog modal-sm">
																			<div class="modal-content">
																				<div class="modal-header">
																					<h4 class="modal-title" id="myModalLabel">Edit Score</h4>
																				</div>
																				<div class="modal-body">
																					<form action="{{route('edit.mark', $item->id)}}" method="post">
																						{{ csrf_field() }}
																						<div class="form-group">
																							<input type="hidden" name="mark_id" value="{{$mark->id}}">
																							<label for="" class="control-label">Total Assignment Score </label>
																							<input type="number" name="assignment_score" value="{{$mark->assignment_score}}" class="form-control">
																						</div>
																						<div class="form-group">
																							<label for="" class="control-label">Midterm Score 	</label>
																							<input type="number" name="midterm_score" value="{{$mark->midterm_score}}" class="form-control">
																						</div>
																						<div class="form-group">
																							<label for="" class="control-label">Finalterm Score </label>
																							<input type="number" name="finalterm_score" value="{{$mark->finalterm_score}}" class="form-control">
																						</div>
																						<div class="form-group">
																							<label for="" class="control-label">Attendance Score </label>
																							<input type="number" name="attendance_score" value="{{$mark->attendance_score}}" class="form-control">
																						</div>
																						<button type="submit" class="btn btn-success">Save</button>
																					</form>
																				</div>
																				<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																@endif
															</div>
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
