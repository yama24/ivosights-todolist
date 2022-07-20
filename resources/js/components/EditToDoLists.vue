<template>
  <main class="py-4 margin-top-large padding-top-large">
    <div
      class="
        paper
        container container-sm
        border border-primary
        margin-top-large
      "
    >
      <div class="row">
        <div class="md-12 col">
          <h3>Edit ToDoList</h3>
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
              <label for="expired">Expired At</label>
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

            <button type="submit" class="btn-primary" @click="handleSubmits">
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
      id: "",
      task: "",
      expired: "",
      error: null,
      errorclass: null,
    };
  },
  created() {
    this.$axios.get("/sanctum/csrf-cookie").then((response) => {
      this.$axios
        .get(`/api/todolists/edit/${this.$route.params.id}`)
        .then((response) => {
          this.id = response.data.message._id;
          this.task = response.data.message.task;
          this.expired = response.data.message.expired_at;
        })
        .catch(function (error) {
          console.error(error);
        });
    });
  },
  methods: {
    handleSubmits(e) {
      e.preventDefault();
      this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        this.$axios
          .post("/api/todolists/update", {
            id: this.id,
            task: this.task,
            expired_at: this.expired,
          })
          .then((response) => {
            if (response.data.success) {
              //   console.info(response.data);
              window.location.href = "/todolists";
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