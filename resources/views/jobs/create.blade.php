<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="mb-4">
                        <x-danger-button><a href="{{ route('job.index') }}">{{ __('Cancel') }}</a></x-danger-button>
                    </div>
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Create a new job listing') }}
                            </h2>
                        </header>
                    
                        <form method="post" action="{{ route('job.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <x-input-label for="job_title" :value="__('Job Title')" />
                                <x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full" :value="old('job_title')" autofocus autocomplete="job_title"/>
                                <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
                            </div>
                    
                            <div>
                                <x-input-label for="company" :value="__('Company')" />
                                <x-text-input id="company" name="company" type="text" class="mt-1 block w-full" :value="old('company')" autofocus autocomplete="company" />
                                <x-input-error class="mt-2" :messages="$errors->get('company')" />
                            </div>

                            <div>
                                <x-input-label for="company_logo" :value="__('Company Logo')" />
                                <x-text-input id="company_logo" name="company_logo" type="file" class="mt-1 block w-full" autofocus autocomplete="company" />
                                <x-input-error class="mt-2" :messages="$errors->get('company_logo')" />
                            </div>

                            <div>
                                <x-input-label for="salary" :value="__('Salary')" />
                                <x-text-input id="salary" name="salary" type="text" class="mt-1 block w-full" :value="old('salary')" autofocus autocomplete="salary" />
                                <x-input-error class="mt-2" :messages="$errors->get('salary')" />
                            </div>

                            <div>
                                <x-input-label for="location" :value="__('Location')" />
                                <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location')" autofocus autocomplete="location" />
                                <x-input-error class="mt-2" :messages="$errors->get('location')" />
                            </div>

                            <div>
                                <x-input-label for="tags" :value="__('Tags')" />
                                @foreach ($tags as $tag)
                                    <label class="m-4 block">
                                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                        {{ $tag->tag }}
                                    </label>
                                @endforeach
                                <x-input-error class="mt-2" :messages="$errors->get('tags')" />
                            </div>

                            <div>
                                <x-input-label for="url" :value="__('URL')" />
                                <x-text-input id="url" name="url" type="text" class="mt-1 block w-full" :value="old('url')" autofocus autocomplete="url" />
                                <x-input-error class="mt-2" :messages="$errors->get('url')" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-textarea id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description')" autofocus autocomplete="description" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>

                            <div>
                                <x-input-label for="job_type" :value="__('Job type')" />
                                <select name="job_type" id="job_type">
                                    <option selected>Choose job type</option>
                                    <option value="Internship">Internship</option>
                                    <option value="Full time">Full time</option>
                                    <option value="Part time">Part time</option>
                                    <option value="Contract">Contract</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('job_type')" />
                            </div>

                            <div>
                                <x-input-label for="contact" :value="__('Contact')" />
                                <x-text-input id="contact" name="contact" type="text" class="mt-1 block w-full" :value="old('contact')" autofocus autocomplete="contact" />
                                <x-input-error class="mt-2" :messages="$errors->get('contact')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Create') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

