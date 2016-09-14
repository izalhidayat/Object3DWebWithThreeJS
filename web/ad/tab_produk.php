<html>
  <head>
    <link href="tabel/Site.metro.css?v=2" rel="stylesheet" type="text/css" />
	<link href="tabel/scripts/jtable/themes/metro/blue/jtable.css" rel="stylesheet" type="text/css" />
	<link href="tabel/jquery-ui.css" rel="stylesheet" type="text/css" />

	<script src="tabel/scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="tabel/scripts/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
    <script src="tabel/scripts/jtable/jquery.jtable.js" type="text/javascript"></script>

  </head>
  <body>
  <div class="filtering">
    <form>
        Name: <input type="text" name="name" id="name"/>
        <button type="submit" id="LoadRecordsButton">Cari Data</button>
    </form>
  </div>
	<div id="PeopleTableContainer" style="width: 100%;"></div>
	<script type="text/javascript">

		$(document).ready(function () {
		    //Prepare jTable
			$('#PeopleTableContainer').jtable({
				paging: true,
				pageSize: 2,
				sorting: true,
				actions: {
					listAction: 'tabel/lapp.php?action=list',
					createAction: 'tabel/lapp.php?action=create',
					updateAction: 'tabel/lapp.php?action=update',
					deleteAction: 'tabel/lapp.php?action=delete'
				},
				fields: {
					id_produk: {
						key: true,
						edit: false,
						list: false
					},
					nama_produk: {
						title: 'Nama Produk',
						width: '20%'
					},
					harga: {
						title: 'Harga',
						width: '20%'
					},
					berat: {
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
			 //Re-load records when user click 'load records' button.
        $('#LoadRecordsButton').click(function (e) {
            e.preventDefault();
            $('#PeopleTableContainer').jtable('load', {
                id_produk : $('#name').val()
            });
        });
 
        //Load all records when page is first shown
        $('#LoadRecordsButton').click();

			//Load person list from server
			
		});

	</script>
  </body>
</html>