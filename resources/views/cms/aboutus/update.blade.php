@extends('layouts.index')

@section('title', 'About Edit')
@section('subtitle', 'AboutUs')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Recourd In About Section</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="post" action="{{route('about.update',$about->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_en">Title</label>
                                            <input type="text" class="form-control" id="title_en" name="title_en"
                                            @php
                                                $title_en = $about->getTranslation('title', 'en')
                                            @endphp
                                             value="{{old('title_en',$about->getTranslation('title', 'en'))}}"
                                            placeholder="Title En ..">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_ar">Title <span
                                                    style="color: red;font-size: 10px">"بالعربية"</span></label>
                                            <input type="text" class="form-control" id="title_ar"
                                                value="{{ $about->getTranslation('title', 'ar') }}" name="title_ar" placeholder="Title Ar ..">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description_en">Description</label>

                                    <textarea class="form-control" rows="3" id="description_en"  name="description_en" placeholder="Description En ...">{{$about->getTranslation('description','en')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description_ar">Description <span
                                            style="color: red;font-size: 10px">"بالعربية"</span></label>
                                    <textarea class="form-control" rows="3" id="description_ar" name="description_ar" placeholder="Description En ...">{{$about->getTranslation('description','ar')}}</textarea>


                                </div>

                                {{-- <div class="form-group">
                                    <!-- <label for="customFile">Custom File</label> -->
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="about_image">
                                        <label class="custom-file-label" for="about_image">Choose Photo</label>
                                    </div>
                                </div> --}}
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
   
@endsection
