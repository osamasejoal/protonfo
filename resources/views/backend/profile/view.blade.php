@extends('backend.layouts.master')

@section('main-content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row mt-5">
                    <div class="col-xxl-3">

                        <!-- Card left one, Image -->
                        <div class="card mt-n5">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                        <img src="{{ asset('backend/assets/images/profile') . '/' . auth()->user()->image }}"
                                            class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                            alt="user-profile-image">

                                    </div>
                                    <h5 class="fs-16 mb-1">{{ auth()->user()->name }}</h5>
                                </div>
                            </div>
                        </div>
                        <!--end card-->

                        <!-- Card left two, Profile Info -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-3">Profile Info</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th class="ps-0" scope="row">Full Name :</th>
                                                <td class="text-muted">{{ auth()->user()->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Email :</th>
                                                <td class="text-muted">{{ auth()->user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-0" scope="row">Gender :</th>
                                                <td class="text-muted">
                                                    @if (auth()->user()->gender == 1)
                                                        Male
                                                    @elseif (auth()->user()->gender == 2)
                                                        Female
                                                    @elseif (auth()->user()->gender == 3)
                                                        Others
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end card-->

                    </div>
                    <!--end col-->
                    <div class="col-xxl-9">

                        <!-- Card for Update -->
                        <div class="card mt-xxl-n5">

                            <!-- Card Header (Update) -->
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">

                                    <!-- Personal Details -->
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails"
                                            role="tab">
                                            <i class="fas fa-home"></i>
                                            Personal Details
                                        </a>
                                    </li>
                                    <!-- End Personal Details -->

                                    <!-- Change Password -->
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                            <i class="far fa-user"></i>
                                            Change Password
                                        </a>
                                    </li>
                                    <!-- End Change Password -->

                                </ul>
                            </div>
                            <!--End Card Header (Update) -->

                            <!-- Card Body (Update) -->
                            <div class="card-body p-4">
                                <div class="tab-content">

                                    <!-- Personal Details -->
                                    <div class="tab-pane active" id="personalDetails" role="tabpanel">

                                        <form method="POST" action="{{ route('user.profile.update') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <!-- Name -->
                                            <div class="row mb-4">
                                                <div class="col-lg-3">
                                                    <label for="name" class="form-label">Name</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        value="{{ auth()->user()->name }}">

                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- End Name -->

                                            <!-- Email -->
                                            <div class="row mb-4">
                                                <div class="col-lg-3">
                                                    <label for="email" class="form-label">Email</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="text" name="email" class="form-control" id="email"
                                                        value="{{ auth()->user()->email }}">

                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Email -->

                                            <!-- Gender -->
                                            <div class="row mb-4">
                                                <div class="col-lg-3">
                                                    <label for="gender" class="form-label">Gender</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <select name="gender" class="form-select" id="gender"
                                                        aria-label="Default select example">
                                                        <option value="1"
                                                            {{ auth()->user()->gender == 1 ? 'selected' : '' }}>Male
                                                        </option>
                                                        <option value="2"
                                                            {{ auth()->user()->gender == 2 ? 'selected' : '' }}>Female
                                                        </option>
                                                        <option value="3"
                                                            {{ auth()->user()->gender == 3 ? 'selected' : '' }}>Others
                                                        </option>
                                                    </select>

                                                    @error('gender')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!-- End Gender -->

                                            <!-- Image -->
                                            <div class="row mb-4">
                                                <div class="col-lg-3">
                                                    <label for="formFile" class="form-label">Profile Picture</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input name="image" class="form-control" type="file"
                                                        id="image">

                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3 mt-4">
                                                <div class="col-lg-3">
                                                    <label for="formFile" class="form-label"></label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <img class="img-thumbnail rounded-circle avatar-xl"
                                                        src="{{ asset('backend/assets/images/profile') . '/' . auth()->user()->image }}"
                                                        alt="200x200" class="rounded-circle " id="showImage">
                                                </div>
                                            </div>
                                            <!-- End Image -->


                                            <div class="text-center mt-5">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Personal Details -->


                                    <!-- Change Password -->
                                    <div class="tab-pane" id="changePassword" role="tabpanel">
                                        <form action="{{ route('user.password.update') }}" method="POST">
                                            @csrf

                                            <div class="row g-2">

                                                <!-- Old Password -->
                                                <div class="row mb-4 m-auto">
                                                    <div class="col-lg-3">
                                                        <label for="old_pass" class="form-label">Old Password</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input type="password" name="old_pass" id="old_pass"
                                                            class="form-control @error('old_pass') is-invalid @enderror">

                                                        @error('old_pass')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                        @if (session('error'))
                                                            <span class="text-danger">{{ session('error') }}</span>
                                                        @endif

                                                    </div>
                                                </div> <!-- End Old Password -->

                                                <!-- New Password -->
                                                <div class="row mb-4 m-auto">
                                                    <div class="col-lg-3">
                                                        <label for="new_pass" class="form-label">New Password</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input type="password" name="password" id="new_pass"
                                                            class="form-control @error('password') is-invalid @enderror">

                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- End New Password -->

                                                <!-- Confirm Password -->
                                                <div class="row mb-4 m-auto">
                                                    <div class="col-lg-3">
                                                        <label for="confirm_pass" class="form-label">Confirm
                                                            Password</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control" id="confirm_pass">

                                                        @error('password_confirmation')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div> <!-- End Confirm Password -->

                                                <!-- Forgot Password -->
                                                <div class="col-lg-12">
                                                    <div class="mb-3 text-end">
                                                        <a href="javascript:void(0);"
                                                            class="link-primary text-decoration-underline">Forgot
                                                            Password ?</a>
                                                    </div>
                                                </div>
                                                <!-- End Forgot Password -->

                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Change
                                                            Password</button>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                            </div>
                                            <!--end row-->

                                        </form>
                                    </div>
                                    <!-- End Change Password -->


                                </div>
                            </div>
                            <!-- End Card Body (Update) -->

                        </div>
                        <!-- End Card for Update -->


                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div><!-- End Page-content -->


        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                })
            });
        </script>
    @endsection
