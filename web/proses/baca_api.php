<html>
  <head>
    <script language="javascript" type="text/javascript" src="http://localhost/Gapura/ajax/jquery.js"></script>
    <style>
    #table{
      padding: 2px;
    }
    </style>
  </head>
  <body>

  <!-- 1) Create some html content that can be accessed by jquery-->
  <h2> Client example </h2>
  <h3>Output: </h3>
  <div id="output"><img src="http://localhost/Gapura/ajax/load.GIF"></div>

  <script id="source" language="javascript" type="text/javascript">

  $(function () 
  {
    //-------------------------------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-------------------------------------------------------------------------------------------
    $.ajax({                                      
      url: 'http://localhost/ta_bisa/web/proses/api_pesanan.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
        var i=0;
        var x=2;
        var array = [];
        var newHTML = [];
        while(i<data.length){
        var id = data[i]['id_produk'];              //get id
        var nana = data[i]['stok'];
        //--------------------------------------------------------------------------------------
        // 3) Update html content
        //--------------------------------------------------------------------------------------
        array[i]="<tr><td>"+(id)+"</td><td>"+nana+"</td></tr>";
       //Set output element html
        //recommend reading up on jquery selectors they are awesome http://api.jquery.com/category/selectors/
        i=i+1;}
        for (var y = 0; y < array.length; y++) {
            newHTML.push(array[y]);
        }

        $('#output').html(newHTML.join(""));
      } 
    });
  
  }); 
  </script>
   
  </body>
</html>  