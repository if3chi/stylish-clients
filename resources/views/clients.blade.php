<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div id="main-content" class="w-full flex-1">

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
                        Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                        Status
                        </th>
                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                        Role
                        </th> --}}
                        <th scope="col" class="relative px-6 py-3 text-center text-xs font-bold  uppercase">
                        <span class="sr-only">Action</span>
                        Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{ asset('imgs/client.jpg') }}" alt="">
                            </div>
                            <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                Jane Cooper
                            </div>
                            <div class="text-sm text-gray-500">
                                jane.cooper@example.com
                            </div>
                            </div>
                        </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                        <div class="text-sm text-gray-500">Optimization</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                        </span>
                        </td>
                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        Admin
                        </td> --}}
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>
        
                    <!-- More people... -->
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-admin-layout>