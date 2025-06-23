<template>
    <div>
        <h2 class="text-xl mb-4">My Tasks</h2>
        <ul>
            <li v-for="task in tasks" :key="task.id">
                {{ task.title }} - {{ task.status }}
                <button @click="deleteTask(task.id)">❌</button>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            tasks: []
        };
    },
    methods: {
        async fetchTasks() {
            const res = await axios.get('/tasks');
            this.tasks = res.data;
        },
        async deleteTask(id) {
            await axios.delete(`/tasks/${id}`);
            this.fetchTasks();
        }
    },
    mounted() {
        this.fetchTasks();
    }
};
</script>
