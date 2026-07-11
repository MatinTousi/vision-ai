<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css" integrity="sha384-CfCrinSRH2IR6a4e6fy2q6ioOX7O6Mtm1L9vRvFZ1trBncWmMePhzvafv7oIcWiW" crossorigin="anonymous">
    
    <title>صفحه ایجاد حساب کاربری</title>
</head>
<body>
    @extends('app')
    @section('content')
        
    <div class="container  pb-4" style="padding-top: 120px;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-lg rounded-3 " style="border: 2px solid #000000;">
                    <div class="card-header bg-white text-center py-3" style="border-bottom: 3px solid #000000;">
                        <div class="d-flex flex-column align-items-center">
                            <h4 class="fw-bold mb-0 text-dark p-5"> ایجاد حساب کاربری</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('register.post') }}" method="post">
                            @csrf


                               <div class="mb-3">
                                <label for="nameInput" class="form-label text-dark">نام</label>
                                <input id="nameInput" value="{{ old('name') }}" type="text" name="name"
                                    class="form-control">
                                <div class="form-text text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="emailInput" class="form-label text-dark">ایمیل</label>
                                <input id="emailInput" type="email" value="{{ old('email') }}" name="email"
                                    class="form-control">
                                <div class="form-text text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="passwordInput" class="form-label text-dark">رمز عبور</label>
                                <input id="passwordInput" type="password" name="password" class="form-control">
                                <div class="form-text text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label text-dark">تایید رمز عبور</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control">
                                <div class="form-text text-danger">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2"></div>
                            <button type="submit" class="btn btn-dark w-100 mt-4">ثبت نام</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


</body>
</html>