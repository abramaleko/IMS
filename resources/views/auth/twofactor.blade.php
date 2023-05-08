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
	<title>Two Factor Authentication </title>

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
                                    <h6 class="mb-4 text-justify text-muted">
                                        Hello {{Auth::user()->name}}, You have received an email which contains two factor login code.
                                        If you haven't received it, press <a class="text-success "
                                        href="{{ route('verify.resend') }}">here</a>.
                                    </h6>

                                        @if(session()->has('message'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                            {{ session()->get('message') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                            </button>
                                        </div>
                                        @endif

                                    <form method="POST" action="{{ route('verify.store') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Enter Code</strong></label>
                                            {{-- <input type="text" class="form-control" name="two_factor_code" required > --}}
                                            <input name="two_factor_code" type="text" class="form-control solid" required autofocus placeholder="Two Factor Code">
                                            @if($errors->has('two_factor_code'))
                                                <span class="text-danger fw-bold">{{ $errors->first('two_factor_code') }}</span>
                                             @endif
                                        </div>
                                        <div class="justify-between d-flex">
                                            <button type="submit" class="btn btn-primary btn-block">Verify</button>

                                            <a href="{{route('logout')}}" class="btn btn-secondary btn-block"
                                            style="margin-left:35px;" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Log Out
                                        </a>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                        @csrf
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
