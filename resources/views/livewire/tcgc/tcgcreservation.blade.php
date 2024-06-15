<div>
    <div class="container d-flex justify-content-end p-3 mb-2">
        <a href="#" class="text-decoration-none mx-2 reservation-link {{ $state == 0 ? 'active':'' }}" wire:click="changeState({{ 0 }})">Pending</a>
        <a href="#" class="text-decoration-none mx-2 reservation-link {{ $state == 1 ? 'active':'' }}" wire:click="changeState({{ 1 }})">Approved</a>
        <a href="#" class="text-decoration-none mx-2 reservation-link {{ $state == 2 ? 'active':'' }}" wire:click="changeState({{ 2 }})">Completed</a>
        <a href="#" class="text-decoration-none mx-2 reservation-link {{ $state == 3 ? 'active':'' }}" wire:click="changeState({{ 3 }})">Rejected</a>
    </div>

    @switch($state)
        @case(0)
                @include('livewire.tcgc.reservation-category.pending')
            @break
        @case(1)
                @include('livewire.tcgc.reservation-category.accepted')
            @break
        @case(2)
                @include('livewire.tcgc.reservation-category.finished')
            @break
        @case(3)
                @include('livewire.tcgc.reservation-category.rejected')
            @break
            
    @endswitch
    
    
    
    

</div>
