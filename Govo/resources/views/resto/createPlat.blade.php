<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
                            <li><a href="/resto/dashboard"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">
                                    Home</a>
                            </li>
                            <li><a href="/plats"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">
                                    Plats</a>
                            </li>
                            <li><a href="/commands"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">
                                    New Commands</a>
                            </li>
                            <li><a href="/allCommands"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">
                                    All Commands</a>
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
    <section>
        <div class="px-12 py-12">
            <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Add Plat</h2>

                <form method="POST" action="{{ route('addPlat') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">

                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                        800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" name="image" class="hidden" />
                            </label>
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="name">Plat name</label>
                            <input id="" type="text" name="name"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="price">Plat price</label>
                            <input id="" type="text" name="price"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="description">Plat description</label>
                            <input id="description" type="text" name="description"
                                class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                        </div>

                        <div class="mt-8">
                            <label for="category" class="text-gray-700 dark:text-gray-200">Categories:
                                <select name="category_id"
                                    class=" text-gray-700 border rounded w-full sm:w-2/3 md:w-1/2 lg:w-1/3 xl:w-1/4 py-2 px-3 focus:outline-none focus:ring
                                    focus:border-blue-300">
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">
                                            {{ $categorie->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button
                            class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                    </div>
                </form>
            </section>
        </div>
    </section>
</body>

</html>
