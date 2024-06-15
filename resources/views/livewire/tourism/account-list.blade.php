<div>
    <div class="col-md-12 p-2 d-flex justify-content-end">
        <a href="#" class="text-decoration-none mx-2 account-list {{ $state == 0 ? 'active':'' }}" wire:click="changeState({{ 0 }})">Pending</a>
        <a href="#" class="text-decoration-none mx-2 account-list {{ $state == 1 ? 'active':'' }}" wire:click="changeState({{ 1 }})">Approved</a>
        <a href="#" class="text-decoration-none mx-2 account-list {{ $state == 2 ? 'active':'' }}" wire:click="changeState({{ 2 }})">Banned</a>
        <a href="#" class="text-decoration-none mx-2 account-list {{ $state == 3 ? 'active':'' }}" wire:click="changeState({{ 3 }})">Officials</a>
    </div>

    @switch($state)
        @case(0)
                @include('livewire.tourism.account-category.pending')
            @break
        @case(1)
                @include('livewire.tourism.account-category.approved')
            @break
        @case(2)
                @include('livewire.tourism.account-category.banned')
            @break
        @case(3)
                @include('livewire.tourism.account-category.officials')
            @break
            
    @endswitch

    @include('partials.notification')
</div>
