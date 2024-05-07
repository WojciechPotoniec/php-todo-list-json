<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.8/axios.min.js"
    integrity="sha512-PJa3oQSLWRB7wHZ7GQ/g+qyv6r4mbuhmiDb8BjSFZ8NZ2a42oTtAq5n0ucWAwcQDlikAtkub+tPVCw4np27WCg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script type="module" src="js/script.js"></script>
  <title>Weekend in Polonia</title>
</head>

<body>
  <div id="app">
    <header class="p-4">
      <div class="logo">
        <img src="img/boolean-logo.png" alt="Boolean logo" />
      </div>
      <select class="btn btn-outline-light" name="done" id="done" v-model="done">
        <option value="">All</option>
        <option value="true">Completed</option>
        <option value="false">To Complete</option>
      </select>
    </header>
    <main class="container-fluid p-4 bg-secondary">
      <div class="bg-light rounded-2 p-2">
        <h1>Lista cose:</h1>
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between" v-for="(item) in filteredList" :key="item.id">
            <span :class="{'text-decoration-line-through': item.done}" @click="toggleDone(item.id)" class="pointer">
              {{item.text}}
            </span>
            <i class="fa-solid fa-trash pointer" @click="deleteItem(item.id)"></i>
          </li>
        </ul>
      </div>
      <div>
        <div class="mb-3">
          <label for="todotext" class="form-label pt-4">Inserisci nella lista</label>
          <input type="text" class="form-control" id="todotext" v-model="itemText" @keyup.enter="addItem" />
          <button class="btn btn-dark my-2" @click="addItem">Add</button>
        </div>
      </div>
    </main>
  </div>
</body>

</html>