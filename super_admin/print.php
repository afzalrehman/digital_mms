<div class="content-wrapper d-none" id="printable-content">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            /* Set Open Sans as the font for the entire page */
            border: 5px solid #ccc;
            /* Add border around the entire page */
            padding: 20px;

            /* Add padding inside the border for spacing */
        }

        .main {
            display: flex;
            justify-content: space-between;
            text-align: center;

        }

        .main1 {
            display: flex;
            justify-content: space-between;
        }

        .main2 {
            display: flex;
        }

        .margin {
            padding: 0 20px 0 0;
        }

        .pre {
            font-size: 12px;
        }

        img {
            width: 180px;
        }
    </style>

    <div class="main watermark">
        <div class="col-lg-2 px-4">
            <img src="../assets/images/hussiania.png" alt="">
        </div>
        <div class="col-lg-8 text-center">
            <h3>مدرسہ دارالعلوم حسینیہ</h3>
            <p>
                <span>
                    افضل
                </span>

            </p>
            <h3>ایڈمیشن فارم</h3>
            <P class="bold">BATCH .
                <span>878</span>

            </P>
        </div>
        <div class="col-lg-2">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                <img src="8798" alt="Student Image" class="d-block  ms-0 ms-sm-4 rounded user-profile-img" width="150px" height="150px">
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="main1" style="margin-bottom:28px;">
            <div>
                <span class="margin bold">رول نمبر :</span>
                <span>889809890</span>
            </div>
            <div>
                <span class="margin bold">جی آر نمبر :</span>
                <span>889809890</span>
            </div>
        </div>

        
        <div class="main1">
            <div style="margin-bottom:28px;">
                <span class="bold">نام :</span>
                <span> $fetch['student_name'] ?></span>
            </div>

            <div>
                <span class="bold">والد :</span>
                <span> $fetch1['FatherName'] ?></span>
            </div>

        </div>

        <div class="main2" style="margin-bottom:28px;">
            <span class="margin bold">کلاس : </span>
            <div>
                <span class=" me-1">k</span>
            </div>
        </div>

        <div class="main1" style="margin-bottom:28px;">
            <div>
                <span class="bold">QUALIFICATION:</span>
                <span> $fetch1['Qualification'] ?></span>
            </div>
            <div>
                <span class="bold">شناختی کارڈ :</span>
                <span> $fetch1['CNICorBForm'] ?></span>
            </div>
            <div>
                <span class="bold">صنف:</span>
                <span> $fetch['gender'] ?></span>
            </div>
        </div>

        <div class="main1" style="margin-bottom:28px;">
            <div class="col-lg-2 mt-4">
                <span class="bold">تاریخ پیدائش :</span>
                <span> $fetch1['DateOfBirth'] ?></span>
            </div>
            <div class="col-lg-1 mt-4">
                <span class="bold">شہر :</span>
                <span> $fetch1['City'] ?></span>
            </div>

        </div>
        <div class="main1" style="margin-bottom:28px;">
            <div class="col-lg-2 mt-4 ">
                <span class="bold">پتہ :</span>
                <span> $fetch1['StudentAddress'] ?></span>
            </div>

        </div>
        <div class="main1" style="margin-bottom:28px;">
            <div class="col-lg-2 mt-4">
                <span class="bold">ای میل :</span>
                <span> $fetch['email'] ?></span>
            </div>
            <div class="col-lg-1 mt-4">
                <span class="bold">فون نمبر:</span>
                <span> $fetch1['PhoneNo'] ?></span>
            </div>

        </div>
    </div>
</div>