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
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <form action="includes/login.php" method="post" name="login_form" id="login_form">
                            <div class="mb-4">
                                <label for="emailInput" class="visually-hidden">Email</label>
                                <input type="email" class="form-control py-4" id="emailInput" placeholder="Email" name="emailLogin">
                            </div>
                            <div class="mb-4">
                                <label for="passwordInput" class="visually-hidden">Password</label>
                                <input type="password" class="form-control py-4" id="passwordInput" placeholder="Password" name="passwordLogin">
                            </div>
                            <button type="submit"class="btn btn-primary btn-block btn-lg align-items-center flex-grow-1 w-25 ms-3">
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
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <form action="includes/register.php" method="post" name="register_form" id="register_form">
                            
                            <div class="row mx-0">
                                <div class="col ps-0 m-2">
                                    <label for="nameInput" class="visually-hidden">Nome</label>
                                    <input type="text" class="form-control py-4" id="nameInput" placeholder="Nome" name="name">
                                </div>
                                <div class="col ps-0 m-2">
                                    <label for="surnameInput" class="visually-hidden">Cognome</label>
                                    <input type="text" class="form-control py-4" id="surnameInput" placeholder="Cognome" name="surname">
                                </div>
                            </div>

                            <div class="row mx-0">
                                <div class="col ps-0 m-2 my-4">
                                    <label for="cellphoneInput" class="visually-hidden">Telefono</label>
                                    <input type="text" class="form-control py-4" placeholder="Telefono" name="phone">
                                </div>
                                <div class="col ps-0 m-2">
                                    <label for="date">Data di Nascita: </label>
                                    <input type="date" class="form-control" id="date" name="born_date">
                                </div>
                            </div>

                            <p class="ms-3">Il giorno del tuo compleanno avrai uno sconto del 50% su tutti i prodotti!</p>

                            <div class="mb-4 ms-2">
                                <label for="emailInput" class="visually-hidden">Email</label>
                                <input type="email" class="form-control py-4" id="emailInput" placeholder="Email" name="email">
                            </div>
                            <div class="mb-4 ms-2">
                                <label for="passwordInput" class="visually-hidden">Password</label>
                                <input type="password" class="form-control py-4" id="passwordInput" placeholder="Password" name="p">
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg ms-4 w-25">Registrati</button>
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
