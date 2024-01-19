<x-app-layout>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center gap-4 p-6">
                    <x-primary-button><a href="{{ route('job.index') }}">{{ __('Back') }}</a></x-primary-button>
                    
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

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Company') }}
                    </h2>
                    <p class="pt-2">{{ $job->company }}</p>
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Company logo') }}
                    </h2>
                    <p class="pt-2 w-32">
                        <img src="{{ asset('storage/'.$job->company_logo) }}" alt="">
                    </p>
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Salary') }}
                    </h2>
                    <p class="pt-2">{{ $job->salary }}</p>
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Location') }}
                    </h2>
                    <p class="pt-2">{{ $job->location }}</p>
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('URL') }}
                    </h2>
                    <p class="pt-2">{{ $job->url }}</p>
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Description') }}
                    </h2>
                    <p class="pt-2">{{ $job->description }}</p>
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Tags') }}
                    </h2>
                    @foreach ($job->tags as $tag)
                        <p class="pt-2">{{ $tag->tag }}</p>
                    @endforeach
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Job type') }}
                    </h2>
                    <p class="pt-2">{{ $job->job_type }}</p>
                </div>

                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Contact') }}
                    </h2>
                    <p class="pt-2">{{ $job->contact }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
