@props([
    'label' => false,
    'for' => false,
    'error' => false,
]) 

<div>
    <label for="{{ $for }}" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">{{ $label }}</label>
  </div>
  <div class="sm:col-span-2">
    <select {{ $attributes }} class="mt-1 block w-full pl-3 pr-10 py-2 text-base {{ $error ? 'border-red-700': 'border-gray-300' }}  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      <option value="" selected>Select Client Type</option>
      <option>New</option>
      <option>Dada</option>
      <option>Returned</option>
      <option>Orphaned</option>
    </select>
    <div>
      @if ($error)
        <p class="info mt-1 text-red-500 text-sm font-bold tracking-wide">{{ $error }}</p>
      @endif
    </div>
</div>