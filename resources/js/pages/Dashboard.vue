<template>
  <div>Welcome {{ name }}</div>
</template>

<script>
export default {
  name: "Dashboard",
  data() {
    return {
      userName: null,
    };
  },
  created() {
    if (window.Laravel.user) {
      this.userName = window.Laravel.user.name;
    }
  },
  beforeRouteEnter(to, from, next) {
    if (!window.Laravel.isLoggedin) {
      window.location.href = "/";
    }
    next();
  },
};
</script>