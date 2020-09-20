@extends('layouts.app')

@section('title', '')

@section('sidebar')

@parent

@endsection

@section('content')
<div class="row">
    <div class="col">
        <!--begin::Portlet-->
        <div class="kt-portlet">
				<div class="kt-portlet__head" style="margin-top: 20px;">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Add New Hotel Package
						</h3>
					</div>
				</div>
				<div class="kt-portlet__body card card-custom gutter-b ">
					<form class="form col-md-6">
						<div class="card-body">
							<div class="form-group">
								<label>Package Name</label>
								<input type="text" name="name" id= "name" class="form-control form-control-solid form-controller-solid" placeholder="e.g: Best Holiday Package" value="{{ !empty($model) ? $model->name: '' }}" />
								<input type="hidden" name="id" id= "id" value="{{ !empty($model) ? $model->id: '' }}" />
								<input type="hidden" name="hotel_key" id= "hotel_key" value="{{ !empty($model) ? $model->hotel_id: '' }}" />
							</div>
							<div class="form-group">
								<label>Hotel Name</label>
								<select id="hotel_id" name="hotel_id" class="form-control form-control-solid">
									<option value="">Select Hotel</option>
								</select>
							</div>
							<div class="form-group">
								<label>Price</label>
								<input type="text" name="price" id= "price" class="form-control form-control-solid form-controller-solid" placeholder="e.g: 300" value="{{ !empty($model) ? $model->price: '' }}">
							</div>
							<div class="form-group">
								<label>Duration</label>
								<input type="text" name="duration" id= "duration" class="form-control form-control-solid form-controller-solid" placeholder="e.g: 4 Days 3 Nights" value="{{ !empty($model) ? $model->duration: '' }}">
							</div>
							<div class="form-group">
								<label>Validity Till</label>
								<input type="text" name="validity" id= "validity" class="form-control form-control-solid form-controller-solid" placeholder="e.g: 2020-10-11" value="{{ !empty($model) ? $model->validity: '' }}">
							</div>
							<div class="form-group">
								<label for="exampleTextarea">Description</label>
								<textarea name="description" class="form-control form-control-solid form-controller-solid" rows="3" placeholder="The best holiday package"> {{ !empty($model) ? $model->description: '' }} </textarea>
							</div>
							<div class="form-group">
								<button type="reset" id="kt_package_submit" class="btn btn-primary mr-2">Submit</button>
								<button type="reset" onClick="window.location='/'" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
					</form>
				</div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
	<script src="/assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
	<script src="/assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
	<script src="/assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
	<script src="/assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
	<script src="/assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
   <script src="/assets/js/pages/packages/package-form.js" type="text/javascript"></script>
@endsection