<script setup>
import { Link, router } from "@inertiajs/vue3";
import PaginationLinks from "../../Components/PaginationLinks.vue";
import { ref, watch, reactive, onMounted } from "vue";
import { throttle, debounce } from "lodash";
import ColumnSorting from "../../Components/ColumnSorting.vue";

const getDate = ($date) =>
    new Date($date).toLocaleDateString("th-TH", {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
    });

const props = defineProps({
    users: Object,
    // searchTerm: String,
    can: Object,
    filters: Object,
});


const dataFilters = reactive({
    search: props.filters.search || "",
    column: props.filters.column || "created_at",
    direction: props.filters.direction || "desc",
});

const sort = (column) => {
    dataFilters.column = column;
    dataFilters.direction = dataFilters.direction === "asc" ? "desc" : "asc";
};


/** Serach */
// const search = ref(props.searchTerm);
// watch(search,(q)=>console.log(search.value)); //1
// watch(search,(q)=>router.get("/user",{search:q},{preserveState:true}));//2
/*
// 3
watch(search, throttle(
    (q) => router.get("/user", { search: q }, { preserveState: true }),
    3000
));
*/

// onMounted(() => {
//     setInterval(() => {
//         dataFilters.column = "created_at";
//         dataFilters.direction = "desc";
//     });
   
// })

watch(
    dataFilters,
    //   debounce(
    throttle(
        (q) => {
            console.log(q);
            router.get(
                "/user",
                {
                    search: q.search,
                    column: q.column,
                    direction: q.direction,
                },
                { preserveState: true }
            )
        },
        100
    )
);
</script>

<template>
    <p class="p-4 bg-green-200 rounded-md mb-4" v-if="$page.props.flash.greet">
        {{ $page.props.flash.greet }}
    </p>

    <div class="flex justify-between items-start">
        <div class="mb-6">
            <Link
                href="/user/create"
                class="bg-teal-500 border border-gray-200 rounded-md p-2"
            >
                Create User
            </Link>
        </div>
        <div class="flex item-center">
            <input
                type="search"
                v-model="dataFilters.search"
                placeholder="Search"
                class="border rounded focus:border-gray-1 p-1"
            />
        </div>
    </div>
    <div class="my-3 shadow-md sm:rounded-lg">
        <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
        >
            <thead
                class="text-xs text-gray-700 uppercase1 bg-blue-50 dark:bg-blue-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    

                    <ColumnSorting
                        name="name"
                        title="Username"
                        :column="dataFilters.column"
                        :direction="dataFilters.direction"
                        @resort="sort"
                    />
                    <ColumnSorting
                        name="email"
                        :column="dataFilters.column"
                        :direction="dataFilters.direction"
                        @resort="sort"
                    />
                    <th scope="col">Registration Date</th>
                    <ColumnSorting
                        name="created_at"
                        title="Create Date"
                        :column="dataFilters.column"
                        :direction="dataFilters.direction"
                        @resort="sort"
                    />
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(model, key) in users.data" :key="model.id">
                    <td scope="col">
                        {{ key + props.users.from }}
                    </td>
                    <td scope="col">
                        <img
                            :src="
                                model.avatar
                                    ? '/storage/' + model.avatar
                                    : 'storage/default.png'
                            "
                            alt=""
                            class="avatar w-12 rounded border"
                        />
                    </td>
                    <td scope="col">
                        <Link
                            :href="'/user/' + model.id"
                            class="text-blue-900 font-medium"
                        >
                            {{ model.name }}
                        </Link>
                    </td>
                    <td scope="col">{{ model.email }}</td>
                    <td scope="col">
                        {{
                            model.email_verified_at
                                ? getDate(model.email_verified_at)
                                : "-"
                        }}
                    </td>
                    <td scope="col">
                        {{ getDate(model.created_at) }}
                    </td>
                    <td scope="col" class="gap-8">
                        <div class="inline-flex rounded-md shadow-sm">
                            <Link
                                :href="'/user/' + model.id"
                                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                                >View
                            </Link>
                            <Link
                                :href="'/user/' + model.id + '/edit'"
                                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                                >Edit
                            </Link>
                            <Link
                                :href="'/user/' + model.id"
                                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                                method="delete"
                                as="link"
                                v-on:click="confirm('Are you sure delete?')"
                                v-if="can.delete_user"
                            >
                                Delete
                            </Link>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        <PaginationLinks :paginator="users" />

        <!-- <Link
            v-for="link in users.links"
            :key="link.label"
            :href="link.url"
            v-html="link.label"
            class="p-1"
            :class="{
                'text-slate-300': !link.url,
                'text-blue-500 font-meduim': link.active,
            }"
        >
        </Link>
        <p class="text-skate-600 text-sm">
            Showing {{ users.from }} to {{ users.to }} of
            {{ users.total }} results
        </p> -->
    </div>
</template>