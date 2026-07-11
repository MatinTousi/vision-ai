@extends('dashboard.layout.master')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="fs-3 fw-bold">آپلود متن</h1>
    </div>

    <!-- Posts -->
    <div class="mt-4 ">

        <form action="{{ route('write-images.post') }}" method="post">
        @csrf
            <div class="mb-3">
                <textarea name="text" type="file" class="form-control overflow-auto" rows="4" cols="50"></textarea>
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
            <div class="col">
                <div class="alert alert-info">
                    نام شی یا جسم: {{ $result['object_name'] }}
                </div>

                <!-- <div class="alert alert-primary">
                    اطمینان: {{ number_format($result['confidence'] * 100, 0) }}
                </div> -->
                <p> توضیحات: {{ $result['description'] }}</p>
                <h5 class="lh-lg mb-0"> <strong>تاریخچه:</strong> {{ $result['history'] }}</h5>
              <br><br><br><br><br>
            </div>
        @endif
    </div>
@endsection
