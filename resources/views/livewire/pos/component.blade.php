<div>
    <style></style>


    <div class="row layout-top-spacing">

        <div class="col-sm-12 col-md-8">
            <!-- DETALLES -->
            @include('livewire.pos.partials.detail')
        </div>

        <div class="col-sm-12 col-md-4">
            <!-- TOTAL -->
            @include('livewire.pos.partials.total')
            

            <!-- DENOMINACIONES O COINS -->
            @include('livewire.pos.partials.coins')

        </div>

    </div>
    
</div>

<script src="{{ asset('js/Keypress.js') }}"></script>
<script src="{{ asset('js/onscan.js') }}"></script>


@include('livewire.pos.scripts.shortcuts')
@include('livewire.pos.scripts.events')
@include('livewire.pos.scripts.general')
@include('livewire.pos.scripts.scan')

