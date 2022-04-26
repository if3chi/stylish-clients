<div>
    @if ($paginator->hasPages())
        <div class="w-full">
            <nav class="bg-white shadow px-4 py-3 my-2 flex items-center justify-between border-t sm:px-6 overflow-hidden border-b border-gray-200 sm:rounded-lg"
                aria-label="Pagination">
                <div class="hidden sm:block">
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        to
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        of
                        <span class="font-medium">{{ $paginator->total() }}</span>
                        Clients
                    </p>
                </div>
                <div class="flex-1 flex justify-between sm:justify-end">
                    @if ($paginator->onFirstPage())
                        <a
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-50">
                            {!! __('Previous') !!}
                        </a>
                    @else
                        <button type="button" wire:click.prevent="previousPage" wire:loading.attr="disabled" rel="prev"
                            class="cursor-pointer relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                            {!! __('Previous') !!}
                        </button>
                    @endif

                    @if ($paginator->hasMorePages())
                        <button type="button" wire:click.prevent="nextPage" wire:loading.attr="disabled" rel="next"
                            class="cursor-pointer ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none">
                            {!! __('Next') !!}
                        </button>
                    @else
                        <a
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-50">
                            {!! __('Next') !!}
                        </a>
                    @endif
                </div>
            </nav>
        </div>
    @endif
</div>
