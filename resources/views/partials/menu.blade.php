<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">

            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">{{ trans('panel.site_title') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.home') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div> {{ trans('global.dashboard') }}</div>
            </a>
        </li>

        {{-- user management --}}
        @can('user_management_access')
            <li
                class="menu-item  {{ request()->is('admin/permissions*') ? 'active open' : '' }} {{ request()->is('admin/roles*') ? 'active open' : '' }} {{ request()->is('admin/users*') ? 'active open' : '' }} {{ request()->is('admin/audit-logs*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="Dashboards">User management</div>
                </a>
                <ul class="menu-sub">
                    @can('permission_access')
                        <li
                            class="menu-item  {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.permissions.index') }}" class="menu-link">
                                <div data-i18n="Analytics"> {{ trans('cruds.permission.title') }}</div>
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li
                            class="menu-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.roles.index') }}" class="menu-link">
                                <div data-i18n="eCommerce"> {{ trans('cruds.role.title') }}</div>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li
                            class="menu-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.users.index') }}" class="menu-link">
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li
                            class="menu-item {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.audit-logs.index') }}" class="menu-link">
                                <div data-i18n="eCommerce"> {{ trans('cruds.auditLog.title') }}</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        {{-- -- zone management --  --}}
        @can('zone_management_access')
            <li
                class="menu-item  {{ request()->is('admin/zones*') ? 'active open' : '' }} {{ request()->is('admin/sub_zones*') ? 'active open' : '' }} {{ request()->is('admin/hotels*') ? 'active open' : '' }} ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bxs-pie-chart-alt-2'></i>
                    <div data-i18n="Dashboards">Zones management</div>
                </a>
                <ul class="menu-sub">
                    @can('zone_access')
                        <li
                            class="menu-item  {{ request()->is('admin/zones') || request()->is('admin/zones/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.zones.index') }}" class="menu-link">
                                {{ trans('cruds.zone.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sub_zone_access')
                        <li
                            class="menu-item {{ request()->is('admin/sub_zones') || request()->is('admin/sub_zones/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.sub_zones.index') }}" class="menu-link">
                                {{ trans('cruds.sub_zone.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        {{-- hotels management  --}}
        @can('hotel_management_access')
            <li
                class="menu-item {{ request()->is('admin/*/hotels') ? 'active open' : '' }}  {{ request()->is('admin/hotels') ? 'active open' : '' }} {{ request()->is('admin/hotels/*') ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class='menu-icon tf-icons bx bxs-building-house'></i>
                    <div data-i18n="Dashboards">Hotels management</div>
                </a>
                <ul class="menu-sub" style="max-height: 200px; overflow-y: scroll;">
                    @can('hotel_access')
                        <li
                            class="menu-item {{ request()->is('admin/hotels') || (request()->is('admin/hotels/*')) || (request()->is('admin/hotels/create') && request()->query('zone') === 'All') ? 'active' : '' }}">
                            <a href="{{ route('admin.hotels.index') }}" class="menu-link">
                                {{ trans('cruds.hotel.title') }}
                            </a>
                        </li>
                        @php
                            $zones = \App\Models\Zone::all();
                        @endphp

                        @foreach ($zones as $zone)
                            <li
                            class="menu-item {{ request()->is('admin/'.$zone->name.'/hotels') || (request()->is('admin/hotels/create') && request()->query('zone') === $zone->slug) ? 'active' : '' }}">
                            <a href="{{ route('admin.hotels.byzone', ['zone' => $zone->name]) }}" class="menu-link">
                                {{ $zone->name }}
                            </a>
                        </li>
                        @endforeach
                    @endcan
                </ul>
            </li>
        @endcan

        {{-- News management  --}}
        @can('news_access')
            <li class="menu-item {{ request()->is('admin') ? 'active' : '' }}">
                <a href="{{ route('admin.news.index') }}" class="menu-link">
                    <i class='menu-icon tf-icons bx bxs-news'></i>
                    <div> {{ trans('cruds.news.title') }}</div>
                </a>
            </li>
        @endcan

        {{-- user alert --}}
        @can('user_alert_access')
            <li
                class="menu-item  {{ request()->is('admin/user-alerts') || request()->is('admin/user-alerts/*') ? 'active' : '' }}">
                <a href="{{ route('admin.user-alerts.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-bell"></i>
                    <div> {{ trans('cruds.userAlert.title') }}</div>
                </a>
            </li>
        @endcan
        {{-- product management --}}
        @can('product_management_access')
            <li
                class="menu-item  {{ request()->is('admin/products*') ? 'open' : '' }} {{ request()->is('admin/categories*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-cart"></i>
                    <div data-i18n="Dashboards">{{ trans('cruds.productManagement.title') }}</div>
                </a>
                <ul class="menu-sub">
                    @can('category_access')
                        <li
                            class="menu-item  {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.categories.index') }}" class="menu-link">
                                <div data-i18n="Analytics"> {{ trans('cruds.category.title') }}</div>
                            </a>
                        </li>
                    @endcan
                    @can('product_access')
                        <li
                            class="menu-item  {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                            <a href="{{ route('admin.products.index') }}" class="menu-link">
                                <div data-i18n="eCommerce"> {{ trans('cruds.product.title') }}</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        {{-- invoice --}}
        @can('invoice_access')
            <li
                class="menu-item {{ request()->is('admin/invoices') || request()->is('admin/invoices/*') ? 'active' : '' }}">
                <a href="{{ route('admin.invoices.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div> {{ trans('cruds.invoice.title') }}</div>
                </a>
            </li>
        @endcan


        {{-- profile password --}}
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li
                    class="menu-item  {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                    <a href="{{ route('profile.password.edit') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-key"></i>
                        <div> {{ trans('global.change_password') }}</div>
                    </a>
                </li>
            @endcan
        @endif

        {{-- logout --}}
        <li class="menu-item d-none">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-key"></i>
                <div> {{ trans('global.logout') }}</div>
            </a>
        </li>

    </ul>
</aside>
