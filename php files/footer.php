<div class="footer">
    <button class="bookbtn">Book Now</button>
    <section class="slideMenu-section">
        <div class="slideMenu-div container">
            <div class="slideMenu-header">
                <h5 class="back-btn">Choose a location</h5>
                <div class="icons">
                    <i class="fa-solid fa-bars"></i>
                    <i id="crossbtn" class="fa-solid fa-xmark"></i>
                </div>
            </div>
            <div class="first-section">
                <div class="btns">
                    <button>Nearby <i class="fa-solid fa-location-crosshairs"></i></button>
                    <button>Search <i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

                <div class="first-card-section next-btn">
                    <div class="row m-0">
                        <div class="col"><img
                                src="\Websites\Barber_web\images\church-carosuel3_3500x_0cdef2d0-2321-4204-873f-b6c0c80e04ee_1400x.webp"
                                alt=""></div>
                        <div class="col">
                            <span>church barber and a...</span>
                            <p>524 octavia street san fransisco CA 94102</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-section container">
                <div class="row m-0">
                    <div class="col empty-card next-btn">

                    </div>
                    <div class="col empty-card">

                    </div>
                    <div class="col empty-card">

                    </div>
                    <div class="col empty-card">

                    </div>
                </div>

            </div>
            <div class="second-real-container containers">
                <div class="row m-0">
                    <div class="col next-btn">
                        <div class="real-card">
                            <i class="fa-solid fa-arrows-split-up-and-left d-block"></i>
                            <span>Choose a service first</span>
                            <p>Book with any professional</p>
                        </div>
                    </div>
                    <?php
                     include '../admin/db_connect.php';
                     $sql = 'Select id,name,avail,image from barber_info';
                     $result = mysqli_query($conn,$sql);

                     if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                        
                    ?>
                    <div class="col next-btn" data-id='<?php echo $row['id'];?>'>
                        <div class="real-card">
                            <img src="\Websites\Barber_web\images\<?php echo $row['image'];?>" alt="">
                            <span><?php echo $row['name'];?></span>
                            <p class="avail-para">Available Tuesday Mar 18 </p>
                        </div>
                    </div>
                    <?php } } ?>

                </div>
            </div>

            <div class="third-section container ">
                <div class="row hidden-row">
                    <div class="div">
                        <div class="col dom-card">
                            <i class="fa-solid fa-check"></i>
                            <h4>Clipper Cut</h4>
                            <span>45 min</span>
                            <strong>$50</strong>
                        </div>
                        <div class="row inner-row">
                            <h2>Anything you wish to add?</h2>
                            <?php 
                        include '../admin/db_connect.php';
                        $cuts = ['Scissor Cut','Clipper Cut','Buzz Cut','Beared Cut','Strait-Razor'];
                        $price = [];
                         $sql = 'select * from Common_price';
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_fetch_assoc($result);
                         array_push($price, $row['scissor']);
                         array_push($price, $row['clipper']);
                         array_push($price, $row['buzz']);
                         array_push($price, $row['beared']);
                         array_push($price, $row['strait_razor']);
                        for($i=0; $i<count($cuts); $i++){
                            echo '<div class="col cal-col">
                         <i class="fa-solid fa-circle-info"></i>
                            <h4>'.$cuts[$i].'</h4>
                            <span>45 min</span>
                            <strong>$'.$price[$i].'</strong>
                        </div>';
                        }
                        ?>

                        </div>
                        <div class="row cal-row">
                            <span>View Order</span>
                            <p class="spinner"></p>
                            <p><span class="span1">$85</span></p>
                        </div>
                        <div class="confirm-row">
                            <div class="row m-0 first-row">
                                <div class="first-div">
                                    <h2>Your Order</h2>
                                    <p>Church Barber & Apothecary</p>
                                </div>
                                <div><i class="fa-solid fa-xmark"></i></div>
                            </div>
                            <div class="second-row">
                                <div>
                                    <img src="\Websites\Barber_web\images\alex_web-100_f53cb81b-ed65-49aa-a53a-3ebbadc14471_200x.avif"
                                        alt="">
                                    <div class="div">
                                        <span>Olvia G.</span>
                                        <p>Buzz Cut</p>
                                    </div>
                                </div>
                                <div><span id="cut-p">$45</span></div>
                            </div>
                            <div class="empty-row"></div>
                            <div class="third-row row">
                                <div>
                                    <span>Subtotal</span>
                                    <span id='sub-t'>$80</span>
                                </div>
                                <div>
                                    <button class="next-btn">Choose a time</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row visible-row">
                    <select id='select'>
                        <option value="All categories">All categories</option>
                        <option value="Hair">Hair</option>
                        <option value="combo">combo</option>
                        <option value="face">face</option>
                        <option value="uncategories">uncategories</option>
                    </select>
                    <div class="row second">
                        <?php 
                        include '../admin/db_connect.php';
                        $cuts = ['Scissor Cut','Clipper Cut','Buzz Cut','Beared Cut','Strait-Razor'];
                        $price = [];
                         $sql = 'select * from Common_price';
                         $result = mysqli_query($conn, $sql);
                         $row = mysqli_fetch_assoc($result);
                         array_push($price, $row['scissor']);
                         array_push($price, $row['clipper']);
                         array_push($price, $row['buzz']);
                         array_push($price, $row['beared']);
                         array_push($price, $row['strait_razor']);
                        for($i=0; $i<count($cuts); $i++){
                            echo '<div class="col">
                         <i class="fa-solid fa-circle-info"></i>
                            <h4>'.$cuts[$i].'</h4>
                            <span>45 min</span>
                            <strong>$'.$price[$i].'</strong>
                        </div>';
                        }
                        ?>


                    </div>
                </div>
            </div>
            <div class="forth-section">
                <div class="time-section">
                    <h2>March 2025</h2>
                    <div class="row m-0 first-row">
                        <div class="col f-col">1</div>
                        <div class="col f-col">2</div>
                        <div class="col f-col">3</div>
                        <div class="col f-col">4</div>
                        <div class="col f-col">5</div>
                        <div class="col f-col">6</div>
                        <div class="col"><i class="fa-solid fa-circle-arrow-down"></i></div>
                    </div>
                    <div class="row m-0 second">
                        <div class="col s-col">Sun</div>
                        <div class="col s-col">Mon</div>
                        <div class="col s-col">Tue</div>
                        <div class="col s-col">Wed</div>
                        <div class="col s-col">Thu</div>
                        <div class="col s-col">Fri</div>
                        <div class="col">Fri</div>
                    </div>
                    <div class="third">
                        <span>Thursday, March 20</span>
                        <div class="row">
                             
                            <!-- <div class="col">
                            <i class="fa-solid fa-sun"></i>
                            <span>12pm</span>
                            </div> -->
                            
                        </div>
                    </div>
                    <div class="checkout row">
                         <div class="col">Go Checkout <span id='price'>$80</span></div>
                    </div>
                </div>
                <div class="calender-section">
                    <div class="row first-row">
                        <span><?php echo date("F,Y")?></span>
                        <div class="div">
                            <button>Today</button>
                            <div class="icons">
                                <i class="fa-solid fa-circle-arrow-left"></i>
                                <i class="fa-solid fa-circle-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="calender-container">
                        <div class="row text-center m-0">
                            <div class="col">Sun</div>
                            <div class="col">Mon</div>
                            <div class="col">Tue</div>
                            <div class="col">Wed</div>
                            <div class="col">Thu</div>
                            <div class="col">Fri</div>
                            <div class="col">Sat</div>
                        </div>

                        <!-- <?php
                    // Get current month name
                    $currentMonth = date("F"); // Example: March

                     $currDate = date("d");
                    $totalDays = date("t"); // Example: 31
                             
                    ?> -->
                        <div class="row text-center date-row">
                            <div class="col empty"></div> <!-- Empty for alignment -->
                            <div class="col empty"></div>
                            <div class="col empty"></div>
                            <div class="col empty"></div>
                            <div class="col empty"></div>
                            <div class="col empty"></div>
                            <?php
                        $dates = [22, 23,24,26,27,28]; // Active dates array
                        $currDate = date("d"); // Current date
                        $totalDays = date("t"); // Total days in current month

                        for ($i = 1; $i <= $totalDays; $i++) {
                            if ($i == $currDate || in_array($i, $dates)) {
                                echo '<div class="col active">' . $i . '</div>';
                            } else {
                                echo '<div class="col">' . $i . '</div>';
                            }
                        }
                    ?>


                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>
    <div class="row m-0">
        <div class="col">
            <ul>
                <li>Clients services</li>
                <li><a href="#">Returns</a></li>
                <li><a href="#">shipping</a></li>
                <li><a href="#">Questions</a></li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li>the company</li>
                <li><a href="#">about us</a></li>
                <li><a href="#">glass recycling program (SWAP)</a></li>
                <li><a href="#">store locater</a></li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li>Contact us</li>
                <li><a href="#">church california: email</a></li>
                <li><a href="#">church barder: 437738839</a></li>
                <li><a href="#">wholesale inquiries</a></li>
            </ul>
        </div>
        <div class="col">
            <ul>
                <li>Connect</li>
                <li><a href="#">instagram</a></li>
                <li><a href="#">careers</a></li>
            </ul>
        </div>
    </div>
    <p class="p-1 m-0">© 2025 Church California.</p>
</div>