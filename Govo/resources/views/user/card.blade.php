<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                            <li><a href="/Restorents"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">All
                                    Restorents</a>
                            </li>
                            <li><a href="/user/categories"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">Categories</a>
                            </li>
                            <li><a href="/user/dashboard"
                                    class="font-medium tracking-wide text-gray-100 transition-colors duration-200 hover:text-teal-accent-400">All
                                    Plats</a>
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
                        <li>
                            <a href="{{ route('card') }}">
                                <i class="fa-solid fa-cart-shopping fa-lg text-white"></i>
                                <span id="orderCount"
                                    class="inline-block px-2 py-1 text-sm font-semibold leading-tight text-white bg-blue-500 rounded-full">
                                </span>
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
        <div class="max-w-md mx-auto mt-16 bg-white rounded-lg overflow-hidden md:max-w-lg border border-gray-400">

            <div class="px-4 py-2 border-b border-gray-200">
                <h2 class="font-semibold text-gray-800">Your Plats</h2>
            </div>
            <div class="flex flex-col divide-y divide-gray-200">
                @foreach ($cards as $card)
                    <div class="flex items-center py-4 px-6">
                        <div>
                            <form id="plus-form-{{ $card->id }}" action="{{ route('plus', $card->id) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="plus-btn"><i class="fa-solid fa-plus"></i></button>
                            </form>
                            <p class="text-gray-700 mr-4">{{ $card->quantity }}</p>
                            <form id="minus-form-{{ $card->id }}" action="{{ route('minus', $card->id) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="minus-btn"><i class="fa-solid fa-minus"></i></button>
                            </form>
                        </div>

                        <img class="w-16 h-16 object-cover rounded" src="{{ asset('images/' . $card->plat->image) }}"
                            alt="Product Image">
                        <div class="ml-3">
                            <h3 class="text-gray-900 font-semibold">{{ $card->plat->name }}</h3>
                            <div class="flex flex-row">
                                <p class="total-price">{{ $card->plat->price * $card->quantity }}</p>
                                <span>$</span>
                            </div>
                        </div>


                        <form class="ml-auto py-2 px-4" action="{{ route('cart.plats.delete', $card->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="ml-auto py-2 px-4 bg-red-500 hover:bg-red-600 text-white rounded-lg">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center justify-between px-6 py-3 bg-gray-100">
                <h3 class="text-gray-900 font-semibold">Total: <span id="total">{{ $total }}</span>$</h3>
                @if ($cards->isNotEmpty())
                    <form action="{{ route('addOrder', ['cards' => implode(',', $cards->pluck('id')->toArray())]) }}"
                        method="POST">
                        @csrf
                        <button type="submit"
                            class="py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">Confirm
                            Orders</button>
                    </form>
                @endif


            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.plus-btn').click(function(event) {
                event.preventDefault();
                var form = $(this).closest('form');
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function(response) {
                        var newQuantity = response.quantity;
                        var newTotal = response.total;
                        var platPrice = response.plat_price;

                        form.siblings('p').text(newQuantity);

                        form.closest('.flex').find('.total-price').text(platPrice *
                            newQuantity);

                        $('#total').text(newTotal);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('.minus-btn').click(function(event) {
                event.preventDefault();
                var form = $(this).closest('form');
                $.ajax({
                    type: form.attr('method'),
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function(response) {
                        var newQuantity = response.quantity;
                        var newTotal = response.total;
                        var platPrice = response.plat_price;

                        form.siblings('p').text(newQuantity);

                        form.closest('.flex').find('.total-price').text(platPrice *
                            newQuantity);

                        $('#total').text(newTotal);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>

</body>



</html>
