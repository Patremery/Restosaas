@extends('admin.layouts.admin')

@section('content')
<div class="mt-100"></div>
<div class="dashborad-box">
    <h4 class="title">Liste des avis ({{ $reviews->total() }})</h4>
    <div class="section-body listing-table">
        @if($reviews->total() > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom du restaurant</th>
                        <th>Note</th>
                        <th>Auteur</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $reviews as $review )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->restaurant->name }} </td>
                            <td class="rating">
                                <span>
                                    <ul class="starts">
                                        {{ $review->star_rating() }}
                                    </ul>
                                </span>
                            </td>
                            <td>{{ $review->user->name }} </td>

                            <td class="status"><span class="active">{{ $review->status ? "Activé" : "En attente"  }} </span></td>
                            <td>{{ $review->created_at->format('d - m - Y') }}</td>
                            <td class="edit"><a href="#" data-toggle="modal" data-target="#reviewModal-{{ $review->id }}"><i class="fa fa-eye"></i></a></td>
                        </tr>
                        @push('modal')
                            <!-- Modal -->
                            <div class="modal fade" id="reviewModal-{{ $review->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="reviewModalLabel">Avis de <strong>{{ $review->user->name }}</strong> sur le restaurant <strong>{{ $review->restaurant->name }}</strong>  </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <span>
                                                <ul class="starts">
                                                   Note:  {{ $review->star_rating() }}
                                                </ul>
                                            </span>
                                        </div>
                                        <div class='alert alert-primary'>
                                            Commentaire: {!! $review->comment !!}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        publié le {{ $review->created_at->format('d - m - Y') }}
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endpush
                    @endforeach
                </tbody>
            </table>
            <div>
                {{ $reviews->links() }}
            </div>
        </div>
        @else
            <div class="alert alert-warning">Aucun review disponible pour le moment</div>
        @endif
    </div>
</div>
@endsection

@push('modal')
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Avis de </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endpush
