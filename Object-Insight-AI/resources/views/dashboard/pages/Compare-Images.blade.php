@extends('dashboard.layout.master')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="fs-3 fw-bold">مقایسه تصاویر</h1>
    </div>

    <!-- Posts -->
    <div class="mt-4 ">

        <form action="{{ route('compare-images.post') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="imageOne" class="form-label">عکس اول</label>
            <input name="imageOne" id="imageOne" type="file" class="form-control">
             <div class="form-text text-danger">
                    @error('imageOne')
                        {{ $message }}
                    @enderror
                </div>
        </div>


        <div class="mb-3">
            <label for="imageTwo" class="form-label">عکس دوم</label>
            <input name="imageTwo" id="imageTwo" type="file" class="form-control">
             <div class="form-text text-danger">
                    @error('imageTwo')
                        {{ $message }}
                    @enderror
                </div>
        </div>


        <div class="mb-3">
            <button class="btn btn-primary" type="submit">مقایسه</button>
        </div>
      </form>

         @if (session('compare')) 
         @php
          $compare = session('compare')
         @endphp
         
         
         <div class="row">
             <div class="col-md-6 text-center">
                 <img src="{{ asset($compare['image_one']) }}" class="w-50 mb-4" alt="{{ $compare['object_one'] }}">
                 <div class="alert alert-info">
                 شی اول چیست؟
                 {{$compare['object_one']}}
                </div>
                </div>
                
                <div class="col-md-6 text-center">     
                    <img src="{{ asset($compare['image_two']) }}" class="w-50 mb-4" alt="{{ $compare['object_two'] }}">
                    <div class="alert alert-info ">
                        شی دوم چیست؟
                        {{$compare['object_two']}}
                    </div>
                </div>
        </div>

            <div class="alert alert-success">
                شباهت ها
                {{$compare['similarities']}}
            </div>

            <div class="alert alert-danger">
                تفاوت ها
                {{$compare['differences']}}
            </div>
            <p>نتیجه نهایی:
                {{$compare['comparison_result']}}
            </p>
          
        </div>
        @endif 
    </div>
@endsection
