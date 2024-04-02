<div
    id="{{ $record->getKey() }}"
    wire:click="recordClicked('{{ $record->getKey() }}', {{ @json_encode($record) }})"
    class="record bg-white dark:bg-gray-700 rounded-lg px-1 py-1 cursor-grab font-medium text-gray-600 dark:text-gray-200"
    @if($record->timestamps && now()->diffInSeconds($record->{$record::UPDATED_AT}) < 3)
        x-data
        x-init="
            $el.classList.add('animate-pulse-twice', 'bg-primary-100', 'dark:bg-primary-800')
            $el.classList.remove('bg-white', 'dark:bg-gray-700')
            setTimeout(() => {
                $el.classList.remove('bg-primary-100', 'dark:bg-primary-800')
                $el.classList.add('bg-white', 'dark:bg-gray-700')
            }, 3000)
        "
    @endif
>
    <div class="md:w-full">
            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
              <div class="p-6">
                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $record->name }} </h1>
                <div class="flex items-center flex-wrap ">
                 <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">{{ $record->created_at->diffForHumans() }}</span>
                </div>
                <div class="flex items-center flex-wrap ">
                  <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                      <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 mb-2 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400">{{ $record->company->name }}</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
</div>
