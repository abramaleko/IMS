<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="Abraham Maleko" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Mr kuku Management System" />
	<meta property="og:title" content="Mr kuku Management System" />

	<!-- PAGE TITLE HERE -->
	<title>Verify Email </title>

	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('images/logo.ico')}}" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="mb-3 text-center">
										<a href="/"><img src="{{asset('images/logo.ico')}}" alt="Mr kuku" style="width: 5rem; border-radius:5rem;"></a>
									</div>
                                    <h6 class="mb-4 text-justify text-muted">Hello {{Auth::user()->name}} ,Before getting started, could you verify your email address by clicking on the link we just emailed to you?</h6>
                                    <h6 class="mb-4 text-justify text-muted">If you didn't receive the email, we will gladly send you another.</h6>

                                    @if (session('status') == 'verification-link-sent')
                                     <p class="text-justify text-success">
                                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                     </p>
                                    @endif

                                    <form  method="POST" action="{{ route('verification.send') }}">
                                        @csrf
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Resend Verification Email</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/dlabnav-init.js')}}"></script>

</body>
</html>
