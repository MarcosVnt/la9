<div class="card">
    <div class="card-body">
        <form>
            <div class="form-group mb-3">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" wire:model="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
           
            <div class="d-grid gap-2">
                <button wire:click.prevent="updateCategory()" class="btn btn-success btn-block">Update</button>
                <button wire:click.prevent="cancelCategory()" class="btn btn-secondary btn-block">Cancel</button>
            </div>
        </form>
    </div>
</div>