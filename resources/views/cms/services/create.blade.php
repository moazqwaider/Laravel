@extends('layouts.index')

@section('title', 'Services')
@section('main-title', 'Services')
@section('subtitle', 'Services')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" rel="stylesheet" />
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">New Recourd In Services Section</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form id="create-form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="title_en">Title</label>
                                            <input type="text" class="form-control" id="title_en"
                                                placeholder="Title En ..">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="title_ar">Title <span
                                                    style="color: red;font-size: 10px">"بالعربية"</span></label>
                                            <input type="text" class="form-control" id="title_ar"
                                                placeholder="Title Ar ..">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="description_en">Description</label>

                                    <textarea class="form-control" rows="3"  id="description_en" placeholder="Description En ..."></textarea>

                                </div>

                                <div class="form-group">
                                    <label for="description_ar">Description <span
                                            style="color: red;font-size: 10px">"بالعربية"</span></label>
                                    <textarea class="form-control" rows="3"  id="description_ar" placeholder="Description En ..."></textarea>


                                </div>

                                {{-- <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="home_image">
                                        <label class="custom-file-label" for="home_image">Choose Photo</label>
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <label>Icon </label>
                                    <select class="form-control selectpicker" id="icon" style="width: 100%;">
                                        <option value="">Select an icon</option>
                                        @foreach ($icons as $icon)
                                            <option value="{{ $icon }}" data-icon="{{ $icon }}">
                                                <i class="{{ $icon }}" style="font-size: 16px;"></i> {{ $icon }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- <div class="form-group">
                                    <p class="text-danger">* صيغة المرفق ,jpg , png </p>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="services_image" onchange="previewImage(event)">
                                        <label class="custom-file-label" for="services_image">Choose Photo</label>
                                    </div>
                                    <img id="image_preview" src="#" alt="Image Preview" style="display: none; margin-top: 10px; max-width: 100%; height: auto;">
                                </div> --}}



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="createServices()">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->



                </div>
                <!--/.col (left) -->
                <!-- right column -->

                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('js')
    <script>

function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image_preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function createServices() {
            let formData = new FormData();
            formData.append('title_en', document.getElementById('title_en').value),
            formData.append('title_ar', document.getElementById('title_ar').value),
            formData.append('description_en', document.getElementById('description_en').value),
            formData.append('description_ar', document.getElementById('description_ar').value),
            formData.append('icon', document.getElementById('icon').value),

            axios.post('/cms/admin/services/', formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // to reset form
                    // document.getElementById('create-form').reset();
                    window.location.href = "/cms/admin/services";

                    // toastr.success(response.data.message);
                    // Toast.fire({
                    //     icon: response.data.icon,
                    //     title: response.data.message,
                    // });

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    toastr.error(error.response.data.message);


                })
                .finally(function() {
                    // always executed
                });

            // // using for sende request have just text doesnot have file
            // axios.post('/cms/admin/category/', {
            //     name: document.getElementById('category-name').value,
            //     active: document.getElementById('active-checkbox').checked
            // })
            // .then(function(response) {
            //     // handle success
            //     console.log(response);
            //     toastr.success(response.data.message);
            //     // to reset form
            //     // document.getElementById('create-form').reset();
            //    window.location.href ="/cms/admin/category";

            //     // toastr.success(response.data.message);
            //     // Toast.fire({
            //     //     icon: response.data.icon,
            //     //     title: response.data.message,
            //     // });

            // })
            // .catch(function(error) {
            //     // handle error
            //     console.log(error);
            //     toastr.error(error.response.data.message);


            // })
            // .finally(function() {
            //     // always executed
            // });


        }
    </script>
@endsection
