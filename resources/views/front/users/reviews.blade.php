@extends('front.layouts.resto')

@section('content')
    <!-- START SECTION BLOG -->
	<section class="blog blog-section">
		<div class="container">
			<div class="row">
                <aside class="col-lg-3 col-md-12">
					<div class="widget">
                        <div class="recent-post">
							<h5>Tableau de bord utilisateur</h5>
							@include('front.inc.user_menu')
						</div>
					</div>
				</aside>
				<div class="col-lg-9 col-md-12 blog-pots">
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="news-item details no-mb2">
								<a href="blog-details.html" class="news-img-link">

								</a>
								<div class="news-item-text details">
									<a href="#"><h3>Mes avis ({{ $reviews->total() }})</h3></a>
									<div class="news-item-descr big-news details visib">
                                        @if($reviews->total() > 0)
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nom du restaurant</th>
                                                            <th>Note </th>
                                                            <th>comment </th>
                                                            <th>Date </th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ( $reviews as $review )
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td> <a href="{{ route('restaurant.show', $review->restaurant->id) }}">{{ $review->restaurant->name }}</a>  </td>
                                                                <td><ul class="starts">
                                                                    {{ $review->star_rating() }}
                                                                </ul> </td>
                                                                <td>{!! $review->comment ?? '' !!} </td>

                                                                <td>{{ $review->created_at->format('d - m - Y') }}</td>
                                                                <td class="edit"><a href="{{ route('restaurant.show', $review->restaurant).'#add-review'; }}"><i class="fa fa-pencil"></i></a>
                                                                    <a href="{{ route('review.delete', $review) }}" title="supprimer"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div>
                                                    {{ $reviews->links() }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="alert alert-warning">Aucun avis disponible pour le moment</div>
                                        @endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION BLOG -->
@endsection
