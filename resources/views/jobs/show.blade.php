<x-layout>
    <x-slot:heading>Student's Information</x-slot:heading>
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
</x-layout>
