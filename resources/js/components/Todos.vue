<template>
    <div class="form-group">
        <input type="text"
            v-model="todo"
            class="form-control"
            placeholder="Todo name"
            @keyup.enter="addTodo"
        />

        <ul class="list-group mt-5">
            <li class="list-group-item" v-for="todo in todos" v-text="todo.name"></li>
        </ul>
    </div>
</template>

<script scoped>
    export default {
        data() {
            return {
                todo: null,
                todos: []
            }
        },

        mounted() {
            this.getTodos();
        },

        methods: {
            getTodos() {
                axios.get(`/api/todos?api_token=${window.apiToken}`)
                    .then(({data}) => {
                        this.todos = data.data;
                    })
            },

            addTodo() {
                const payload = {
                    api_token: window.apiToken,
                    name: this.todo
                };
                axios.post(`/api/todos`, payload)
                    .then(({data}) => {
                        this.todos.unshift(data.data);
                        this.todo = null;
                    })
            }
        }
    }
</script>