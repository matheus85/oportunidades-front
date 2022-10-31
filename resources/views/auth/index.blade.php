<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.head')
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="{{url('/')}}" class="h1"><b>Admin</b></a>
                </div>
                <div class="card-body">
                    <form action="{{route('login-post')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @include('layouts.scripts')
    </body>
</html>
