<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <style>
        .icon-cross {
            position: relative;
            width: 50%;
            top: 7px;
        }

        .icon-cross-dt {
            top: 9px !important;
        }

        .solid-yellow {
            border: 3px solid #f7c508;
        }

        .solid-red {
            border: 3px solid #ff020b;
        }

        .solid-blue {
            border: 3px solid #005e9e;
        }
    </style>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Chiên con</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $countChienCon }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-pink bg-gradient-pink shadow text-center border-radius-md solid-red">
                                    <img class="icon-cross" src="{{ asset('assets/img/logos/cross-red.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Ấu nhi</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $countAuNhi }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-cyan shadow text-center border-radius-md solid-yellow">
                                    <img class="icon-cross" src="{{ asset('assets/img/logos/cross-yellow.svg') }}"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Thiếu nhi</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $countThieuNhi }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-blue shadow text-center border-radius-md solid-yellow">
                                    <img class="icon-cross" src="{{ asset('assets/img/logos/cross-yellow.svg') }}"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Nghĩa sỹ</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $countNghiaSy }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-yellow shadow text-center border-radius-md solid-red">
                                    <img class="icon-cross" src="{{ asset('assets/img/logos/cross-red.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Hiệp sỹ</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $countHiepSy }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-brown shadow text-center border-radius-md solid-yellow">
                                    <img class="icon-cross" src="{{ asset('assets/img/logos/cross-yellow.svg') }}"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Trợ tá</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $countTroTa }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-red shadow text-center border-radius-md solid-blue">
                                    <img class="icon-cross" src="{{ asset('assets/img/logos/cross-blue.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Dự trưởng</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $countDuTruong }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-red shadow text-center border-radius-md ">
                                    <img class="icon-cross icon-cross-dt"
                                         src="{{ asset('assets/img/logos/cross-yellow.svg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Huynh trưởng</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $countHuynhTruong }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div
                                    class="icon icon-shape bg-gradient-red shadow text-center border-radius-md solid-yellow">
                                    <img class="icon-cross" src="{{ asset('assets/img/logos/cross-yellow.svg') }}"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h6>Bảng tin</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="timeline timeline-one-side">
                            <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-bell-55 text-success text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-html5 text-danger text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-cart text-info text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-credit-card text-warning text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order
                                        #4395133</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-key-25 text-primary text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for
                                        development</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                                </div>
                            </div>
                            <div class="timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-money-coins text-dark text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h6>Bảng tin</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="timeline timeline-one-side">
                            <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-bell-55 text-success text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-html5 text-danger text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-cart text-info text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-credit-card text-warning text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order
                                        #4395133</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                                </div>
                            </div>
                            <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-key-25 text-primary text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for
                                        development</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                                </div>
                            </div>
                            <div class="timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-money-coins text-dark text-gradient"></i>
                  </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
