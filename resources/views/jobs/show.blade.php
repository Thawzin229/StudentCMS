<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full bg-gray-100">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://laracasts.com/images/logo/logo-triangle.svg"
                                alt="Your Company">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a class="text-white inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'" href="/home">Home</a>
                                <a class="text-white inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'" href="/user/students">Students</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            @if(Auth::guard('web')->check())
                            <div class="text-white border px-4 py-2">{{ Auth::guard('web')->user()->name }}</div>
                            @endif
                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <div>
                                    <a href="/user/password-update">
                                    <button type="button"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Password Change</span>
                                        <img class="h-8 w-8 rounded-full"
                                            src="https://laracasts.com/images/lary-ai-face.svg" alt="">
                                    </button>
                                </a>
                                </div>
                    
                            </div>
                            <button type="button"
                            class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <form action="/auth/logout" method="POST">
                                @csrf
                                <button class="text-white mx-5">Logout</button>
                            </form>
                        </button>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="/" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                        aria-current="page">Home</a>
                    <a href="/about"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">About</a>
                    <a href="/contact"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Contact</a>
                </div>
                <div class="border-t border-gray-700 pb-3 pt-4">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://laracasts.com/images/lary-ai-face.svg"
                                alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                            <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                        </div>
                        <button type="button"
                            class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex justify-between align-center">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Student's Details</h1>
                    <a href='/user/students/create/page'>
                        <button  class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active'>
                            Add Student
                        </button>
                    </a>
                </div>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="shadow p-5">
                    <h2 class="my-5 p-2"><strong>Name</strong> : {{ $student['name'] }}</h2>
                    <p class="my-5 p-2"><strong>Roll Number</strong> : {{ $student['roll_no'] }}</p>
                    <p class="my-5 p-2"><strong>Class</strong> : {{ $student['class'] }}</p>
                    <p class="my-5 p-2"><strong>Date Of Birth</strong> : {{ $student['dob'] }}</p>
                    <p class="my-5 p-2"><strong>NRC Number</strong> : {{ $student['nrc'] }}</p>
                    <p class="my-5 p-2"><strong>Father's Name</strong> : {{ $student['father_name'] }}</p>
                    <p class="my-5 p-2"><strong>Address</strong> : {{ $student['address'] }}</p>
                    <p class="my-5 p-2"><strong>Ph Number</strong> : {{ $student['ph'] }}</p>
                
                    @if($student['ph2'] === null)
                    <p class="my-5 p-2"><strong>Ph Number(2)</strong>Ph is not present.</p>
                    @else
                    <p class="my-5 p-2"><strong>Ph Number(2)</strong> : {{ $student['ph2'] }}</p>
                    @endif
                
                    @if($student['ph3'] === null)
                    <p class="my-5 p-2"><strong>Ph Number(2)</strong> Ph is not present.</p>
                    @else
                    <p class="my-5 p-2"><strong>Ph Number(3)</strong> : {{ $student['ph3'] }}</p>
                    @endif
                    <div>
                        {{-- <x-button href="/jobs/{{ $student['id'] }}/edit">Edit</x-button> --}}
                        <a href="/user/students/{{$student['id']}}/edit">
                        <button  class='inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active'>
                            Edit
                        </button>
                    </a>
                        
                    </div>
                </div>
            </div>
        </main>
    </div>


</body>

</html>


