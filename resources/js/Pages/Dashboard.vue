<template>
    <Head title="Todos" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-white">
               Todo listing
            </h2>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-gradient-to-br from-green-100 via-red-300 to-green-100 shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="max-w-2xl mx-auto mt-10">
                            <form @submit.prevent="submit" class="flex flex-col gap-2 items-end mb-4">
                                <div class="w-full">
                                    <input v-model="form.task" @input="clearError('task')"
                                           type="text" placeholder="New Task"
                                           class="border rounded hover:border-blue-600 px-3 py-2 w-full" />
                                    <small v-if="form.errors.task" class="text-red-600">{{ form.errors.task }}</small>
                                </div>
                                <primary-button
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                    Add
                                </primary-button>
                            </form>
                            <div v-if="hasErrors" class="bg-red-100 text-red-800 p-4 rounded mb-4">
                                {{errors}}
                            </div>
                            <hr class="py-4"/>
                            <div v-if="todos.length === 0" class="flex flex-col items-center">
                                <small class="text-red-500 font-sans">You list is empty</small>
                            </div>
                            <ul class="mt-8 space-y-4">
                                <li
                                    v-for="todo in todos"
                                    :key="todo.id"
                                    class="flex items-center justify-between rounded-lg bg-white shadow-sm px-4 py-3 transition hover:shadow-md dark:bg-gray-800"
                                >
                                    <!-- Todo Text -->
                                    <span
                                        class="text-lg font-medium transition-all"
                                        :class="{ 'line-through text-gray-400 italic': todo.done, 'text-gray-800 dark:text-white': !todo.done }">
                                      {{ todo.task }}
                                    </span>

                                    <!-- Action Buttons -->
                                    <div class="flex items-center gap-3">
                                        <button
                                            @click="toggleTodo(todo)"
                                            type="button"
                                            class="text-xs font-semibold text-green-600 hover:text-green-800 transition hover:underline"
                                        >
                                            {{ todo.done ? 'Undo' : 'Complete' }}
                                        </button>

                                        <button
                                            @click="deleteTodo(todo)"
                                            type="button"
                                            class="text-xs font-semibold text-red-600 hover:text-red-800 transition hover:underline"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import {computed} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
const props = defineProps(
    {
        todos: Array,
        errors: Object
    }
)

const form  = useForm({task: ''})

const hasErrors = computed(() => Object.keys(form.errors).length > 0)

const submit = () => {
    form.post(route("todos.store"), {
        onSuccess: () => form.reset('task')
    })
}

const clearError = (field) => {
    form.clearErrors(field)
}

const toggleTodo = (todo) => {
    const form = useForm({'task': ''})
    form.patch(route('todos.update', todo.id))
}

const deleteTodo = (todo) => {
    const form = useForm({'task': ''})
    form.delete(route("todos.destroy", todo.id))
}
</script>
