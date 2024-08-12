@extends('layouts.index')

@section('title', 'Home Edit')
@section('subtitle', 'Edit')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Recourd In Home Section</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="post" action="{{route('home.update',$home->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_en">Title</label>
                                            <input type="text" class="form-control" id="title_en" name="title_en"
                                            @php
                                                $title_en = $home->getTranslation('title', 'en')
                                            @endphp
                                             value="{{old('title_en',$home->getTranslation('title', 'en'))}}"
                                            placeholder="Title En ..">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_ar">Title <span
                                                    style="color: red;font-size: 10px">"بالعربية"</span></label>
                                            <input type="text" class="form-control" id="title_ar"
                                                value="{{ $home->getTranslation('title', 'ar') }}" name="title_ar" placeholder="Title Ar ..">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description_en">Description</label>

                                    <textarea class="form-control" rows="3" id="description_en"  name="description_en" placeholder="Description En ...">{{$home->getTranslation('description','en')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description_ar">Description <span
                                            style="color: red;font-size: 10px">"بالعربية"</span></label>
                                    <textarea class="form-control" rows="3" id="description_ar" name="description_ar" placeholder="Description En ...">{{$home->getTranslation('description','ar')}}</textarea>


                                </div>

                                {{-- <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="home_image">
                                        <label class="custom-file-label" for="home_image">Choose Photo</label>
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="home_image" name="home_image"
                                            onchange="previewImage(event)">
                                        <label class="custom-file-label" for="home_image">Change Photo</label>
                                    </div>
                                    <img id="image_preview" src="{{ asset('storage/images/' . $home->image) }}"
                                        alt="Image Preview"
                                        style="display: block; margin-top: 10px; max-width: 100%; height: auto;">

                                </div>



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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

    </script>
@endsection
