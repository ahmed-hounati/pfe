<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased"
    style="background-image: url('https://cdn.dribbble.com/users/12475385/screenshots/19324700/media/3f00f379c6de3402556dff04f1d7101a.jpg');">

    <section class="max-w-4xl mt-32 p-6 mx-auto bg-[#F2BD36] rounded-md shadow-md ">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Login</h2>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-black dark:text-black" for="emailAddress">Email Address</label>
                    <input id="emailAddress" name="email" type="email"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-40 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    @error('email')
                        <span class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label class="text-black dark:text-black" for="password">Password</label>
                    <input id="password" name="password" type="password"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-50 dark:focus:border-blue-500 focus:outline-none focus:ring">
                    @error('password')
                        <span class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button
                    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>

            <div class="">
                <label for="remember" class="block">
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
        </form>
    </section>
</body>

</html>
