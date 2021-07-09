<div class="w-full">
    <header class="bg-white shadow w-full flex-wrap text-indigo-800 tracking-wide font-bold">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-row justify-">
            <h2 class="flex-1 text-xl leading-tight py-2">
                {{ __('Clients') }}
            </h2>
            <span class="sm:ml-3">
                    <button wire:click="getForm" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-700 bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 border-indigo-600 focus:ring-offset-2 focus:ring-indigo-500">
                  <x-icon.user-plus/>
                      {{ __('Add New Client') }}
                </button>
            </span>
        </div>
        </div>
    </header>

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
                                {{ $client->type }}
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
