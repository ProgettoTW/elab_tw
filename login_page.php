<?php
require_once("includes/header.php");

if (isset($_GET['error'])) {
    echo 'Error Logging In!';
}
?>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="js/login_module.js"></script>
<script src="js/jquery_validation_messages.js"></script>

<html lang="it">

<body class="body">
<div class="container-fluid">
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
        <div class="tab-content" id="myTabContent">
            <!-- ACCEDI -->
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-7 col-xl-5">
                        <img src="./img/login.svg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 text-center">
                        <form action="includes/login.php" method="post" name="login_form" id="login_form">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control flex-grow-0 m-1 mx-auto p-3 text-left w-75"
                                       id="floatingInput" placeholder="name@example.com" name="email">
                                <label for="floatingInput" class="text-center w-50 h-50">Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control flex-grow-0 m-1 mx-auto p-3 text-left w-75"
                                       id="floatingPassword" placeholder="Password" name="p">
                                <label for="floatingPassword" class="text-center h-50 w-50">Password</label>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary btn-block btn-lg align-items-center flex-grow-1 justify-content-center w-25">
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
                        <form action="includes/register.php" method="post" name="login_form" id="login_form">
                            <div class="row">
                                <div class="col form-floating mb-3">
                                    <input type="text" class="form-control flex-grow-0" placeholder="nome" name="name">
                                    <label class="mx-sm-2" for="floatingInput">Nome</label>
                                </div>
                                <div class="col form-floating">
                                    <input type="text" class="form-control flex-grow-0" placeholder="cognome" name="surname">
                                    <label class="mx-sm-2" for="floatingInput">Cognome</label>
                                </div>
                                <div class="col form-floating">
                                    <input type="text" class="form-control flex-grow-0" placeholder="numero di telefono" name="phone">
                                    <label class="mx-sm-2" for="floatingInput">Numero di Telefono</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3 mx-sm-1">
                                    <label for="date">Data di Nascita: </label>
                                    <input type="date" id="date" name="born_date">
                                </div>
                                <div class="col">
                                    <p>Il giorno del tuo compleanno avrai uno sconto del 50% su tutti i prodotti!</p>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control flex-grow-0" id="floatingInput"
                                       placeholder="name@example.com" name="email">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control flex-grow-0" id="floatingPassword"
                                       placeholder="Password" name="p">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrati</button>
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
