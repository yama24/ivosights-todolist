<template>
  <nav class="border fixed split-nav container container-sm margin-top">
    <div class="nav-brand">
      <h3>
        <a href="/">Ivosight Todolist</a>
      </h3>
    </div>
    <div class="collapsible">
      <input id="collapsible1" type="checkbox" name="collapsible1" />
      <label for="collapsible1">
        <div class="bar1">-</div>
        <div class="bar2"></div>
        <div class="bar3">-</div>
      </label>
      <div class="collapsible-body">
        <ul class="inline" v-if="isLoggedIn">
          <li>
            <a href="#">
              {{ user.name }}
            </a>
          </li>

          <li>
            <a
              href="/logout"
              onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
              >Logout</a
            >
          </li>
        </ul>
        <ul class="inline" v-else>
          <li>
            <a href="/login">Login</a>
          </li>
          <li>
            <a href="/register">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <router-view></router-view>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      isLoggedIn: false,
    };
  },
  created() {
    if (window.Laravel.isLoggedin) {
      this.isLoggedIn = true;
    }
  },
  methods: {
    logout(e) {
      e.preventDefault();
      this.$axios.get("/sanctum.csrf-cookie").then((response) => {
        this.$axios
          .post("/api/logout")
          .then((response) => {
            if (response.data.success) {
              window.location.href = "/";
            } else {
              console.info(response);
            }
          })
          .catch(function (error) {
            console.error(error);
          });
      });
    },
  },
};
</script>