<x-layout>
    <x-slot:heading>Add A Student</x-slot:heading>
    <form method="POST" action="/user/students/create">
        @csrf
        <div class="space-y-12">

            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Add a student for school registration</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">we just need a information of your interest.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-4 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('name')
                            <div class="text-red-500 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Roll Number</label>
                        <div class="mt-2">
                            <input type="number" name="roll_no" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-4 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('roll_no')
                            <div class="text-red-500 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Class</label>
                        <div class="mt-2">
                            <input type="text" name="class" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-4 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('class')
                            <div class="text-red-500 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Date of birth</label>
                        <div class="mt-2">
                            <input type="date" name="dob" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-4 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('dob')
                            <div class="text-red-500 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">NRC Number</label>
                        <div class="mt-2">
                            <input type="text" name="nrc" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-4 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('nrc')
                            <div class="text-red-500 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Father's Name</label>
                        <div class="mt-2">
                            <input type="text" name="father_name" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-4 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('father_name')
                            <div class="text-red-500 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                        <div class="mt-2">
                            <input  type="text" name="address" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-4 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('address')
                            <div class="text-red-500 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                        <div class="mt-2">
                            <input   type="text" name="ph" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-4 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                


                                
                        </div>
                        @error('ph')
                            <div class="text-red-500 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Phone Number (optional)</label>
                        <div class="mt-2">
                            <input   type="text" name="ph2" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-4 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                


                                
                        </div>
                        @error('ph2')
                            <div class="text-red-500 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Phone Number (optional)</label>
                        <div class="mt-2">
                            <input   type="text" name="ph3" id="first-name" autocomplete="given-name"
                                class="block w-full rounded-md border-0 py-4 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                        @error('ph3')
                            <div class="text-red-500 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/user/students">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            </a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add</button>
        </div>
    </form>

</x-layout>