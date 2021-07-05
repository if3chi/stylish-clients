@props([
    'label' => '',
    'icon' => false,
])

<div>
    <label for="photo" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">
        {{ $label }}
    </label>
</div>
<div class="mt-1 sm:mt-0 sm:col-span-2">
    <div class="flex items-center">
      <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
        {{ $icon }}
      </span>
      <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Upload Image
      </button>
    </div>
</div>