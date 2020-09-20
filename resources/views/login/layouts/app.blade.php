<!DOCTYPE html>

<html lang="en">
	<!-- begin::Head -->
	<head>
		<!--end::Base Path -->
		<meta charset="utf-8" />
      <title>Login</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
		<link href="./assets/css/pages/login/login-4.css" rel="stylesheet" type="text/css" />
		<link href="./assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="./assets/media/logos/favicon.ico" />
	</head>
	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
      @yield('content')
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>
		<script src="/assets/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="/assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
		<script src="/assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
		<script src="/assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
		<script src="/assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
		<script src="./assets/js/scripts.bundle.js" type="text/javascript"></script>
      <script>
			$.ajaxSetup({
					beforeSend: function (xhr, settings) {
						xhr.setRequestHeader("X-CSRF-Token", "{{csrf_token()}}");
					}
			});
      </script>
      @yield('page-script')
	</body>
</html>