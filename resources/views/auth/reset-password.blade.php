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
	<title>Change Password </title>

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
                                    <h4 class="mb-4 text-center">Reset Password</h4>

                                        <!-- Validation Errors -->
                                        @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            @foreach ($errors->all() as $error)
                                            <span class="mb-1 d-block">
                                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                               <strong>Error!</strong> {{ $error }}.
                                               </span>
                                            @endforeach
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                            </button>
                                        </div>
                                        @endif

                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <!-- Password Reset Token -->
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control solid" name="email" required value="{{old('email', $request->email)}}" required autofocus>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control solid" placeholder="Password" name="password" required >
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Confirm Password</strong></label>
                                            <input type="password" class="form-control solid" placeholder="Confirm Password" name="password_confirmation" required >
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
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
