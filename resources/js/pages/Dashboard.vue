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
      <div style="margin-bottom: 30px">Welcome {{ name }}</div>
      <hr />
      <div>
        <table>
          <thead>
            <tr>
              <th>Finished task</th>
              <th>Unfinished task</th>
              <th>Over due date</th>
              <th>Total task</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ finished }}</td>
              <td>{{ unfinished }}</td>
              <td>{{ overduedate }}</td>
              <td>{{ total }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "Dashboard",
  data() {
    return {
      name: null,
      finished: null,
      unfinished: null,
      overduedate: null,
      total: null,
    };
  },
  created() {
    if (window.Laravel.user) {
      this.name = window.Laravel.user;
    }
    this.$axios.get("/sanctum/csrf-cookie").then((response) => {
      this.$axios
        .get("api/todolists/summary")
        .then((response) => {
          this.finished = response.data.message.finished;
          this.unfinished = response.data.message.unfinished;
          this.total = response.data.message.total;
          this.overduedate = response.data.message.overduedate;
        })
        .catch(function (error) {
          console.error(error);
        });
    });
  },
  beforeRouteEnter(to, from, next) {
    if (!window.Laravel.isLoggedin) {
      window.location.href = "/";
    }
    next();
  },
};
</script>