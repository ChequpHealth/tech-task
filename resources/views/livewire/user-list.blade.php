<div>
    <div>
        <div class="mx-auto max-w-4/5">
            <div class="border-b border-gray-200 pb-5 mb-10 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-base font-semibold text-gray-900">Users</h3>
                <div class="mt-3 sm:ml-4 sm:mt-0">
                    <a href="/"
                        class="inline-flex items-center rounded-md bg-gray-200 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">New
                        User</a>
                </div>
            </div>

            <table class="divide-y divide-gray-300 w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            Name</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Country</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Gender</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($users as $user)
                        <tr wire:key="{{ $user->id }}">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                {{ $user->firstname }} {{ $user->lastname }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->phone_number }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->country }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->gender }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <a href="{{ route('user.edit', $user->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">,
                                        {{ $user->firstname }} {{ $user->lastname }}</span></a>
                                <button wire:click="deleteUser({{ $user->id }})" class="text-red-500 ml-4">Delete</button>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>




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
</div>
</div>
