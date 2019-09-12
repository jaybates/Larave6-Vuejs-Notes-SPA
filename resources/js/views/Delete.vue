<template>
<div  class="container">
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
        .delete('http://127.0.0.1:8000/api/notes/' + this.$route.params.id)
        this.$router.push('/');
    }
}
</script>