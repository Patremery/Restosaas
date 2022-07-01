@extends('front.layouts.resto')
@push('css')
@livewireStyles
@endpush
@section('content')
    <!-- START SECTION LISTING DETAIL-->
    <section class="listing blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 blog-pots">
                    <!-- Block heading end -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-wrapper">
                                <div class="detail-wrapper-body pl-3">
                                    <div class="listing-title-bar">
                                        <h3>{{ $restaurant->name }} <span class="mrg-l-5 category-tag">{{ $restaurant->category }}</span></h3>
                                        <div class="mt-3">
                                            @if($restaurant->address != Null)
                                            <a href="#listing-location" class="listing-address">
                                                <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i> {{ $restaurant->address }}
                                            </a>
                                            @endif
                                            @if($restaurant->rating > 0)
                                                <div class="rating-box mt-3">
                                                    <div class="detail-list-rating">
                                                        <ul class="starts text-left mb-0">
                                                            {{ $restaurant->display_rating() }}

                                                            <li class="ml-1">( {{ $restaurant->reviews->count() }} Avis )</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- main slider carousel items -->
                            <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                <h5 class="mb-4"></h5>
                                <div class="carousel-inner">
                                    <div class="active item carousel-item" data-slide-number="0">
                                        <img src="{{ $restaurant->featured_image }} " class="img-fluid" alt="slider-listing">
                                    </div>
                                </div>
                                <!-- main slider carousel items -->
                            </div>
                            <div class="blog-info details overview">
                                <h5 class="mb-4">A Propos du resto</h5>
                                <p class="mb-3">
                                    {{ $restaurant->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="property-location mp">
                        <h5>Avis des clients</h5>
                        <div class="review-content-wrap">
                            <div class="review-content">
                                <div class="review-rating-summary">
                                    <div class="review-rating-summary-inner">
                                        <div class="stats-average__count">
                                            <span class="stats-average__count-count">{{ round($restaurant->average_rating()) }} </span>
                                        </div>
                                        <!-- end stats-average__count -->
                                        <div class="stats-average__rating p-0">
                                            <ul class="p-0 m-0">
                                                {{ $restaurant->display_rating() }}
                                            </ul>
                                        </div>
                                        <p class="text-center mb-2">sur 5.0</p>
                                        <!-- end stats-average__rating -->
                                    </div>
                                    <!-- end review-rating-summary-inner -->
                                    <div class="course-rating-text">
                                        <p class="course-rating-text__text">Note du restaurant</p>
                                    </div>
                                    <!-- end course-rating-text -->
                                </div>
                                
                            </div>
                            <!-- end review-content -->
                        </div>
                        <!-- end review-content-wrap -->
                    </div>

                    @auth
                         @livewire('restaurant-rating', ['restaurant' => $restaurant], key($restaurant->id))
                    @endauth
                    <!-- END SECTION ASSIGNED AGENTS -->
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="widget">

                        <!-- Start Agent Information -->
                        <div class="sidebar widget-boxed mt-33 mt-5">
                            <div class="widget-boxed-header">
                                <h4><i class="far fa-user pr-3"></i>Contact</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="sidebar-widget author-widget2">
                                    <div class="author-box clearfix">
                                        <img src="{{ $restaurant->logo }}" alt="{{ $restaurant->name }}" class="author__img">

                                        <p class="author__meta">Posted {{ $restaurant->created_at->diffForHumans() }}</p>
                                    </div>
                                    <ul class="author__contact">
                                        @if($restaurant->address != Null)
                                        <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>{{ $restaurant->address }}</li>
                                        @endif

                                        @if($restaurant->phone != Null)
                                        <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="#">{{ $restaurant->phone }}</a></li>
                                        @endif

                                        @if($restaurant->email != Null)
                                            <li>
                                                <span class="la la-envelope-o"
                                                >
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                                </span>
                                                <a href="#">
                                                    @auth {{ $restaurant->email }} @else [Protected] @endif</a>
                                                </li>
                                            @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Agent Information -->

                        <!-- Start: Opening hour -->
                        <div class="widget-boxed mt-5">
                            <div class="widget-boxed-header">
                                <h4><i class="fa fa-clock-o pr-3 padd-r-10"></i>Horaires</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="side-list">
                                    <ul>
                                        <li class="pt-0">Tous les jours <span>{{ $restaurant->schedule }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End: Opening hour -->

                        <div class="widget widget_listings my-5">
                            <div class="widget-boxed-header">
                                <h4><i class="fa fa-map-marker pr-3"></i>Dans la même catégorie</h4>
                            </div>
                            <div class="widget-boxed-body">
                                @php
                                    $similars = App\Models\Restaurant::where('category', $restaurant->category)->get();
                                @endphp
                                <ul>
                                    @foreach($similars->take(5) as $similar)
                                        <li>
                                            <a href="{{ route('restaurant.show', $similar) }} "><img src="{{ $similar->featured_image }}" alt=""></a>
                                            <div class="overflow-hidden">
                                                <span class="cat mt-0">
                                                    <a href="{{ route('restaurant.show', $similar) }}">{{ $similar->city }}</a>
                                                </span>
                                                <h4><a href="{{ route('restaurant.show', $similar) }}">{{ $similar->name }}</a></h4>
                                                @if($similar->rating > 0)
                                                <ul class="starts left">
                                                    {{ $similar->display_rating() }}
                                                </ul>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- END SECTION LISTING DETAIL -->
@endsection

@push('scripts')
@livewireScripts
@endpush
