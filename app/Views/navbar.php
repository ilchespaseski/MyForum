<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="app/Views/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>

    <!--Navbar-->
    <nav class=" navbar navbar-expand navbar bg-dark">
        <div class="container">
            <a class="navbar-brand logo-nav" href="/">My Forum</a>


            <ul class="d-flex navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active " id='login-btn' aria-current="page" href="/MyForum/login">
                        <i class="material-symbols-outlined">login</i>
                        <span class="login-text-btn">Login</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " id='logout-btn' aria-current="page">
                        <i class="material-symbols-outlined">logout</i>
                        <span class="logout-text-btn">Logout</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " id='register-btn' aria-current="page" href="/MyForum/register">
                        <i class="material-symbols-outlined">person_add</i>
                        <span class="register-text-btn">Register</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!--End of navbar-->

    <script src="/app/Views/javascript/navbar.js" type="text/javascript"></script>
    <script src="/app/Views/javascript/helper.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>