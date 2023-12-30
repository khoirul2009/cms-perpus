<form>
    <div class="mb-3 space-y-3">
        <x-input-label for="category" :value="__('Category')" />
        <x-text-input wire:model="category" id="category" placeholder="Type here.." class="block mt-1 w-full" type="text"
            name="category" />
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    <div class="d-grid gap-2">
        <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
    </div>
</form>
