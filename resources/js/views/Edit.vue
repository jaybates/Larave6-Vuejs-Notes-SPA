<template>
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Title</label>  
  <div class="col-md-4">
  <input id="title" name="" type="text" placeholder="Title" class="form-control input-md" v-model="note.title">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="note">Note</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="note" name="" v-model="note.note"></textarea>
  </div>
</div>
<button type="submit" class="btn btn-success" @click.stop.prevent="submit()">Submit</button>
</fieldset>
</form>
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
        .get('/api/notes/' + this.$route.params.id)
        .then(response => {
          this.note = response.data
        })
        .catch(function (error) {
          console.log(error);
        })
    },
  methods: {
    submit() {
  
      this.errors = {};
      axios.post('/api/notes/' + this.$route.params.id,{
          title: this.note.title,
          note: this.note.note
      })
      .then(function (response) {
          console.log(response);
      })
      .catch(function (error) {
          console.log(error);
      });
      this.$router.push('/');
    }
  }
}
</script>