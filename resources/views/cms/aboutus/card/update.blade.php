@extends('layouts.index')

@section('title', 'About Us Card')
@section('main-title', 'About Us Card')
@section('subtitle', 'About Us Card Edit')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css"
        rel="stylesheet" />

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
                            <h3 class="card-title">Update Card In About Us Section</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="post" action="{{ route('updateCard', $card->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                {{-- card contect --}}
                                <div class="form-group">
                                    <label>About</label>
                                    <select class="form-control guards" name="aboutId" style="width: 100%;">
                                        <option value="{{ $card->aboutUs->id }}">{{ $card->aboutUs->title }}</option>


                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="title_en">Card Title</label>
                                            <input type="text" class="form-control" id="card_title_en"
                                                name="card_title_en" value="{{ $card->getTranslation('card_title', 'en') }}"
                                                placeholder="Title En ..">
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="title_ar">Card Title <span
                                                    style="color: red;font-size: 10px">"بالعربية"</span></label>
                                            <input type="text" class="form-control" id="card_title_ar"
                                                name="card_title_ar" value="{{ $card->getTranslation('card_title', 'ar') }}"
                                                placeholder="Title Ar ..">
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label for="description_en">Card Description</label>

                                    <textarea class="form-control" rows="3" id="card_description_en" name="card_description_en"
                                        placeholder="Description En ...">{{ $card->getTranslation('card_description', 'en') }}</textarea>

                                </div>

                                <div class="form-group">
                                    <label for="description_ar">Card Description <span
                                            style="color: red;font-size: 10px">"بالعربية"</span></label>
                                    <textarea class="form-control" rows="3" id="card_description_ar" name="card_description_ar"
                                        placeholder="Description En ...">{{ $card->getTranslation('card_description', 'ar') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Icon </label>
                                    <select class="form-control selectpicker" name="icon" id="icon"
                                        style="width: 100%;">
                                        <option value="">Select an icon</option>
                                        @foreach ($icons as $icon)
                                            <option @if ($card->icon == $icon) selected @endif
                                                value="{{ $icon }}" data-icon="{{ $icon }}">
                                                <i class="{{ $icon }}" style="font-size: 16px;"></i>
                                                {{ $icon }}
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
    </script>
@endsection
