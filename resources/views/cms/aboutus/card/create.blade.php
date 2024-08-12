@extends('layouts.index')

@section('title', 'About Us Card')
@section('main-title', 'About Us Card')
@section('subtitle', 'About Us Card')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
                            <h3 class="card-title">New Card In About Us Section</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form id="create-form">
                            <div class="card-body">
                                {{-- card contect --}}
                                <div class="form-group">
                                    <label>About</label>
                                    <select class="form-control guards" id="aboutId" style="width: 100%;">
                                        <option selected value="{{$about->id}}" disabled>{{$about->getTranslation('title','en')}}</option>


                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="title_en">Card Title</label>
                                            <input type="text" class="form-control" id="card_title_en"
                                                placeholder="Title En ..">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="title_ar">Card Title <span
                                                    style="color: red;font-size: 10px">"بالعربية"</span></label>
                                            <input type="text" class="form-control" id="card_title_ar"
                                                placeholder="Title Ar ..">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label for="description_en">Card Description</label>

                                    <textarea class="form-control" rows="3" id="card_description_en" placeholder="Description En ..."></textarea>

                                </div>

                                <div class="form-group">
                                    <label for="description_ar">Card Description <span
                                            style="color: red;font-size: 10px">"بالعربية"</span></label>
                                    <textarea class="form-control" rows="3" id="card_description_ar" placeholder="Description En ..."></textarea>
                                </div>

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




                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="createHome()">Save</button>
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
    <script src="{{ asset('cms/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        //Initialize Select2 Elements
        $('.guards').select2({
            theme: 'bootstrap4'
        })

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image_preview');
                output.src = reader.result;
                output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function createHome() {
            let formData = new FormData();
            formData.append('card_title_en', document.getElementById('card_title_en').value),
                formData.append('card_title_ar', document.getElementById('card_title_ar').value),
                formData.append('card_description_en', document.getElementById('card_description_en').value),
                formData.append('card_description_ar', document.getElementById('card_description_ar').value),
                formData.append('aboutId', document.getElementById('aboutId').value),
                formData.append('icon', document.getElementById('icon').value),

                axios.post('/cms/admin/about-card-store', formData)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    toastr.success(response.data.message);
                    // to reset form
                    document.getElementById('create-form').reset();
                    document.getElementById('card_image').reset();
                    // window.location.href = "/cms/admin/about";

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
