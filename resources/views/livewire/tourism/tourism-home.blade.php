<div>
    <div class="col-md-12 mb-2 p-2">
        <span class="h3"> Welcome, </span>
        <span class="h4">{{ $name }}!</span>
    </div>
    <hr>
    <div class="col-md-12 mb-2 p-2">
        <div class="row d-flex justify-content-around p-2">
            <div class="col-md-2 m-1 d-flex shadow justify-content-center align-items-center py-4 rounded">
                <i class="bi bi-people-fill me-2 fs-1"></i>
                <div class="fs-4">Users</div>
            </div>
            <div class="col-lg-4 m-1 d-flex shadow justify-content-center align-items-center py-4 rounded user-content">
                <a href="{{ auth()->user()->role == 'admin-tourism' ? route("adminaccounts"):route("accounts") }}" class="text-decoration-none">
                    <div>
                        <i class="bi bi-people me-2 fs-1 text-warning"></i>
                        <span class="fs-3 me-3 text-dark">Pending: </span>
                        <span class="h1 text-dark">{{ $pending_user_count }}</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 m-1 d-flex shadow justify-content-center align-items-center py-4 rounded user-content">
                <a href="{{ auth()->user()->role == 'admin-tourism' ? route("adminaccounts"):route("accounts") }}" class="text-decoration-none">
                    <div>
                        <i class="bi bi-person-check me-2 fs-1 text-success"></i>
                        <span class="fs-3 me-3 text-dark">Total: </span>
                        <span class="h1 text-dark">{{ $total_user }}</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="container text-white p-4 shadow mt-1" style="background: linear-gradient(to right, #b16621, #c2966d, #d6b393)">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center">
                <i class="bi bi-book me-2 fs-1"></i>
                <div class="h2">Reservation</div>
            </div>
            <div class="col-md-12 p-3 mt-1">
                <div class="row p-2 d-flex justify-content-around">
                    <div class="col-lg-3 m-2 d-flex justify-content-center shadow py-4 rounded reservation-content">
                        <a href="{{ auth()->user()->role == 'admin-tourism' ? route("admintourismreservation"):route("tourismreservation") }}" class="text-decoration-none">
                            <div>
                                <i class="bi bi-hourglass me-2 fs-1 text-white"></i>
                                <span class="fs-3 me-3 text-white">Pending: </span>
                                <span class="h1 text-white">{{ $pending_booking }}</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 m-2 d-flex justify-content-center align-items-center py-4 shadow reservation-content">
                        <a href="{{ auth()->user()->role == 'admin-tourism' ? route("admintourismreservation"):route("tourismreservation") }}" class="text-decoration-none">
                            <div>
                                <i class="bi bi-bookmark me-2 fs-1 text-warning"></i>
                                <span class="fs-4 text-white">On Going: </span>
                                <span class="h2 text-white">{{ $ongoing_booking }}</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 m-2 d-flex justify-content-center align-items-center shadow py-4 reservation-content">
                        <a href="{{ auth()->user()->role == 'admin-tourism' ? route("admintourismreservation"):route("tourismreservation") }}" class="text-decoration-none">
                            <div>
                                <i class="bi bi-bookmark-check-fill me-1 fs-2 text-primary"></i>
                                <span class="fs-4 text-white">Completed: </span>
                                <span class="h2 text-white">{{ $completed_booking }}</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
