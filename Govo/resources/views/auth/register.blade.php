<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased"
    style="background-image: url('https://cdn.dribbble.com/users/12475385/screenshots/19324700/media/3f00f379c6de3402556dff04f1d7101a.jpg');">
    <section class="max-w-4xl mt-20 p-6 mx-auto bg-[#F2BD36] rounded-md shadow-md ">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Create your account</h2>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mt-4">
                <span class="text-black dark:text-black">Role</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio"
                            class="text-indigo-600 form-radio dark:bg-gray-800 focus:border-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            name="role" value="user" checked required />
                        <span class="ml-6 text-white">User</span>
                    </label>

                    <label class="inline-flex items-center ml-6">
                        <input type="radio"
                            class="text-indigo-600 form-radio dark:bg-gray-800 focus:border-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            name="role" value="resto" required />
                        <span class="ml-6 text-white">Restaurant</span>
                    </label>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-black dark:text-black" for="username">Username</label>
                    <input id="username" name="name" type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    @error('name')
                        <span class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div>
                    <label class="text-black dark:text-black" for="emailAddress">Email Address</label>
                    <input id="emailAddress" name="email" type="email"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md   dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    @error('email')
                        <span class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label class="text-black dark:text-black" for="password">Password</label>
                    <input id="password" name="password" type="password"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md  d dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                    @error('password')
                        <span class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label class="text-black dark:text-black" for="passwordConfirmation">Password
                        Confirmation</label>
                    <input id="passwordConfirmation" type="password"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md   dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button
                    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
</body>
</html>