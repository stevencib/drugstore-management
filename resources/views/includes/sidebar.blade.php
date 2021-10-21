<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title"> 
					<h4>{{__('sidebar.main')}}</h4>
				</li>
				<li class="{{ route_is('dashboard') ? 'active' : '' }}"> 
					<a href="{{route('dashboard')}}"><i class="fe fe-home"></i> <span>{{__(trans('dashboard.dashboard'))}}</span></a>
				</li>
				
				@can('view-category')
				<li class="{{ route_is('categories') ? 'active' : '' }}"> 
					<a href="{{route('categories')}}"><i class="fe fe-layout"></i> <span>{{__(trans('sidebar.categories'))}}</span></a>
				</li>
				@endcan
				
				@can('view-products')
				<li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span>{{__(trans('sidebar.products'))}}</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						@can('view-products')<li><a class="{{ route_is(('products')) ? 'active' : '' }}" href="{{route('products')}}">{{__(trans('sidebar.products'))}}</a></li>@endcan
						@can('create-product')<li><a class="{{ route_is('add-product') ? 'active' : '' }}" href="{{route('add-product')}}">{{__(trans('sidebar.add_product'))}}</a></li>@endcan
						@can('view-outstock-products')<li><a class="{{ route_is('outstock') ? 'active' : '' }}" href="{{route('outstock')}}">{{__(trans('sidebar.out_stock'))}}</a></li>@endcan
						@can('view-expired-products')<li><a class="{{ route_is('expired') ? 'active' : '' }}" href="{{route('expired')}}">{{__(trans('sidebar.expired'))}}</a></li>@endcan
					</ul>
				</li>
				@endcan
				
				@can('view-purchase')
				<li class="submenu">
					<a href="#"><i class="fe fe-star-o"></i> <span> {{__(trans('sidebar.purchase'))}}</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="{{ route_is('purchases') ? 'active' : '' }}" href="{{route('purchases')}}">{{__(trans('sidebar.purchase'))}}</a></li>
						@can('create-purchase')
						<li><a class="{{ route_is('add-purchase') ? 'active' : '' }}" href="{{route('add-purchase')}}">{{__(trans('sidebar.add_purchase'))}}</a></li>
						@endcan
					</ul>
				</li>
				@endcan
				@can('view-sales')
				<li><a class="{{ route_is('sales') ? 'active' : '' }}" href="{{route('sales')}}"><i class="fe fe-activity"></i> <span>{{__(trans('sidebar.sales'))}}</span></a></li>
				@endcan
				@can('view-supplier')
				<li class="submenu">
					<a href="#"><i class="fe fe-user"></i> <span> {{__(trans('sidebar.suppliers'))}}</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="{{ route_is('suppliers') ? 'active' : '' }}" href="{{route('suppliers')}}">{{__(trans('sidebar.suppliers'))}}</a></li>
						@can('create-supplier')<li><a class="{{ route_is('add-supplier') ? 'active' : '' }}" href="{{route('add-supplier')}}">{{__(trans('sidebar.add_supplier'))}}</a></li>@endcan
					</ul>
				</li>
				@endcan

				@can('view-reports')
				<li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span> {{__(trans('sidebar.reports'))}}</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="{{ route_is('reports') ? 'active' : '' }}" href="{{route('reports')}}">{{__(trans('sidebar.reports'))}}</a></li>
					</ul>
				</li>
				@endcan
				@can('view-access-control')
				<li class="submenu">
					<a href="#"><i class="fe fe-lock"></i> <span> {{__(trans('sidebar.access_control'))}}</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						@can('view-permission')
						<li><a class="{{ route_is('permissions') ? 'active' : '' }}" href="{{route('permissions')}}">{{__(trans('sidebar.permissions'))}}</a></li>
						@endcan
						@can('view-role')
						<li><a class="{{ route_is('roles') ? 'active' : '' }}" href="{{route('roles')}}">{{__(trans('sidebar.roles'))}}</a></li>
						@endcan
					</ul>
				</li>					
				@endcan

				@can('view-users')
				<li class="{{ route_is('users') ? 'active' : '' }}"> 
					<a href="{{route('users')}}"><i class="fe fe-users"></i> <span>{{__(trans('sidebar.users'))}}</span></a>
				</li>
				@endcan
				
				<li class="{{ route_is('profile') ? 'active' : '' }}"> 
					<a href="{{route('profile')}}"><i class="fe fe-user-plus"></i> <span>{{__(trans('sidebar.profile'))}}</span></a>
				</li>
				<li class="{{ route_is('backup.index') ? 'active' : '' }}"> 
					<a href="{{route('backup.index')}}"><i class="material-icons">backup</i> <span>{{__(trans('sidebar.backups'))}}</span></a>
				</li>
				<li class="submenu">
					<a href="#"><i class="fas fa-globe"></i><span>{{__(trans('sidebar.language'))}}</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a class="{{ (session()->get('lang') == 'fr') ? 'active' : '' }}" href="{{route('lang', ['lang' => 'fr'])}}"><img src="{{asset('assets/img/icons/fr.png')}}" class="mr-1"/>{{__(trans('sidebar.french'))}}</a></li>
						<li><a class="{{ (session()->get('lang') == 'en') ? 'active' : '' }}" href="{{route('lang', ['lang' => 'en'])}}"><img src="{{asset('assets/img/icons/gb.png')}}" class="mr-1"/>{{__(trans('sidebar.english'))}}</a></li>
					</ul>
				</li>
				@can('view-settings')
				<li class="{{ route_is('settings') ? 'active' : '' }}"> 
					<a href="{{route('settings')}}">
						<i class="fa fa-gears mr-1"></i>
						 <span>{{__(trans('sidebar.settings'))}}</span>
					</a>
				</li>
				@endcan
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->