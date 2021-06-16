<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

     <!--Dash Content -->
     <div id="dash-content" class="bg-gray-200 py-6 lg:py-0 w-full lg:max-w-sm flex flex-wrap content-start">

        <div class="w-1/2 lg:w-full">
            <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                <div class="flex flex-col items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-gray-300"><i class="fa fa-wallet fa-fw fa-inverse text-indigo-500"></i></div>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-3xl">$3249 <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
                        <h5 class="font-bold text-gray-500">Total Revenue</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-1/2 lg:w-full">
            <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                <div class="flex flex-col items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-gray-300"><i class="fas fa-users fa-fw fa-inverse text-indigo-500"></i></div>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-3xl">249 <span class="text-orange-500"><i class="fas fa-exchange-alt"></i></span></h3>
                        <h5 class="font-bold text-gray-500">Total Users</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-1/2 lg:w-full">
            <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                <div class="flex flex-col items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-gray-300"><i class="fas fa-user-plus fa-fw fa-inverse text-indigo-500"></i></div>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-3xl">2 <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
                        <h5 class="font-bold text-gray-500">New Users</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-1/2 lg:w-full">
            <div class="border-2 border-gray-400 border-dashed hover:border-transparent hover:bg-white hover:shadow-xl rounded p-6 m-2 md:mx-10 md:my-6">
                <div class="flex flex-col items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-3 bg-gray-300"><i class="fas fa-server fa-fw fa-inverse text-indigo-500"></i></div>
                    </div>
                    <div class="flex-1">
                        <h3 class="font-bold text-3xl">152 days</h3>
                        <h5 class="font-bold text-gray-500">Server Uptime</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--Graph Content -->
    <div id="main-content" class="w-full flex-1">

        <div class="flex flex-1 flex-wrap">

            <div class="w-full xl:w-2/3 p-6 xl:max-w-6xl">

                <!--"Container" for the graphs"-->
                <div class="max-w-full lg:max-w-3xl xl:max-w-5xl">

                    <!--Table Card-->
                    <div class="p-3">
                        <div class="border-b p-3">
                            <h5 class="font-bold text-black">Top Clients</h5>
                        </div>
                        <div class="p-5">
                            <table class="w-full p-5 text-gray-700">
                                <thead>
                                    <tr>
                                        <th class="text-left text-blue-900">Name</th>
                                        <th class="text-left text-blue-900">Type</th>
                                        <th class="text-left text-blue-900">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Obi Wan Kenobi</td>
                                        <td>Light</td>
                                        <td>Jedi</td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="py-4 border-blue-900 text-indigo-800 font-semibold"><a href="#">See More clients...</a></p>

                        </div>
                    </div>
                    <!--/table Card-->

                </div>

            </div>

            <div class="w-full xl:w-1/3 p-6 xl:max-w-4xl border-l-1 border-gray-300">

                <!--Graph Card-->
                <div class="border-b p-3">
                    <h5 class="font-bold text-black">Graph</h5>
                </div>
                <div class="p-5">
                    <div class="ct-chart ct-golden-section" id="chart1"></div>
                </div>
                <!--/Graph Card-->
                <!--"Container" for the graphs"-->
                {{-- <div class="max-w-sm lg:max-w-3xl xl:max-w-5xl">

                    <!--Graph Card-->

                    <div class="border-b p-3">
                        <h5 class="font-bold text-black">Graph</h5>
                    </div>
                    <div class="p-5">
                        <div class="ct-chart ct-golden-section" id="chart2"></div>
                    </div>

                    <!--/Graph Card-->

                    <!--Graph Card-->
                    <div class="border-b p-3">
                        <h5 class="font-bold text-black">Graph</h5>
                    </div>
                    <div class="p-5">
                        <div class="ct-chart ct-golden-section" id="chart3"></div>
                    </div>

                    <!--/Graph Card-->

                    <!--Graph Card-->

                    <div class="border-b p-3">
                        <h5 class="font-bold text-black">Graph</h5>
                    </div>
                    <div class="p-5">
                        <div class="ct-chart ct-golden-section" id="chart4"></div>
                    </div>

                    <!--/Graph Card-->

                    <!--Template Card-->
                    <div class="p-3">
                        <div class="border-b p-3">
                            <h5 class="font-bold text-black">Template</h5>
                        </div>
                        <div class="p-5">

                        </div>
                    </div>
                    <!--/Template Card--> --}}

                </div>

            </div>

        </div>

    </div>
</x-admin-layout>
