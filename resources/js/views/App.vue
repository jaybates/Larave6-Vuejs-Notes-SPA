<template>
<div>
    <div class="container">
    <div class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="/">Notes</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
      </div>
    </div>
    <div class="container" style="margin-top: 130px;">
    <div role="main" class="container">
    <div class="starter-template">
      <router-view></router-view>
    </div>
    </div>
    </div>
</div>
</template>