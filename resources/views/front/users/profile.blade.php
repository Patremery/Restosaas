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
									<div class="news-item-img">
										<img class="img-responsive" src="images/blog/b-1.jpg" alt="blog image">
									</div>
								</a>
								<div class="news-item-text details">
									<a href="#"><h3>{{ $user->name }}</h3></a>
                                    <div>{{ $user->email }}</div>
                                    <div>{{ $user->phone ?? '' }}</div>
									<div class="news-item-descr big-news details visib">
										<p class="mb-3"> {!! $user->bio ?? '' !!} </p>
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
