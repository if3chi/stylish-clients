@props([
    'label' => false
]) 

<div>
    <label for="location" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
  </div>
  <div class="sm:col-span-2">
    <select id="location" name="location" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      <option selected disabled>Select Client Type</option>
      <option>New</option>
      <option>Dada</option>
      <option>Follow</option>
      <option>Returning</option>
    </select>
</div>