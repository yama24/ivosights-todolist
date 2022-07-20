<template>
  <nav class="border fixed split-nav container container-sm margin-top">
    <div class="nav-brand">
      <h3>
        <a href="/">{{ appName }}</a>
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
            <router-link to="/todolists">ToDoList</router-link>
          </li>

          <li>
            <a href="#" @click="logout">Logout</a>
          </li>
        </ul>
        <ul class="inline" v-else>
          <li>
            <router-link to="/login">Login</router-link>
          </li>
          <li>
            <router-link to="/register">Register</router-link>
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
      appName: window.Laravel.appName,
      user: window.Laravel.user,
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
