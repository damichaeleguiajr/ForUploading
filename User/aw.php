<?php
include('../connection.php');
                        $i = 0;
                        $qryitems = mysql_query("SELECT * FROM item_tbl");
                        while($selectedpackage = mysql_fetch_array($qryitems)){
                            $itemname = $selectedpackage['i_name'];
                            $itemprice = $selectedpackage['i_price'];
                            $itemid = $selectedpackage['i_id'];
                            echo    $itemname."=".$itemprice."<br>";    
                            $i++;
                        }
                        ?>