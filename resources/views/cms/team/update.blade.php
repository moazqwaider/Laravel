@extends('layouts.index')

@section('title', 'Team Edit')
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
                            <h3 class="card-title">Update Recourd In Team Section</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form method="post" action="{{route('teams.update',$team->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_en">Name</label>
                                            <input type="text" class="form-control" id="name_en" name="name_en"
                                             value="{{$team->getTranslation('name', 'en')}}"
                                            placeholder="Name En ..">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_ar">Name <span
                                                    style="color: red;font-size: 10px">"بالعربية"</span></label>
                                            <input type="text" class="form-control" id="title_ar"
                                                value="{{ $team->getTranslation('name', 'ar') }}" name="name_ar" placeholder="Name Ar ..">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="description_en">Description</label>

                                    <textarea class="form-control" rows="3" id="description_en"  name="description_en" placeholder="Description En ...">{{$team->getTranslation('description','en')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="description_ar">Description <span
                                            style="color: red;font-size: 10px">"بالعربية"</span></label>
                                    <textarea class="form-control" rows="3" id="description_ar" name="description_ar" placeholder="Description En ...">{{$team->getTranslation('description','ar')}}</textarea>


                                </div>

                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="team_image" name="team_image"
                                            onchange="previewImage(event)">
                                        <label class="custom-file-label" for="team_image">Change Photo</label>
                                    </div>
                                    {{-- <img id="image_preview" src="{{ asset('storage/images/' . $team->icon) }}" --}}
                                    <img id="image_preview" src="{{Storage::url('images/'.$team->image)}}"

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
