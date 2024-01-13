<?php
include './inc/db.php';
include './inc/form.php';
include './inc/select.php';
include './inc/db_close.php';
?>

<?php include_once './parts/header.php' ?>


<div class="position-relative p-5 text-center text-muted bg-body">
    <svg class="bi mb-3" width="48" height="48">
        <use xlink:href="#check2-circle"></use>
    </svg>
    <img src="./images/student.jpg" />

    <h1 class="text-body-emphasis text-center mt-4 mb-4">اربح مع طلال الغامدي </h1>
    <h6 class="col-lg-6 mx-auto mb-4">باقي على فتح التسجيل</h6>
    <h3 id="counter"></h3>
    <h6 class="col-lg-6 mx-auto mb-4 mt-3">للسحب على ربح نسحة مجانية من مايكروسوفت اوفيس</h6>
    <div class="container">
        <h3 class="mt-5">للدخول في السحب اتبع مايلي: </h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">هذه المسابقة مقدمة من الطالب طلال رياض الغامدي</li>
            <li class="list-group-item">تابعني على تويتر لدخول السحب </li>
            <li class="list-group-item">الرابح سيحصل على نسخة مجانيه من مايكروسوفت اوفيس</li>
        </ul>
    </div>
</div>

<div class="container">

    <div class="position-relative p-5 text-center">
        <div class="col-md-5 p-lg-5 mx-auto">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="mb-5">
                <h3>الرجاء ادخال معلوماتك</h3>


                <div class="mt-3 mb-3">
                    <label class="form-label">الاسم الأول</label>
                    <input type="text" name="firstName" value="<?php echo $firstName ?>" class="form-control">
                    <div class="form-text error"><?php echo $errors['firstNameError'] ?></div>
                </div>

                <div class="mt-3 mb-3">
                    <label class="form-label">الاسم الأخير</label>
                    <input type="text" name="lastName" value="<?php echo $lastName ?>" class="form-control">
                    <div class="form-text error"><?php echo $errors['lastNameError'] ?></div>
                </div>

                <div class="mb-5">
                    <label class="form-label">البريد الالكتروني</label>
                    <input type="text" name="email" value="<?php echo $email ?>" class="form-control">
                    <div class="form-text error"><?php echo $errors['emailError'] ?></div>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">ارسال المعلومات</button>
            </form>
        </div>
    </div>




    <div class="row mb-5 pb-5">
        <h3>قائمة المسجلين</h3>
        <?php foreach ($users  as $user) : ?>
            <div class="col-sm-6">
                <div class="card my-2 bg-light">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName']) ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($user['email']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto my-5">
        <button id="winner" type="button" class="btn btn-primary">
            اختيار رابح
        </button>
    </div>

</div>

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">الرابح في المسابقة</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php foreach ($users_win  as $user) : ?>
                    <h1 class="display-3 text-center modal-title"><?php echo htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName']) ?></h1>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="loader-con">
    <div id="loader">
        <canvas id="circularLoader" width="200" height="200"></canvas>
    </div>
</div>

<?php include_once './parts/footer.php' ?>