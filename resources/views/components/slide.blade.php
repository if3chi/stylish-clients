@props(['title' => false, 'message' => false])


<div 
  x-data="{ open: @entangle($attributes->wire('model')).defer }" 
  @keydown.window.escape="open = false"  
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
                    <x-input.text wire:model.lazy="editing.firstname" :error="$errors->first('editing.firstname')" type="text" label='First Name' for="firstname" name="firstname" id="firstname" placeholder="Ama">
                      <x-icon.user class="w-4 h-4" />
                    </x-input.text>
                  </x-input.group>

                  <x-input.group>
                    <x-input.text wire:model.lazy="editing.lastname" :error="$errors->first('editing.lastname')" type="text" label='Last Name' for="lastname" name="lastname" id="lastname" placeholder="Kojo">
                      <x-icon.user class="w-4 h-4" />
                    </x-input.text>
                  </x-input.group>

                  <!-- Image -->
                  <x-input.group>
                    <x-input.file wire:model.lazy="newClientImage" label="Photo" for="photo" id="photo" secLabel="Upload Image" :error="$errors->first('newClientImage')">
                        @if ($this->newClientImage)
                          <img src="{{ $this->newClientImage->temporaryUrl() }}" alt="" srcset="">
                        @else
                          @if ($title === 'Add')
                            <x-icon.avatar/>
                          @else
                            <img src="{{ $this->editingImageUrl }}" alt="" srcset="">                              
                          @endif
                        @endif
                    </x-input.file>
                  </x-input.group>
                  
                  <!-- Phone -->
                  <x-input.group>
                    <x-input.text wire:model.lazy="editing.phone" :error="$errors->first('editing.phone')" type="text" label="Client's phone" name="phone" id="phone" for="phone" placeholder="0241234567">
                      <x-icon.phone class="w-4 h4" />
                    </x-input.text>
                  </x-input.group>

                  <!-- Email -->
                  <x-input.group>
                    <x-input.text wire:model.lazy="editing.email" :error="$errors->first('editing.email')" type="email" label="Client's Email" name="email" id="email" for="email" placeholder="client@email.com">
                      <x-icon.mail class="w-4 h4" />
                    </x-input.text>
                  </x-input.group>

                  <!-- Birthday -->
                  <x-input.group>
                    <x-input.date wire:model.lazy="birthday" :error="$errors->first('birthday')" type="text" label="Client's Birthday" name="birthday" id="birthday" for="birthday" placeholder="MM/DD/YYYY">
                      <x-icon.calendar class="w-4 h4" />
                    </x-input.date>
                  </x-input.group>
                  
                  <!-- Address -->
                  <x-input.group>
                    <x-input.text wire:model.lazy="editing.address" :error="$errors->first('editing.address')" type="text" label="Client's Address" name="address" id="address" for="address" placeholder="No.: 2 that house on the right.">
                      <x-icon.home class="w-4 h4" />
                    </x-input.text>
                  </x-input.group>
                  
                  <!-- Client Type -->
                  <x-input.group>
                    <x-input.select wire:model.lazy="editing.type" label="Client Type" for="clientType" id="clientType" :error="$errors->first('editing.type')"/>
                  </x-input.group>
                </div>
              </div>

              <!-- Action buttons -->
              <div class="flex-shrink-0 px-4 border-t border-gray-200 py-5 sm:px-6">
                <div class="space-x-3 flex justify-end">
                  <button type="button" wire:click.defer="$set('show_form', false)" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" @click="open = false">
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