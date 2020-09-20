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
							Hotel Package Detail
						</h3>
					</div>
            </div>
				<div class="kt-portlet__body card card-custom gutter-b ">
               <div class="portlet blue-hoki box">
                  <div class="portlet-body">
                     <div class="row static-info">
                        <div class="col-md-2 name"> Package Name: </div>
                        <div class="col-md-7 value"> {{ $model->name }} </div>
                     </div>
                     <div class="row static-info">
                        <div class="col-md-2 name"> Hotel Name: </div>
                        <div class="col-md-7 value">{{  $model->hotel->name }} </div>
                     </div>
                     <div class="row static-info">
                        <div class="col-md-2 name"> Price: </div>
                        <div class="col-md-7 value">{{  $model->price }} RM </div>
                     </div>
                     <div class="row static-info">
                        <div class="col-md-2 name"> Duration: </div>
                        <div class="col-md-7 value">{{ $model->duration }} </div>
                     </div>
                     <div class="row static-info">
                        <div class="col-md-2 name"> Valid Till: </div>
                        <div class="col-md-7 value"> {{ $model->validity }} </div>
                     </div>
                     <div class="row">
                        <div class="col-md-2 name">Description: </div>
                        <div class="col-md-7 value"> {{ $model->description }} </div>
                     </div> 
                  </div>
               </div>
				</div>
        </div>
    </div>
</div>
@endsection