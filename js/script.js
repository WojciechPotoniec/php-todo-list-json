const { createApp } = Vue;

createApp({
  data() {
    return {
      todo: [],
      itemText: "",
      done: "",
      apiUrl: "server.php",
    };
  },
  methods: {
    getData() {
      axios
        .get(this.apiUrl)
        .then((res) => {
          this.todo = res.data;
          console.log(res.data);
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => {});
    },
    toggleDone(id) {
      const item = this.todo.find((el) => {
        return el.id === id;
      });
      // console.log(item);
      if (item) {
        item.done = !item.done;
      }
      // this.todo[i].done = !this.todo[i].done
    },
    deleteItem(id) {
      const i = this.todo.findIndex((el) => el.id === id);
      if (i !== -1) {
        this.todo.splice(i, 1);
      };
      const data = {
        id: index
      };
      axios.delete(this.apiUrl, { data }).then((res) => {
        console.log(res.data);
        this.todo = res.data;
      });
    },
    addItem() {
      const newObj = {
        id: null,
        text: this.itemText,
        done: false,
      };
      let nextId = 0;
      this.todo.forEach((el) => {
        if (nextId < el.id) {
          nextId = el.id;
        }
      });
      newObj.id = nextId + 1;
      this.todo.push(newObj);
      this.itemText = "";
      const data = new FormData();
      data.append("id", newObj.id);
      data.append("text", newObj.text);
      data.append("done", newObj.done);
      axios.post(this.apiUrl, data).then((res) => {
        this.todo = res.data;
      });
    },
  },
  computed: {
    filteredList() {
      return this.todo.filter((el) => {
        if (this.done === "") {
          return true;
        }
        if (this.done === "false") {
          return el.done === false;
        }
        if (this.done === "true") {
          return el.done === true;
        }
      });
    },
  },
  created() {
    this.getData();
  },
}).mount("#app");
