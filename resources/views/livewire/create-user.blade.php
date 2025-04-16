<div>
    <div class="isolate bg-white">
        <div class="mx-auto grid max-w-7xl grid-cols-1 lg:grid-cols-2">
            <div class="relative px-6 pb-20 pt-24 sm:pt-32 lg:static lg:px-8 lg:py-48">
                <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
                    <div
                        class="absolute inset-y-0 left-0 -z-10 w-full overflow-hidden bg-gray-100 ring-1 ring-gray-900/10 lg:w-1/2">
                        <svg class="absolute inset-0 size-full stroke-gray-200 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
                            aria-hidden="true">
                            <defs>
                                <pattern id="83fd4e5a-9d52-42fc-97b6-718e5d7ee527" width="200" height="200" x="100%"
                                    y="-1" patternUnits="userSpaceOnUse">
                                    <path d="M130 200V.5M.5 .5H200" fill="none" />
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" stroke-width="0" fill="white" />
                            <svg x="100%" y="-1" class="overflow-visible fill-gray-50">
                                <path d="M-470.5 0h201v201h-201Z" stroke-width="0" />
                            </svg>
                            <rect width="100%" height="100%" stroke-width="0"
                                fill="url(#83fd4e5a-9d52-42fc-97b6-718e5d7ee527)" />
                        </svg>
                    </div>
                    <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">SignUp</h2>
                    <p class="mt-6 text-lg/8 text-gray-600">Sign up to be a member of this club.</p>

                </div>
            </div>
            <form wire:submit.prevent="submit" enctype="multipart/form-data"
                class="px-6 pb-24 pt-20 sm:pb-32 lg:px-8 lg:py-48">
                @csrf
                <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <div>
                            <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">First
                                name</label>
                            <div class="mt-2.5">
                                <input type="text" name="first-name" id="first-name" wire:model="firstname"
                                    autocomplete="given-name"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                            @error('firstname')
                                <span class="text-xs font-bold text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Last name</label>
                            <div class="mt-2.5">
                                <input type="text" name="last-name" id="last-name" wire:model="lastname"
                                    autocomplete="family-name"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                            @error('lastname')
                                <span class="text-xs font-bold text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email</label>
                            <div class="mt-2.5">
                                <input type="email" name="email" id="email" wire:model="email" autocomplete="email"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                            @error('email')
                                <span class="text-xs font-bold text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="gender" class="block text-sm/6 font-semibold text-gray-900">Gender</label>
                            <div class="mt-2.5"> <select wire:model="gender" id="gender"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                                    name="gender">
                                    <option class="text-xs text-gray-50">Select Gender</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                                @error('gender')
                                    <span class="text-xs font-bold text-red-500">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="gender" class="block text-sm/6 font-semibold text-gray-900">Country</label>
                            <div class="mt-2.5"> <select wire:model="country" id="country"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                                    name="country">
                                    <option class="text-xs text-gray-50">Select Country</option>
                                    <x-countries />
                                </select>
                                @error('country')
                                    <span class="text-xs font-bold text-red-500">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="phone-number" class="block text-sm/6 font-semibold text-gray-900">Phone
                                number</label>
                            <div class="mt-2.5">
                                <input type="tel" name="phone-number" id="phone-number" wire:model="phone_number"
                                    autocomplete="tel"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                            @error('phone_number')
                                <span class="text-xs font-bold text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm/6 font-semibold text-gray-900">Password
                            </label>
                            <div class="mt-2.5">
                                <input type="password" name="password" id="password" wire:model="password"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                            @error('password')
                                <span class="text-xs font-bold text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm/6 font-semibold text-gray-900">Confirm Password
                            </label>
                            <div class="mt-2.5">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    wire:model="password_confirmation"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                            </div>
                            @error('password_confirmation')
                                <span class="text-xs font-bold text-red-500">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="sm:col-span-2">
                            <label for="phone-number" class="block text-sm/6 font-semibold text-gray-900">Profile
                                Picture</label>
                            <div class="mt-2.5">
                                <input type="file" wire:model="profile_picture"
                                    class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                                    placeholder="Profile Picture">
                            </div>
                            @error('profile_picture')
                                <span class="text-xs font-bold text-red-500">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>
                    <div class="mt-8 flex justify-end block">
                        <button type="submit"
                            class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:cursor-not-allowed disabled:opacity-75">

                            Submit

                            <div wire:loading.flex class="flex absolute top-0 right-0 bottom-0 flex items-center pr-4">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </div>

                        </button>
                    </div>
                    <!-- Success Message -->
                    @if (session()->has('message'))
                        <div class="rounded-md bg-green-50 p-4" x-data="{ show: true }" x-show="show" x-transition
                            x-init="setTimeout(() => show = false, 10000)">
                            <div class="flex">
                                <div class="shrink-0">
                                    <svg class="size-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" data-slot="icon">
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
                                            <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                                data-slot="icon">
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
            </form>
        </div>
    </div>
</div>
