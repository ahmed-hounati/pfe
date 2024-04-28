<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="bg-white border-gray-200">
        <div class="bg-gray-900">
            <div class="px-4 py-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
                <div class="relative flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="/" aria-label="Company" title="Company" class="inline-flex items-center mr-8">
                            <img src="{{ asset('images/govo-logo.png') }}" class="w-32" alt="logo">
                        </a>
                        <ul class="flex items-center hidden space-x-8 lg:flex">
                            <li><a href="/admin/add/categories"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">
                                    Add Categories</a>
                            </li>
                        </ul>
                    </div>
                    <ul class="flex items-center hidden space-x-8 lg:flex">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                                    aria-label="Logout" title="Logout">Logout</button>
                            </form>
                        </li>
                    </ul>
                    <!-- Mobile menu -->
                    <div class="lg:hidden">
                        <button aria-label="Open Menu" title="Open Menu"
                            class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline">
                            <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
                                <path fill="currentColor"
                                    d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
                                <path fill="currentColor"
                                    d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
                            </svg>
                        </button>
                        <!-- Mobile menu dropdown
                            <div class="absolute top-0 left-0 w-full">
                                <div class="p-5 bg-white border rounded shadow-sm">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                    <a href="/" aria-label="Company" title="Company" class="inline-flex items-center">
                                      <svg class="w-8 text-deep-purple-accent-400" viewBox="0 0 24 24" stroke-linejoin="round" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" stroke="currentColor" fill="none">
                                        <rect x="3" y="1" width="7" height="12"></rect>
                                        <rect x="3" y="17" width="7" height="6"></rect>
                                        <rect x="14" y="1" width="7" height="6"></rect>
                                        <rect x="14" y="11" width="7" height="12"></rect>
                                      </svg>
                                      <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Company</span>
                                    </a>
                                  </div>
                                  <div>
                                    <button aria-label="Close Menu" title="Close Menu" class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                      <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                                        <path
                                          fill="currentColor"
                                          d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                                        ></path>
                                      </svg>
                                    </button>
                                  </div>
                                </div>
                                <nav>
                                  <ul class="space-y-4">
                                    <li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Product</a></li>
                                    <li><a href="/" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Features</a></li>
                                    <li><a href="/" aria-label="Product pricing" title="Product pricing" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Pricing</a></li>
                                    <li><a href="/" aria-label="About us" title="About us" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">About us</a></li>
                                    <li><a href="/" aria-label="Sign in" title="Sign in" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Sign in</a></li>
                                    <li>
                                      <a
                                        href="/"
                                        class="inline-flex items-center justify-center w-full h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                                        aria-label="Sign up"
                                        title="Sign up"
                                      >
                                        Sign up
                                      </a>
                                    </li>
                                  </ul>
                                </nav>
                              </div>
                            </div>
                            -->
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="px-12 py-12">
        @if (session('success'))
            <div class="bg-green-100 border mt-8 border-green-400 text-green-700 px-4 py-3 rounded relative"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                </span>
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border mt-8 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                </span>
            </div>
        @endif
        <div class="w-full px-6 py-6 mx-auto">
            <!-- row 1 -->
            <div class="flex flex-wrap -mx-3">
                <!-- card1 -->
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase - dark:opacity-60">
                                            Users</p>
                                        <h5 class="mb-2 font-bold -">{{ $users }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card2 -->
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase - dark:opacity-60">
                                            Restaurants</p>
                                        <h5 class="mb-2 font-bold -">{{ $restos }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card3 -->
                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase - dark:opacity-60">
                                            Plats</p>
                                        <h5 class="mb-2 font-bold -">{{ $plats }}</h5>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p
                                            class="mb-0 font-sans text-sm font-semibold leading-normal uppercase - dark:opacity-60">
                                            Categories</p>
                                        <h5 class="mb-2 font-bold -">{{ $cat }}</h5>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- cards row 3 -->

            <div class="flex flex-wrap mt-6 -mx-3">
                <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl">
                        <div class="p-4 pb-0 mb-0 rounded-t-4">
                            <div class="flex justify-between">
                                <h6 class="mb-2 -">Sales by Country</h6>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table
                                class="items-center w-full mb-4 align-top border-collapse border-gray-200 dark:border-white/40">
                                <tbody>
                                    @foreach ($allUsers as $user)
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b w-3/10 whitespace-nowrap dark:border-white/40">
                                                <div class="flex items-center px-2 py-1">
                                                    <div>
                                                        <img class="w-10 h-10 rounded-full"
                                                            src="{{ asset('images/' . $user->image) }}"
                                                            alt="Country flag" />
                                                    </div>
                                                    <div class="ml-6">
                                                        <p
                                                            class="mb-0 text-xs font-semibold leading-tight - dark:opacity-60">
                                                            name:</p>
                                                        <h6 class="mb-0 text-sm leading-normal -">{{ $user->name }}
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                <div class="text-center">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight - dark:opacity-60">
                                                        E-mail:</p>
                                                    <h6 class="mb-0 text-sm leading-normal -">{{ $user->email }}</h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                <div class="text-center">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight - dark:opacity-60">
                                                        Status:</p>
                                                    <h6 class="mb-0 text-sm leading-normal -">{{ $user->role }}</h6>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap dark:border-white/40">
                                                <div class="text-center">
                                                    <p
                                                        class="mb-0 text-xs font-semibold leading-tight - dark:opacity-60">
                                                    </p>
                                                    @if ($user->ban)
                                                        <form action="{{ route('admin.unban', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button
                                                                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                                                UnBan</button>
                                                        </form>
                                                    @elseif(!$user->ban)
                                                        <form action="{{ route('admin.ban', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button
                                                                class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                                                Ban</button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
                    <div
                        class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                        <div class="p-4 pb-0 rounded-t-4">
                            <h6 class="mb-0 -">Categories</h6>
                        </div>
                        <div class="flex-auto p-4">
                            <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                                @foreach ($categories as $category)
                                    <li
                                        class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                                        <div class="flex items-center">
                                            <div
                                                class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                                                <img src="{{ asset('images/' . $category->image) }}"
                                                    class="text-white ni ni-mobile-button relative top-0.75 text-xxs"></img>
                                            </div>
                                            <div class="flex flex-col">
                                                <h6 class="mb-1 text-sm leading-normal text-slate-700 -">
                                                    {{ $category->name }}</h6>
                                            </div>
                                        </div>
                                        <div class="flex justify-between">
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i class="fa-solid fa-pen"></i></a>
                                            <form method="POST"
                                                action="{{ route('categories.destroy', $category->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>

</html>
