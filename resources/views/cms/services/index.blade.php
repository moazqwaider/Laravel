@extends('layouts.index')

@section('title', 'Services')
@section('subtitle', 'Index')

@section('content')

    <section class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        {{-- @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif --}}
                    <form">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Services-Section Table</h3>
                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">

                                        <input type="text" id="table_search" name="search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default" onclick="search()">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                    </form>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-bordered table table-striped text-nowrap">
                            <thead>
                                <tr>
                                    {{-- <th> </th> --}}
                                    <th>#</th>
                                    <th>icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created-At</th>
                                    <th>Updated-At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                        $i=1;
                                    @endphp
                                @forelse ($data as $services)
                                <tr>
                                    {{-- <td class="jsgrid-cell jsgrid-align-center" style="width: 60px;"><input type="checkbox"></td> --}}

                                    <td>{{$i++}}</td>
                                    <td class="{{$services->icon}}" style="width: 60px;height: 100%;"></td>

                                    <td>{{ $services->title }}</td>
                                    <td>{{ $services->description}}</td>

                                    <td>{{ $services->created_at }}</td>
                                    <td><span class="tag tag-success">{{ $services->updated_at }}</span></td>
                                    <td>
                                        <div class="btn-group d-flex justify-content-center">

                                            <a href="{{ route('services.edit', $services->id) }}" class="btn btn-info ">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" onclick="confiramDestroy({{ $services->id }},this)"
                                                class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <td colspan="7">No Data Found</td>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    {{-- {!! $data->links() !!} --}}
                    {{-- OR Use --}}
                    {{--  Directly in your blade file--}}
                    {{-- {{$data->links('pagination::bootstrap-4')}} --}}
                    {{-- {{$data->links('pagination::bootstrap-5')}} --}}

                </div>
                <!-- /.card -->
            </div>
        </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection

@section('js')

    <script>
        function confiramDestroy(id, referances) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    destroy(id, referances);

                }
            });
        }

        function destroy(id, referances) {
            axios.delete('/cms/admin/services/' + id)
                .then(function(response) {
                    // handle success
                    console.log(response);
                    referances.closest('tr').remove();
                    showMessage(response.data);

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);
                    showMessage(error.response.data);

                })
                .finally(function() {
                    // always executed
                });

        }

        function showMessage(data) {
            Swal.fire({
                title: data.title,
                // text: data.text,
                icon: data.icon,
                timer: 1500,
                showConfirmButton: false,
            });
        }
    </script>

    {{-- <script>
        function search() {

            axios.post('/cms/services/services/search/', {
                    search: document.getElementById('table_search').value,
                    // active: document.getElementById('active-checkbox').checked
                })
                .then(function(response) {
                    // handle success
                    console.log(response);
                    alert('Success');
                    // referances.closest('tr').remove();

                })
                .catch(function(error) {
                    // handle error
                    console.log(error);

                })
                .finally(function() {
                    // always executed
                });
        }
    </script> --}}
@endsection
