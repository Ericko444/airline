<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/vols') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.vol.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/lieus') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.lieu.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/avions') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.avion.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/categories') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.category.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/categorie-ages') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.categorie-age.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/reservations') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.reservation.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
