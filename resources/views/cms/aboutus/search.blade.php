@extends('layouts.index')

@section('title', 'Category Search')
@section('main-title', 'Category')
@section('subtitle', 'Search ')
@section('home-url')
/cms/admin/category
@endsection




@section('content')

    <section class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category Table</h3>
                            {{-- <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">

                                        <input type="text" id="table_search" class="form-control float-right"
                                            placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-default" onclick="search()">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div> --}}

                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-bordered table table-striped text-nowrap">
                                <thead>
                                    <tr>
                                        {{-- <th> </th> --}}
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Crated At</th>
                                        <th>Updateed At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($search as $category)
                                        <tr>
                                            {{-- <td class="jsgrid-cell jsgrid-align-center" style="width: 60px;"><input type="checkbox"></td> --}}
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>

                                            <td><span
                                                    class="badge @if ($category->active == true) bg-success
                                            @else
                                                bg-danger @endif">{{ $category->status }}</span>
                                            </td>
                                            <td>{{ $category->created_at }}</td>
                                            <td><span class="tag tag-success">{{ $category->updated_at }}</span></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('category.edit', $category->id) }}"
                                                        class="btn btn-info ">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" onclick="confiramDestroy({{ $category->id }},this)"
                                                        class="btn btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td style="text-align: center;font-weight:bold;font-size: 30px " colspan="6">
                                                NO Categories Found!!</td>
                                        </tr>
                                    @endforelse


                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        @php
                            if ($search->count() > 0) {
                                $search->links('pagination::bootstrap-4');
                            }
                        @endphp


                        {{-- OR Use --}}
                        {{--  Directly in your blade file --}}
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
            axios.delete('/cms/admin/category/' + id)
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


@endsection
