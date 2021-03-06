<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <title>5G Network</title>
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
                <div class="row flex-grow">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div class="auth-form-transparent text-left p-3">
                            <div class="brand-logo d-inline">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <h4 class="d-inline pl-2">5G NETWORK</h4>
                            <form class="pt-3" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail">Tên tài khoản</label>
                                    <div class="input-group">
                                        <input name="username" type="text" class="form-control form-control-lg" id="exampleInputEmail" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Mật khẩu</label>
                                    <div class="input-group">
                                        <input name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword" placeholder="Password" required>                        
                                    </div>
                                </div>
                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <small class="text-danger"> {{ $error }}</small>
                                    @endforeach
                                @endif
                                <div class="my-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="/">Đăng nhập</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Bạn chưa có tài khoản? <a href="register-2.html" class="text-primary">Tạo tài khoản</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 login-half-bg d-flex flex-row">
                    </div>
                </div>
            </div>
        <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</body>
</html>
