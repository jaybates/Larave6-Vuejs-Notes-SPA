<template>
<div  class="container">
<router-link :to="{ name: 'new' }">Add New Note</router-link>    
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="note in notes" :key="note.id">
      <th scope="row">{{note.id}}</th>
      <td>{{note.title}}</td>
      <td>
        <router-link :to="{ name: 'edit', params: { id: note.id} }">Edit</router-link> | 
        <router-link :to="{ name: 'show', params: { id: note.id} }">Show</router-link> | 
        <router-link :to="{ name: 'delete', params: { id: note.id} }">Delete</router-link>
      </td>
    </tr>
  </tbody>
</table>
</div>
</template>
<script>
export default {
  data() {
  	return {
    	notes: []
    }
  },
  mounted: function() {
      axios
        .get('http://127.0.0.1:8000/api/notes/')
        .then(response => {
          this.notes = response.data
        })
        .catch(function (error) {
          console.log(error);
        })
    }
}
</script>