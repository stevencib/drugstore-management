@extends('layouts.app')

@push('page-css')
	<!-- Select2 css-->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">{{__(trans('sidebar.suppliers'))}}</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__(trans('dashboard.dashboard'))}}</a></li>
		<li class="breadcrumb-item active">{{__(trans('fournisseur.supplier'))}}</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="{{route('add-supplier')}}" class="btn btn-primary float-right mt-2">{{__(trans('fournisseur.add_new'))}}</a>
</div>
@endpush

@section('content')
<div class="row">
	<div class="col-md-12">
	
		<!-- Suppliers -->
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable-export" class="table table-hover table-center mb-0">
						<thead>
							<tr>
								<th>{{__(trans('fournisseur.name'))}}</th>
								<th>{{__(trans('fournisseur.phone'))}}</th>
								<th>{{__(trans('fournisseur.email'))}}</th>
								<th>{{__(trans('fournisseur.address'))}}</th>
								<th>{{__(trans('fournisseur.company'))}}</th>
								<th>{{__(trans('fournisseur.product'))}}</th>
								<th class="action-btn">{{__(trans('fournisseur.action')) }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($suppliers as $supplier)
							<tr>
								<td>{{$supplier->name}}</td>
								<td>{{$supplier->phone}}</td>
								<td>{{$supplier->email}}</td>
								<td>{{$supplier->address}}</td>
								<td>{{$supplier->company}}</td>
								<td>{{$supplier->product}}</td>
								<td>
									<div class="actions">
										<a class="btn btn-sm bg-success-light" href="{{ route('edit-supplier', [$supplier->id]) }}">
											<i class="fe fe-pencil"></i>{{__(trans('category.edit')) }}
										</a>
										<a data-id="{{ $supplier->id }}" href="javascript:void(0);" class="btn btn-sm bg-danger-light deletebtn" data-toggle="modal">
											<i class="fe fe-trash"></i>{{__(trans('category.delete')) }}
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
		<!-- /Suppliers-->
		
	</div>
</div>
<!-- Delete Modal -->
<x-modals.delete :route="'suppliers'" :title="'Supplier'" />
<!-- /Delete Modal -->
@endsection	

@push('page-js')
	<!-- Select2 js-->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush

