@extends('front.layouts.resto')

@section('content')
     <!-- START SECTION LISTINGs GRID -->
     <section class="listings-full-grid featured popular portfolio blog">
        <div class="container">
            <!-- Block heading Start-->
            <section class="headings-2 pt-0 pb-0">
                <div class="pro-wrapper">
                    <div class="detail-wrapper-body">
                        <div class="listing-title-bar">
                            <div class="text-heading text-left">
                                <p><a href="{{ url('/') }} ">Accueil </a> &nbsp;/&nbsp; <span>restaurantss</span></p>
                            </div>
                            <h3>Les restaurants</h3>
                        </div>
                    </div>
                </div>
            </section>
            <div class="mb-50"></div>
            <!-- Block heading end -->
            <div class="row popular featured portfolio-items">
                @foreach($restaurants as $restaurant)
                    @include('front.inc.single_restaurant')
                @endforeach
            </div>
            <nav aria-label="..." class="pt-2">
                {{ $restaurants->links() }}
            </nav>
        </div>
    </section>
    <!-- END SECTION LISTINGs GRID -->
@endsection
