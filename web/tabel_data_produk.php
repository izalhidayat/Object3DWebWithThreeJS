<html>
<?php $id_toko=$_GET['id_toko'];?>
  <head>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="tabel/Site.metro.css?v=2" rel="stylesheet" type="text/css" />
	<link href="tabel/scripts/jtable/themes/metro/blue/jtable.css" rel="stylesheet" type="text/css" />
	<link href="tabel/jquery-ui.css" rel="stylesheet" type="text/css" />

	<script src="tabel/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="tabel/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="tabel/scripts/jtable/jquery.jtable.js" type="text/javascript"></script>

  </head>
  <body>
   <div class="filtering" style="width: 500px;">
    <form>
        <input type="text" name="name" id="name" style="width: 50%" />
        <button type="submit" id="LoadRecordsButton" style="padding: 8px;background: #2D89EF;border: 0;color: white;">Search</button>
    </form>
  </div>
	<div id="PeopleTableContainer" style="width: 100%;"></div>
	<script type="text/javascript">

		$(document).ready(function () {
		    //Prepare jTable
			$('#PeopleTableContainer').jtable({
				paging: true,
				pageSize: 5,
				sorting: true,
				defaultSorting: 'nama_produk ASC',
				actions: {
					listAction: 'proses/crud_data_produk.php?action=list&id_toko=<?php echo $id_toko?>',
					createAction: 'proses/crud_data_produk.php?action=create&id_toko=<?php echo $id_toko?>',
					updateAction: 'proses/crud_data_produk.php?action=update&id_toko=<?php echo $id_toko?>',
					deleteAction: 'proses/crud_data_produk.php?action=delete&id_toko=<?php echo $id_toko?>'
				},
				fields: {
					id_produk: {
						key: true,
						edit: false,
						create:false,
						list: false
					},
					nama_produk: {
						title: 'Product Name',
						width: '20%',
						options: 'proses/list_produk.php'
					},
					harga: {
						title: 'Price',
						width: '20%'
					},
					stok_produk: {
						title: 'Stock',
						width: '20%'
					},
					keterangan: {
						title: 'Description',
						type: 'textarea',
						width: '20%'
					}
				}
			});
			 //Re-load records when user click 'load records' button.
        $('#LoadRecordsButton').click(function (e) {
            e.preventDefault();
            $('#PeopleTableContainer').jtable('load', {
                nana : $('#name').val()
            });
        });
 
        //Load all records when page is first shown
        $('#LoadRecordsButton').click();

			//Load person list from server
			
		});

	</script>
  </body>
</html>