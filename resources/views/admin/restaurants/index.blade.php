@extends('admin.layouts.admin')

@section('content')
<div class="mt-100"></div>
<div class="dashborad-box">
    <h4 class="title">Liste des restaurants ({{ $restaurants->total() }})</h4>
    <div class="section-body listing-table">
        @if($restaurants->total() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom du restaurant</th>
                        <th>Spécialité</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $restaurants as $restaurant )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $restaurant->name }} </td>
                            <td>{{ $restaurant->category }} </td>
                            <td class="rating">
                                <span>
                                    <ul class="starts">
                                        {{ $restaurant->display_rating() }}
                                    </ul>
                                </span>
                            </td>
                            <td class="status"><span class="active">{{ $restaurant->opened ? "Opened" : "Closed"  }} </span></td>
                            <td>{{ $restaurant->created_at->format('d m Y') }}</td>
                            <td class="edit"><a href="{{ route('restaurant.show', $restaurant) }} "><i class="fa fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $restaurants->links() }}
            </div>
        </div>
        @else
            <div class="alert alert-warning">Aucun restaurant disponible pour le moment</div>
        @endif
    </div>
</div>
@endsection
