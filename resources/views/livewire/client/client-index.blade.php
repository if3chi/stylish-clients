<div class="w-full">
    <x-slot name="header">
        <div class="flex flex-row justify-">
            <h2 class="flex-1 text-xl leading-tight py-2">
                {{ __('Clients') }}
            </h2>
            <span class="sm:ml-3">
                <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 border-indigo-600 focus:ring-offset-2 focus:ring-indigo-500">
                  <!-- Heroicon name: solid/check -->
                  {{-- <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                  </svg> --}}
                  <svg class="-ml-1 mr-2 h-5 w-5 text-white" viewBox="0 0 512 512">
                    <defs/>
                    <path fill="#cee1f2" d="M169.739 135c0-51.123 33.362-94.446 79.5-109.407a114.916 114.916 0 00-35.5-5.593c-63.513 0-115 51.487-115 115s51.487 115 115 115c12.39 0 24.318-1.968 35.5-5.593-46.138-14.961-79.5-58.284-79.5-109.407z"/>
                    <path fill="#0023c4" d="M49.5 512c-11.046 0-20-8.954-20-20 0-100.355 81.645-182 182-182h30c20.537 0 40.703 3.4 59.937 10.105 10.43 3.636 15.938 15.04 12.301 25.469-3.636 10.43-15.04 15.938-25.469 12.301C273.278 352.65 257.543 350 241.5 350h-30c-78.299 0-142 63.701-142 142 0 11.046-8.954 20-20 20zm310-377c0-74.439-60.561-135-135-135s-135 60.561-135 135 60.561 135 135 135 135-60.561 135-135zm-40 0c0 52.383-42.617 95-95 95s-95-42.617-95-95 42.617-95 95-95 95 42.617 95 95z"/>
                    <path fill="#ff5cf3" d="M462.5 392h-60v-60c0-11.046-8.954-20-20-20s-20 8.954-20 20v60h-60c-11.046 0-20 8.954-20 20s8.954 20 20 20h60v60c0 11.046 8.954 20 20 20s20-8.954 20-20v-60h60c11.046 0 20-8.954 20-20s-8.954-20-20-20z"/>
                  </svg>
                  
                  Add New Client
                </button>
            </span>
          
        </div>
    </x-slot>

    <div id="" class="w-full flex-1">

        <div class="flex flex-col m-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-2">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-2">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 text-indigo-500">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                        Client Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                        Contact
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                        Birthday
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                        Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                        Status
                        </th>
                        <th scope="col" class="relative px-6 py-3 text-center text-xs font-bold  uppercase">
                        <span class="sr-only">Action</span>
                        Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($clients as $client)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 rounded-full" src="{{ asset('imgs/'.$client->image) }}" alt="">
                                </div>
                                <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $client->firstname. " " . $client->lastname }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $client->email }}
                                </div>
                                </div>
                            </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $client->phone }}</div>
                                <div class="text-sm text-gray-500">{{ $client->address }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $client->dob }}</div>
                                <div class="text-sm text-gray-500">{{ "Birthday in: ".$client->due_birthday.' Days.' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                New Client
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Active
                            </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
