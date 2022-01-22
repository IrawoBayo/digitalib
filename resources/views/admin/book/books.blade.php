@extends('layouts.master')

@section('title', 'Books - ')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">All Books</h2>
            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                Add A Book
            </button>
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table id="myTable" class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Upload</th>
                        <th>Added On</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1 ?>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $n++ }}</td>
                            <td>{{ $book->category->category }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->upload }}</td>
                            <td>{{ $book->created_at }}</td>
                            <td>
                                <a href="{{ url('admin/view-book/'.$book->id) }}"><button class="btn btn-primary"><i class="fas fa-eye"></i></button></a> 
                                <!-- <a href="{{ url('admin/edit-book/'.$book->id) }}"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                                <a href="{{ url('admin/delete-book/'.$book->id) }}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>

@endsection
@section('scripts')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection
    
    <!-- modal medium -->
    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Add A Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('uploadbook') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="category_id" class=" form-control-label">Book Category</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Please select</option>
                                    @foreach($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="title" class=" form-control-label">Book Title</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="title" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="author" class=" form-control-label">Book Author</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="author" name="author" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="ISBN" class=" form-control-label">Book ISBN</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="ISBN" name="ISBN" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="publisher" class=" form-control-label">Book Publisher</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="publisher" name="publisher" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="description" class=" form-control-label">Book Description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="upload" class=" form-control-label">File Upload</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="upload" name="upload" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal medium -->