<x-layout>

<x-slot:heading>Password Change</x-slot:heading>

<div style="height: 100vh;display: flex;justify-content: center;align-items: center">
<form class="" style="width: 50%" action="/user/password-update" method="POST">
  @csrf
  @method("PATCH")
  <h1 class="mb-5">Change Your Password.</h1>
  <hr>
  <div class="mb-5">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Password</label>
    <input  name="old_password" type="password" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Your old password####" />
    @error('old_password')
    <div class="text-red-500 font-semibold">{{ $message }}</div>
    @enderror
  </div>
  <div class="mb-5">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
    <input  name="new_password"type="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 
    text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Your new password####" />
    @error('new_password')
    <div class="text-red-500 font-semibold">{{ $message }}</div>
    @enderror
    @error('wrong_pass')
    <div class="text-red-500 font-semibold">{{ $message }}</div>
    @enderror

  </div>

  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Change Password</button>
</form>
</div>

</x-layout>
