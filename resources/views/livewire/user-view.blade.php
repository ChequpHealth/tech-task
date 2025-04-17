<div>
    <div class="bg-white py-24 md:py-32">
        <div class="grid grid-cols-3 px-6 lg:px-8 xl:grid-cols-3">
            <div class="col-span-1 flex-auto px-8">
                <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover float-right"
                    src="{{ Storage::url($user->profile_picture) }}" alt="">
            </div>
            <div class="col-span-2 flex-auto">
                <h3 class="text-lg/8 font-semibold tracking-tight text-gray-900"> {{ $user->firstname }}
                    {{ $user->lastname }}
                </h3>
                <!-- User Information -->
                <div class="space-y-4 pt-10">
                    <div>
                        <span class="text-sm font-semibold tracking-tight text-gray-900 -pr-3">First name</span>
                        <span class="text-xl font-normal tracking-tight text-gray-400">{{ $user->firstname }}</span>
                    </div>
                    <div>
                        <span class="text-sm font-semibold tracking-tight text-gray-900 -pr-3">Last name</span>
                        <span class="text-xl font-normal tracking-tight text-gray-400">{{ $user->lastname }}</span>
                    </div>
                    <div>
                        <span class="text-sm font-semibold tracking-tight text-gray-900 -pr-3">Email</span>
                        <span class="text-xl font-normal tracking-tight text-gray-400">{{ $user->email }}</span>
                    </div>
                    <div>
                        <span class="text-sm font-semibold tracking-tight text-gray-900 -pr-3">Phone Number</span>
                        <span class="text-xl font-normal tracking-tight text-gray-400">{{ $user->phone_number }}</span>
                    </div>
                    <div>
                        <span class="text-sm font-semibold tracking-tight text-gray-900 -pr-3">Country</span>
                        <span class="text-xl font-normal tracking-tight text-gray-400">{{ $user->country }}</span>
                    </div>
                    <div>
                        <span class="text-sm font-semibold tracking-tight text-gray-900 -pr-3">Gender</span>
                        <span class="text-xl font-normal tracking-tight text-gray-400">{{ $user->gender }}</span>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <div class="inline-flex"><a wire:wire:navigate href="/" class="text-gray-600 hover:text-gray-800 bg-gray-500/25 p-3 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 inline-flex">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                    </a></div>

                    <div class="inline-flex"><a href="{{ route('user.edit', $user->id) }}" class="text-blue-600 hover:text-blue-800 bg-gray-500/25 p-3">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 inline-flex">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        <span class="sr-only">Edit {{ $user->firstname }} {{ $user->lastname }}</span>
                    </a></div>

                    <div class="inline-flex">
                        <livewire:delete-user :userId="$user->id" />
                        </div>
                </div>

            </div>

        </div>
    </div>


    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="fixed top-4 right-4 rounded-md bg-green-50 p-4" x-data="{ show: true }" x-show="show"
            x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4"
            x-transition x-init="setTimeout(() => show = false, 3000)">
            <div class="flex">
                <div class="shrink-0">
                    <svg class="size-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800"> {{ session('message') }}</p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button"
                            class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                            <span class="sr-only">Dismiss</span>
                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path
                                    d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
