<div>
    @if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif


    <div>
        @if ($currentPhoto)
        <img wire:model.live="currentPhoto" src="{{ asset('storage/' .$currentPhoto ) }}" alt="Current Photo"
            class="my-3" style="width: 200px; height:200px; border-radius:50%">
        @else
        <p>No photo available.</p>
        @endif
    </div>

    <!-- Upload New Photo -->
    <div>
        <input class="my-3 btn btn-primary"
            style="width: 80%; border-radius: 0.375rem; display: inline-block !important;" type="file"
            wire:model.live="photo" >
        @error('photo') <span class="error">{{ $message }}</span> @enderror
    </div>

    <!-- Preview Photo -->
    @if ($photo)
    <div>
        Photo Preview:
        <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="my-3"
            style="width: 200px; height:200px; border-radius:50%">
    </div>
    @endif

    <button wire:click="save"  class="my-3 btn btn-success"
        style="width: 50%; border-radius: 0.375rem; display: inline-block !important;" type="submit">Save Photo</button>

</div>
