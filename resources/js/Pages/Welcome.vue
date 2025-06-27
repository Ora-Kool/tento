<template>
    <Head title="Welcome"/>
    <div class="bg-gradient-to-br from-green-500 via-red-300 to-pink-500 text-white min-h-screen flex flex-col">

        <!-- Navbar -->
        <header class="w-full py-6 px-6 flex justify-between items-center">
            <div class="flex items-center">
                <svg class="h-10 w-auto text-[#FF2D20] dark:text-white"  viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.38358 3C8.75808 3 9.06166 3.31153 9.06166 3.69582V3.92169C9.10586 3.91015 9.15023 3.89901 9.19476 3.88829C11.0399 3.44416 12.9601 3.44416 14.8052 3.88829C14.8498 3.89901 14.8941 3.91014 14.9383 3.92169V3.69582C14.9383 3.31153 15.2419 3 15.6164 3C15.9909 3 16.2945 3.31153 16.2945 3.69582V4.42901C18.2277 5.38732 19.6726 7.19919 20.1754 9.39896C20.6082 11.2924 20.6082 13.2628 20.1754 15.1562C19.5504 17.8905 17.4698 20.0255 14.8052 20.6669C12.9601 21.111 11.0399 21.111 9.19476 20.6669C6.53017 20.0255 4.44963 17.8906 3.82461 15.1562C3.3918 13.2628 3.3918 11.2924 3.82461 9.39896C4.32745 7.19918 5.77233 5.38732 7.70551 4.42901V3.69582C7.70551 3.31153 8.00909 3 8.38358 3ZM11.0274 9.88793C11.2393 9.67055 11.2393 9.31809 11.0274 9.1007C10.8156 8.88331 10.4721 8.88331 10.2603 9.1007L8.83564 10.5626L8.31512 10.0285C8.10327 9.81107 7.7598 9.81107 7.54796 10.0285C7.33611 10.2458 7.33611 10.5983 7.54796 10.8157L8.45206 11.7435C8.66391 11.9608 9.00737 11.9608 9.21922 11.7435L11.0274 9.88793ZM12.9041 10.3293C12.6045 10.3293 12.3616 10.5785 12.3616 10.886C12.3616 11.1934 12.6045 11.4426 12.9041 11.4426H16.0685C16.3681 11.4426 16.6109 11.1934 16.6109 10.886C16.6109 10.5785 16.3681 10.3293 16.0685 10.3293H12.9041ZM11.0274 14.5267C11.2393 14.3093 11.2393 13.9569 11.0274 13.7395C10.8156 13.5221 10.4721 13.5221 10.2603 13.7395L8.83564 15.2014L8.31512 14.6673C8.10327 14.4499 7.7598 14.4499 7.54796 14.6673C7.33611 14.8846 7.33611 15.2371 7.54796 15.4545L8.45206 16.3822C8.66391 16.5996 9.00737 16.5996 9.21922 16.3822L11.0274 14.5267ZM12.9041 14.9681C12.6045 14.9681 12.3616 15.2173 12.3616 15.5248C12.3616 15.8322 12.6045 16.0814 12.9041 16.0814H16.0685C16.3681 16.0814 16.6109 15.8322 16.6109 15.5248C16.6109 15.2173 16.3681 14.9681 16.0685 14.9681H12.9041Z" ></path>
                </svg>
                <span class="ml-2 text-lg font-semibold text-black dark:text-white">TeNTo</span>
            </div>

            <nav v-if="canLogin" class="space-x-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="text-sm px-3 py-2 rounded-md text-black hover:text-gray-700 dark:text-white dark:hover:text-gray-300">
                    Dashboard
                </Link>
                <template v-else>
                    <Link :href="route('login')" class="text-sm px-3 py-2 rounded-md text-black hover:text-gray-700 dark:text-white dark:hover:text-gray-300">
                        Log in
                    </Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="text-sm px-3 py-2 rounded-md text-black hover:text-gray-700 dark:text-white dark:hover:text-gray-300">
                        Register
                    </Link>
                </template>
            </nav>
        </header>

        <!-- Main content -->
        <main class="flex-1 flex flex-col items-center justify-center text-center px-4">
            <h1 class="text-5xl font-extrabold text-white tracking-tight mb-4 font-serif drop-shadow-lg">
                TeNTo
            </h1>
            <p class="text-lg text-white/90 max-w-xl font-light leading-relaxed">
                Manage your tasks across multiple tenants — simple, efficient, &amp; multi-tenant ready.<br/>
                TeNTo lets individuals stay organized, with secure separation by domain and database.
            </p>
            <a href="/register"
               class="mt-6 inline-block px-6 py-3 bg-white text-indigo-600 font-medium rounded-md shadow hover:bg-indigo-100 transition">
                🚀 Get Started
            </a>
        </main>

        <!-- Footer -->
        <footer class="py-6 text-center text-sm text-black dark:text-white/70 ">
            <span class="font-serif drop-shadow-lg">TeNTo</span> v{{ tentoVersion }}
        </footer>
    </div>
</template>
<script setup>
import {Head, Link} from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    tentoVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>
