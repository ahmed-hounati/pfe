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
    <main>
        <section class="min-h-screen">
            <div
                class="relative pt-12 pb-56 m-4 overflow-hidden min-h-50-screen rounded-xl bg-[url('https://cdn.dribbble.com/userupload/11999993/file/original-43118833c53aec34a660d034c8b78fff.png?resize=752x')]">
            </div>
            <div class="container">
                <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
                    <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                        <div
                            class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                            <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                                <h5>Register</h5>
                            </div>
                            <div class="flex-auto p-6">
                                <form action="{{ route('register') }}" method="post" role="form text-left">
                                    @csrf
                                    <div class="mb-8">
                                        <span class="text-black dark:text-black">Role</span>
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
                                        <input type="email"
                                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            placeholder="Email" aria-label="Email" name="email"
                                            aria-describedby="email-addon" />
                                        @error('email')
                                            <span class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="password"
                                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                            placeholder="Password" name="password" aria-label="Password"
                                            aria-describedby="password-addon" />
                                        @error('password')
                                            <span class="text-red-500 mt-2 text-sm">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button
                                            class="inline-block w-full px-5 py-2.5 mt-6 mb-2 font-bold text-center text-white align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-xs leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Sign
                                            up</button>
                                    </div>
                                    <p class="mt-4 mb-0 leading-normal text-sm">Already have an account? <a
                                            href="/login" class="font-bold text-slate-700">Sign in</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>
