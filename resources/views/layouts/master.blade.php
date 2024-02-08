<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
	<head>
		@include('new-theme.layouts.head')
	</head>
	<body>
		@auth
			@include('new-theme.layouts.header')
			@include('new-theme.layouts.sidebar')
		@endauth
		@yield('content')
		@include('new-theme.layouts.scripts')
  </body>
</html>
