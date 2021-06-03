@extends('admin.layouts.app')

@section('content')

    <div class="box">

        <div class="row">
            <div class="col-lg-12">

                <div class="box-header pull-left">
                    <h3 class="box-title">Categories Management</h3>
                </div>

                <div class="pull-right">
                    <a class="btn btn-success margin" href="{{ route('categories.create') }}">Add Category</a>
                </div>
            </div>

        </div>
        <br><br>

        <!-- /.box-header -->
        <div class="box-body">
            <table id="categories" class="table table-bordered table-striped nowrap" style="width: 100%;">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>created_at</th>
                    <th>Actions</th>
                </tr>
                </thead>
            </table>
        </div>
        <!-- /.box-body -->
    </div>


@endsection

@section('footer')
    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title">Confirmation</h2>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            fetch_data();

            function fetch_data() {
                $('#categories').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    scrollX: true,
                    paging: true,
                    lengthChange: true,
                    searching: true,
                    ordering: true,
                    info: true,
                    autoWidth: true,

                    ajax: {
                        url: "{{ route('categories.index') }}",
                    },
                    columns: [
                        {data: 'id', name: 'id'},
                        {
                            data: 'name',
                            name: 'name'
                        },

                        {
                            data: 'created_at',
                            name: 'created_at'
                        },

                        {
                            data: 'actions',
                            name: 'actions',
                            orderable: false
                        }
                    ],

                });
            }

            let row_id;

            $(document).on('click', '.delete', function () {
                row_id = $(this).attr('id');
                $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function () {
                $.ajax({
                    url: "category/destroy/" + row_id,
                    beforeSend: function () {
                        $('#ok_button').text('Deleting...');
                    },
                    success: function (data) {
                        setTimeout(function () {
                            $('#confirmModal').modal('hide');
                            $('#categories').DataTable().ajax.reload();
                            $('#ok_button').text('ok');
                            alert('Data Deleted');
                        }, 2000);
                    }
                })
            });

        });
    </script>
@endsection
