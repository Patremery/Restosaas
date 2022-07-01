<div>
    @if ($restaurant->reviews->count() > 0)
        <!-- START SECTION ASSIGNED AGENTS -->
        <section class="">
            <h3 class="mb-5">{{ $restaurant->reviews->count() }} Avis</h3>
            @foreach($restaurant->reviews->sortByDesc('id')->take(4) as $review)
                <div class="row mb-5">
                    <ul class="col-12 commented pl-0">
                        <li class="comm-inf">
                            <div class="col-md-12 comments-info">
                                <div class="conra">
                                    <h5 class="mb-2">{{ $review->user->name }} </h5>
                                    <div class="rating-box">
                                        <div class="detail-list-rating mr-0">
                                        <ul class="starts">
                                            {{ $review->star_rating() }}
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="mb-4 rest">commented {{ $review->created_at->diffForHumans() }} </p>
                                <p>{{ $review->comment }} </p>
                            </div>
                        </li>
                    </ul>
                </div>
            @endforeach
        </section>
    @else
    <section class="">
        <div class="alert alert-danger">Aucune note disponible</div>
    </section>
    @endif
    <section class="reviews leve-comments details">
        <div id="add-review" class="add-review-box">
            <!-- Add Review -->
            <h3 class="listing-desc-headline margin-bottom-20 mb-4">Ajouter un avis</h3>
            {{-- <span class="leave-rating-title mb-3 alert alert-success">{{ $successmessage }}</span> --}}
            @if (session()->has('message'))
                <span class="leave-rating-title mb-3 alert alert-success">
                    {{ session('message') }}
                </span>
            @endif
            @if($hideForm != true)
                <!-- Rating / Upload Button -->
                <form wire:submit.prevent="rate">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <!-- Leave Rating -->
                            <div class="clearfix"></div>
                            <div class="leave-rating margin-bottom-30 mr-2">
                                <input type="radio" wire:model="rating" name="rating" id="rating-1" value="1" />
                                <label for="rating-1" class="fa fa-star{{ $rating >= 1 ? '' : '-o' }}"></label>
                                <input type="radio" wire:model="rating" name="rating" id="rating-2" value="2" />
                                <label for="rating-2" class="fa fa-star{{ $rating >= 2 ? '' : '-o' }}"></label>
                                <input type="radio" wire:model="rating" name="rating" id="rating-3" value="3" />
                                <label for="rating-3" class="fa fa-star{{ $rating >= 3 ? '' : '-o' }}"></label>
                                <input type="radio" wire:model="rating" name="rating" id="rating-4" value="4" />
                                <label for="rating-4" class="fa fa-star{{ $rating >= 4 ? '' : '-o' }}"></label>
                                <input type="radio" wire:model="rating" name="rating" id="rating-5" value="5" />
                                <label for="rating-5" class="fa fa-star{{ $rating >= 5 ? '' : '-o' }}"></label>
                            </div>
                            <div class="clearfix">
                                <p>{{ $rating ?? '0'}} / 5</p>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 data">
                            <div class="col-md-12 form-group">
                                <textarea class="form-control" wire:model.lazy="comment" id="exampleTextarea" name="comment" rows="8"></textarea>
                                @error('comment')
                                    <p class="mt-1 text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg mt-2">Envoyer mon avis</button>
                            @auth
                                @if($currentId)
                                    <button type="submit" class="btn btn-danger btn-lg mt-2" wire:click.prevent="delete({{ $currentId }})" style="background-color: grey">Supprimer</button>
                                @endif
                            @endauth
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </section>
</div>
