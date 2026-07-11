@extends('dashboard.layout.master')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="fs-3 fw-bold">آپلود عکس</h1>
    </div>

    <!-- Posts -->
    <div class="mt-4 ">

        <form action="{{ route('upload-images.post') }}" method="post" enctype="multipart/form-data">
@csrf
            <div class="mb-3">
                <input name="image" type="file" class="form-control">
                <div class="form-text text-danger">
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">ارسال</button>
            </div>
        </form>


        @if (session('result'))
            @php
                $result = session('result');
                // $image = session('image');
            @endphp
            {{-- @dd($result) --}}
            
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-md-5">
                    <h4 class="text-center mb-5 fw-bold shadow-lg text-white py-3" style="border-radius: 12px;border-right: 3px solid #00f0ff;background-color: #1e293b">اطلاعات و مشخصات</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    
                    <div class="alert alert-info">
                        نام شی یا جسم: {{ $result['object_name'] }}
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="alert alert-info">
                        اطمینان: %{{ number_format($result['confidence'] * 100, 0) }}
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-center">

                <div class="col-md-6">
                    <p class="mb-5"> توضیحات: {{ $result['description'] }}</p>
                    <h6 class="lh-lg mb-0"> <strong>تاریخچه:</strong> {{ $result['history'] }}</h6>
                    <br><br><br>
                </div>
                    <div class="col-md-6 text-center">
                        <!-- <div class="col"> -->
                <img src="{{ asset($result['image']) }}" class="w-50 shadow my-5" alt="{{ $result['object_name'] }}">
            <!-- </div> -->
                    </div>
                 </div>
                    @if($result['confidence']>=0)
                    <div class="alert alert-danger">
                        <i class="bi bi-info-circle"></i>
                        در صورت عدم تطابق تصویر با  متن دریافت شده وارد بخش <a class="text-decoration-none" href="{{route('write-images.index')}}">وارد کردن متن مورد نظر</a> شوید
                    </div>
                </div>
            @endif
                <br><br><br>
            </div>
        @endif
    </div>
@endsection
