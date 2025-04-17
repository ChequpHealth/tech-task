<div>

    <form wire:submit.prevent="submit" enctype="multipart/form-data"
    class="px-6 pb-24 pt-5 sm:pb-32 lg:px-8">
    @csrf

    <div class="mx-auto max-w-xl  lg:max-w-lg">
        <div class="border-b border-gray-200 pb-5 mb-10 sm:flex sm:items-center sm:justify-between">
            <h3 class="text-3xl font-extralight text-gray-900">Create a New User</h3>
            <div class="mt-3 sm:ml-4 sm:mt-0">
                <a wire:navigate href="/"
                class="group flex gap-x-3 rounded-md p-2 text-sm/6 font-semibold text-gray-700 bg-gray-200 pr-3 hover:bg-gray-300 hover:text-gray-600">
                <svg class="size-6 shrink-0 text-gray-400 group-hover:text-gray-600"
                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                </svg>
                 Users
            </a>
            </div>
          </div>

        <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">

            <div>
                <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">First
                    name <span class="text-red-500/75 font-extrabold">*</span></label>
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
                <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">Last name <span class="text-red-500/75 font-extrabold">*</span></label>
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
                <label for="email" class="block text-sm/6 font-semibold text-gray-900">Email <span class="text-red-500/75 font-extrabold">*</span></label>
                <div class="mt-2.5">
                    <input type="email" name="email" id="email" wire:model="email" autocomplete="email"
                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                </div>
                @error('email')
                    <span class="text-xs font-bold text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="gender" class="block text-sm/6 font-semibold text-gray-900">Gender </label>
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
                <label for="password" class="block text-sm/6 font-semibold text-gray-900">Password <span class="text-red-500/75 font-extrabold">*</span>
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
                <label for="password" class="block text-sm/6 font-semibold text-gray-900">Confirm Password <span class="text-red-500/75 font-extrabold">*</span>
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

                <div wire:loading class="flex inline">
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


    </div>
</form>



    <!-- Success Message -->
    @if (session()->has('message'))
    <div class="fixed top-4 right-4 rounded-md bg-green-50 p-4" x-data="{ show: true }" x-show="show"  x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-4" x-transition
        x-init="setTimeout(() => show = false, 3000)">
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
