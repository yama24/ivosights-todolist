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

  <div>Welcome {{ name }}</div>
  </div>
  </main>
</template>

<script>
export default {
  name: "Dashboard",
  data() {
    return {
      name: null,
    };
  },
  created() {
    if (window.Laravel.user) {
      this.name = window.Laravel.user;
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