@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-7 col-auto">
	<h3 class="page-title">{{__(trans('sidebar.backups'))}}</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__(trans('dashboard.dashboard'))}}</a></li>
		<li class="breadcrumb-item active">{{__(trans('backup.app_backups'))}}</li>
	</ul>
</div>
<div class="col-sm-5 col">
    <form action="{{route('backup.store')}}" method="post">
        @csrf
        @method("PUT")
        <button class="btn btn-primary float-right mt-2" type="submit">{{__(trans('backup.create_backup'))}}</button>
    </form>
	{{-- <a href="#add_categories" data-toggle="modal" class="btn btn-primary float-right mt-2">{{__(trans('backup.add_category'))}}</a> --}}
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
                                <th>{{__(trans('backup.id'))}}</th>
                                <th>{{__(trans('backup.disk'))}}</th>
                                <th>{{__(trans('backup.backup_date'))}}</th>
                                <th>{{__(trans('backup.file_size'))}}</th>
								<th class="text-center action-btn">{{__(trans('backup.actions'))}}</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($backups as $k => $b)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $b['disk'] }}</td>
                                <td>{{ \Carbon\Carbon::createFromTimeStamp($b['last_modified'])->formatLocalized('%d %B %Y, %H:%M') }}</td>
                                <td>{{ round((int)$b['file_size']/1048576, 2).' MB' }}</td>
                                <td class="text-center">
                                    <div class="actions">
                                        @if ($b['download'])
                                        <a class="float-left" href="{{ route('backup.download') }}?disk={{ $b['disk'] }}&path={{ urlencode($b['file_path']) }}&file_name={{ urlencode($b['file_name']) }}">
                                            <button title="download backup" class="btn btn-sm bg-success-light" >
                                                <i class="fe fe-download"></i>{{__(trans('backup.download'))}}
                                            </button>
                                        </a>
                                        @endif
                                        <form action="{{route('backup.destroy',$b['file_name'])}}?disk={{ $b['disk'] }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button title="delete backup" class="btn btn-sm bg-danger-light deletebtn" type="submit">
                                                <i class="fe fe-trash"></i> {{__(trans('category.delete'))}}
                                            </button>
                                        </form>
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
