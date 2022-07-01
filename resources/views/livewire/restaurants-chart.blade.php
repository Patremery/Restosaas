<div>
    <div class="dashborad-box">
           {{--  <label class="form-label" style="padding-right: 50px">
                <input value="DESC" wire:model="direction"  wire:key="desc" wire:click='sort_by("DESC")'  type="radio" class="form-check-input" > Meilleures notes
            </label>
            <label class="form-label text-right">
                <input value="ASC" wire:model="direction"  wire:key="asc" wire:click='sort_by("ASC")' type="radio" class="form-check-input"> Mauvaises notes
            </label>
        <h4 class="title">Top 10 des {{ $direction == 'ASC' ? 'mauvais' : 'meilleurs' }} restaurants</h4> --}}
        <h4 class="title">Top 10 des meilleurs restaurants</h4>

        <div wire:ignore wire:key={{ $linechart->id }}>
            {!! $linechart->container() !!}
        </div>

        @if($linechart)
            <script src="{{ $linechart->cdn() }}"></script>
        {!! $linechart->script() !!}
        @endif
    </div>

    @push('scripts')
    <script language='javascript'>
        var linechart = [];

        window.dataUpdated('dataUpdated', event => {
            linechart = event.detail.hcData)
        })

        console.log(linechart);

        {!! $linechart->script() !!}

    </script>
    @endpush
</div>


