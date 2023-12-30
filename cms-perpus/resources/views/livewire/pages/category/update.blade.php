<form>
    <input type="hidden" wire:model="id">
    <div class="mb-3 space-y-3">
        <x-input-label for="email" :value="__('Category')" />
        <x-text-input wire:model="category" id="category" placeholder="Type here.." class="block mt-1 w-full" type="text"
            name="category" />
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    <div class="grid grid-cols-2 gap-5">
        <button wire:click.prevent="update()" class="btn btn-success btn-block">Save</button>
        <button wire:click.prevent="cancel()" class="btn btn-warning">Cancel</button>
    </div>
</form>
