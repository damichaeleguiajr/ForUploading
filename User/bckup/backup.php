<span style = 'color: red;'>Please fill-up the form below.<br>All of the input is required for us to know your event information. Thank You.</span>
                    <?php $todaysDate = date("Y-m-d");
                          $date = date('Y-m-d', strtotime($todaysDate. ' + 7 days'));
                          $max = "2015-12-31";
                          $maxtime = '19:00';
                          $mintime = '06:00';
                    ?>
                    <form method = 'POST' action = 'process1.php'>
                    <table width = '50%'>
                        <tr>
                            <td><b>Date of event: </b></td>
                            <td><input type = "date" id = "date" name = "date" value = "<?php echo $date; ?>" min = "<?php echo $date; ?>" max = "<?php echo $max; ?>" onclick = "timeChange()"><span style = 'color:red;font-size:15px;'><i>*Month/Date/Year</i></span>
                            <br><span style = 'color:red;font-size:15px;'><lable>*</lable><i>You can choose from "<?php echo date("F j, Y", strtotime($date)); ?>" and up.</i></span></td>
                            <br><p id ="try"></p>
                        </tr>
                        <tr>
                            <td class = ''><b>From: </b></td>
                            <td><input  type = "time" id = "time" name = "strttime" onchange = "myTime()" min = "<?php echo $mintime; ?>" max ="<?php echo $maxtime; ?>"><br>
                        </tr>
                        <tr>
                            <td class = ''><b>To: </b></td>
                            <td><input  type = "time" id = "test" name = "endtime"></td><br>
                        </tr>
                        <tr>
                            <td><b>Type of event: </b></td>
                            <td>
                                <select  name = "type" class = "textfields" id="event_list" onchange="eventlist()">
                                    <option id = "0">-- Select Event --</option>
                                    <?php 
                                    include('connection.php');

                                    $event = mysql_query("SELECT * FROM event_tbl");
                                    while($eventview = mysql_fetch_array($event)){
                                    ?>
                                    <option id = "<?php echo $eventview['e_id']; ?>"><?php echo $eventview['e_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class = ''><b>Theme: </b></td>
                            <td><input  type = "text" id = "theme" name = "theme"></td><br>
                        </tr>
                        </table>
                        <div id="recommended" class="col-lg-12 hide" style = "border:1px solid;background-color:#00FFFF">
                        <div class="col-lg-12">
                        <label>Recommended Themes</label>
                        </div>
                            <div class="col-lg-4">
                                <a style = "cursor:pointer" onclick="ben10()">Ben 10</a><br>
                                <a style = "cursor:pointer" onclick="barbie()">Barbie</a><br>
                                <a style = "cursor:pointer" onclick="minions()">Despicable Me</a><br>
                                <a style = "cursor:pointer" onclick="frozen()">Frozen Sister</a><br>
                            </div>
                            <div class="col-lg-4">
                                <a style = "cursor:pointer" onclick="kitty()">Hello Kitty</a><br>
                                <a style = "cursor:pointer" onclick="tinker()">Tinker Bell</a><br>
                                <a style = "cursor:pointer" onclick="dora()">Dora</a><br>
                                <a style = "cursor:pointer" onclick="minnie()">Minnie Mouse</a><br>
                            </div>
                            <div class="col-lg-4">
                                <a style = "cursor:pointer" onclick="mario()">Super Mario</a><br>
                                <a style = "cursor:pointer" onclick="iron()">Ironman</a><br>
                                <a style = "cursor:pointer" onclick="batman()">Batman</a><br>
                                <a style = "cursor:pointer" onclick="olaf()">Frozen Olaf</a><br>
                            </div>
                        </div>
                        <table height = '300px' width = '100%'>
                        <tr>
                            <td><b>Event/Theme Color: </b></td>
                            <td><br><label class = 'lebel'><input type = 'checkbox' value = 'Black' name = 'color[]' id="black">Black</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Blue' name = 'color[]' id="blue">Blue</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Brown' name = 'color[]' id="brown">Brown</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Gray' name = 'color[]' id="gray">Gray</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Green' name = 'color[]' id="green">Green</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Orange' name = 'color[]' id="orange">Orange</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Pink' name = 'color[]' id="pink">Pink</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Purple' name = 'color[]' id="purple">Purple</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Red' name = 'color[]' id="red">Red</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'White' name = 'color[]' id="white">White</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Yellow' name = 'color[]' id="yellow">Yellow</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Silver' name = 'color[]' id="silver">Silver</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Gold' name = 'color[]' id="gold">Gold</label>
                            <label class = 'lebel'><input type = 'checkbox' value = 'Sky Blue' name = 'color[]' id="sky blue">Sky Blue</label><br>
                            <span style = 'background-color:white;color:red;font-size:15px;'><i><label>*</label>Theme color use as reference for Balloon color, Skirting color, etc.</i></span></td>
                        </tr>
                        <tr>
                            <td><b>Venue: </b></td>
                            <td><br><input style = 'width:100%;' type = "text" id = "venue" name = "venue"><br>
                            <span style = 'color:red;font-size:15px;background-color:white;'><i><label>*</label>This serves as your delivery address.</i></span></td>
                        </tr>
                        <tr>
                            <td class = ''><b>Contact Person: </b></td>
                            <td class = ''><input style = 'width:100%;' type = "text" id = "contact" name = "contact"></td>
                        </tr>
                        <tr>
                            <td class = ''><b>Contact Number: </b></td>
                            <td class = ''><input style = 'width:100%;' type = "text" id = "cnumber" name = "cnumber" maxlength = '11'></td>
                        </tr>
                        <tr>
                            <td class = ''></td>
                            <td class = ''></td>
                        </tr>
                    </table>
                    <hr>
                    <div class = 'col-lg-12' style = 'text-align:center'>
                        <a class = 'btn btn-danger' name = 'cancel' onclick = 'cancel()'>Cancel</a>
                        <input type = 'submit' class = 'btn btn-success' name = 'submit' value = 'Proceed'>
                        <br>
                        <br><br>
                    </div><br>
                <div class = 'col-lg-6'>
                    <hr class = 'style-nine'>
                    <h1 style = 'text-align:center;'>Upcoming Events</h1>
                    <hr class = 'style-nine'>
                </div>