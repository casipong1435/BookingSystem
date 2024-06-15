<div class="row">

<h3 class="fw-bold">Reservation History</h3>
    <div class="row p-3">
        @if (count($booking_history) > 0)
            @foreach ($booking_history as $history)
                <div class="col-md-4 mb-2">
                    <div class="shadow">
                        <div class="p-2" style="background: #0d6137">
                            <div class="item_name text-white text-center fw-bold ">{{ $history->item_name }}</div>
                        </div>
                        <div class="img text-center mb-4 py-3">
                            <img src="{{ asset('images/tcgc-items/'.$history->item_img) }}" alt="" width="200" height="200">
                        </div>
                        <?php
                            $item_id = [
                                'item_id' => Crypt::encrypt($history->item_id) 
                            ]
                        ?>
                        <div class="action d-flex justify-content-end flex-row p-2">
                            @if (auth()->user()->role == 'tcgc')
                                <a href="{{ route('tcgchistorydetails', $item_id) }}" class="btn btn-primary mx-1">View History</a>
                            @else
                                <a href="{{ route('admintcgchistorydetails', $item_id) }}" class="btn btn-primary mx-1">View History</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h3 class="text-center">No Reservation History.</h3>
        @endif
    </div>
</div>
