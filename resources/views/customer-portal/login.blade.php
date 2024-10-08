<!DOCTYPE html>
<html lang="en">
	<head>
        <base href="../../../" />
		<title>Our CRM</title>
		<meta charset="utf-8" />
		<meta name="description" content="Master Vision CRM" />
		<meta name="keywords" content="Master Vision CRM" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Our CRM" />
		<meta property="og:url" content="https://keenthemes.com/Master Vision" />
		<meta property="og:site_name" content="Master Vision" />
		<link rel="canonical" href="https://preview.keenthemes.com/Master Vision8" />
		<link rel="shortcut icon" href="{{ asset('new-theme/assets/media/logos/favicon.png') }}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<link href="{{ asset('new-theme/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('new-theme/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('new-theme/assets/css/font.css') }}" rel="stylesheet" type="text/css" />
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<style>body { background-image: url('public/new-theme/assets/media/auth/bg10.jpeg'); } [data-bs-theme="dark"] body { background-image: url('public/new-theme/assets/media/auth/bg10-dark.jpeg'); }</style>
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-lg-row-fluid">
					<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
						<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('new-theme/assets/media/auth/agency.png') }}" alt="" />
						<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('new-theme/assets/media/auth/agency-dark.png') }}" alt="" />
						<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                            {{ trans('main.Watch for opportunities') }} .. {{ trans('main.Make sales') }} .. {{ trans('main.Double your profits') }}
                        </h1>
						<div class="text-gray-600 fs-base text-center fw-semibold">أسهل وأسرع نظام لإدارة علاقات العملاء، الآن يمكنك تحويل مقابل إعلاناتك من مصروف إلي إستثمار
						<br />من خلال إدارة كاملة للعملاء المحتملين وسهولة تحويلهم لعملاء فعليين
						مع إعادة إستهدافهم أكثر من مرة وعلى أكثر من نشاط أو خدمة
                        </div>
					</div>
				</div>
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
						<div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                            <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px" src="{{ asset('new-theme/assets/media/logos/favicon.png') }}" alt="" />
							<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                                <!-- validationNotify -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @php
                                    $expire_date = \App\Models\LAConfigs::where('key','end_date')->first();
                                    if($expire_date)
                                    {
                                        $end_date = \Carbon\Carbon::parse($expire_date->value);
                                    }   
                                    $now = \Carbon\Carbon::now();
                                @endphp
                                @if($expire_date)
                                    @if($end_date < $now)
                                        <div class="alert alert-danger w-100 text-center">
                                            {{ trans('main.You Have Expired From:') }} {{ $end_date->format('d-m-Y') }}
                                        </div>
                                    @endif
                                @endif
								<!--begin::Form-->
								<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{ route('customer.home') }}" action="{{ route('customer.login') }}">
									<div class="text-center mb-11">
										<h1 class="text-gray-900 fw-bolder mb-3">{{ trans('main.Login') }}</h1>
                                        @if ($errors->any())
                                            <div class="alert alert-danger text-right" dir="rtl">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li style="text-align:right">{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
									</div>
									<div class="fv-row mb-8">
										<!--begin::Email-->
                                        <input class="form-control bg-transparent" type="text" name="email" placeholder="{{ trans('main.Email') }}" autocomplete="off" />
                                        <!--end::Email-->
									</div>
									<div class="fv-row mb-3">
										<!--begin::Password-->
                                        <input class="form-control bg-transparent" type="password" name="password" placeholder="{{ trans('main.Password') }}" autocomplete="off" />
										<!--end::Password-->
									</div>
									<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-5"></div>
									<!--begin::Submit button-->
									<div class="d-grid mb-10">
										<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
											<span class="indicator-label">{{ trans('main.Login') }}</span>
											<span class="indicator-progress">
                                                {{ trans('main.Please wait') }}...
											    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
										</button>
									</div>

                                    <a href="{{ route('admin.login') }}" style="font-weight: bold; font-size:15px;">
                                        <span class="indicator-label">{{ trans('main.To') }} {{ trans('main.Login As Admin') }}</span>
                                        <span class="indicator-progress">
                                            {{ trans('main.Please wait') }}...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </a>
									<!--end::Submit button-->
								</form>
								<!--end::Form-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>var hostUrl = "{{ asset('new-theme/assets/') }}";</script>
		<script src="{{ asset('new-theme/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('new-theme/assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('new-theme/assets/js/custom/authentication/sign-in/general.js') }}"></script>
	</body>
</html>
