@props([
    'label' => false,
    'for' => false,
    'error' => false
])

<div>
    <label for="{{ $for }}" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">
        {{ $label }}
    </label>
</div>
<div 
    x-data="{ value: @entangle($attributes->wire('model'))}"
    x-init="new Pikaday({ 
        field: $refs.bday, 
        format: 'YYYY-MM-DD', 
        onOpen() { this.setDate($refs.bday.value) 
        }})"
    x-on:change="value = $event.target.value"
    class="sm:col-span-2">

<div class="mt-1 flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
        {{ $slot }}
    </span>
    <input 
        {{ $attributes->whereDoesntStartWith('wire:model') }}
        x-ref="bday" 
        :value="value"
        class="{{$error ? 'border-red-700': ''  }} focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
</div>
    @if ($error)
        <p class="info mt-1 text-red-500 text-sm font-bold tracking-wide">{{ $error }}</p>
    @endif
</div>
