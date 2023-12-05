<nav class="absolute border-gray-200 z-auto lg:top-8 left-0 right-0">
    <div
        class="flex bg-white flex-wrap items-center justify-between mx-auto p-4 h-[100px] max-w-7xl rounded-b-xl lg:rounded-lg box-border px-8">
        <a href="https://Travel Umrah.com/" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap">Travel Umrah</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full lg:block lg:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 lg:flex-row lg:space-x-8 lg:mt-0 md:border-0 lg:bg-white ">
                <li>
                    <a href="/"
                        class="@yield('home-active') block py-2 pl-3 pr-4 rounded lg:bg-transparent lg:p-0">Home</a>
                </li>
                <li>
                    <a href="{{ route('guest.tentang-kami') }}"
                        class="@yield('about-active') block py-2 pl-3 pr-4 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 lg:dark:hover:bg-transparent">Profil
                        Kami</a>
                </li>
                <li>
                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                        class="font-medium rounded-lg text-center inline-flex items-center" type="button">Paket Umrah
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownHover"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li aria-labelledby="dropdownNavbarLink">
                                <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown1"
                                    data-dropdown-trigger="hover" data-dropdown-placement="right-start" type="button"
                                    class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Umrah
                                    Reguler<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </button>
                                <div id="doubleDropdown1"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="doubleDropdownButton">
                                    </ul>
                                </div>
                            </li>
                            <li aria-labelledby="dropdownNavbarLink">
                                <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown2"
                                    data-dropdown-trigger="hover" data-dropdown-placement="right-start" type="button"
                                    class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Umrah
                                    Plus<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg></button>
                                <div id="doubleDropdown2"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="doubleDropdownButton">
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('guest.galeri') }}"
                        class="@yield('galeri-active') block py-2 pl-3 pr-4 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 lg:dark:hover:bg-transparent">Galeri
                        foto</a>
                </li>
                <li>
                    <a href="{{ route('guest.blog-news') }}"
                        class="@yield('blog-active') block py-2 pl-3 pr-4 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 lg:dark:hover:bg-transparent">Blog
                        & News</a>
                </li>
                <li>
                    <a href="{{ route('guest.hubungi-kami') }}"
                        class="@yield('hubkami-active') block py-2 pl-3 pr-4 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 lg:dark:hover:bg-transparent">Hubungi
                        Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function getPackageList() {
            axios.get('/package/list', {
                })
                .then(function(response) {
                    function createLink(element) {
                       const li = document.createElement('li')
                          const a = document.createElement('a')
                            a.classList.add('block', 'px-4', 'py-2', 'hover:bg-gray-100', 'dark:hover:bg-gray-600', 'dark:text-gray-200', 'dark:hover:text-white')
                            a.href = '{{ route('package.paket-umrah', '') }}/' + element.name
                            a.innerText = element.name
                            li.appendChild(a)
                            return li
                    }
                    const packageListRegular = document.querySelectorAll('#doubleDropdown1 ul')
                    const packageListPlus = document.querySelectorAll('#doubleDropdown2 ul')
                    response.data?.package_regular?.forEach(element => {
                        packageListRegular[0].appendChild(createLink(element))
                    });
                    response.data?.package_plus?.forEach(element => {
                        packageListPlus[0].appendChild(createLink(element))
                    });
                })
                .catch(function(error) {
                    console.error('Error:', error);
                });
        };
        getPackageList();
</script>