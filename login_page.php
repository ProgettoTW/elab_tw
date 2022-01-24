<?php
require_once("includes/header.php");

if (isset($_GET['error'])) {
    echo 'Error Logging In!';
}
?>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="js/login_module.js"></script>
<script src="js/register_module.js"></script>
<script src="js/jquery_validation_messages.js"></script>

<html lang="it">

<body class="body">
<div class="container-fluid" id="main-content">
    <div class="row">
        <!-- FILTER NAVS-->
        <nav>
            <ul class="nav nav-tabs filters justify-content-center" id="myTab" role="tablist">
                <li class="nav-item filter">
                    <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                            type="button" role="tab" aria-controls="login" aria-selected="true">Accedi
                    </button>
                </li>
                <li class="nav-item filter">
                    <button class="nav-link" id="signin-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Registrati
                    </button>
                </li>
            </ul>
        </nav>
        <div class="tab-content my-4" id="myTabContent">
            <!-- ACCEDI -->
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-7 col-xl-5">
                        <img src="./img/login.svg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 text-center">
                        <form action="includes/login.php" method="post" name="login_form" id="login_form">
                            <div class="form-floating m-4">
                                <input type="email" class="form-control"
                                       id="floatingInput" placeholder="name@example.com" name="emailLogin">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating m-4">
                                <input type="password" class="form-control"
                                       id="floatingPassword" placeholder="Password" name="passwordLogin">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary btn-block btn-lg align-items-center flex-grow-1 justify-content-center w-25 my-2">
                                Accedi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- REGISTRATI -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="signin-tab">

                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-7 col-xl-5">
                        <img src="./img/login.svg" class="img-fluid" alt=""/>
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 text-center">
                        <form action="includes/register.php" method="post" name="register_form" id="register_form">
                            <div class="row mx-0">
                                <div class="col form-floating ps-0 m-2">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="nome" name="name">
                                    <label for="floatingInput">Nome</label>
                                </div>
                                <div class="col form-floating ps-0 m-2">
                                    <input type="text" class="form-control" placeholder="cognome"
                                           name="surname">
                                    <label for="floatingInput">Cognome</label>
                                </div>
                            </div>

                            <div class="row mx-0">
                                <div class="col form-floating ps-0 m-2">
                                    <input type="text" class="form-control" placeholder="telefono" name="phone">
                                    <label for="floatingInput">Telefono</label>
                                </div>
                                <div class="col mx-sm-1">
                                    <label for="date">Data di Nascita: </label>
                                    <input class="py-1" type="date" id="date" name="born_date">
                                </div>
                            </div>

                            <p>Il giorno del tuo compleanno avrai uno sconto del 50% su tutti i prodotti!</p>

                            <div class="form-floating m-3">
                                <input type="email" class="form-control flex-grow-0" id="floatingInput"
                                       placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating m-3">
                                <input type="password" class="form-control flex-grow-0" id="floatingPassword"
                                       placeholder="Password" name="p">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg mt-4">Registrati</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?php
require_once("includes/footer.php");
?>
</body>
</html>
