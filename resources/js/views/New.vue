<template>
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Title</label>  
  <div class="col-md-4">
  <input id="title" v-model="title" type="text" placeholder="Title" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="note">Note</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="note" v-model="note"></textarea>
  </div>
</div>
<div class="col-md-4">
    <button type="submit" class="btn btn-success" @click.stop.prevent="submit()">Submit</button>
  </div>
</fieldset>
</form>
</template>
<script>
    
    export default {
  data() {
    return {
      errors: {},
    }
  },
  methods: {
    submit() {
  
      this.errors = {};
      axios.post('/api/notes/',{
          title: this.title,
          note: this.note
      })
      .then(function (response) {
          console.log(response);
      })
      .catch(function (error) {
          console.log(error);
      });

      this.$router.push('/');
      
    },
  },
}
</script>