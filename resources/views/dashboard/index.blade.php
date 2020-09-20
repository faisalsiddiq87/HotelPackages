@extends('layouts.app')
@section('title', 'All Packages')
@section('sidebar')
@parent

@section('content')

<div class="row">
    <div class="col">
        <!--begin::Portlet-->
        <div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
					</div>
					<div class="card-toolbar" style="margin-top: 15px;">
						<a href="{{ route('package.create') }}" class="btn btn-primary font-weight-bolder">
						<i class="fa fa-plus-square"></i>New Package</a>
					</div>
				</div>
				<div class="kt-portlet__body">
					<table class="table table-bordered" id="list_data" style="width: 1234px;">
						<thead>
							<tr>
								<th >#</th>							
								<th >Name</th>
								<th >Hotel Name</th>
								<th >Price</th>
								<th >Duration</th>
								<th >Valid Till</th>
								<th >Action</th>	
							</tr>
						</thead>
					</table>
				</div>
        </div>
    </div>

</div>
@endsection
@section('page-script')
    <script src="/assets/js/pages/packages/list-package.js" type="text/javascript"></script>
@endsection