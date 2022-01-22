@extends('layouts.master')

@section('title', 'Book Category - ')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">All Book Category</h2>
            <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#smallmodal">
                Add Book Category
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
                        <th>Created On</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1 ?>
                    @foreach ($cats as $cat)
                        <tr>
                            <td>{{ $n++ }}</td>
                            <td>{{ $cat->category }}</td>
                            <td>{{ $cat->created_at }}</td>
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
    <!-- modal small -->
    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="smallmodalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('category') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="x_card_code" class="control-label mb-1">Category</label>
                            <div class="input-group">
                                <input id="category" name="category" type="text" class="form-control cc-cvc" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="Submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal small -->