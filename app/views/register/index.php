<?php require APPROOT . '/views/inc/header.php'; ?>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form class="mx-1 mx-md-4" method="post" action="/register/register">

                                    <div class="d-flex flex-row align-items-center">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="name" id="form3Example1c" class="form-control" value="<?php if (!empty($data['name'])) echo $data['name'];?>"/>
                                            <label class="form-label" for="form3Example1c">Your Name</label><br>
                                            <p class="text-danger"><?php if (!empty($data['name_err'])) echo $data['name_err'];?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" name="surname" id="form3Example1c" class="form-control" value="<?php if (!empty($data['surname'])) echo $data['surname'];?>"/>
                                            <label class="form-label" for="form3Example1c">Your Surname</label><br>
                                            <p class="text-danger"><?php if (!empty($data['surname_err'])) echo $data['surname_err'];?></p>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" name="email" id="form3Example3c" class="form-control" value="<?php if (!empty($data['email'])) echo $data['email'];?>"/>
                                            <label class="form-label" for="form3Example3c">Your Email</label><br>
                                            <p class="text-danger"><?php if (!empty($data['email_err'])) echo $data['email_err'];?></p>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4c" class="form-control"name="password" value=""/>
                                            <label class="form-label" for="form3Example4c">Password</label><br>
                                            <p class="text-danger"><?php if (!empty($data['password_err'])) echo $data['password_err'];?></p>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center ">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="form3Example4cd" class="form-control" name="password_repeat" />
                                            <label class="form-label" for="form3Example4cd">Repeat your password</label><br>
                                            <p class="text-danger"><?php if (!empty($data['password_repeat_err'])) echo $data['password_repeat_err'];?></p>
                                        </div>
                                    </div>
                                    <p class="text-danger"><?php if (!empty($data['user_exists_err'])) echo $data['user_exists_err'];?></p>



                                    <div class="d-flex justify-content-center mx-4  mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>

                                    </div>
                                    <a class="text-sm " href="/login">Or login</a>


                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                     class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require APPROOT . '/views/inc/footer.php'; ?>
