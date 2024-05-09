<x-layout>
    <x-slot:heading>Student Lists</x-slot:heading>

    <div class="flex justify-end">
        <div class="flex" >
            <form class="max-w-sm mx-auto" style="margin-right:40px" action="/user/students" method="GET">
                @csrf
                <label for="countries" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Filter by class</label>
                <div class="flex">
                <select  name='class' id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>Choose a class</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                </select>
                <button class="mx-3 btn btn-primary" type="submit">Filter</button>
            </div>

              </form>
<form class="flex max-w-sm my-5" action="/user/students" method="GET">   
    @csrf
    <label for="simple-search" class="sr-only">Search</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
            </svg>
        </div>
        <input name="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search student name..." />
    </div>
    <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Search</span>
    </button>
</form>

</div>
</div>

  
    <div class="">
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-center text-gray-900 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Roll Number
                </th>
                <th scope="col" class="px-6 py-3">
                    Class
                </th>
                <th scope="col" class="px-6 py-3">
                    Student since
                </th>
                <th>Role</th>
                <th>Action
                </th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($students as $student)
            <tr class="bg-white dark:bg-gray-800 my-5">
                <td class="px-6 py-4">
                    {{ $student->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $student->roll_no }}
                </td>
                <td class="px-6 py-4">
                    {{ $student->class }}
                </td>
                <td class="px-6 py-4">
                    {{ $student->created_at->diffForHumans() }}
                </td>
                <td class="px-6 py-4">{{ $student->role }}</td>
                <td class="px-6 py-4">
                    @if($permission)
                    <a href="/user/students/{{$student->id}}">View</a>
                    @else
                    <div>Access required</div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

   
        <div class="mt-5">
            {{ $students->links() }}
        </div>
    </div>
</x-layout>
