<div class="row">
    @if(session()->has('success'))
        <div class="mb-2 message">
            <div class="alert alert-success alert-dismissible fade show message" id="message" role="alert">
                {{ session()->get('success') }}
            </div>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="mb-2 message">
            <div class="alert alert-danger alert-dismissible fade show message" id="message" role="alert">
                {{ session()->get('error') }}
            </div>
        </div>
    @endif
    
   <div class="col-md-12 text-center">
        <div class="row">
            <h2 class=" mb-2">{{ $item_name }}</h2>
            <hr>
            <div class="col-md-3 p-0 m-2 " style="height: 200px" data-bs-toggle="modal" data-bs-target="#add_image">
                <button class="bg-success p-2 d-flex justify-content-center align-items-center rounded border-0 w-100 h-100">
                    <span class="text-white fw-bold" style="font-size: 100px"><i class="bi bi-plus-lg"></i></span>
                </button>
            </div>
            @if (count($images) > 0)
                @foreach ($images as $image)
                    <div class="col-md-4 p-1 position-relative">
                        <div class="p-2">
                            <img src="{{ asset('images/tourism-more-images/'.$image->image_name) }}" class="rounded item_image" alt="" height="200" width="300">
                        </div>
                        <div class="position-absolute text-danger delete-image" wire:click="deleteImage('{{ $image->image_name }}')"><i class="bi bi-x"></i></div>
                    </div>
                @endforeach
            @endif
        </div>
   </div>

   <!-- Modal -->
<div wire:ignore.self class="modal fade" id="add_image" tabindex="-1" aria-labelledby="add_imageLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_imageLabel">Add More Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="addImage">
            <div class="modal-body">
                <div class="col-md-12 p-2">
                    <label for="upload">Upload Image</label>
                    <div class="form-group">
                        <input multiple type="file" wire:model="photos" accept=".jpeg,.jpg,.png,.svg" class="p-2 w-100 mb-2">
                    </div>
                </div>
                <div class="col-md-12 text-center p-3">
                    <div wire:loading wire:target="photos" wire:key="photos">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="visually-hidden">Loading Images...</span>
                    </div>
                    @if ($photos)
                        @foreach ($photos as $photo)
                            <div class="col-md-12 shadow m-2">
                                <img src="{{ $photo->temporaryUrl() }}" alt="{{ $photo }}" class="image-fluid" height="200" width="350">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-modal" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">
                <div wire:loading wire:target="addImage">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="visually-hidden">Loading Images...</span>
                </div>
                Upload
            </button>
            </div>
        </form>
      </div>
    </div>
  </div>

   <script>
    window.addEventListener('hide:modal', function(){
            $('#add_image .close-modal').click();
        });
   </script>
</div>