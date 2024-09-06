<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white  md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2">
            <li>
                <a href="/"
                    class="@if (request()->is('dashboard')) bg-gray-100 text-primary @else text-gray-500 @endif flex items-center p-2 text-base font-medium  rounded-lg dark:text-white hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg aria-hidden="true"
                        class="@if (request()->is('dashboard')) bg-gray-100 text-primary @else text-gray-500 @endif w-6 h-6 transition duration-75 dark:text-gray-400 group-hover:text-primary dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Beranda</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="@if (request()->is('analisis-penetasan') || request()->is('analisis-penggemukan') || request()->is('analisis-layer')) bg-gray-100 text-primary @else text-gray-500 @endif flex items-center p-2 w-full text-base font-medium rounded-lg transition duration-75 group hover:text-primary hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                    <svg aria-hidden="true"
                        class="@if (request()->is('analisis-penetasan') || request()->is('analisis-penggemukan') || request()->is('analisis-layer')) bg-gray-100 text-primary @else text-gray-500 @endif flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-primary dark:text-gray-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Analisis</span>
                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ route('penetasan') }}"
                            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-500 rounded-lg transition duration-75 group hover:text-primary hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Penetasan</a>
                    </li>
                    <li>
                        <a href="{{ route('penggemukan.index') }}"
                            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-500 rounded-lg transition duration-75 group hover:text-primary hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Penggemukan</a>
                    </li>
                    <li>
                        <a href="{{ route('layer') }}"
                            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-500 rounded-lg transition duration-75 group hover:text-primary hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Layer</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('riwayat') }}"
                    class="@if (request()->is('riwayat')) bg-gray-100 text-primary @else text-gray-500 @endif flex items-center p-2 text-base font-medium  rounded-lg dark:text-white hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 @if (request()->is('riwayat')) bg-gray-100 text-primary @else text-gray-500 @endif w-6 h-6 transition duration-75 dark:text-gray-400 group-hover:text-primary dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                        </path>
                        <path
                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                        </path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Riwayat Analisis</span>
                    <span
                        class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800">
                        4
                    </span>
                </a>
            </li>
        </ul>
        <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <li>
                <a href="{{ route('setting') }}"
                    class="@if (request()->is('setting')) bg-gray-100 text-primary @else text-gray-500 @endif flex items-center p-2 text-base font-medium rounded-lg transition duration-75 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-3">Pengaturan</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
