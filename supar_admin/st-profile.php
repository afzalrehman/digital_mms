<?php
include "inc/header.php";
include "inc/sidebar.php";
include "inc/navbar.php";
?>
      <!-- Main Content (Start) -->
      <div class="container-fluid">
        <!-- Main Content Header Card (Start) -->
        <div class="card bg-light-primary position-relative overflow-hidden breadcurmb-card-shadow">
          <div class="card-body px-4 py-3">
            <div class="row align-items-center">
              <div class="col-9">
                <h4 class="my-3 fs-8 text-primary">طلبہ کے پروفائل</h4>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a class="text-muted text-decoration-none fs-4" href="index.html">ڈیش بورڈ</a>
                    </li>
                    <li class="breadcrumb-item fs-4" aria-current="page">
                      طلبہ کے پروفائل
                    </li>
                  </ol>
                </nav>
              </div>
              <div class="col-3">
                <div class="text-center mb-n5">
                  <img src="../assets/images/ChatBc.png" alt="" class="img-fluid mb-n4" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Main Content Header Card (End) -->

        <!-- Student Profile (Start) -->
        <div class="card overflow-hidden">
          <div class="card-body p-0">
            <img src="../assets/images/template/profilebg.png" alt="" class="img-fluid">
            <div class="row align-items-center">

              <!-- Student Profile Image -->
              <div class="col-lg-4 order-lg-4 order-1">
                <div class="mt-n5">
                  <div class="d-flex align-items-center justify-content-center mb-2">
                    <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle"
                      style="width: 110px; height: 110px;" ;>
                      <div
                        class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden"
                        style="width: 100px; height: 100px;" ;>
                        <img src="../assets/images/template/user.jpg" alt="" class="w-100 h-100">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <h5 class="fs-7 mb-0 fw-semibold"> مسعود شفیع</h5>
                    <p class="mb-0 fs-4">میٹرک</p>
                  </div>
                </div>
              </div>
              <!-- Student Attendence Counter -->
              <div class="col-lg-4 order-lg-1 order-last">
                <!-- <div class="d-flex align-items-center justify-content-around m-4">
                  <div class="text-center">
                    <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">288</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل حاضری</p>
                  </div>
                  <div class="text-center">
                    <i class="ti ti-user-x fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">19</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل غیر حاضری</p>
                  </div>
                  <div class="text-center">
                    <i class="ti ti-user-plus fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">80</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل رخصت</p>
                  </div>
                </div> -->
              </div>
              <div class="col-lg-4 order-last">
                <!-- Student Social Icon -->
                <!-- <ul
                  class="list-unstyled d-flex align-items-center justify-content-center justify-content-lg-start my-3 gap-3">
                  <li class="position-relative">
                    <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                      href="javascript:void(0)" width="30" height="30">
                      <i class="ti ti-brand-facebook"></i>
                    </a>
                  </li>
                  <li class="position-relative">
                    <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                      href="javascript:void(0)">
                      <i class="ti ti-brand-twitter"></i>
                    </a>
                  </li>
                  <li class="position-relative">
                    <a class="text-white bg-secondary d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                      href="javascript:void(0)">
                      <i class="ti ti-brand-dribbble"></i>
                    </a>
                  </li>
                  <li class="position-relative">
                    <a class="text-white bg-danger d-flex align-items-center justify-content-center p-2 fs-4 rounded-circle "
                      href="javascript:void(0)">
                      <i class="ti ti-brand-youtube"></i>
                    </a>
                  </li>
                  <li><button class="btn btn-primary">Add To Story</button></li>
                </ul> -->
                <!-- Student Attendence Counter -->
                <div class="d-flex align-items-center justify-content-around m-4">
                  <div class="text-center">
                    <i class="ti ti-user-check fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">288</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل حاضری</p>
                  </div>
                  <div class="text-center">
                    <i class="ti ti-user-x fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">19</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل غیر حاضری</p>
                  </div>
                  <div class="text-center">
                    <i class="ti ti-user-plus fs-6 d-block mb-2"></i>
                    <h4 class="mb-1 inter lh-1 fs-4">80</h4>
                    <p class="mb-0 jameel-kasheeda fs-4">ٹوٹل رخصت</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Student All Tab (Start) -->
            <ul class="nav nav-pills user-profile-tab mt-2 bg-light-info rounded-2" id="pills-tab" role="tablist">
              <!-- Student Profile Tab -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                  aria-controls="pills-profile" aria-selected="true">
                  <i class="ti ti-user-circle me-2 fs-6 "></i>
                  <span class="d-none d-md-block fs-4">پروفائل</span>
                </button>
              </li>
              <!-- Student Attendence Tab -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                  id="pills-followers-tab" data-bs-toggle="pill" data-bs-target="#pills-followers" type="button"
                  role="tab" aria-controls="pills-followers" aria-selected="false">
                  <i class="ti ti-user-check me-2 fs-6 "></i>
                  <span class="d-none d-md-block fs-4">حاضری</span>
                </button>
              </li>
              <!-- Student Fees Tab -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                  id="pills-friends-tab" data-bs-toggle="pill" data-bs-target="#pills-friends" type="button" role="tab"
                  aria-controls="pills-friends" aria-selected="false">
                  <i class="ti ti-currency-dollar me-2 fs-6 "></i>
                  <span class="d-none d-md-block fs-4">فیس</span>
                </button>
              </li>
              <!-- Student Exam Tab -->
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6"
                  id="pills-gallery-tab" data-bs-toggle="pill" data-bs-target="#pills-gallery" type="button" role="tab"
                  aria-controls="pills-gallery" aria-selected="false">
                  <i class="ti ti-clipboard me-2 fs-6 "></i>
                  <span class="d-none d-md-block fs-4">امتحان</span>
                </button>
              </li>
            </ul>
            <!-- Student All Tab (End) -->
          </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
          <!-- Student Profile Tab Content -->
          <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">
            <div class="row">
              <div class="col-lg-12 my-3 d-lg-block d-none ">
                <div class="card">
                  <div class="row d-flex align-items-center">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-2 my-3 text-start">
                      <h5 class="jameel-kasheeda fs-7">محمدافضل</h5>
                      <h5 class="jameel-kasheeda text-primary fs-4 ">داخلہ نمبر 400</h5>
                      <h5 class="jameel-kasheeda text-primary fs-4 ">رول نمبر نمبر 0400</h5>
                    </div>
                    <div class="col-lg-2  text-center py-4" style="border-right: 1px dotted black ;">
                      <div class="box   ">
                        <p class="fs-6 m-0 p-0 jameel-kasheeda">کلاس</p>
                        <p class="fs-5 m-0 p-0  text-primary jameel-kasheeda">(حفظ)</p>
                      </div>
                    </div>
                    <div class="col-lg-2  text-center py-4" style="border-right: 1px dotted black ;">
                      <div class="box   ">
                        <p class="fs-6 m-0 p-0 jameel-kasheeda">سیکشن</p>
                        <p class="fs-5 m-0 p-0  text-primary jameel-kasheeda" َ>(الف)</p>
                      </div>
                    </div>
                    <div class="col-lg-2  text-center py-4" style="border-right: 1px dotted black ;">
                      <div class="box">
                        <p class="fs-6 m-0 p-0 jameel-kasheeda">صنف</p>
                        <p class="fs-5 m-0 p-0  text-primary jameel-kasheeda">(مرد)</p>
                      </div>
                    </div>
                    <div class="col-lg-2 text-center py-4" style="border-right: 1px dotted black ;">
                      <div class="box">
                        <p class="fs-6 m-0 p-0 jameel-kasheeda">درجہ</p>
                        <p class="fs-5 m-0 p-0  text-primary jameel-kasheeda">(بنین)</p>
                      </div>
                    </div>
                    <div class="col-lg-1"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header border-bottom">
                    <h4 class="mb-3 mt-2 text-center fs-7">داخلہ</h4>
                  </div>
                  <div class="card-body">
                    <div class="box mb-3">
                      <span class="me-3 fs-6 jameel-kasheeda ">داخلے کی تاریخ : </span>
                      <span class="fs-4 text-muted  inter">03/18/2021</span>
                    </div>
                    <div class="box  mb-3">
                      <span class="me-3  fs-6 jameel-kasheeda"> پیدائش کی تاریخ :</span>
                      <span class="fs-4 text-muted  inter">03/11/2014</span>
                    </div>
                    <div class="box  mb-3">
                      <span class="me-3  fs-6 jameel-kasheeda"> موبائل فون کانمبر :</span>
                      <span class="fs-4 text-muted  inter">82333666113</span>
                    </div>
                    <div class="box  mb-3">
                      <span class="me-3  fs-6 jameel-kasheeda"> ای میل :</span>
                      <span class="fs-4 text-muted  inter">afzal@gmail.com</span>
                    </div>
                    <div class="box  mb-3">
                      <span class="me-3  fs-6 jameel-kasheeda"> مذہب :</span>
                      <span class="fs-6 text-muted  jameel-kasheeda">اسلام</span>
                    </div>
                    <div class="box  mb-3">
                      <span class="me-3  fs-6 jameel-kasheeda"> ملک :</span>
                      <span class="fs-6 text-muted  jameel-kasheeda">پاکستان</span>
                    </div>
                    <div class="box  mb-3">
                      <span class="me-3  fs-6 jameel-kasheeda"> شہر :</span>
                      <span class="fs-6 text-muted  jameel-kasheeda">کراچی</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header border-bottom">
                    <h4 class="jameel-kasheeda  mb-3 mt-2 text-center ">والدین کے سرپرست کی تفصیل</h4>
                  </div>
                  <div class="card-body">
                    <div class="box mb-3">
                      <span class="me-3 fs-6 jameel-kasheeda ">والد کا نام : </span>
                      <span class="fs-6 text-muted  jameel-kasheeda">سعیدالرحمان</span>
                    </div>
                    <div class="box  mb-3">
                      <span class="me-3 fs-6 jameel-kasheeda"> والد کا فون :</span>
                      <span class="fs-4 text-muted inter">03989489233</span>
                    </div>
                    <div class="box  mb-3">
                      <span class="me-3 fs-6 jameel-kasheeda"> باپ کا پیشہ :</span>
                      <span class="fs-6 text-muted  jameel-kasheeda">بیٹا</span>
                    </div>
                    <div class="box  mb-3">
                      <span class="me-3  fs-6 jameel-kasheeda"> سرپرست کا ای میل :</span>
                      <span class="fs-4 text-muted inter">seyedurrahman09872gmail.com</span>
                    </div>
                    <div class="box  mb-3">
                      <span class="me-3  fs-6 jameel-kasheeda"> گھر کا ایڈریس :</span>
                      <span class="fs-6 text-muted  jameel-kasheeda">36/جی لانڈھی کراچی گھر 1</span>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="row">
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">
                    <div class="form-floating mb-3">
                      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 137px"></textarea>
                      <label for="floatingTextarea2" class="p-7">Share your thoughts</label>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                      <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                        href="javascript:void(0)">
                        <i class="ti ti-photo"></i>
                      </a>
                      <a href="javascript:void(0)" class="text-dark px-3 py-2">Photo / Video</a>
                      <a href="javascript:void(0)" class="d-flex align-items-center gap-2">
                        <div
                          class="text-white d-flex align-items-center justify-content-center bg-secondary p-2 fs-4 rounded-circle">
                          <i class="ti ti-notebook"></i>
                        </div>
                        <span class="text-dark">Article</span>
                      </a>
                      <button class="btn btn-primary ms-auto">Post</button>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body border-bottom">
                    <div class="d-flex align-items-center gap-3">
                      <img src="../assets/images/template/user-1.jpg" alt="" class="rounded-circle" width="40"
                        height="40">
                      <h6 class="fw-semibold mb-0 fs-4">Mathew Anderson</h6>
                      <span class="fs-2"><span class="p-1 bg-light rounded-circle d-inline-block"></span> 15 min
                        ago</span>
                    </div>
                    <p class="text-dark my-3">
                      Nu kek vuzkibsu mooruno ejepogojo uzjon gag fa ezik disan he nah. Wij wo pevhij tumbug rohsa ahpi
                      ujisapse lo vap labkez eddu suk.
                    </p>
                    <img src="../assets/images/template/s1.jpg" alt=""
                      class="img-fluid rounded-4 w-100 object-fit-cover" style="height: 360px;">
                    <div class="d-flex align-items-center my-3">
                      <div class="d-flex align-items-center gap-2">
                        <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                          href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                          data-bs-title="Like">
                          <i class="ti ti-thumb-up"></i>
                        </a>
                        <span class="text-dark fw-semibold">67</span>
                      </div>
                      <div class="d-flex align-items-center gap-2 ms-4">
                        <a class="text-white d-flex align-items-center justify-content-center bg-secondary p-2 fs-4 rounded-circle"
                          href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                          data-bs-title="Comment">
                          <i class="ti ti-message-2"></i>
                        </a>
                        <span class="text-dark fw-semibold">2</span>
                      </div>
                      <a class="text-dark ms-auto d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle"
                        href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Share">
                        <i class="ti ti-share"></i>
                      </a>
                    </div>
                    <div class="position-relative">
                      <div class="p-4 rounded-2 bg-light mb-3">
                        <div class="d-flex align-items-center gap-3">
                          <img src="../assets/images/template/user-3.jpg" alt="" class="rounded-circle" width="33"
                            height="33">
                          <h6 class="fw-semibold mb-0 fs-4">Deran Mac</h6>
                          <span class="fs-2"><span class="p-1 bg-muted rounded-circle d-inline-block"></span> 8 min
                            ago</span>
                        </div>
                        <p class="my-3">Lufo zizrap iwofapsuk pusar luc jodawbac zi op uvezojroj duwage vuhzoc ja vawdud
                          le furhez siva
                          fikavu ineloh. Zot afokoge si mucuve hoikpaf adzuk zileuda falohfek zoije fuka udune lub
                          annajor gazo
                          conis sufur gu.
                        </p>
                        <div class="d-flex align-items-center">
                          <div class="d-flex align-items-center gap-2">
                            <a class="text-white d-flex align-items-center justify-content-center bg-primary p-2 fs-4 rounded-circle"
                              href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                              data-bs-title="Like">
                              <i class="ti ti-thumb-up"></i>
                            </a>
                            <span class="text-dark fw-semibold">55</span>
                          </div>
                          <div class="d-flex align-items-center gap-2 ms-4">
                            <a class="text-white d-flex align-items-center justify-content-center bg-secondary p-2 fs-4 rounded-circle"
                              href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                              data-bs-title="Reply">
                              <i class="ti ti-arrow-back-up"></i>
                            </a>
                            <span class="text-dark fw-semibold">0</span>
                          </div>
                        </div>
                      </div>
                      <div class="p-4 rounded-2 bg-light mb-3">
                        <div class="d-flex align-items-center gap-3">
                          <img src="../../dist/images/profile/user-4.jpg" alt="" class="rounded-circle" width="33"
                            height="33">
                          <h6 class="fw-semibold mb-0 fs-4">Jonathan Bg</h6>
                          <span class="fs-2"><span class="p-1 bg-muted rounded-circle d-inline-block"></span> 5 min
                            ago</span>
                        </div>
                        <p class="my-3">
                          Zumankeg ba lah lew ipep tino tugjekoj hosih fazjid wotmila durmuri buf hi sigapolu joit ebmi
                          joge vo.
                          Horemo vogo hat na ejednu sarta afaamraz zi cunidce peroido suvan podene igneve.
                        </p>
                        <div class="d-flex align-items-center">
                          <div class="d-flex align-items-center gap-2">
                            <a class="text-dark d-flex align-items-center justify-content-center bg-light-dark p-2 fs-4 rounded-circle"
                              href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                              data-bs-title="Like">
                              <i class="ti ti-thumb-up"></i>
                            </a>
                            <span class="text-dark fw-semibold">68</span>
                          </div>
                          <div class="d-flex align-items-center gap-2 ms-4">
                            <a class="text-white d-flex align-items-center justify-content-center bg-secondary p-2 fs-4 rounded-circle"
                              href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top"
                              data-bs-title="Reply">
                              <i class="ti ti-arrow-back-up"></i>
                            </a>
                            <span class="text-dark fw-semibold">1</span>
                          </div>
                        </div>
                      </div>
                      <div class="p-4 rounded-2 bg-light ms-7">
                        <div class="d-flex align-items-center gap-3">
                          <img src="../assets/images/template/user-5.jpg" alt="" class="rounded-circle" width="40"
                            height="40">
                          <h6 class="fw-semibold mb-0 fs-4">Carry minati</h6>
                          <span class="fs-2"><span class="p-1 bg-muted rounded-circle d-inline-block"></span> just
                            now</span>
                        </div>
                        <p class="my-3">
                          Olte ni somvukab ugura ovaobeco hakgoc miha peztajo tawosu udbacas kismakin hi. Dej
                          zetfamu cevufi sokbid bud mun soimeuha pokahram vehurpar keecris pepab voegmud
                          zundafhef hej pe.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 p-3">
                    <img src="../assets/images/template/user-1.jpg" alt="" class="rounded-circle" width="33"
                      height="33">
                    <input type="text" class="form-control py-8" id="exampleInputtext" aria-describedby="textHelp"
                      placeholder="Comment">
                    <button class="btn btn-primary">Comment</button>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="row gx-0">
                      <div class="col-lg-12">
                        <div class="p-4 calender-sidebar app-calendar">
                          <div id="calendar"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div> -->
          </div>
          <!-- Student Attendence Tab Content -->
          <div class="tab-pane fade" id="pills-followers" role="tabpanel" aria-labelledby="pills-followers-tab"
            tabindex="0">
            <div class="row">
              <!-- Month Dropdown -->
              <div class="col-lg-12">
                <div class="d-flex align-items-center">
                  <select class="form-select w-auto ms-auto mb-3 jameel-kasheeda fs-4 fw-semibold cursor-pointer">
                    <option selected="" class="fw-semibold">جنوری</option>
                    <option value="1" class="fw-semibold">فروری</option>
                    <option value="2" class="fw-semibold">مارچ</option>
                    <option value="3" class="fw-semibold">اپریل</option>
                  </select>
                </div>
              </div>
              <!-- Total Present -->
              <div class=" col-md-6 col-xl-4">
                <div class="card">
                  <div class="card-body p-4 d-flex align-items-center gap-3">
                    <div>
                      <h5 class="mb-0 jameel-kasheeda fs-6">ٹوٹل حاضری</h5>
                    </div>
                    <h5 class="mb-0 ms-auto inter bg-light-success text-success py-2 px-3 rounded-circle">7</h5>
                  </div>
                </div>
              </div>
              <!-- Total Absent -->
              <div class=" col-md-6 col-xl-4">
                <div class="card ">
                  <div class="card-body p-4 d-flex align-items-center gap-3">
                    <div>
                      <h5 class="mb-0 jameel-kasheeda fs-6">ٹوٹل غیرحاضری</h5>
                    </div>
                    <h5 class="mb-0  ms-auto inter bg-light-danger text-danger py-2 px-3 rounded-circle">7 </h5>
                  </div>
                </div>
              </div>
              <!-- Total Leave -->
              <div class=" col-md-6 col-xl-4">
                <div class="card">
                  <div class="card-body p-4 d-flex align-items-center gap-3">
                    <div>
                      <h5 class="mb-0 jameel-kasheeda fs-6">ٹوٹل رخصت</h5>
                    </div>
                    <h5 class="mb-0 ms-auto inter bg-light-info text-info py-2 px-3 rounded-circle">7 </h5>
                  </div>
                </div>
              </div>
            </div>
            <!-- Total Attendence List -->
            <div class="row">
              <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                  <div class="card-body">
                    <div class="mb-7 mb-sm-0">
                      <h5 class="card-title fs-8 text-primary">حاضری</h5>
                    </div>
                    <div class="table-responsive  text-center py-9">
                      <table class="table align-middle stylish-table text-nowrap mb-0">
                        <thead>
                          <tr class="fw-semibold">
                            <th class="fs-6 word-spacing-2px">#</th>
                            <th class="fs-6 word-spacing-2px">تاریخ</th>
                            <th class="fs-6 word-spacing-2px">دن</th>
                            <th class="fs-6 word-spacing-2px">حالت</th>
                          </tr>
                        </thead>
                        <tbody class="border-top">
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">1</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">18-09-2023</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">ہفتہ</p>
                            </td>
                            <td>
                              <span
                                class="badge bg-light-success text-success fs-4 word-spacing-2px jameel-kasheeda fw-semibold">حاضری</span>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">2</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">20-09-2023</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">پیر</p>
                            </td>
                            <td>
                              <span
                                class="badge bg-light-danger text-danger fs-4 word-spacing-2px jameel-kasheeda fw-semibold">غیر
                                حاضری</span>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">3</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">29-09-2023</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">منگل</p>
                            </td>
                            <td>
                              <span
                                class="badge bg-light-info text-info fs-4 word-spacing-2px jameel-kasheeda fw-semibold">حاضری</span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Student Fees Tab Content -->
          <div class="tab-pane fade" id="pills-friends" role="tabpanel" aria-labelledby="pills-friends-tab"
            tabindex="0">
            <div class="row">
              <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                  <div class="card-body">
                    <div class="mb-7 mb-sm-0 d-flex align-items-center">
                      <h5 class="card-title fs-8 text-primary">فیس</h5>
                      <div class="d-flex align-items-center ms-auto">
                        <select class="form-select w-auto mb-3 jameel-kasheeda fw-semibold fs-4 cursor-pointer">
                          <option selected="" class="fw-semibold">جنوری</option>
                          <option value="1" class="fw-semibold">فروری</option>
                          <option value="2" class="fw-semibold">مارچ</option>
                          <option value="3" class="fw-semibold">اپریل</option>
                        </select>
                      </div>
                    </div>
                    <div class="table-responsive text-center py-9">
                      <table class="table align-middle stylish-table text-nowrap mb-0">
                        <thead>
                          <tr class="fw-semibold">
                            <th class="fs-6 word-spacing-2px">#</th>
                            <th class="fs-6 word-spacing-2px">نام</th>
                            <th class="fs-6 word-spacing-2px">ٹوٹل فیس</th>
                            <th class="fs-6 word-spacing-2px">حالت</th>
                            <th class="fs-6 word-spacing-2px">انتخاب کریں</th>
                          </tr>
                        </thead>
                        <tbody class="border-top">
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">1</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">ماہانہ</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">1,500</p>
                            </td>
                            <td>
                              <span
                                class="badge bg-light-success text-success fs-4 word-spacing-2px jameel-kasheeda fw-semibold">ادا
                                کیا</span>
                            </td>
                            <td>
                              <div class="action-btn">
                                <a href="javascript:void(0)" class="text-dark ms-1">
                                  <i class="ti ti-trash fs-6 text-danger"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-info ms-1">
                                  <i class="ti ti-eye fs-6"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-success">
                                  <i class="ti ti-edit fs-6"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">2</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">امتحانی</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">500</p>
                            </td>
                            <td>
                              <span
                                class="badge bg-light-danger text-danger fs-4 word-spacing-2px jameel-kasheeda fw-semibold">ادا
                                نہیں کیا</span>
                            </td>
                            <td>
                              <div class="action-btn">
                                <a href="javascript:void(0)" class="text-dark ms-1">
                                  <i class="ti ti-trash fs-6 text-danger"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-info ms-1">
                                  <i class="ti ti-eye fs-6"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-success">
                                  <i class="ti ti-edit fs-6"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Student Exam Tab Content -->
          <div class="tab-pane fade" id="pills-gallery" role="tabpanel" aria-labelledby="pills-gallery-tab"
            tabindex="0">
            <div class="row">
              <!-- Yearly Dropdown -->
              <div class="col-lg-12">
                <div class="d-flex align-items-center">
                  <select class="form-select w-auto ms-auto mb-3 inter fs-2 fw-semibold cursor-pointer">
                    <option selected="" class="fw-semibold">2022</option>
                    <option value="1" class="fw-semibold">2021</option>
                    <option value="2" class="fw-semibold">2020</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                  <div class="card-body">
                    <div class="mb-7 mb-sm-0 d-flex align-items-center">
                      <h5 class="card-title fs-8 text-primary">امتحانات</h5>
                      <div class="d-flex align-items-center ms-auto">
                        <select class="form-select w-auto mb-3 jameel-kasheeda fw-semibold fs-4 cursor-pointer">
                          <option selected="" class="fw-semibold">سالانہ</option>
                          <option value="1" class="fw-semibold">ششماہی</option>
                          <option value="2" class="fw-semibold">مانانہ ٹیسٹ</option>
                          <option value="3" class="fw-semibold">چار ماہی ٹیسٹ</option>
                        </select>
                      </div>
                    </div>
                    <div class="table-responsive text-center py-9">
                      <table class="table align-middle stylish-table text-nowrap mb-0">
                        <thead>
                          <tr class="fw-semibold">
                            <th class="fs-6 word-spacing-2px">#</th>
                            <th class="fs-6 word-spacing-2px">کتاب</th>
                            <th class="fs-6 word-spacing-2px">ٹوٹل نمبر</th>
                            <th class="fs-6 word-spacing-2px">حاصل کردہ نمبر</th>
                            <th class="fs-6 word-spacing-2px">فیصد</th>
                            <th class="fs-6 word-spacing-2px"> پوزیشن </th>
                            <th class="fs-6 word-spacing-2px">انتخاب کریں</th>
                          </tr>
                        </thead>
                        <tbody class="border-top">
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">1</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">کمپوٹر اسٹڈیز</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">85</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">67</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">76٪</p>
                            </td>
                            <td>
                              <span class="badge bg-light-success text-success fs-4 word-spacing-2px
                                 jameel-kasheeda fw-semibold">دوم</span>
                            </td>
                            <td>
                              <div class="action-btn">
                                <a href="javascript:void(0)" class="text-dark ms-1">
                                  <i class="ti ti-trash fs-6 text-danger"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-info ms-1">
                                  <i class="ti ti-eye fs-6"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-success">
                                  <i class="ti ti-edit fs-6"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p class="mb-0 fs-2 inter">2</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-4 word-spacing-2px">اسلامیات</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">75</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">23</p>
                            </td>
                            <td>
                              <p class="mb-0 fs-2 inter">20٪</p>
                            </td>
                            <td>
                              <span class="badge bg-light-danger text-danger fs-4 word-spacing-2px
                                 jameel-kasheeda fw-semibold">فیل</span>
                            </td>
                            <td>
                              <div class="action-btn">
                                <a href="javascript:void(0)" class="text-dark ms-1">
                                  <i class="ti ti-trash fs-6 text-danger"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-info ms-1">
                                  <i class="ti ti-eye fs-6"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-success">
                                  <i class="ti ti-edit fs-6"></i>
                                </a>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Student Profile  (End) -->
      </div>
      <!-- Main Content (End) -->
    </div>
    <div class="dark-transparent sidebartoggler"></div>
  </div>

  <?php
include "inc/mobileNavbar.php";
include "inc/footer.php";
?>