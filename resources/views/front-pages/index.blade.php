<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-4xl text-gray-800 leading-tight">
            {{ __('PHP and Laravel job board.') }} <br>
            {{ __('Search jobs, post jobs and enjoy') }}
        </h2>
    </x-slot>

      <div class="bg-white py-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-4">
          <h2 class="text-center text-lg font-semibold leading-8 text-gray-900">Trusted by the world’s most innovative teams</h2>
          <div class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
            <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor" width="158" height="48">
            <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform" width="158" height="48">
            <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple" width="158" height="48">
            <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal" width="158" height="48">
            <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic" width="158" height="48">
          </div>
        </div>
      </div>

      <div class="bg-white group mx-2 mt-3 grid max-w-screen-md rounded-lg border p-4 text-gray-700 shadow transition hover:shadow-lg sm:mx-auto">
        <label for="countries" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Filter by tags</label>
        <div class="hidden sm:flex sm:items-center sm:ms-6">
          <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                  <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                      <div>Filter by tags</div>
                  </button>
              </x-slot>

              <x-slot name="content">
                <x-dropdown-link :href="route('index')">
                  All tags
                </x-dropdown-link>
                @foreach ($tags as $tag) 
                  <x-dropdown-link :href="route('tag.filter_tags', $tag->tag)">
                      {{ $tag->tag }}
                  </x-dropdown-link>
                @endforeach

              </x-slot>
          </x-dropdown>
        </div>
      </div>

      @foreach ($jobs as $job)
        <div class="mb-2">
          <div class="bg-white group mx-2 mt-3 grid max-w-screen-md grid-cols-12 space-x-8 overflow-hidden rounded-lg border py-8 text-gray-700 shadow transition hover:shadow-lg sm:mx-auto">
            <a href="{{ route('jobs.job-description', $job->id) }}" class="order-2 col-span-1 mt-4 -ml-14 text-left text-gray-600 hover:text-gray-700 sm:-order-1 sm:ml-4">
              <div class="group relative h-16 w-16 overflow-hidden rounded-lg">
                <img src="{{ asset('storage/'.$job->company_logo) }}" alt="" class="h-full w-full object-cover text-gray-700" />
              </div>
            </a>
            <div class="col-span-11 flex flex-col pr-8 text-left sm:pl-4">
              <h3 class="text-sm text-gray-600">{{ $job->company }}</h3>
              <a href="{{ route('jobs.job-description', $job->id) }}" class="mt-2 overflow-hidden pr-7 text-lg font-semibold sm:text-xl"> {{ $job->job_title }} </a>
        
              <div class="mt-5 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2">
                <div class="">Job type:<span class="ml-2 mr-3 rounded-full bg-green-100 px-2 py-0.5 text-green-900">{{ $job->job_type }}</span></div>
                <div class="">Salary:<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{ $job->salary }}</span></div>
                <div class="">Location:<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{ $job->location }}</span></div>
              </div>

              <div class="mt-5 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2">
                <div class="">Tags:
                  @foreach ($job->tags as $tag)
                    <span class="ml-2 mr-3 rounded-full bg-red-100 px-2 py-0.5 text-red-900">{{ $tag->tag }}</span>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach

      <div class="sm:mx-64 flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="mx-auto">
          {{ $jobs->onEachSide(2)->links() }}
        </div>
      </div>
       
</x-app-layout>
