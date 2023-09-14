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
														<h4 class="text-dark">Announcement Detail</h4>
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
									<h4 class="card-title float-left mb-0 mt-2">Announcement Detail</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
									</ul>
								</div>
							</div>
							<div class="ctm-border-radius shadow-sm card">
								<div class="card-body">
								
									<!--Content table-->
									<div class="table-back employee-office-table">
										<div class="table-responsive">
											<table class="table custom-table table-hover table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>{{ $announcement->id }}</th>
                                                    </tr>
                                                    <tr><th> Id </th><td> {{ $announcement->id }} </td></tr>
													<tr><th> Announcement Name </th><td> {{ $announcement->announcement_name }} </td></tr>
													<tr><th> Content </th><td> {{ $announcement->content }} </td></tr>
													<tr><th> Attachment </th><td> <a href="{{asset('uploads/attachment')}}/{{ $announcement->attachment }}" target="_blank">{{ $announcement->attachment }}</a> </td></tr>
													<tr><th> Class Group Id </th><td> {{ $announcement->class_group_id }} </td></tr>
													<tr><th> Status </th><td> {{ $announcement->status }} </td></tr>
                                                    <tr>
                                                        <td colspan="10" align="center">
                                                            <a href="{{ url('/admin/announcement') }}"><button class="btn btn-sm btn-warning"><span class="lnr lnr-arrow-left">Back</span></button></a>
                                                            <a href="{{ url('/admin/announcement/' . $announcement->id . '/edit') }}"><button class="btn btn-sm btn-primary" title="Edit Announcement"><span class="lnr lnr-pencil">Edit</span></button></a>
                                                            {!! Form::open([
                                                                'method' => 'DELETE',
                                                                'url' => ['admin/announcement', $announcement->id],
                                                                'style' => 'display:inline'
                                                            ]) !!}
                                                                {!! Form::button('<span class="lnr lnr-trash">Delete</span>', array(
                                                                        'type' => 'submit',
                                                                        'class' => 'btn btn-sm btn-danger',
                                                                        'title' => 'Delete Announcement',
                                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                                )) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
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
@endsection
