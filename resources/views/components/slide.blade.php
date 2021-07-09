@props(['title' => 'Add Client', 'message' => ''])


<div 
  x-data="{ open: true }" 
  {{-- x-data="{ open: @entangle($attributes->wire('model')).defer }"  --}}
  @keydown.window.escape="open = false"  
  x-init="$watch(&quot;open&quot;, o => !o &amp;&amp; window.setTimeout(() => (open = true), 1000))"
  x-show="open" 
  class="fixed inset-0 overflow-hidden" 
  aria-labelledby="slide-over-title" 
  x-ref="dialog" 
  aria-modal="true"
  style="display: none;"
  >
    <div class="absolute inset-0 overflow-hidden">
      <div 
        x-description="Background overlay, show/hide based on slide-over state." 
        class="absolute inset-0 bg-gray-500 opacity-75"
        x-transition:enter="ease-out duration-300"
                      x-transition:enter-start="opacity-0"
                      x-transition:enter-end="opacity-100"
                      x-transition:leave="ease-in duration-200"
                      x-transition:leave-start="opacity-100"
                      x-transition:leave-end="opacity-0"
        @click="open = true" aria-hidden="true"                                                                 
      >
      </div>

      <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16">
        
          <div 
          x-show="open" 
          x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" 
          x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" 
          x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" 
          x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" 
          class="w-screen max-w-2xl" 
          x-description="Slide-over panel, show/hide based on slide-over state."
          >
            <form class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
              <div class="flex-1">
                <!-- Header -->
                <div class="px-4 py-6 bg-gray-50 sm:px-6">
                  <div class="flex items-start justify-between space-x-3">
                    <div class="space-y-1">
                      <h2 class="flex items-center text-lg font-medium text-indigo-800" id="slide-over-title">
                        @if ( $title === 'Edit')
                          <x-icon.edit class="w-8 h-8 mr-2" />
                        @else
                          <x-icon.user-plus/> 
                        @endif                        
                        {{ $title }} Client
                      </h2>
                      <p class="text-sm text-gray-500">
                        {{ $message }}
                      </p>
                    </div>
                    <div class="h-7 flex items-center">
                      <button type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500" @click="open = false">
                        <span class="sr-only">Close panel</span>
                        <x-icon.x class="w-6 h-6"/>
                      </button>
                    </div>
                  </div>
                </div>

                <!-- Divider container -->
                <div class="py-6 space-y-6 sm:py-0 sm:space-y-0 sm:divide-y sm:divide-gray-200">
                  <!-- Client name -->
                  <x-input.group>
                    <x-input.text type="text" label='First Name' for="firstname" name="firstname" id="firstname" placeholder="Ama">
                      <x-slot name="icon">
                        <x-icon.user class="w-4 h-4" />
                      </x-slot>
                    </x-input.text>
                  </x-input.group>

                  <x-input.group>
                    <x-input.text type="text" label='Last Name' for="lastname" name="lastname" id="lastname" placeholder="Kojo">
                      <x-slot name="icon">
                        <x-icon.user class="w-4 h-4" />
                      </x-slot>
                    </x-input.text>
                  </x-input.group>
                  
                  <!-- Image -->
                  <x-input.group>
                    <x-input.file label="Photo" for="photo" id="photo" secLabel="Upload Image">
                        <x-icon.avatar/>
                    </x-input.file>
                  </x-input.group>
                  
                  <!-- Phone -->
                  <fieldset class="space-y-2 px-4 sm:space-y-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:px-6 sm:py-5">
                    <div>
                      <label for="country" class="block text-sm font-medium text-gray-900 sm:mt-px sm:pt-2">Phone Number</label>
                    </div>
                    <div class="sm:col-span-2">
                      <div>
                        <label for="country" class="sr-only">Country</label>
                        <select id="country" name="country" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-t-md bg-transparent focus:z-10 sm:text-sm border-gray-300">
                          <option>Ghana</option>
                          <option>Nigeria</option>
                        </select>
                      </div>
                      <div>
                        <label for="phone" class="sr-only">Number</label>
                        <input type="text" name="phone" id="phone" class="focus:ring-indigo-500 focus:border-indigo-500 relative block w-full rounded-none rounded-b-md bg-transparent focus:z-10 sm:text-sm border-gray-300" placeholder="0241234567">
                      </div>
                    </div>
                  </fieldset>

                  <!-- Email -->
                  <x-input.group>
                    <x-input.text type="email" label="Client's Email" name="email" id="email" for="email" placeholder="client@email.com">
                      <x-slot name="icon">
                        <x-icon.mail class="w-4 h4" />
                      </x-slot>
                    </x-input.text>
                  </x-input.group>

                  <!-- Birthday -->
                  <x-input.group>
                    <x-input.date wire:model="birthday" :error="$errors->first('birthday')" type="text" label="Client's Birthday" name="birthday" id="birthday" for="birthday" placeholder="MM/DD/YYYY">
                        <x-icon.calendar class="w-4 h4" />
                    </x-input.date>
                  </x-input.group>
                  
                  <!-- Address -->
                  <x-input.group>
                    <x-input.text type="text" label="Client's Address" name="address" id="address" for="address" placeholder="No.: 2 that house on the right.">
                      <x-slot name="icon">
                        <x-icon.home class="w-4 h4" />
                      </x-slot>
                    </x-input.text>
                  </x-input.group>
                  
                  <!-- Client Type -->
                  <x-input.group>
                    <x-input.select label="Client Type" for="clientType" id="clientType"/>
                  </x-input.group>
                </div>
              </div>

              <!-- Action buttons -->
              <div class="flex-shrink-0 px-4 border-t border-gray-200 py-5 sm:px-6">
                <div class="space-x-3 flex justify-end">
                  <button type="button" wire:click="$set('show_form', false)" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="open = false">
                    Cancel
                  </button>
                  <button type="submit" wire:click.prevent="save" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                  </button>
                </div>
              </div>
            </form>
          </div>
        
      </div>
    </div>
  </div>


@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/pikaday.css') }}">
@endpush

@push('scripts')
  <script src="{{ asset('js/moment.js') }}"></script>
  <script src="{{ asset('js/pikaday.js') }}"></script>
@endpush