<html>
  <head>
    <link href="../tabel/Site.metro.css?v=2" rel="stylesheet" type="text/css" />
	<link href="../tabel/scripts/jtable/themes/metro/blue/jtable.css" rel="stylesheet" type="text/css" />
	<link href="../tabel/jquery-ui.css" rel="stylesheet" type="text/css" />

	<script src="../tabel/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="../tabel/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="../tabel/scripts/jtable/jquery.jtable.js" type="text/javascript"></script>

  </head>
  <body>
  <div class="filtering" style="width: 500px;">
    <form>
        <input type="text" name="name" id="name" style="width: 50%" />
        <button type="submit" id="LoadRecordsButton" style="padding: 8px;background: #2D89EF;border: 0;color: white;">Cari Data</button>
    </form>
  </div>
	<div id="PeopleTableContainer" style="width: 100%;"></div>
	<script type="text/javascript">

		$(document).ready(function () {
		    //Prepare jTable
			$('#PeopleTableContainer').jtable({
				paging: true,
				pageSize: 10,
				sorting: true,
				defaultSorting: 'nama_produk ASC',
				actions: {
					listAction: '../proses/crud_data_produk_ad.php?action=list',
					createAction: '../proses/crud_data_produk_ad.php?action=create',
					updateAction: '../proses/crud_data_produk_ad.php?action=update',
					deleteAction: '../proses/crud_data_produk_ad.php?action=delete'
				},
				fields: {
					id_produk: {
						key: true,
						edit: false,
						create:false,
						list: false
					},
					nama_produk: {
						title: 'Nama Produk',
						width: '20%',
						options: '../proses/list_produk.php'
					},
					harga: {
						title: 'Harga',
						width: '20%'
					},
					stok_produk: {
						title: 'Stok',
						width: '20%'
					},
					keterangan: {
						title: 'Keterangan',
						type: 'textarea',
						width: '20%'
					}
				}
			});
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