<!--Generate Report Modal-->
<div class="modal fade" wire:ignore.self id="GenerateReport" tabindex="-1" aria-labelledby="GenerateReportLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="GenerateReportLabel">Generate Report</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal()"></button>
        </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="from" class="mb-1">From</label>
                            <input type="date" wire:model="from" class="w-100 p-1" id="from">
                        </div>
                        <div class="form-group mb-3">
                            <label for="to" class="mb-1">To</label>
                            <input type="date" wire:model="to" class="w-100 p-1" id="to">
                        </div>
                        @if ($notif == true)
                            @if (session()->get('found') > 0)
                            <div class="form-group mb-2">
                                <div class="alert alert-success alert-dismissible fade show position-relative" role="alert">
                                    <div>
                                        <strong>Found: </strong>
                                        {{ session()->get('found') }} Reservation/s
                                        <div class="position-absolute" style="top: 10px; right: 15px">
                                            <a href="{{ auth()->user()->role == 'tourism' ? route('tourismreports', ['from' => $from, 'to' => $to]) : route('admintourismreports', ['from' => $from, 'to' => $to]) }}" cl><i class="bi bi-file-earmark-arrow-down fs-3"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="form-group mb-2">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <div><strong>Found: </strong>{{ session()->get('found') }} Reservation/s</div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-modal" wire:click="closeModal()" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-success" wire:click.prevent="generateReport">
                <div wire:loading wire:target="generateReport" wire:key="generateReport">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="visually-hidden">Generating...</span>
                </div>
                Generate
            </button>
            </div>
      </div>
    </div>
  </div>