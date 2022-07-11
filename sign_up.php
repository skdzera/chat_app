<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sign_up.css">
    <title>Hello, world!</title>
</head>
<body>
    <header class="head">Sign up in CHAT-WEB</header>
    <div class="Sign-up block_center child_center">
        <div class="form_section" style="font-size: medium;">
            <header class="head_1">Sign up in CHAT-WEB</header>
            <form action="" method="POST">
                <div class="name_area f_part">
                    <label class="lable_grid" for="name"><b>User name :</b></label>
                    <input type="text" name="name"  required>
                </div>
                <div class="email_area f_part">
                    <label class="lable_grid" for="name"><b>Email address :</b></label>
                    <input type="email" name="email"  required>
                </div>
                <div class="password_area f_part">
                    <label class="lable_grid" for="name"><b>Password :</b></label>
                    <input type="password" name="password"  required>
                </div>
                <div class="re_password_area f_part">
                    <label class="lable_grid" for="name"><b>Confirm password :</b></label>
                    <input type="password" name="re_password"  required>
                </div>
                <div class="db_area f_part">
                    <label class="lable_grid" for="name"><b>Date of Barth :</b></label>
                    <input type="date" name="date" required >
                </div>
                <div class="image_area f_part">
                    <label class="lable_grid" for="name"><b>Select image :</b></label>
                    <input type="file" name="image" required >
                </div>
                <div class="submit_area f_part child_center_h">
                    <input type="submit" class="submit" style="background-color: green;" name="submit" >
                </div>
            </form>
            <h4 style="font-size: 17px; margin-top: 15px;">If you have already account, then <a href="index.php">SIGN_IN</a></h4>
        </div>
    </div>

    




    
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="javasc/sign_up.js"></script>
</body>
</html>