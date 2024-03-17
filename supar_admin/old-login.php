<?php
include_once "inc/header.php";
include_once "inc/sidebar.php";
include_once "inc/navbar.php";
?>
<div class="container width-100">
    <form action="">
        <div class="row ">
            <div class="col-lg-12">
                <div class="box ">
                    <div class="row">
                        <div class="col-6 ">
                            <div class="box-1 ">
                                <div class="overlay-panel overlay-right">
                                    <h1 class="school-name">مدرسہ
                                        حسینیہ
                                    </h1>
                                    <p class="sign_up">
                                        اپنی ذاتی تفصیلات درج کریں اور ہمارے
                                    </p>
                                    <p class="school-description"> ساتھ اپنا سفر
                                        شروع کریں</p>
                                    <button class="btn1">مزید معلومات کریں</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <h1 class="mobile-name text-center ">مدرسہ
                                حسینیہ
                            </h1>

                            <div class="col-lg-12 px-5">
                                <h3 class="sign-in text-center">سائن اِن کریں
                                </h3>

                                <div>
                                    <input type="number" id="phone_number" placeholder="فون نمبر">
                                </div>

                                <div>
                                    <input type="password" id="password" placeholder="پاس ورڈ">
                                    <i class="fa-solid  fa-eye-slash text-center" id="icon-slash"></i>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="submit" class="botton " name="submit">سائن اِن
                                        کریں</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>