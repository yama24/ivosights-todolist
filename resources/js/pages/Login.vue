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
          <h3>Login</h3>
          <form>
            <div class="alert alert-danger" v-if="error !== null">
              {{ error }}
            </div>

            <div class="form-group">
              <label for="email">Email Address</label>
              <input
                class="input-block"
                v-bind:class="errorclass"
                type="email"
                id="email"
                name="email"
                required
                autocomplete="email"
                autofocus
                v-model="email"
              />
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input
                class="input-block"
                v-bind:class="errorclass"
                type="password"
                id="password"
                name="password"
                required
                autocomplete="current-password"
                v-model="password"
              />
            </div>

            <button type="submit" class="btn-primary" @click="handleSubmit">
              login
            </button>
          </form>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      error: null,
      errorclass: null,
    };
  },
  created() {},
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      if (this.password.length > 0) {
        this.$axios.get("/sanctum/csrf-cookie").then((response) => {
          this.$axios
            .post("api/login", {
              email: this.email,
              password: this.password,
            })
            .then((response) => {
              if (response.data.success) {
                this.$router.go("/dashboard");
              } else {
                this.error = response.data.message;
                this.errorclass = "border border-danger";
              }
            })
            .catch(function (error) {
              console.error(error);
            });
        });
      }
    },
  },
  beforeRouteEnter(to, from, next) {
    if (window.Laravel.isLoggedin) {
      return next("dashboard");
    }
    next();
  },
};
</script>