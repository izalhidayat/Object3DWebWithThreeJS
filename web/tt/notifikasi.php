<script>
 function AutoRefresh() {
     $("#is").load("response.php");
   var refreshId = setInterval(function() 
      {
      $("#is").load('response.php?randval='+ Math.random());
      }, 3000);// 5 menit sekali ngcek
 };
</script>

<h1 class="dropdown" id="is" data-toggle="dropdown" aria-expanded="false">Keluar</h1>