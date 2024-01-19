<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                <div class="p-6 text-gray-900">
                    My job listings
                </div>
                <div class="p-6 text-gray-900">
                    <x-primary-button><a href="{{ route('job.create') }}">{{ __('Create new job') }}</a></x-primary-button>
                </div>
            </div>
        </div>    
    </div>
    @if (session('status'))

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-green-600 overflow-hidden shadow-sm sm:rounded-lg flex justify-between items-center">
                <div class="p-6 text-white">
                        {{ session('status') }}
                </div>
            </div>
        </div>    
    </div>
    @endif

    
@foreach ($jobs as $job)
    
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center gap-4 p-6">
                    <x-primary-button><a href="{{ route('job.edit', $job->id) }}">{{ __('Edit') }}</a></x-primary-button>
                    <x-success-button><a href="{{ route('job.show', $job->id) }}">{{ __('Show') }}</a></x-success-button>
                    <form method="post" action="{{ route('job.destroy', $job->id) }}">
                        @csrf
                        @method('delete')
                        <x-danger-button>{{ __('Delete') }}</x-danger-button>
                    </form>
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Posted date') }}
                    </h2>
                    <p class="pt-2">{{ $job->created_at }}</p>
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Job title') }}
                    </h2>
                    <p class="pt-2">{{ $job->job_title }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</x-app-layout>
