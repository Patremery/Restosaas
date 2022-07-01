@extends('admin.layouts.admin')

    @push('css')
    @livewireStyles
    @endpush

@section('content')
<div class="dashborad-box stat">
    <h4 class="title">Mon tableau de bord</h4>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-12 dar pro">
                <div class="item">
                    <div class="icon">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </div>
                    <div class="info">
                        <h6 class="number">{{ $restaurants->count() }} </h6>
                        <p class="type ml-1">Restaurants</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 dar rev">
                <div class="item">
                    <div class="icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="info">
                        <h6 class="number">{{ $reviews->count() }} </h6>
                        <p class="type ml-1">Avis</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 dar com">
                <div class="item mb-0">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="info">
                        <h6 class="number">{{ $users->count() }}</h6>
                        <p class="type ml-1">Utilisateurs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body" style="margin-top: 30px">
        <div class="row">
            <div class="col-sm-6">
                @livewire('restaurants-chart')
            </div>
            <div class="col-sm-6">
                <div class="dashborad-box">
                    <h4 class="title">Moyenne des notes obtenues</h4>
                    {!! $piechart->container() !!}
                </div>
            </div>

        </div>
    </div>
</div>

<section>
    <div class="row">
        @if($restaurants->count() > 0)
            <div class="col-sm-12">
                <div class="dashborad-box">
                    <h4 class="title">Top 5 des meilleurs restaurants</h4>
                    <div class="section-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Restaurant</th>
                                        <th>Ville</th>
                                        <th>Note</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $restaurants->take(5) as $restaurant )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $restaurant->name }} </td>
                                            <td>{{ $restaurant->city }} </td>
                                            <td class="rating">
                                                <span>
                                                    <ul class="starts">
                                                        {{ $restaurant->display_rating() }}
                                                    </ul>
                                                </span>
                                            </td>
                                            <td class="edit"><a href="{{ route('restaurant.show', $restaurant) }} "><i class="fa fa-eye"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning">Aucun restaurant disponible pour le moment</div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
    <script src="{{ $piechart->cdn() }}"></script>
    {!! $piechart->script() !!}

@livewireScripts
@endpush
