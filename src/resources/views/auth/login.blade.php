<x-layouts.app>
    @guest
    <x-slot name="header">
        Sign in
    </x-slot>

    <form action="/login" method="post" class="grid gap-y-4">
        @csrf
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
            <input type="email" name="email" id="email" autocomplete="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
        </div>
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
            <div class="flex justify-end items-center relative">
                <input type="password" name="password" id="password" autocomplete="new-password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                <i id="togglePassword" class="cursor-pointer mr-2 absolute text-gray-500 hover:text-white fa-solid fa-eye"></i>
            </div>
        </div>
        <button type="submit" class="w-full text-white bg-emerald-600 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">Sign In</button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
            Don't have an account? <a href="/auth/register" class="font-medium text-emerald-600 hover:underline dark:text-emerald-500">Create an Account</a>
        </p>
    </form>

    @endguest
</x-layouts.app>

<script>
function ready(fn) {
  if (document.readyState !== 'loading') {
    fn();
    return;
  }
  document.addEventListener('DOMContentLoaded', fn);
}

ready(function(){
    let toggled = false;
    const pwdInput = document.getElementById('password');
    const togglePwdBtn = document.getElementById("togglePassword");

    togglePwdBtn.addEventListener('click', function() {
        toggled = !toggled;
        toggled ? pwdInput.setAttribute("type", 'text') : pwdInput.setAttribute("type", 'password');
    });
});
</script>