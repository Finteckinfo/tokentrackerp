<template>

    <div class="bg-white flex flex-col">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pt-5">
            <p class="py-2 text-lg font-semibold">Email Address</p>
            <p class="text-gray-600">Your email address is <strong>john.doe@company.com</strong></p>
            <button class="inline-flex text-sm font-semibold text-blue-500 underline decoration-2">Change</button>
          </div>
          <hr class="mt-4 mb-8" />
          <p class="py-2 text-lg font-semibold">Change Password</p>
          <div class="flex items-center">
            <div class="flex flex-col  w-1/4">
              <label for="login-password">
                <div class="relative flex overflow-hidden rounded-md border-2 transition focus-within:border-blue-500">
                  <input type="password" id="login-password" class="w-full flex-shrink appearance-none border-gray-300 bg-white py-2 px-4 text-sm text-gray-700 placeholder-gray-400 focus:outline-none" placeholder="Current Password" />
                </div>
              </label>
              <label for="login-password">
                <div class="relative flex overflow-hidden rounded-md border-2 transition focus-within:border-blue-500 mt-3">
                  <input type="password" id="login-password" class="w-full flex-shrink appearance-none border-gray-300 bg-white py-2 px-4 text-sm text-gray-700 placeholder-gray-400 focus:outline-none" placeholder="New Password" />
                </div>
              </label>
              <button class="mt-4 rounded-lg bg-blue-500 px-4 py-2 text-white">Save New Password</button>
              <p class="mt-4">Can't remember your current password. <a class="text-sm font-semibold text-blue-500 underline decoration-2" href="#">Reset</a></p>
            </div>
          </div>

          <hr class="mt-4 mb-8" />

          <div class="mb-10 flex flex-col  w-1/2 text-left items-start">
            <p class="py-2 text-lg font-semibold">Delete Account</p>
            <p class="inline-flex items-center rounded-full bg-rose-100 px-4 py-1 text-rose-600">
              <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
              Proceed with caution
            </p>
            <p class="mt-2">Make sure you have taken backup of your account in case you ever need to get access to your data. We will completely wipe your data. There is no way to access your account after this action.</p>
            <button class="ml-0 text-sm font-semibold text-rose-600 underline decoration-2 mt-5">Continue with deletion</button>
          </div>
        </div>

</template>

<script>

export default {
  name: 'AccountSettings',

}



</script>
