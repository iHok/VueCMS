<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/1.0.17/vue.min.js"></script>
    </head>
    <body>
        <?php
echo __DIR__;
        ?>
<style>
[v-cloak] {
    display: none;
}
</style>
<div id="app" v-cloak>
    {{ message }}
</div>

<ul id="example-1">
  <li v-for="item in items">
    {{ item.message }}
  </li>
</ul>

<script src="vue.js"></script>
<script>
new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue.js!'
    }
})

var example1 = new Vue({
	  el: '#example-1',
	  data: {
	    items: [
	      { message: 'Foo' },
	      { message: 'Bar' }
	    ]
	  }
	})
</script>
    </body>
</html>
