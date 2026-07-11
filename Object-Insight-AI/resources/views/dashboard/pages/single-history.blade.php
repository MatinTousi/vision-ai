@extends('dashboard.layout.master')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="fs-3 fw-bold">جزئیات</h1>
    </div>

    <!-- Posts -->
    <div class="mt-4 ">


        @if (isset($analyse))
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-md-5">
                    <h4 class="text-center mb-5 fw-bold shadow-lg text-white py-3" style="border-radius: 12px;border-right: 3px solid #00f0ff;background-color: #1e293b">اطلاعات و مشخصات</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    
                    <div class="alert alert-info">
                        نام شی یا جسم: {{ $analyse['object_name'] }}
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="alert alert-info">
                        اطمینان: %{{ number_format($analyse['confidence'] * 100, 0) }}
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-center">

                <div class="col-md-6">
                    <p class="mb-5"> توضیحات: {{ $analyse['description'] }}</p>
                    <h6 class="lh-lg mb-0"> <strong>تاریخچه:</strong> {{ $analyse['history'] }}</h6>
                    <br><br><br>
                </div>
                    <div class="col-md-6 text-center">
                        <!-- <div class="col"> -->
                <img src="{{(is_null($analyse['image']) ?asset('assets/image/شی.jpg') :asset($analyse['image'])) }}" class="w-50 shadow my-5" alt="{{ $analyse['object_name'] }}">
            <!-- </div> -->
                    </div>
                 </div>
                <br><br><br>
            </div>
        @endif



        @if (isset($comparison))
            <div class="row">
             <div class="col-md-6 text-center">
                 <img src="{{ asset($comparison['image_one']) }}" class="w-50 mb-4" alt="{{ $comparison['object_one'] }}">
                 <div class="alert alert-info">
                 شی اول چیست؟
                 {{$comparison['object_one']}}
                </div>
                </div>
                
                <div class="col-md-6 text-center">     
                    <img src="{{ asset($comparison['image_two']) }}" class="w-50 mb-4" alt="{{ $comparison['object_two'] }}">
                    <div class="alert alert-info ">
                        شی دوم چیست؟
                        {{$comparison['object_two']}}
                    </div>
                </div>
        </div>

            <div class="alert alert-success">
                شباهت ها
                {{$comparison['similarities']}}
            </div>

            <div class="alert alert-danger">
                تفاوت ها
                {{$comparison['differences']}}
            </div>
            <p>نتیجه نهایی:
                {{$comparison['comparison_result']}}
            </p>
          
        </div>
        @endif 
    </div>
@endsection
