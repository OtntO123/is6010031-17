<!DOCTYPE html>
<html>
<head>
	<title>Just a test</title>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>



  	<style>
  	/* Enter and leave animations can use different */
	/* durations and timing functions.              */
	.slide-fade-enter-active {
		transition: all .3s ease;
	}
	.slide-fade-leave-active {
		transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
	}
	.slide-fade-enter, .slide-fade-leave-to
	/* .slide-fade-leave-active below version 2.1.8 */ {
		transform: translateX(10px);
		opacity: 0;
	}
	</style>

</head>
<body>
	<div id="example-1">
  	<button @click="show = !show">
    Toggle render
  	</button>
  	<transition name="slide-fade">
    	<p v-if="show">hello</p>
  	</transition>
  	</div>
  	
  <script>
  	new Vue({
  el: '#example-1',
  data: {
    show: true
  }
})

  </script>
</body>
</html>

