<?php
session_start();
if(isset($_POST['submit'])){
                        
                        $event = $_SESSION['eventtheme'];
                        $date = $_SESSION['dateofevent'];
                        $strttime = $_SESSION['timeofevent'];
                        $endtime = $_SESSION['endofevent'];
                        $place = $_SESSION['placeofevent'];
                        $eventtype = $_SESSION['typeofevent'];
                        $contact = $_SESSION['persontocontact'];
                        $contactnum = $_SESSION['personcontactnumber'];
                        $strtime12 = $_SESSION['timeformat12'];
                        $endtime12 = $_SESSION['endformat12'];
                        $color = $_SESSION['colorsonevent'];
                        if(isset($_SESSION['package_id'])){
                            $_SESSION['package_id'] = implode(",", $_SESSION['package_id']);
                            $package = $_SESSION['package_id'];
                        }else{
                            $_SESSION['package_id'] = 0;
                            $package = $_SESSION['package_id'];
                        }               
                    }
?>