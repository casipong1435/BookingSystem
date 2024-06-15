<div class="row">
    <div class="col-md-12 mb-2 p-2">
        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#GenerateReport">Reports</button>
    </div>

    @include('partials.generate-report')

    <h3 class="fw-bold text-center">Reservation History</h3>
    @if (count($reservation_history_equipment) > 0 || count($reservation_history_facility) > 0)
        @foreach ($reservation_history_equipment as $history)
            <div class="col-md-4 mb-2">
                <div class="shadow">
                    <div class="p-2" style="background: #0d6137">
                        <div class="item_name text-white text-center fw-bold ">{{ $history->item_name }}</div>
                    </div>
                    <div class="img text-center mb-4 py-3">
                        <img src="{{ asset('images/tourism-items/'.$history->item_img) }}" alt="" width="200" height="200">
                    </div>
                    <?php
                      $item_id = [
                        'item_id' => Crypt::encrypt($history->item_id) 
                      ]
                    ?>
                    <div class="action d-flex justify-content-end flex-row p-2">
                        @if (auth()->user()->role == 'tourism')
                            <a href="{{ route('historydetails', $item_id) }}" class="btn btn-primary mx-1">View History</a>
                        @else
                            <a href="{{ route('adminhistorydetails', $item_id) }}" class="btn btn-primary mx-1">View History</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($reservation_history_facility as $history)
            <div class="col-md-4 mb-2">
                <div class="shadow">
                    <div class="p-2" style="background: #0d6137">
                        <div class="item_name text-white text-center fw-bold ">{{ $history->item_name }}</div>
                    </div>
                    <div class="img text-center mb-4 py-3">
                        <img src="{{ asset('images/tourism-items/'.$history->item_img) }}" alt="" width="200" height="200">
                    </div>
                    <?php
                      $item_id = [
                        'item_id' => Crypt::encrypt($history->item_id) 
                      ]
                    ?>
                    <div class="action d-flex justify-content-end flex-row p-2">
                        @if (auth()->user()->role == 'tourism')
                            <a href="{{ route('historydetails', $item_id) }}" class="btn btn-primary mx-1">View History</a>
                        @else
                            <a href="{{ route('adminhistorydetails', $item_id) }}" class="btn btn-primary mx-1">View History</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else
            <h3 class="text-center">No History of Reservation</h3>
    @endif
</div>
