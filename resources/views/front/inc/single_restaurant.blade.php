<div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
    <div class="project-single" data-aos="fade-up">
        <div class="project-inner project-head">
            <div class="homes">
                <!-- homes img -->
                <a href="{{ route('restaurant.show', $restaurant) }}" class="homes-img hover-effect">
                    <div class="homes-tag button alt featured f1">{{ $restaurant->category }} </div>

                    <div class="homes-price">
                        @php
                            $rating = $restaurant->average_rating();
                        @endphp
                        <ul class="starts text-left mb-0">
                            {{ $restaurant->display_rating() }}

                            <li class="ml-1">(rating: {{ round($rating) .'/5' }}  {{ $restaurant->reviews->count() }} Avis )</li>
                        </ul>
                    </div>
                    <img src="{{ $restaurant->featured_image }}" alt="home-1" class="img-responsive">
                    <div class="overlay"></div>
                </a>
            </div>
        </div>
        <!-- homes content -->
        <div class="homes-content">
            <!-- homes address -->
            <a href="{{ route('restaurant.show', $restaurant) }}"><h3>{{ $restaurant->name }} </h3></a>
            <!-- homes List -->
            <ul class="homes-list clearfix">
                @if($restaurant->address != Null)
                <li>
                    <i class="fa fa-map-marker"></i>
                    <span>{{ Str::limit($restaurant->address, '40', '...') }} </span>
                </li>
                @endif

                @if($restaurant->phone != Null)
                <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>{{ $restaurant->phone }}</span>
                </li>
                @endif
                <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span>Posted {{ $restaurant->created_at->diffForHumans() }} </span>
                </li>
            </ul>
            <div class="footer mt-3">
                <a href="{{ route('restaurant.show', $restaurant) }}">
                    <img src="{{ asset('assets/images/icons/2.png') }}" width="20" class="mr-2" alt=""> {{ $restaurant->schedule }}
                </a>

                <span>
                    @if($restaurant->opened == true)
                        <i class="fas fa-lock-open"></i>Ouvert
                    @else
                        <i class="fas fa-lock"></i>fermé
                    @endif
                </span>
            </div>
        </div>
    </div>
</div>
