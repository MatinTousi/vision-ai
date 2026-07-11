@extends('dashboard.layout.master')
@section('content')
    <div class="container py-5">

        <h3 class="mb-4 fw-bold">تاریخچه</h3>

        <!-- Tabs -->
        <ul class="nav nav-pills mb-4">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'history.index' ? 'active' : '' }}"
                    href="{{ route('history.index') }}">امروز</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'history.yesterday' ? 'active' : '' }}"
                    href="{{ route('history.yesterday') }}">دیروز</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'history.week' ? 'active' : '' }}"
                    href="{{ route('history.week') }}">این
                    هفته</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'history.all' ? 'active' : '' }}"
                    href="{{ route('history.all') }}">همه</a>
            </li>
        </ul>

        <!-- History Cards -->
        <div class="row g-3">

            <!-- Today -->
            @if (Route::currentRouteName() == 'history.index')
                @php
                    $todayObjects = $object_analayses->filter(fn($item) => $item->created_at->isToday());
                    $todayComparisons = $comparisons->filter(fn($item) => $item->created_at->isToday());
                @endphp

                @if ($todayObjects->isEmpty() && $todayComparisons->isEmpty())
                    <div class="col-md-4 text-center">
                        <div class="alert alert-danger">
                            امروز شما سوالی نکردید
                        </div>
                    </div>
                @else
                    @foreach ($todayObjects as $object)
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="{{ (is_null($object->image) ?asset('assets/image/شی.jpg') :asset($object->image)) }}" class="card-img-top" style="height:220px; object-fit:cover;"
                                    alt="{{ $object->object_name }}">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $object->object_name }}</h5>
                                    <p class="card-text">{{ str($object->description)->limit(25) }}</p>
                                    <span
                                        class="badge bg-success">{{ number_format($object->confidence * 100, 0) }}%</span>
                                    <a href="{{ route('history.single.object', ['analyse' => $object->id]) }}"
                                        class="ms-5 text-decoration-none">دیدن جزئیات</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($todayComparisons as $comparison)
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="{{ asset($comparison->image_one) }}" class="card-img-top"
                                    style="height:220px; object-fit:cover;" alt="{{ $comparison->object_one }}">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $comparison->object_one }}</h5>
                                    <p class="card-text">{{ str($comparison->comparison_result)->limit(25) }}</p>
                                     <a href="{{ route('history.single.comparison', ['comparison' => $comparison->id]) }}"
                                    class="ms-5 text-decoration-none">دیدن جزئیات</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif







            {{-- item Yesterday --}}

            @if (Route::currentRouteName() == 'history.yesterday')
                @php
                    $yesterdayObjects = $object_analayses->filter(fn($item) => $item->created_at->isYesterday());
                    $yesterdayComparisons = $comparisons->filter(fn($item) => $item->created_at->isYesterday());
                @endphp

                @if ($yesterdayObjects->isEmpty() && $yesterdayComparisons->isEmpty())
                    <div class="col-md-4 text-center">
                        <div class="alert alert-danger">
                            دیروز شما سوالی نکردید
                        </div>
                    </div>
                @else
                    @foreach ($yesterdayObjects as $object)
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="{{ (is_null($object->image) ?asset('assets/image/شی.jpg') :asset($object->image)) }}" class="card-img-top"
                                    style="height:220px; object-fit:cover;" alt="{{ $object->object_name }}">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $object->object_name }}</h5>
                                    <p class="card-text">{{ str($object->description)->limit(25) }}</p>
                                    <span
                                        class="badge bg-success">{{ number_format($object->confidence, 0) * 100 }}%</span>
                                    <a href="{{ route('history.single.object', ['analyse' => $object->id]) }}"
                                        class="ms-5 text-decoration-none">دیدن جزئیات</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    @foreach ($yesterdayComparisons as $comparison)
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="{{ asset($comparison->image_one) }}" class="card-img-top"
                                    style="height:220px; object-fit:cover;" alt="{{ $comparison->object_one }}">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $comparison->object_one }}</h5>
                                    <p class="card-text">{{ str($comparison->comparison_result)->limit(25) }}</p>
                                     <a href="{{ route('history.single.comparison', ['comparison' => $comparison->id]) }}"
                                    class="ms-5 text-decoration-none">دیدن جزئیات</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif







            {{-- item Week --}}

            @if (Route::currentRouteName() == 'history.week')
                @php
                    $weekObjects = $object_analayses->filter(fn($item) => $item->created_at->isCurrentWeek());
                    $weekComparisons = $comparisons->filter(fn($item) => $item->created_at->isCurrentWeek());
                @endphp

                @if ($weekObjects->isEmpty() && $weekComparisons->isEmpty())
                    <div class="col-md-4 text-center">
                        <div class="alert alert-danger">
                            این هفته شما سوالی نکردید
                        </div>
                    </div>
                @else
                    @foreach ($weekObjects as $object)
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="{{ (is_null($object->image) ?asset('assets/image/شی.jpg') :asset($object->image)) }}" class="card-img-top"
                                    style="height:220px; object-fit:cover;" alt="{{ $object->object_name }}">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $object->object_name }}</h5>
                                    <p class="card-text">{{ str($object->description)->limit(25) }}</p>
                                    <span class="badge bg-success">{{ number_format($object->confidence, 0) }}%</span>
                                    <a href="{{ route('history.single.object', ['analyse' => $object->id]) }}"
                                        class="ms-5 text-decoration-none">دیدن جزئیات</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    @foreach ($weekComparisons as $comparison)
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="{{ asset($comparison->image_one) }}" class="card-img-top"
                                    style="height:220px; object-fit:cover;" alt="{{ $comparison->object_one }}">

                                <div class="card-body">
                                    <h5 class="card-title">{{ $comparison->object_one }}</h5>
                                    <p class="card-text">{{ str($comparison->comparison_result)->limit(25) }}</p>
                                     <a href="{{ route('history.single.comparison', ['comparison' => $comparison->id]) }}"
                                    class="ms-5 text-decoration-none">دیدن جزئیات</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endif



            {{-- item All --}}

            @if (Route::currentRouteName() == 'history.all')
                @foreach ($object_analayses as $object)
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <img src="{{ (is_null($object->image) ?asset('assets/image/شی.jpg') :asset($object->image)) }}" class="card-img-top" style="height:220px; object-fit:cover;"
                                alt="{{ $object->object_name }}">

                            <div class="card-body">
                                <h5 class="card-title">{{ $object->object_name }}</h5>
                                <p class="card-text">{{ str($object->description)->limit(25) }}</p>
                                <span class="badge bg-success">{{ number_format($object->confidence, 0) * 100 }}%</span>
                                <a href="{{ route('history.single.object', ['analyse' => $object->id]) }}"
                                    class="ms-5 text-decoration-none">دیدن جزئیات</a>
                            </div>
                        </div>
                    </div>
                @endforeach


                @foreach ($comparisons as $comparison)
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset($comparison->image_one) }}" class="card-img-top"
                                style="height:220px; object-fit:cover;" alt="{{ $comparison->object_one }}">

                            <div class="card-body">
                                <h5 class="card-title">{{ $comparison->object_one }}</h5>
                                <p class="card-text">{{ str($comparison->comparison_result)->limit(25) }}</p>
                                <a href="{{ route('history.single.comparison', ['comparison' => $comparison->id]) }}"
                                    class="ms-5 text-decoration-none">دیدن جزئیات</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($object_analayses->isEmpty() && $comparisons->isEmpty())
                    <div class="col-md-4 text-center">
                        <div class="alert alert-danger">
                            شما تا به حال سوالی نکردید
                        </div>
                    </div>
                @endif
            @endif

        </div>

    </div>
@endsection
