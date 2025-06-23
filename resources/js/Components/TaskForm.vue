<template>
    <div>
        <input v-model="task.title" placeholder="Title" />
        <textarea v-model="task.description" placeholder="Description"></textarea>
        <select v-model="task.status">
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="done">Done</option>
        </select>
        <button @click="submitTask">Save Task</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            task: {
                title: '',
                description: '',
                status: 'pending'
            }
        };
    },
    methods: {
        async submitTask() {
            await axios.post('/tasks', this.task);
            this.task = { title: '', description: '', status: 'pending' };
            this.$emit('taskAdded');
        }
    }
};
</script>
