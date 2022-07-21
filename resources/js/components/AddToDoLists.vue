<template>
    <main class="py-4 margin-top-large padding-top-large">
        <div
            class="paper container container-sm border border-primary margin-top-large"
        >
            <div class="row">
                <div class="md-12 col">
                    <h3>Add New ToDoList</h3>
                    <form>
                        <div class="alert alert-danger" v-if="error !== null">
                            {{ error }}
                        </div>

                        <div class="form-group">
                            <label for="task">Task</label>
                            <input
                                class="input-block"
                                type="task"
                                v-bind:class="errorclass"
                                id="task"
                                name="task"
                                required
                                autocomplete="task"
                                autofocus
                                v-model="task"
                            />
                        </div>
                        <div class="form-group">
                            <label for="expired">Due Date</label>
                            <input
                                class="input-block"
                                type="datetime-local"
                                v-bind:class="errorclass"
                                id="expired"
                                name="expired"
                                required
                                autocomplete="expired"
                                v-model="expired"
                            />
                        </div>

                        <button
                            type="submit"
                            class="btn-primary"
                            @click="handleSubmits"
                        >
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    data() {
        return {
            task: "",
            expired: "",
            error: null,
            errorclass: null,
        };
    },
    methods: {
        handleSubmits(e) {
            e.preventDefault();
            this.$axios.get("/sanctum/csrf-cookie").then((response) => {
                this.$axios
                    .post("/api/todolists/add", {
                        task: this.task,
                        expired_at: this.expired,
                    })
                    .then((response) => {
                        if (response.data.success) {
                            this.$axios
                                .get("/sanctum/csrf-cookie")
                                .then((response) => {
                                    this.$axios
                                        .post("/api/send-email", {
                                            title: "New Task : " + this.task,
                                            message:
                                                "Due Date : " + this.expired,
                                        })
                                        .then((response) => {
                                            if (response.data.success) {
                                                //   console.info(response.data);
                                                window.location.href =
                                                    "/todolists";
                                            }
                                        })
                                        .catch(function (error) {
                                            console.error(error);
                                        });
                                });
                        } else {
                            this.error = response.data.message;
                            this.errorclass = "border border-danger";
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            });
        },
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            return next("/");
        }
        next();
    },
};
</script>
