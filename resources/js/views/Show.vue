<template>
<div>
    <div class="container">
        <div class="card">
        <div class="card-header">
            {{note.title}}
        </div>
        <div class="card-body">
            <p class="card-text">{{note.note}}</p>
        </div>
        </div>
    </div>
    <a href="/" >Back to Notes List</a>  
</div>

</template>
<script>
export default {
  data() {
  	return {
    	note: []
    }
  },
  mounted: function() {
      console.log(this.$route.params.id);
      axios
        .get('http://127.0.0.1:8000/api/notes/' + this.$route.params.id)
        .then(response => {
          this.note = response.data
        })
        .catch(function (error) {
          console.log(error);
        })
    }
}
</script>