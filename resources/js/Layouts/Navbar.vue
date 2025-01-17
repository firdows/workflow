<template>
    <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div
                    class="absolute inset-y-0 left-0 flex items-center sm:hidden"
                >
                    <!-- Mobile menu button-->
                    <DisclosureButton
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    >
                        <span class="absolute -inset-0.5" />
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon
                            v-if="!open"
                            class="block size-6"
                            aria-hidden="true"
                        />
                        <XMarkIcon
                            v-else
                            class="block size-6"
                            aria-hidden="true"
                        />
                    </DisclosureButton>
                </div>
                <div
                    class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"
                >
                    <div class="flex shrink-0 items-center">
                        <img
                            class="h-8 w-auto"
                            src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                            alt="Your Company"
                        />
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'rounded-md px-3 py-2 text-sm font-medium']" :aria-current="item.current ? 'page' : undefined">{{ item.name }}</a> -->
                            <Link
                                v-for="item in navigation"
                                :key="item.name"
                                :href="item.href"
                                :class="[
                                    item.current
                                        ? 'bg-gray-900 text-white'
                                        : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                                    'rounded-md px-3 py-2 text-sm font-medium',
                                ]"
                                :aria-current="
                                    item.current ? 'page' : undefined
                                "
                                >{{ item.name }}</Link
                            >
                        </div>
                    </div>
                </div>

                <!-- <Link :href="route('register')">Register</Link> -->
                <div
                    v-if="$page.props.auth.user != null"
                    class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                >
                    {{ $page.props.auth.user.name }}

                    <button
                        type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    >
                        <span class="absolute -inset-1.5" />
                        <span class="sr-only">View notifications</span>
                        <BellIcon class="size-6" aria-hidden="true" />
                    </button>

                    <!-- Profile dropdown -->
                    <Menu as="div" class="relative ml-3">
                        <div>
                            <MenuButton
                                class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            >
                                <span class="absolute -inset-1.5" />
                                <span class="sr-only">Open user menu</span>
                                <img
                                    class="size-8 rounded-full"
                                    :src="
                                        $page.props.auth.user.avatar
                                            ? 'storage/' +
                                              $page.props.auth.user.avatar
                                            : 'storage/default.png'
                                    "
                                    alt=""
                                />
                            </MenuButton>
                        </div>
                        <transition
                            enter-active-class="transition ease-out duration-100"
                            enter-from-class="transform opacity-0 scale-95"
                            enter-to-class="transform opacity-100 scale-100"
                            leave-active-class="transition ease-in duration-75"
                            leave-from-class="transform opacity-100 scale-100"
                            leave-to-class="transform opacity-0 scale-95"
                        >
                            <MenuItems
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                            >
                                <MenuItem v-slot="{ active }">
                                    <a
                                        href="#"
                                        :class="[
                                            active
                                                ? 'bg-gray-100 outline-none'
                                                : '',
                                            'block px-4 py-2 text-sm text-gray-700',
                                        ]"
                                        >{{ $page.props.auth.user.name }}</a
                                    >
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a
                                        href="#"
                                        :class="[
                                            active
                                                ? 'bg-gray-100 outline-none'
                                                : '',
                                            'block px-4 py-2 text-sm text-gray-700',
                                        ]"
                                        >Your Profile</a
                                    >
                                </MenuItem>
                                <MenuItem v-slot="{ active }">
                                    <a
                                        href="#"
                                        :class="[
                                            active
                                                ? 'bg-gray-100 outline-none'
                                                : '',
                                            'block px-4 py-2 text-sm text-gray-700',
                                        ]"
                                        >Settings</a
                                    >
                                </MenuItem>
                                <!-- 
                @see
                https://inertiajs.com/links
                 -->
                                <MenuItem v-slot="{ active }">
                                    <Link
                                        href="/logout"
                                        id="headlessui-menu-item-v-13"
                                        role="menuitem"
                                        :class="[
                                            active
                                                ? 'bg-gray-100 outline-none'
                                                : '',
                                            'block px-4 py-2 text-sm text-gray-700',
                                        ]"
                                        method="post"
                                        as="link"
                                        >Log out</Link
                                    >
                                </MenuItem>
                            </MenuItems>
                        </transition>
                    </Menu>
                </div>

                <div v-else class="gap-1">
                    <Link
                        href="/register"
                        :class="[
                            'text-gray-300 hover:bg-gray-700 hover:text-white',
                            'rounded-md px-3 py-2 text-sm font-medium',
                        ]"
                        >Register</Link
                    >
                    <Link
                        href="/login"
                        :class="[
                            'text-gray-300 hover:bg-gray-700 hover:text-white',
                            'rounded-md px-3 py-2 text-sm font-medium',
                        ]"
                        >Login</Link
                    >
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden" v-if="$page.props.auth.user">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <Link
                    v-for="item in navigation"
                    :key="item.name"
                    as="a"
                    :href="item.href"
                    :class="[
                        item.current
                            ? 'bg-gray-900 text-white'
                            : 'text-gray-300 hover:bg-gray-700 hover:text-white',
                        'block rounded-md px-3 py-2 text-base font-medium',
                    ]"
                    :aria-current="item.current ? 'page' : undefined"
                    >{{ item.name }}</Link
                >
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>
  
  <script setup>
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from "@headlessui/vue";
import { Bars3Icon, BellIcon, XMarkIcon } from "@heroicons/vue/24/outline";
import { Head, Link } from "@inertiajs/vue3";
import { route } from "../../../vendor/tightenco/ziggy";

const navigation = [
    // { name: "Home", href: route("home"), current: true },
    // { name: "About", href: route("about"), current: false },
    { name: "Home", href: "/", current: true },
    { name: "About", href: "/about", current: false },
    //   { name: "test", href: "/test", current: false },
    { name: "Test(param)", href: "/test?name=Ahamad", current: false },
    { name: "Progress", href: "/progress", current: false },
    { name: "Shared Data", href: "/shared-data", current: false },
    {
        name: "ScrollPreservation",
        // href: route("ScrollPreservation"),
        href: "scroll-preservation",
        current: false,
    },
    {
        name: "User",
        // href: route("ScrollPreservation"),
        href: "/user",
        current: false,
    },
];
</script>


<!-- <Link href="/">Home</Link>
          <Link href="/about">About</Link>
          <Link href="/test">Test</Link>
          <Link href="/test?name=Ahamad">Test(param)</Link>
          <Link href="/progress">Progress</Link>
          <Link href="/shared-data">Shared Data</Link> -->