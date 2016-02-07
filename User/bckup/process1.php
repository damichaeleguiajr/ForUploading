<?php
session_start();
if(isset($_POST['submit'])){
                            $date_event = $_POST['date'];
                            $time_event = $_POST['strttime'];
                            $end_event = $_POST['endtime'];
                            $venue_event = $_POST['venue'];
                            $type_event = $_POST['type'];
                            $contact_event = $_POST['contact'];
                            $contactnumber_event = $_POST['cnumber'];
                            $time12  = date("g:i A", strtotime($time_event));
                            $endtime12  = date("g:i A", strtotime($end_event));
                            $theme_color = $_POST['color'];
                            $colors = implode(",", $theme_color);
                            $theme_event = $_POST['theme'];

                            $_SESSION['eventtheme'] = $theme_event;
                            $_SESSION['dateofevent'] = $date_event;
                            $_SESSION['timeofevent'] = $time_event;
                            $_SESSION['endofevent'] = $end_event;
                            $_SESSION['placeofevent'] = $venue_event;
                            $_SESSION['typeofevent'] = $type_event;
                            $_SESSION['persontocontact'] = $contact_event;
                            $_SESSION['personcontactnumber'] = $contactnumber_event;
                            $_SESSION['timeformat12'] = $time12;
                            $_SESSION['endformat12'] = $endtime12;
                            $_SESSION['colorsonevent'] = $colors;

                            if($type_event == "Birthday"){
                                header("location:information.php?Type=Birthday");
                            }
                       
                    }
?>