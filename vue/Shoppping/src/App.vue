<script>
export default {
  data() {
    return {
      header: 'Shopping List',
      newItem: '',
      editing: false,
      newItemHighPriority: false,
      items: [
        {id: 1, label: '10 party hats', purchased: false, highPriority: false},
        {id: 2, label: '2 board games', purchased: false, highPriority: false},
        {id: 3, label: '20 cups', purchased: false, highPriority: true},
      ]
    }
  },
  methods: {
    saveItems() {
      this.items.push({
        id: this.items.length + 1,
        label: this.newItem,
        highPriority: this.newItemHighPriority,
      })
      this.newItem = ""
      this.newItemHighPriority = false
    },
    doEdit(editing){
      this.editing = editing
      this.newItem = ""
      this.newItemHighPriority = false
    },
    togglePurchased(item){
      item.purchased = !item.purchased
    }

  }
}
</script>
<template>
  <html>
  <head>
    <title>Shopping List</title>

  </head>
  <body>
  <div id="shopping-list">
    <div class="header">
      <h1>{{ header || 'Welcome' }}</h1>
      <button v-if="editing" @click="doEdit(false)" class="btn btn-cancel">Cancel</button>
      <button v-else  @click="doEdit(true)" class="btn btn-primary">Add Item</button>
    </div>

    <div v-if="editing"  class="add-item-form">
    <input @keyup.enter="saveItems" type="text" v-model="newItem" placeholder = "Add an Item">

    <label>
      <input type="checkbox" v-model="newItemHighPriority" >
      High Priority
    </label>

    <button @click="saveItems" class="btn btn-primary">
      Save Item
    </button>
    </div>
    <ul>
      <li
          v-for="item in items"
          @click="togglePurchased(item)"
          :key="item.id"
          class="static-class"
          :class="{strikeout: item.purchased, priority: item.highPriority}"
      >
        {{item.label}}
      </li>
    </ul>
  </div>
  </body>
  </html>

</template>
