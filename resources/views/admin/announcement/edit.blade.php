@extends('layouts.backend')

@section('content')
<!-- Content -->
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
                                                <li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Home</a></li>
                                                <li class="breadcrumb-item d-inline-block active">Announcement</li>
                                            </ol>
                                            <h4 class="text-dark">Edit Announcement #{{ $announcement->id }}</h4>
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
                        <h4 class="card-title float-left mb-0 mt-2"> Announcement Edit</h4>
                        <ul class="nav nav-tabs float-right border-0 tab-list-emp">
                        </ul>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                {!! Form::model($announcement, [
                    'method' => 'PATCH',
                    'url' => ['/admin/announcement', $announcement->id],
                    'class' => '','enctype' => 'multipart/form-data'
                ]) !!}

                @include ('admin.announcement.form', ['formMode' => 'edit'])

                {!! Form::close() !!}	
            </div>
        </div>
    </div>
</div>
<!--/Content-->
@endsection