<?php
include "koneksi.php";

$notif=0;
$sql_notif=mysql_query("SELECT * FROM notif where status!=0 AND id_toko='$_GET[id_toko]'");

while($aray_notif=mysql_fetch_array($sql_notif)){
    if ($aray_notif['status']!=0){
        $notif=$notif+1;
        $se[]=$aray_notif['id_notif'];
    }
}

if ($notif!=0){
?>
<script>
	soundHandle.play();
    notifyMe();
</script>
<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">1</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="notification_header">
                                                <h3><?php echo $notif?> Pesanan Barang</h3>
                                            </div>
                                        </li>
                                        <li><a href="data_pesanan.php?st=<?php echo $se[0]?>">
                                            <div class="user_img"><img src="images/1.png" alt=""></div>
                                           <div class="notification_desc">
                                            <p>Gas LPG 3kg</p>
                                            <p><span>Beberapa detik lalu</span></p>
                                            </div>
                                          <div class="clearfix"></div>  
                                         </a></li>
                                         <li>
                                            <div class="notification_bottom">
                                                <a href="#">Semua Pemberitahuan</a>
                                            </div> 
                                        </li>
                                    </ul>
                            </li>
<?php
}
?>