@extends('admin.main')
@section('content')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php
                    // foreach ($reports as $report) {
                    //     print_r($report);
                    // }
                    // echo $reports;
                ?>


                    <!-- Page Heading -->
                    @if (Session::has('msg'))
                    <div class="alert alert-dark mt-2" role="alert">
                    {{ Session::get('msg') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mt-4 mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="MainTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Tasks</th>
                                            <th>Doc</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data['reports'] as $report)
                                        <tr>
                                            <td>{{$report_id = $report['id']}}</td>
                                            <td>{{date("D, j M Y",$report['date'])}}</td>
                                            <td>{{$report['name']}}</td>
                                            <td>{{date("h:i A",$report['check_in'])}}</td>
                                            <td>{{date("h:i A",$report['check_out'])}}</td>
                                            <td>{{$report['tasks']}}</td>
                                            <td>
                                                <a href="{{$report['doc_link']}}" class="btn btn-info btn-icon-split btn-sm" target="_blank">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-file-text"></i>
                                                    </span>
                                                    <span class="text">Tasks Details</span>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('reports.destroy', $report_id) }}" method="POST">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-circle btn-sm" >
                                                        <i class="fas fa-trash"></i>
                                                        </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <script>
                    $(document).ready(function() {
                        $('#MainTable').DataTable({
                            dom: 'Bfrtip',
                            columnDefs: [
                                { targets: [0, 3, 4, 7], className: "dt-center"},
                            ],
                            buttons: [
                                {
                                    extend: 'print',
                                    text:      '<i class="fa fa-print"></i>',
                                    titleAttr: 'Print',
                                    exportOptions: {
                                        columns: ':visible'
                                    }
                                },
                                {
                                    extend:    'copyHtml5',
                                    text:      '<i class="fa fa-files-o"></i>',
                                    titleAttr: 'Copy'
                                },
                                {
                                    extend:    'excelHtml5',
                                    text:      '<i class="fa fa-file-excel-o"></i>',
                                    titleAttr: 'Excel'
                                },
                                {
                                    extend:    'csvHtml5',
                                    text:      '<i class="fa fa-file-text-o"></i>',
                                    titleAttr: 'CSV'
                                },
                                {
                                    extend:    'pdfHtml5',
                                    text:      '<i class="fa fa-file-pdf-o"></i>',
                                    titleAttr: 'PDF'
                                }
                            ]
                        });
                    } );
                </script>

@endsection
