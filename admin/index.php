<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css\header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css\index.css?v=<?php echo time(); ?>">

    <title>Admin Pannel</title>
</head>

<body>
    <?php include "header.php";?>
    <div class="main-container">
        <div class="row m-0">
            <div class="col">
                <ul>
                    <li>Barber's Info</li>
                </ul>
            </div>
            <div class="col current-col">
                <div class="spinner-div">
                    <div class="spinner-grow" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <h1>Barber's Info</h1> <button class="addbtn">Add New</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Services</th>
                            <th scope="col">Available</th>
                            <th scope="col">Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'db_connect.php';
                         $stmt = $conn->prepare('SELECT * FROM barber_info');
                         $stmt->execute();
                         // Fetch result
                            $result = $stmt->get_result();
                            $count = 0;
                            while ($row = $result->fetch_assoc()) {
                                $count++;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $count; ?></th>
                            <td><?php echo $row['name']; ?></td>
                            <td><button class="btn" data-id="<?php echo $row['id']; ?>">See..</button></td>
                            <?php
                             if($row['avail'] == 1){
                                echo '<td class="avail"><i class="fa-solid fa-circle-check"></i></td>';
                             }else{
                               echo '<td class="no-avail"><i class="fa-solid fa-square-xmark"></i></td>';
                             }
                            ?>

                            <td class="pic"><img src="\Websites\Barber_web\admin\images\<?php echo $row['image']; ?>" alt="">
                            </td>
                        </tr> 
                        <?php
                            }
                        ?>
                        <!-- <tr>
                            <th scope="row">2</th>
                            <td>Mark</td>
                            <td><button class="btn">See..</button></td>
                            <td class="no-avail"><i class="fa-solid fa-square-xmark"></i></td>
                            <td class="pic"><img
                                    src=" \Websites\Barber_web\images\alex_web-100_f53cb81b-ed65-49aa-a53a-3ebbadc14471_200x.avif"
                                    alt=""></td>
                        </tr> -->

                    </tbody>
                </table>
            </div>
            <div class="col service-col">
                <button id="back"><i class="fa-solid fa-arrow-left"></i> Back</button>
                <div class="profile-div">
                    <img src="\Websites\Barber_web\images\Austin-Quilter-100_200x.avif" alt="">
                    <h2 class="name">Alex web</h2>
                </div>
                <div class="service-div">
                    <h2>Services</h2>
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Type</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" id='count'>1</th>
                                <td id="type">Mark</td>
                                <td id="price">Mark</td>
                            </tr>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="js/index.js"></script>
</body>

</html>

<?php
$stmt->close();
$conn->close();
?>