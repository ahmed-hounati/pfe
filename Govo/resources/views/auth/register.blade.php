<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-hidden">
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
                <div class="container z-1">
                    <div class="flex flex-wrap -mx-3">
                        <div
                            class="flex flex-col w-full max-w-full px-12 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 rounded-2xl bg-clip-border">
                                <div class="p-6 pb-0 mb-0">
                                    <h4 class="font-bold">Welcome!</h4>
                                </div>
                                <div class="flex-auto p-6">
                                    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data"
                                        role="form">
                                        @csrf
                                        <div class="mb-8">
                                            <span class="text-black dark:text-black">Chose ur Role</span>
                                            <div class="mt-2">
                                                <label class="inline-flex items-center">
                                                    <input type="radio"
                                                        class="text-indigo-600 form-radio dark:bg-gray-800 focus:border-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                        name="role" value="user" checked required />
                                                    <span class="ml-6 text-black">User</span>
                                                </label>
                                                <label class="inline-flex items-center ml-6">
                                                    <input type="radio"
                                                        class="text-indigo-600 form-radio dark:bg-gray-800 focus:border-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                        name="role" value="resto" required />
                                                    <span class="ml-6 text-black">Restaurant</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <input type="file"
                                                class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                placeholder="image" aria-label="image" name="image"
                                                aria-describedby="email-addon" />
                                            @error('image')
                                                <span class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="text"
                                                class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                placeholder="Name" aria-label="Name" name="name"
                                                aria-describedby="email-addon" />
                                            @error('name')
                                                <span class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="email" placeholder="Email" name="email"
                                                class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            @error('email')
                                                <span class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" placeholder="Password" name="password"
                                                class="focus:shadow-primary-outline  text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                            @error('password')
                                                <span class="text-red-500 mt-2 text-sm">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button
                                                class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                                    <p class="mx-auto mb-6 leading-normal text-sm">Already have an account? <a
                                            href="/login"
                                            class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500">Sign
                                            in</a></p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
                            <div
                                class="relative flex flex-col justify-center h-full px-24 m-4 overflow-hidden bg-[url('https://cdn.dribbble.com/userupload/4387322/file/original-8617a86c428f72970b0997fda73d49ba.jpg?resize=752x')] rounded-xl ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
