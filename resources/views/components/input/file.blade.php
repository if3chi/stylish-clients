@props([
    'label' => false,
    'for' => false,
    'secLabel' => 'Upload File',
    'error' => false,
])

<div>
    <label for="{{ $for }}" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">
        {{ $label }}
    </label>
</div>
<div class="mt-1 sm:mt-0 sm:col-span-2">
    <div class="flex items-center">
      <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
        {{ $slot }}
      </span>

      <div x-data="{focused: false}">
        <input {{ $attributes }} @focus="focused = true" @blur="focused = false" type="file" class="sr-only"/>

        <label for="{{ $for }}" :class="{'outline-none ring-2 ring-offset-2 ring-indigo-500': focused}" class="cursor-pointer ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50">
          {{ $secLabel }}
        </label>
      </div>
    </div>

    @if ($error)
      <p class="info mt-1 text-red-500 text-sm font-bold tracking-wide">{{ $error }}</p>
    @endif
</div>