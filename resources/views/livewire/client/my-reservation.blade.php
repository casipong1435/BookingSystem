<div>
    <div class="col-md-12 px-4 py-3">
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>

    <h3 class="text-center"><i class="bi bi-bookmark me-2"></i>My Reservations</h3>

    <div class="p-2 m-3 text-center">
        <a href="#" class="text-decoration-none mx-2 p-1 reservation-link {{ $state == 0 ? 'active':'' }}" wire:click="changeState({{ 0 }})">Pending</a>
        <a href="#" class="text-decoration-none mx-2 p-1 reservation-link {{ $state == 1 ? 'active':'' }}" wire:click="changeState({{ 1 }})">Accepted</a>
        <a href="#" class="text-decoration-none mx-2 p-1 reservation-link {{ $state == 2 ? 'active':'' }}" wire:click="changeState({{ 2 }})">Finished</a>
        <a href="#" class="text-decoration-none mx-2 p-1 reservation-link {{ $state == 3 ? 'active':'' }}" wire:click="changeState({{ 3 }})">Rejected</a>
    </div>

    <div class="container-fluid  mt-2 p-2 shadow">
        @include('livewire.client.reservation-category.pending-reservation')
        @include('livewire.client.reservation-category.accepted-reservation')
        @include('livewire.client.reservation-category.finished-reservation')
        @include('livewire.client.reservation-category.rejected-reservation')
    </div>

    @include('partials.booking-error')
</div>
