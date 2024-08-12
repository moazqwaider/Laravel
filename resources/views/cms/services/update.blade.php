@extends('layouts.index')

@section('title', 'Services Edit')
@section('subtitle', 'Edit')
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
                            <h3 class="card-title">Update Recourd In Services Section</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="post" action="{{route('services.update',$services->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_en">Title</label>
                                            <input type="text" class="form-control" id="title_en" name="title_en"
                                            @php
                                                $title_en = $services->getTranslation('title', 'en')
                                            @endphp
                                             value="{{old('title_en',$services->getTranslation('title', 'en'))}}"
                                            placeholder="Title En ..">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_ar">Title <span
                                                    style="color: red;font-size: 10px">"بالعربية"</span></label>
                                            <input type="text" class="form-control" id="title_ar"
                                                value="{{ $services->getTranslation('title', 'ar') }}" name="title_ar" placeholder="Title Ar ..">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description_en">Description</label>

                                    <textarea class="form-control" rows="3" id="description_en"  name="description_en" placeholder="Description En ...">{{$services->getTranslation('description','en')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description_ar">Description <span
                                            style="color: red;font-size: 10px">"بالعربية"</span></label>
                                    <textarea class="form-control" rows="3" id="description_ar" name="description_ar" placeholder="Description En ...">{{$services->getTranslation('description','ar')}}</textarea>


                                </div>

                                <div class="form-group">
                                    <label>Icon </label>
                                    <select class="form-control selectpicker" name="icon" id="icon" style="width: 100%;">
                                        <option value="">Select an icon</option>
                                        @foreach ($icons as $icon)
                                            <option @if ($services->icon == $icon)
                                                selected
                                            @endif value="{{ $icon }}" data-icon="{{ $icon }}">
                                                <i class="{{ $icon }}" style="font-size: 16px;"></i> {{ $icon }}
                                            </option>
                                        @endforeach
                                    </select>
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
