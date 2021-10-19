@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">{{__(trans('sidebar.categories'))}}</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__(trans('dashboard.dashboard'))}}</a></li>
		<li class="breadcrumb-item active">{{__(trans('sidebar.categories'))}}</li>
	</ul>
</div>
<div class="col-sm-5 col">
	<a href="#add_categories" data-toggle="modal" class="btn btn-primary float-right mt-2">{{__(trans('category.add_category'))}}</a>
</div>
@endpush
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="category-table" class="datatable table table-striped table-bordered table-hover table-center mb-0">
						<thead>
							<tr style="boder:1px solid black;">
								<th>{{__(trans('category.name'))}}</th>
								<th>{{__(trans('category.created_date'))}}</th>
								<th class="text-center action-btn">{{__(trans('category.actions'))}}</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $category)
							<tr>								
								<td>
									<h2 class="table-avatar">	
										{{$category->name}}
									</h2>
								</td>
								
								<td>{{date_format(date_create($category->created_at),"d M,Y")}}</td>

								<td class="text-center">
									<div class="actions">
										<a data-id="{{$category->id}}" data-description="{{$category->description}}" data-name="{{$category->name}}" class="btn btn-sm bg-success-light editbtn " data-toggle="modal" href="javascript:void(0)">
											<i class="fe fe-pencil"></i>{{__(trans('category.edit'))}}
										</a>
										<a data-id="{{$category->id}}" data-toggle="modal" href="javascript:void(0)" class="btn btn-sm bg-danger-light deletebtn">
											<i class="fe fe-trash"></i>{{ __(trans('category.delete'))}}
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
	</div>			
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_categories" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{__(trans('category.add_category'))}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{route('categories')}}">
					@csrf
					<div class="row form-row">
						<div class="col-12">
							<div class="form-group">
								<label>{{__(trans('category.category'))}}</label>
								<input type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label for="description">{{__(trans('category.description'))}}</label>
								<textarea name="description" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">{{__(trans('category.save'))}}</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /ADD Modal -->

<!-- Edit Details Modal -->
<div class="modal fade" id="edit_category" aria-hidden="true" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{__(trans('category.edit_category'))}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="{{route('categories')}}">
					@csrf
					@method("PUT")
					<div class="row form-row">
						<div class="col-12">
							<input type="hidden" name="id" id="edit_id">
							<div class="form-group">
								<label>{{__(trans("category.category"))}}</label>
								<input type="text" class="form-control edit_name" name="name">
							</div>
							<div class="form-group">
								<label for="description">{{__(trans('category.description'))}}</label>
								<textarea name="description" id="description" class="form-control edit_description"></textarea>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary btn-block">{{__(trans('category.save_changes'))}}</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Edit Details Modal -->

<!-- Delete Modal -->
<x-modals.delete :route="'categories'" :title="'Category'" />
<!-- /Delete Modal -->
@endsection


@push('page-js')
<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('#category-table').on('click','.editbtn',function (){
				event.preventDefault();
				jQuery.noConflict();
				$('#edit_category').modal('show');
				var id = $(this).data('id');
				var name = $(this).data('name');
				$('#edit_id').val(id);
				$('.edit_name').val(name);
			});
			//
		});
	</script>
	
@endpush
