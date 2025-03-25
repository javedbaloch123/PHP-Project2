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
    <link rel="stylesheet" href="css\add_barber.css?v=<?php echo time(); ?>">

    <title>Admin Pannel</title>
</head>

<body>
    <?php include "header.php";?>
    <button class="backbtn"><i class="fa-solid fa-arrow-left"></i> Back</button>
    <div class="main-container container">
        <h1>Add New Barber</h1>
        <form id="barberForm" enctype="multipart/form-data">
        <div class="row m-0">
            <div class="col">
                <!-- <form> -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="scissor" class="form-label">Scissor Price - $</label>
                        <input type="number" class="form-control" id="scissor" name="scissor" >
                    </div>
                    <div class="mb-3">
                        <label for="clipper" class="form-label">Clipper Price - $</label>
                        <input type="number" class="form-control" id="clipper" name="clipper">
                    </div>
                    <div class="mb-3">
                        <label for="Buzz" class="form-label">Buzz Price - $</label>
                        <input type="number" class="form-control" id="buzz" name="buzz">
                    </div>
                    <div class="mb-3">
                        <label for="beared" class="form-label">Beared Price - $</label>
                        <input type="number" class="form-control" id="beared" name="beared">
                    </div>
                     
                    <button type="button" class="btn btn-primary" id="submitBtn">Save info</button>
                <!-- </form> -->
            </div>
            <div class="col">
                <!-- <form> -->
                <div class="mb-3">
                        <label for="strait" class="form-label">Strait Razor Price - $</label>
                        <input type="number" class="form-control" id="strait" name="strait">
                    </div>
                    <div class="mb-3">
                        <label for="Buzz" class="form-label">Sunday Service Price - $</label>
                        <input type="number" class="form-control" id="sunday" name="sunday">
                    </div>
                    <div class="div d-flex gap-2 mb-3">
                    <div style="width: 100%;">
                        <label for="Buzz" class="form-label">Available</label>
                        <select class="form-select" aria-label="Default select example" id="avail" name="avail">
                            <option value="1">Yes</option>
                            <option value="0" selected>No</option>
                        </select>
                    </div>
                    <div style="width: 100%;">
                        <label for="Buzz" class="form-label">Role</label>
                        <select class="form-select" aria-label="Default select example" id="role" name="role">
                            <option value="1">Admin</option>
                            <option value="0" selected>User</option>
                        </select>
                    </div>
                     
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>
                <!-- </form> -->
            </div>
        </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  <script src="\Websites\Barber_web\admin\js\add_barber.js"></script>
</body>

</html>