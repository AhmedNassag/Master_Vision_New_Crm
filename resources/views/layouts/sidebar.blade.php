
        <!--begin::Sidebar-->
        <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
            <div class="app-sidebar-logo flex-shrink-0 d-none d-md-flex align-items-center px-8" id="kt_app_sidebar_logo">
                <!--begin::Logo-->
                <a href="{{ route('home') }}">
                    <img alt="Logo" src="{{asset('public/new-theme/assets/media/logos/favicon.png') }}" class="h-55px h-lg-75px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
                    <img alt="Logo" src="{{asset('public/new-theme/assets/media/logos/favicon.png') }}" class="h-55px h-lg-75px theme-dark-show" />
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
                <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5 mx-3 h-650px" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
                    <!--begin::Menu-->
                    <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-1" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                        <!--begin:Menu item-->
                        <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                            <!--begin:Home-->
                            <div class="menu-item">
                                <!--Dashboard-->
                                <a class="menu-link" href="{{ route('home') }}">
                                    <span class="menu-icon">
                                        <i class="ki-outline ki-element-11 fs-2"></i>
                                    </span>
                                    <span class="menu-title">{{ trans('main.Dashboard') }}</span>
                                </a>
                            </div>
                        </div>
                        <!--end:Home-->



                        <!--begin:Main Data-->
                        <div class="menu-item pt-2
                        ">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">{{ trans('main.Main Data') }}</span>
                            </div>
                        </div>
                        <!--end:Main Data-->

                        <!--begin:Places-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('admin/country','admin/city','admin/area') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-bank fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Places') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <!--Countries-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/country') ? 'active' : '' }}" href="{{ route('country.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.Countries') }}</span>
                                    </a>
                                </div>
                                <!--Cities-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/city') ? 'active' : '' }}" href="{{ route('city.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.Cities') }}</span>
                                    </a>
                                </div>
                                <!--Areas-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/area') ? 'active' : '' }}" href="{{ route('area.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.Areas') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end:Places-->
                        <!--begin:Contacts Data-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('admin/contactSource','admin/contactCategory') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-address-book fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Contacts Data') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <!--ContactSources-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/contactSource') ? 'active' : '' }}" href="{{ route('contactSource.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.ContactSources') }}</span>
                                    </a>
                                </div>
                                <!--ContactCategories-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/contactCategory') ? 'active' : '' }}" href="{{ route('contactCategory.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.ContactCategories') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end:Contacts Data-->
                        <!--begin:Activities Data-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('admin/activity','admin/subActivity') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-abstract-41 fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Activities Data') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <!--Activities-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/activity') ? 'active' : '' }}" href="{{ route('activity.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.MainActivities') }}</span>
                                    </a>
                                </div>
                                <!--SubActivities-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/subActivity') ? 'active' : '' }}" href="{{ route('subActivity.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.SubActivities') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end:Activities Data-->
                        <!--Industries-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/industry') ? 'active' : '' }}" href="{{ route('industry.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-abstract-25 fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Industries') }}</span>
                            </a>
                        </div>
                        <!--Majors-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/major') ? 'active' : '' }}" href="{{ route('major.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-color-swatch fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Majors') }}</span>
                            </a>
                        </div>
                        <!--JobTitles-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/jobTitle') ? 'active' : '' }}" href="{{ route('jobTitle.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-element-plus fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.JobTitles') }}</span>
                            </a>
                        </div>
                        <!--SavedReplies-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/savedReply') ? 'active' : '' }}" href="{{ route('savedReply.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-message-text-2 fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.SavedReplies') }}</span>
                            </a>
                        </div>
                        <!--EmployeeTargets-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/employeeTarget') ? 'active' : '' }}" href="{{ route('employeeTarget.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-arrow-up fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.EmployeeTargets') }}</span>
                            </a>
                        </div>



                        <!--begin:CRM-->
                        <div class="menu-item pt-2
                        ">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">{{ trans('main.CRM') }}</span>
                            </div>
                        </div>
                        <!--end:CRM-->

                        <!--begin:CRM-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('admin/contact', 'admin/contact/*', 'admin/monthReminders') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-people fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.CRM') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <!--Contacts-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/contact') ? 'active' : '' }}" href="{{ route('contact.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.Contacts') }}</span>
                                    </a>
                                </div>
                                <!--Customer-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/customer') ? 'active' : '' }}" href="{{ route('customer.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.Customers') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end:CRM-->



                        <!--begin:Marketing-->
                        <div class="menu-item pt-2
                        ">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">{{ trans('main.Marketing') }}</span>
                            </div>
                        </div>
                        <!--end:Marketing-->

                        <!--begin:Campaigns-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/campaign') ? 'active' : '' }}" href="{{ route('campaign.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-abstract-28 fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Campaigns') }}</span>
                            </a>
                        </div>
                        <!--end:Campaigns-->
                        <!--begin:PointSettings-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/pointSetting') ? 'active' : '' }}" href="{{ route('pointSetting.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-bucket fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.PointSettings') }}</span>
                            </a>
                        </div>
                        <!--end:PointSettings-->



                        <!--begin:Reports-->
                        <div class="menu-item pt-2
                        ">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">{{ trans('main.Reports') }}</span>
                            </div>
                        </div>
                        <!--end:Reports-->

                        <!--begin:Reports-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('admin/report/meetings','admin/report/meetingsReport*','admin/report/contacts','admin/report/contactsReport*','admin/report/employeeSales','admin/report/employeeSalesReport*','admin/report/branchSales','admin/report/branchSalesReport*','admin/report/activitySales','admin/report/activitySalesReport*') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-abstract-26 fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Reports') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <!--MeetingsReport-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/report/meetings', 'admin/report/meetingsReport*') ? 'active' : '' }}" href="{{ route('report.meetings') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.MeetingsReport') }}</span>
                                    </a>
                                </div>
                                <!--ContactsReport-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/report/contacts', 'admin/report/contactsReport*') ? 'active' : '' }}" href="{{ route('report.contacts') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.ContactsReport') }}</span>
                                    </a>
                                </div>
                                <!--EmployeeSalesReport-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/report/employeeSales','admin/report/employeeSalesReport*') ? 'active' : '' }}" href="{{ route('report.employeeSales') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.EmployeeSalesReport') }}</span>
                                    </a>
                                </div>
                                <!--BranchSalesReport-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/report/branchSales','admin/report/branchSalesReport*') ? 'active' : '' }}" href="{{ route('report.branchSales') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.BranchSalesReport') }}</span>
                                    </a>
                                </div>
                                <!--ActivitySalesReport-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/report/activitySales','admin/report/activitySalesReport*') ? 'active' : '' }}" href="{{ route('report.activitySales') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.ActivitySalesReport') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end:Reports-->



                        <!--begin:Alerts-->
                        <div class="menu-item pt-2
                        ">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">{{ trans('main.Alerts') }}</span>
                            </div>
                        </div>
                        <!--end:Alerts-->

                        <!--begin:Reminders-->
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('admin/todayReminders','admin/monthReminders') ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-call fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Reminders') }}</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <!--todayReminders-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/todayReminders') ? 'active' : '' }}" href="{{ route('todayReminders.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.TodayReminders') }}</span>
                                    </a>
                                </div>
                                <!--monthReminders-->
                                <div class="menu-item">
                                    <a class="menu-link {{ Request::is('admin/monthReminders') ? 'active' : '' }}" href="{{ route('monthReminders.index') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{ trans('main.MonthReminders') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--end:Reminders-->
                        <!--Notifications-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/notification') ? 'active' : '' }}" href="{{ route('notification.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-notification-on fs-1"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Notifications') }}</span>
                            </a>
                        </div>



                        <!--begin:Team-->
                        <div class="menu-item pt-2
                        ">
                            <div class="menu-content">
                                <span class="menu-heading fw-bold text-uppercase fs-7">{{ trans('main.Team') }}</span>
                            </div>
                        </div>
                        <!--end:Team-->

                        <!--begin:Branches-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/branch') ? 'active' : '' }}" href="{{ route('branch.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-element-7 fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Branches') }}</span>
                            </a>
                        </div>
                        <!--end:Branches-->
                        <!--begin:Departments-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/department') ? 'active' : '' }}" href="{{ route('department.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-chart-pie-3 fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Departments') }}</span>
                            </a>
                        </div>
                        <!--end:Departments-->
                        <!--begin:Roles-->
                        <div class="menu-item">
                            <a class="menu-link {{ Request::is('admin/role', 'admin/role/*') ? 'active' : '' }}" href="{{ route('role.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-lock fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Roles') }}</span>
                            </a>
                        </div>
                        <!--end:Roles-->
                        <!--begin:Users-->
                        <div class="menu-item pb-xl-8">
                            <a class="menu-link {{ Request::is('admin/user', 'admin/user/*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                                <span class="menu-icon">
                                    <i class="ki-outline ki-user fs-2"></i>
                                </span>
                                <span class="menu-title">{{ trans('main.Employees') }}</span>
                            </a>
                        </div>
                        <!--end:Users-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::sidebar menu-->

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

