<div class="main-content">
    <div class="page-header min-height-300 border-radius-xl"
         style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <form action="{{ route('profile.upload.avatar') }}" method="post" hidden="" enctype="multipart/form-data"
          id="avatarForm" onsubmit="loadingMasterPage()">
        @csrf
        <input type="file" id="avatarInput" name="avatar" accept="image/*" onchange="submitAvatarForm()">
    </form>
    <div class="card card-body blur shadow-blur mx-4 mt-n6">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{ auth()->user()->avatar ? auth()->user()->avatar : asset('assets/img/logo-tntt.png') }}"
                         alt="..." class="w-100 border-radius-lg shadow-sm h-100 object-cover">
                    <a onclick="selectAvatar()"
                       class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                        <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top"
                           title="Edit Image"></i>
                    </a>
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ auth()->user()->holy_name . ' ' . auth()->user()->name }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        CEO / Co-Founder
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Platform Settings</h6>
                </div>
                <div class="card-body p-3">
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder">Account</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 px-0">
                            <div class="form-group ps-0 ">

                                <label class="form-check-label text-body ms-3 text-truncate mb-0 line-height-100"
                                       for="flexSwitchCheckDefault">Teen thanh</label>
                                <input class="form-control d-inline-block w-auto " type="text"
                                       id="flexSwitchCheckDefault">
                            </div>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <div class="form-check form-switch ps-0">
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                       for="flexSwitchCheckDefault1">Email me when someone answers on my post</label>
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault1">
                            </div>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <div class="form-check form-switch ps-0">

                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                       for="flexSwitchCheckDefault2">Email me when someone mentions me</label>
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault2"
                                       checked>
                            </div>
                        </li>
                    </ul>
                    <h6 class="text-uppercase text-body text-xs font-weight-bolder mt-4">Application</h6>
                    <ul class="list-group">
                        <li class="list-group-item border-0 px-0">
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault3">
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                       for="flexSwitchCheckDefault3">New launches and projects</label>
                            </div>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault4"
                                       checked>
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                       for="flexSwitchCheckDefault4">Monthly product updates</label>
                            </div>
                        </li>
                        <li class="list-group-item border-0 px-0 pb-0">
                            <div class="form-check form-switch ps-0">
                                <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault5">
                                <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                       for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-0">Profile Information</h6>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="javascript:">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                   data-bs-placement="top" title="Edit Profile"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <p class="text-sm">
                        Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally
                        difficult paths, choose the one more painful in the short term (pain avoidance is creating an
                        illusion of equality).
                    </p>
                    <hr class="horizontal gray-light my-4">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                Name:</strong> &nbsp; Alec M. Thompson
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong>
                            &nbsp; (44) 123 1234 123
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong>
                            &nbsp; alecthompson@mail.com
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Location:</strong>
                            &nbsp; USA
                        </li>
                        <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm">Social:</strong> &nbsp;
                            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:">
                                <i class="fab fa-facebook fa-lg"></i>
                            </a>
                            <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                            <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Conversations</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="avatar me-3">
                                <img src="../assets/img/kal-visuals-square.jpg" alt="kal"
                                     class="border-radius-lg shadow">
                            </div>
                            <div class="d-flex align-items-start flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">Sophie B.</h6>
                                <p class="mb-0 text-xs">Hi! I need more information..</p>
                            </div>
                            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:">Reply</a>
                        </li>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="avatar me-3">
                                <img src="../assets/img/marie.jpg" alt="kal" class="border-radius-lg shadow">
                            </div>
                            <div class="d-flex align-items-start flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">Anne Marie</h6>
                                <p class="mb-0 text-xs">Awesome work, can you..</p>
                            </div>
                            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:">Reply</a>
                        </li>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="avatar me-3">
                                <img src="../assets/img/ivana-square.jpg" alt="kal" class="border-radius-lg shadow">
                            </div>
                            <div class="d-flex align-items-start flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">Ivanna</h6>
                                <p class="mb-0 text-xs">About files I can..</p>
                            </div>
                            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:">Reply</a>
                        </li>
                        <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                            <div class="avatar me-3">
                                <img src="../assets/img/team-4.jpg" alt="kal" class="border-radius-lg shadow">
                            </div>
                            <div class="d-flex align-items-start flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">Peterson</h6>
                                <p class="mb-0 text-xs">Have a great afternoon..</p>
                            </div>
                            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:">Reply</a>
                        </li>
                        <li class="list-group-item border-0 d-flex align-items-center px-0">
                            <div class="avatar me-3">
                                <img src="../assets/img/team-3.jpg" alt="kal" class="border-radius-lg shadow">
                            </div>
                            <div class="d-flex align-items-start flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">Nick Daniel</h6>
                                <p class="mb-0 text-xs">Hi! I need more information..</p>
                            </div>
                            <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto" href="javascript:">Reply</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function selectAvatar() {
        $('#avatarInput').click();
    }

    function submitAvatarForm() {
        // Trigger form submission
        $('#avatarForm').submit();
    }
</script>
