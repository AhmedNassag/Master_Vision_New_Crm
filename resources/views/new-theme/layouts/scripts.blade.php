<!--begin::Javascript-->
<script>var hostUrl = "{{ asset('public/new-theme/assets/') }}";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('public/new-theme/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('public/new-theme/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('public/new-theme/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('public/new-theme/assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
<script src="{{ asset('public/new-theme/assets/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
<script src="{{ asset('public/new-theme/assets/js/custom/apps/user-management/users/list/add.js') }}"></script>
<script src="{{ asset('public/new-theme/assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('public/new-theme/assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('public/new-theme/assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('public/new-theme/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('public/new-theme/assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
<script src="{{ asset('public/new-theme/assets/js/custom/utilities/modals/users-search.js') }}"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->


@yield('scripts')
