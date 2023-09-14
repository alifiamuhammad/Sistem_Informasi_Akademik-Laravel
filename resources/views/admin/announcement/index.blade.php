@extends('layouts.backend')

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
															<li class="breadcrumb-item d-inline-block"><a href="{{url('/admin')}}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Announcement</li>
														</ol>
														<h4 class="text-dark">Announcement</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<ul class="list-group">
											<li class="list-group-item text-center active button-5"><a href="{{ url('/admin/announcement') }}" class="text-white">All</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">List Announcement</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
										<li class="nav-item pl-3">
											<button class="btn btn-theme text-white ctm-border-radius button-1" data-toggle="modal" data-target="#add-Announcement">Add New</button>
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
														<th>Id</th><th>Announcement Name</th><th>Attachment</th><th>Class Group Id</th><th>Status</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($announcement as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>
                            							<td>{{ $item->id }}</td><td>{{ $item->announcement_name }}</td>
														<td><a href="{{asset('uploads/attachment')}}/{{ $item->attachment }}" target="_blank">{{ $item->attachment }}</a></td>
														<td>{{ $item->class_group_id }}</td><td>{{ $item->status }}</td>
														<td class="text-right" align="center">
															<div class="table-action">
															<a href="{{ url('/admin/announcement/' . $item->id) }}" title="View Announcement"><button class="btn btn-sm btn-info"><span class="lnr lnr-eye"></span>View</button></a>
															<a href="{{ url('/admin/announcement/' . $item->id . '/edit') }}" title="Edit Announcement"><button class="btn btn-sm btn-primary"><span class="lnr lnr-eye"></span>Edit</button></a>
															<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirm{{$item->id}}"><span class="lnr lnr-trash">Delete</span></button>
															<div class="modal fade" id="deleteConfirm{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<div class="modal-dialog modal-sm">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
																		</div>
																		<div class="modal-body">
																			Are you sure want to delete  this record?
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			{!! Form::open([
																			'method' => 'DELETE',
																			'url' => ['/admin/announcement', $item->id],
																			'style' => 'display:inline'
																			]) !!}
																			{!! Form::button('Delete', array(
																					'type' => 'submit',
																					'class' => 'btn btn-danger btn-sm',
																					'title' => 'Confirm Delete'
																			)) !!}
																			{!! Form::close() !!}
																		</div>
																	</div>
																</div>
															</div>
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
			<!--/Content-->
        <div class="modal fade" id="add-Announcement" role="document">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal body -->
                    <div class="modal-body style-add-modal">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title mb-3">Add New Announcement</h4>
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif

                        {!! Form::open(['url' => '/admin/announcement', 'class' => '', 'enctype' => 'multipart/form-data']) !!}

                        @include ('admin.announcement.form', ['formMode' => 'create'])

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
@endsection
