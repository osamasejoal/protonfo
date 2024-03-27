@extends('backend.layouts.master')

@section('header-content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
@endsection

@section('main-content')
    <!-- Breadcrumb -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between" style="border-bottom: none">
                <h4 class="mb-sm-0">Banner</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <div class="row mb-5">
        <div class="col-xl-12 m-auto">

            <!-- Card -->
            <div class="card">

                <!-- Card -->
                <div class="card-body">

                    <!-- Form -->
                    <form action="{{ route('banner.update', $banner->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @method('put')
                        @csrf

                        <!-- Title -->
                        <div class="row mb-3 mt-4">
                            <div class="col-lg-3">
                                <label for="title" class="form-label">Title</label>
                            </div>
                            <div class="col-lg-9">
                                <input name="title" type="text" class="form-control" id="title"
                                    placeholder="Write The Banner Title" value="{{ $banner->title }}">

                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> <!-- end Title -->

                        <!-- Image -->
                        <div class="pb-4">

                            <div class="row mb-4">
                                <div class="col-lg-3">
                                    <label for="formFile" class="form-label">Banner Image</label>
                                </div>
                                <div class="col-lg-9">
                                    <input name="image" class="form-control" type="file" id="formFile">

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
                                        src="{{ asset('backend/assets/images/banner') . '/' . $banner->image }}"
                                        alt="200x200" class="rounded-circle " id="showImage">
                                </div>
                            </div>

                        </div> <!-- end Image -->
                        

                        <!-- Features --> 
                        <div class="d-flex justify-content-around mt-5">

                            <!-- Feature-1 --> 
                            <div class="feature-1" style="width: 30%">
                                <div class="card border card-border-info">

                                    <!-- Card Header -->
                                    <div class="card-header">

                                        <div class="h3 m-0 text-center">Feature 1</div>

                                    </div> <!-- end Card Header -->

                                    <!-- Card Body -->
                                    <div class="card-body">

                                        <div class="col-lg-12 mb-4">

                                            <label for="feature_title_1" class="form-label" style="font-weight: 700">Titile</label>

                                            <input name="feature_title_1" type="text" class="form-control" id="feature_title_1"
                                                placeholder="Write the Title for Feature 1" value="{{ $banner->feature_title_1 }}">
            
                                            @error('feature_title_1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-lg-12">

                                            <label for="feature_description_1" class="form-label" style="font-weight: 700">Description</label>
                                            
                                            <textarea name="feature_description_1" class="form-control" id="feature_description_1" rows="3" placeholder="Write the Description for Feature 1">{{ $banner->feature_description_1 }}</textarea>
            
                                            @error('feature_description_1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!-- Card Body -->
                                </div>
                            </div> <!-- end Feature-1 --> 


                            <!-- Feature-2 --> 
                            <div class="feature-2" style="width: 30%">
                                <div class="card border card-border-info">

                                    <!-- Card Header -->
                                    <div class="card-header">

                                        <div class="h3 m-0 text-center">Feature 2</div>

                                    </div> <!-- end Card Header -->

                                    <!-- Card Body -->
                                    <div class="card-body">

                                        <div class="col-lg-12 mb-4">

                                            <label for="feature_title_2" class="form-label" style="font-weight: 700">Titile</label>

                                            <input name="feature_title_2" type="text" class="form-control" id="feature_title_2"
                                                placeholder="Write the Title for Feature 2" value="{{ $banner->feature_title_2 }}">
            
                                            @error('feature_title_2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-lg-12">

                                            <label for="feature_description_2" class="form-label" style="font-weight: 700">Description</label>
                                            
                                            <textarea name="feature_description_2" class="form-control" id="feature_description_2" rows="3" placeholder="Write the Description for Feature 2">{{ $banner->feature_description_2 }}</textarea>
            
                                            @error('feature_description_2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!-- Card Body -->
                                </div>
                            </div> <!-- end Feature-2 --> 


                            <!-- Feature-3 --> 
                            <div class="feature-3" style="width: 30%">
                                <div class="card border card-border-info">

                                    <!-- Card Header -->
                                    <div class="card-header">

                                        <div class="h3 m-0 text-center">Feature 3</div>

                                    </div> <!-- end Card Header -->

                                    <!-- Card Body -->
                                    <div class="card-body">

                                        <div class="col-lg-12 mb-4">

                                            <label for="feature_title_3" class="form-label" style="font-weight: 700">Titile</label>

                                            <input name="feature_title_3" type="text" class="form-control" id="feature_title_3"
                                                placeholder="Write the Title for Feature 3" value="{{ $banner->feature_title_3 }}">
            
                                            @error('feature_title_3')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <div class="col-lg-12">

                                            <label for="feature_description_3" class="form-label" style="font-weight: 700">Description</label>
                                            
                                            <textarea name="feature_description_3" class="form-control" id="feature_description_3" rows="3" placeholder="Write the Description for Feature 3">{{ $banner->feature_description_3 }}</textarea>
            
                                            @error('feature_description_3')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div> <!-- Card Body -->
                                </div>
                            </div> <!-- end Feature-3 --> 

                        </div> <!-- end Features -->

                        <!-- Submit -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Add Leave</button>
                        </div> <!-- end Submit -->


                    </form> <!-- end Form -->

                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

    </div><!-- end row -->
@endsection


@section('footer-content')
    <!-- The script to show the image what have been chosen by user but didn't submit yet. -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#formFile').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        });
    </script>
@endsection
