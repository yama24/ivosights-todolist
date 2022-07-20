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
        <div class="col-8 col">
          <h3>ToDoList</h3>

          <!-- @if (session('status'))
          <div class="alert alert-success">
            {{ session("status") }}
          </div>
          @endif -->
          <p>Here your task!</p>
        </div>
        <div class="col-4 col">
          <button
            style="float: right; margin-top: 80px"
            type="button"
            @click="this.$router.push('/todolist/add')"
          >
            Add New
          </button>
        </div>
        <div class="col-12 col">
          <div
            v-for="(todo, index) in todolists"
            :key="todo.id"
            style="border-color: #41403e"
            class="card border border-primary margin-bottom"
            v-bind:class="'border-' + ((index + 1) % 6)"
          >
            <div class="card-body">
              <div class="row">
                <div class="col-12 align-middle">
                  <fieldset class="form-group margin-bottom-none">
                    <label
                      v-bind:ref_for="'paperCheck' + index"
                      class="paper-check"
                      style="margin-bottom: 0"
                    >
                      <input
                        type="checkbox"
                        name="paperChecks"
                        v-bind:id="'paperCheck' + index"
                        value="1"
                        @change="check(todo._id)"
                      />
                      <span>
                        <h4 style="display: inline">{{ todo.task }}</h4>
                        <p style="margin-bottom: 0; margin-top: 20px">
                          Due Date : {{ todo.expired_at }}
                        </p>
                        <span>
                          <router-link
                            :to="{
                              name: 'edittodolists',
                              params: { id: todo._id },
                            }"
                            >edit</router-link
                          >
                          <a href="#" @click="deleteToDoList(todo._id)"
                            >delete</a
                          >
                        </span>
                      </span>
                    </label>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        Done
        <hr>
        <div class="col-12 col">
          <div
            v-for="(todo, index) in checkedtodolists"
            :key="todo.id"
            style="border-color: #41403e"
            class="card border border-primary margin-bottom"
            v-bind:class="'border-' + ((index + 1) % 6)"
          >
            <div class="card-body">
              <div class="row">
                <div class="col-12 align-middle">
                  <fieldset class="form-group margin-bottom-none">
                    <label
                      v-bind:ref_for="'paperCheck' + index"
                      class="paper-check"
                      style="margin-bottom: 0"
                    >
                      <input
                        type="checkbox"
                        name="paperChecks"
                        v-bind:id="'paperCheck' + index"
                        value="1"
                        @change="check(todo._id)"
                        checked
                      />
                      <span>
                        <h4 style="display: inline;"><strike>{{ todo.task }}</strike></h4>
                        <!-- <p style="margin-bottom: 0; margin-top: 20px">
                          Due Date : {{ todo.expired_at }}
                        </p> -->
                        <!-- <span>
                          <router-link
                            :to="{
                              name: 'edittodolists',
                              params: { id: todo._id },
                            }"
                            >edit</router-link
                          >
                          <a href="#" @click="deleteToDoList(todo._id)"
                            >delete</a
                          >
                        </span> -->
                      </span>
                    </label>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      todolists: [],
      checkedtodolists: [],
      strSuccess: "",
      strError: "",
    };
  },
  created() {
    this.$axios.get("/sanctum/csrf-cookie").then((response) => {
      this.$axios
        .get("api/todolists")
        .then((response) => {
          //   console.info(response.data);
          this.todolists = response.data.message.uncheck;
          this.checkedtodolists = response.data.message.checked;
        })
        .catch(function (error) {
          console.error(error);
        });
    });
  },
  methods: {
    deleteToDoList(id) {
      if (confirm("Are you sure want to delete this task?")) {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
          this.$axios
            .post("api/todolists/del", {
              id: id,
            })
            .then((response) => {
              if (response.data.success) {
                //   console.info(response.data);
                window.location.href = "/todolists";
              }
            })
            .catch(function (error) {
              console.error(error);
            });
        });
      }
    },
    check(id) {
      this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        this.$axios
          .post("api/todolists/check", {
            id: id,
          })
          .then((response) => {
            if (response.data.success) {
              //   console.info(response.data);
              window.location.href = "/todolists";
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