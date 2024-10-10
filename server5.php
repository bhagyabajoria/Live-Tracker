<?php
session_start();
$dba = $_SESSION['db'];
$conn = mysqli_connect("localhost","", "","$dba");
$query = "SELECT * FROM `live5` ORDER BY status DESC,finishes DESC";
$dat = mysqli_query($conn,$query);

?>
<table class="table">
        <thead>
        <tr class="bhg">
            <th>#</th>
            <th colspan=2>TEAM</th>
            <th>FP</th>
            <th>ALIVE</th>
        </tr></thead>
        <?php
            $no=1;
            while($row = mysqli_fetch_assoc($dat)){

        ?>
        <tbody><tr class="hhg">
            
            <td><?php echo $no ;?></td>
            <td><img src="<?php echo $row['logo']?>" alt="" class="mgg"></td>
            <td><?php echo $row['teamname']?></td>
            <td><?php echo $row['finishes']?></td>
            <td><img src="mg/<?php echo $row['status']?>.png" alt=""></td>
        
        </tr></tbody>
        
        <?php
        $no++ ;
            }
        ?>
        <tfoot>
            <tr class="tgh">
                <td colspan="5"><img src="logos/STARTSCF.webp" alt="alive" width=80%></td>
            </tr>
        </tfoot>
        
</table>