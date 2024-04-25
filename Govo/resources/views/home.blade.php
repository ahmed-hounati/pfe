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
                            <li><a href="/categories" aria-label="Our product" title="Our product"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">Categories</a>
                            </li>
                            <li><a href="/Opportunities" aria-label="Product pricing" title="Product pricing"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">Opportunities</a>
                            </li>
                            <li><a href="/about" aria-label="About us" title="About us"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">About
                                    us</a></li>
                        </ul>
                    </div>
                    <ul class="flex items-center hidden space-x-8 lg:flex">
                        <li><a href="/login" aria-label="Sign in" title="Sign in"
                                class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">login</a>
                        </li>
                        <li>
                            <a href="/register"
                                class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-deep-purple-accent-400 hover:bg-deep-purple-accent-700 focus:shadow-outline focus:outline-none"
                                aria-label="Sign up" title="Sign up">
                                Sign up
                            </a>
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
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="grid gap-10 lg:grid-cols-2">
                <div class="flex flex-col justify-center md:pr-8 xl:pr-0 lg:max-w-lg">
                    <div class="max-w-xl mb-6">
                        <h2
                            class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                            Express delivery,
                            <br class="hidden md:block" />
                            Unlimited
                            <span class="inline-block text-red">Choice</span>
                        </h2>
                        <p class="text-base text-gray-700 md:text-lg">
                            Glovo offers an efficient and varied service for fast delivery.
                        </p>
                    </div>
                </div>
                <div class="flex items-center justify-center -mx-4 lg:pl-8">
                    <div class="flex flex-col items-end px-3">
                        <img class="object-cover mb-6 rounded shadow-lg h-28 sm:h-48 xl:h-56 w-28 sm:w-48 xl:w-56"
                            src="{{ asset('images/spagitti.png') }}" alt="" />
                        <img class="object-cover w-20 h-20 rounded shadow-lg sm:h-32 xl:h-40 sm:w-32 xl:w-40"
                            src="{{ asset('images/zlafa.png') }}" alt="" />
                    </div>
                    <div class="px-3">
                        <img class="object-cover w-40 h-40 rounded shadow-lg sm:h-64 xl:h-80 sm:w-64 xl:w-80"
                            src="{{ asset('images/burgger.png') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <h1 class="text-center text-3xl font-bold">Best Plats</h1>
        <div class="flex justify-center items-center h-screen">
            @foreach ($plats as $plat)
                <div class="group relative block overflow-hidden">
                    <img src="{{ asset('images/' . $plat->image) }}" alt=""
                        class="h-64 w-full object-cover transition duration-500 group-hover:scale-105 sm:h-72" />

                    <div class="relative border border-gray-100 bg-white p-6">
                        <span class="whitespace-nowrap bg-yellow-400 px-3 py-1.5 text-xs font-medium"> New </span>

                        <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $plat->name }}</h3>

                        <p class="mt-1.5 text-sm text-gray-700">$14.99</p>

                        <form class="mt-4">
                            <button
                                class="block w-full rounded bg-yellow-400 p-4 text-sm font-medium transition hover:scale-105">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
    <section class="w-full py-16 pb-20 bg-white">
        <div class="container px-8 mx-auto sm:px-12 lg:px-20">
            <h1 class="mb-3 text-3xl font-bold leading-tight text-center text-gray-900 md:text-4xl">Trusted by</h1>
            <p class="text-lg text-center text-gray-600 ">We've been trusted and used by some of the top companies in
                the industry.</p>
            <div class="grid grid-cols-2 gap-16 py-16 mb-0 text-center lg:grid-cols-3">
                <div class="flex items-center justify-center rounded">
                    <img src="https://cdn.dribbble.com/users/47558/screenshots/1467643/media/8a93469d0e82b8876525caa06a721a32.png"
                        alt="um6p" class="block object-contain h-8 lg:h-24">
                </div>
                <div class="flex items-center justify-center rounded">
                    <img src="https://cdn.dribbble.com/users/1948092/screenshots/7230347/media/5f304acfcf2ad7ee0d412724e9a69d38.jpg"
                        alt="simplon" class="block object-contain h-16 lg:h-24">
                </div>
                <div class="flex items-center justify-center rounded">
                    <img src="https://cdn.dribbble.com/users/4643902/screenshots/20424997/media/b42d6b5f1dc2092e75f189f913ebdd3a.jpg"
                        alt="Reddit Logo" class="block object-contain h-12 lg:h-24">
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="relative mt-16 bg-[#F2BD36]">
            <svg class="absolute top-0 w-full h-6 -mt-5 sm:-mt-10 sm:h-16 text-deep-purple-accent-400"
                preserveAspectRatio="none" viewBox="0 0 1440 54">
            </svg>
            <div class="px-4 pt-12 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
                <div class="grid gap-16 row-gap-10 mb-8 lg:grid-cols-6">
                    <div class="md:max-w-md lg:col-span-2">
                        <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
                            <span class="ml-2 text-xl font-bold tracking-wide text-gray-100 uppercase">Govo</span>
                        </a>
                        <div class="mt-4 lg:max-w-sm">
                            <p class="mt-4 text-sm text-deep-purple-50">
                                Grow with Glovo! Boost sales and access new opportunities thanks to our technology and
                                our user base!
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5 row-gap-8 lg:col-span-4 md:grid-cols-4">
                        <div>
                            <a class="font-semibold tracking-wide text-teal-accent-400">
                                Category
                            </a>
                        </div>
                        <div>
                            <a class="font-semibold tracking-wide text-teal-accent-400">Cherry</p>
                        </div>
                        <div>
                            <p class="font-semibold tracking-wide text-teal-accent-400">Apples</p>
                        </div>
                        <div>
                            <p class="font-semibold tracking-wide text-teal-accent-400">
                                Business
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="flex flex-col justify-between pt-5 pb-10 border-t border-deep-purple-accent-200 sm:flex-row">
                    <p class="text-sm text-gray-100">
                        © Copyright 2024 Govo Inc. All rights reserved.
                    </p>
                    <div class="flex items-center mt-4 space-x-4 sm:mt-0">
                        <a href="/"
                            class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                                <path
                                    d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                                </path>
                            </svg>
                        </a>
                        <a href="/"
                            class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                            <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                                <circle cx="15" cy="15" r="4"></circle>
                                <path
                                    d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z">
                                </path>
                            </svg>
                        </a>
                        <a href="/"
                            class="transition-colors duration-300 text-deep-purple-100 hover:text-teal-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                                <path
                                    d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
