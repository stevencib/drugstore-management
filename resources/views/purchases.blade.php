@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">{{__(trans('sidebar.purchase')) }}</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__(trans('dashboard.dashboard'))}}</a></li>
		<li class="breadcrumb-item active">{{__(trans('sidebar.purchase')) }}</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="{{route('add-purchase')}}" class="btn btn-primary float-right mt-2">{{__(trans('product.add_new'))}}</a>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">
	
		<!-- Recent Orders -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>{{__(trans('purchases.medecine_name'))}}</th>
								<th>{{__(trans('purchases.medicine_category'))}}</th>
								<th>{{__(trans('purchases.purchase_price'))}}</th>
								<th>{{__(trans('purchases.quantity'))}}</th>
								<th>{{__(trans('purchases.supplier'))}}</th>
								<th>{{__(trans('purchases.expire_date'))}}</th>
								<th class="action-btn">{{__(trans('purchases.action'))}}</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($purchases as $purchase)
							<tr>
								<td>
									<h2 class="table-avatar">
										@if(!empty($purchase->image))
										<span class="avatar avatar-sm mr-2">
											<img class="avatar-img" src="{{asset('storage/purchases/'.$purchase->image)}}" alt="product image">
										</span>
										@endif
										{{$purchase->name}}
									</h2>
								</td>
								<td>{{$purchase->category->name}}</td>
								<td>{{AppSettings::get('app_currency', '$')}}{{$purchase->price}}</td>
								<td>{{$purchase->quantity}}</td>
								<td>{{$purchase->supplier->name}}</td>
								<td>{{date_format(date_create($purchase->expiry_date),"d M, Y")}}</td>
								<td>
									<div class="actions">
										<a class="btn btn-sm bg-success-light" href="{{route('edit-purchase',$purchase)}}">
											<i class="fe fe-pencil"></i>{{__(trans('category.edit'))}}
										</a>
										<a data-id="{{$purchase->id}}" href="javascript:void(0);" class="btn btn-sm bg-danger-light deletebtn" data-toggle="modal">
											<i class="fe fe-trash"></i>{{__(trans('category.delete'))}}
										</a>
									</div>
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /Recent Orders -->
		
	</div>
</div>
<!-- Delete Modal -->
<x-modals.delete :route="'purchases'" :title="'Purchase'" />
<!-- /Delete Modal -->
@endsection

@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush

