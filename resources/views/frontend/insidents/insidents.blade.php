@extends('frontend.layouts.app')
@section('content')

<!-- BreadCrumb Starts -->
<section class="breadcrumb-main pb-10 pt-8" style="">
     
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">Reported Incident</h1>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>
<!-- BreadCrumb Ends -->

<!-- top Destination starts -->
<section class="trending pt-6 pb-0 bg-lgrey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                @foreach($insidents as $ins)
                    <div class="col-lg-4 col-md-4 mb-4">
                        <div class="trend-item rounded box-shadow">
                            <div class="trend-image position-relative">
                                <img src="/storage/insident/{{ $ins->image }}" alt="image" class="">
                                <div class="color-overlay"></div>
                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">

                                <h3 class="theme mb-1"><i class="flaticon-location-pin"></i> {{ $ins->title }}</h3>

                            </div>
                            <div class="trend-content p-4 pt-5 position-relative">

                                <h6 class="theme mb-1"><i class="flaticon-location-pin"></i> {{ $ins->description }}</h6>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<!-- top Destination ends -->

@endsection