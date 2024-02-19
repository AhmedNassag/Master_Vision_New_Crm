
        <!--begin::Sidebar-->
        <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
            <div class="app-sidebar-logo flex-shrink-0 d-none d-md-flex align-items-center px-8" id="kt_app_sidebar_logo">
                <!--begin::Logo-->
                <a href="{{ route('customer.home') }}">
                    <img alt="Logo" src="{{asset('new-theme/assets/media/logos/favicon.png') }}" class="h-55px h-lg-75px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
                    <img alt="Logo" src="{{asset('new-theme/assets/media/logos/favicon.png') }}" class="h-55px h-lg-75px theme-dark-show" />
                </a>
                <!--end::Logo-->
                <!--begin::Aside toggle-->
                <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                    <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                        <i class="ki-outline ki-abstract-14 fs-1"></i>
                    </div>
                </div>
                <!--end::Aside toggle-->
            </div>
            <!--begin::sidebar menu-->
            <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                <!--begin::Menu wrapper-->
                <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5 mx-3 " data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
                    <!--begin::Menu-->
                    <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-1" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                            <!--begin:Home-->
                            <div class="menu-item">
                                <!--Home-->
                                <a class="menu-link {{ Request::is('portals/customer/home') ? 'active' : '' }}" href="{{ route('customer.home') }}">
                                    <span class="menu-icon">
                                        <i class="ki-outline ki-element-11 fs-2"></i>
                                    </span>
                                    <span class="menu-title">{{ trans('main.Home') }}</span>
                                </a>
                            </div>
                        </div>
                        <!--end:Home-->



                        <!--begin:Main Data-->
                        <div class="menu-item pt-2">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">{{ trans('main.Support Tickets') }}</span>
                            </div>
                        </div>
                        <!--end:Main Data-->
                        
                        <!--Tickets-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('portals/customer/tickets') ? 'active' : '' }}" href="{{ route('customer.tickets') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-color-swatch fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Support Tickets') }} {{ trans('main.Lists') }}</span>
                            </a>
                        </div>
                        <!--SupportTicket-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('portals/customer/tickets/create') ? 'active' : '' }}" href="{{ route('customer.tickets.create') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-element-plus fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Add') }} {{ trans('main.Support Ticket') }}</span>
                            </a>
                        </div>
                        <!--ContactUs-->
                        {{-- <div class="menu-item">
                            <a class="menu-link {{ Request::is('portals/customer/tickets/create') ? 'active' : '' }}" href="{{ route('customer.tickets.create') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-message-text-2 fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.ContactUs') }}</span>
                            </a>
                        </div> --}}



                        <!--begin:Main Data-->
                        {{-- <div class="menu-item pt-2">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">{{ trans('main.Informations') }}</span>
                            </div>
                        </div> --}}
                        <!--end:Main Data-->

                        
                        <!--Projects-->
                        {{-- <div class="menu-item">
                            <a class="menu-link {{ Request::is('portals/customer/home') ? 'active' : '' }}" href="{{ route('customer.home') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-element-7 fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Projects') }}</span>
                            </a>
                        </div> --}}
                        <!--Invoices-->
                        {{-- <div class="menu-item">
                            <a class="menu-link {{ Request::is('portals/customer/home') ? 'active' : '' }}" href="{{ route('customer.home') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-abstract-26 fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Invoices') }}</span>
                            </a>
                        </div> --}}
                        <!--Data-->
                        {{-- <div class="menu-item">
                            <a class="menu-link {{ Request::is('portals/customer/home') ? 'active' : '' }}" href="{{ route('customer.home') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-address-book fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Data') }}</span>
                            </a>
                        </div> --}}
                        
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::sidebar menu-->
            
            <div class="aside-footer flex-column-auto pt-5 pb-7 px-10" id="kt_aside_footer">
                <a href="{{ route('customer.tickets.create') }}" class="btn btn-success w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="" data-bs-original-title="إذا كنت تريد التواصل مع الدعم قم بانشاء تذكرة دعم وسيتم التواصل معك">
                    <span class="btn-label">{{ trans('main.Add') }} {{ trans('main.Support Ticket') }}</span>
                </a>
            </div>

        </div>
        <!--end::Sidebar-->









        <button id="kt_aside_toggle" onclick="handleToggleClick()"
            class="aside-toggle btn btn-sm btn-icon bg-body btn-color-light bg-primary btn-active-primary position-fixed translate-middle start-18 end-100 bottom-0 shadow-sm d-none d-lg-flex mb-5"
            style="z-index: 999;" data-kt-toggle="true" data-kt-toggle-state="active"
            data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            @if(app()->getLocale() == 'en')
                <i class="ki-duotone ki-arrow-left fs-2 rotate-180">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            @else
                <i class="ki-duotone ki-arrow-right fs-2 rotate-180">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            @endif
        </button>

