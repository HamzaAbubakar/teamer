<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> By Hamza Ali</title>
     <link rel="icon" href="{{ asset('favicon.png') }}" type="image/gif" sizes="16x16">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/r-2.2.6/sb-1.0.1/sp-1.2.2/datatables.min.css"/>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.22/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/r-2.2.6/sb-1.0.1/sp-1.2.2/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap.min.js"></script>


    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Have Fun <sup>{{ substr(Auth::user()->name, 0, 1) }}</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-thumbs-up"></i>
                    <span>GOOD BYE</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Notes
            </div>

            <div class="form-group p-3 text-center">
                <form method="POST" action="{{ route('reports.store') }}">
                    @csrf {{ csrf_field() }}
                    <input type="hidden" name="operation" value="notes_add">

                    <textarea class="form-control" id="notes" name="notes" rows="14" >{{ isset($data['global_options']['notes'])? $data['global_options']['notes']:'' }}</textarea>
                    {{-- <a href="#" class="btn btn-success btn-icon-split btn-sm mt-1">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">UPDATE</span>
                    </a> --}}
                    <button type="submit" class="btn btn-success btn-icon-split btn-sm mt-1" >
                    <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">UPDATE</span>
                    </button>

                </form>
            </div>
            </form>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></button>
            </div>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column overflow-hidden vh-100">

            <!-- Main Content -->
            <div id="content">

                @yield('content');

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('reports.store') }}">
            @csrf {{ csrf_field() }}
            <input type="hidden" name="operation" value="report_add">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user">
                        <div class="form-group">
                            <input type="date" class="form-control form-control-user" id="date" name="date" aria-describedby="date" value="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="name" name="name" aria-describedby="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="tasks" name="tasks" aria-describedby="taks" placeholder="Task No.">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="doc_link" name="doc_link" aria-describedby="doc_link" placeholder="Tasks Doc. Link">
                        </div>
                        <div class="form-group">
                            <label for="check_in">Check In</label>
                            <input type="time" class="form-control form-control-user" id="check_in" name="check_in" aria-describedby="check-in" placeholder="sdc">
                        </div>
                        <div class="form-group">
                            <label for="check_out">Check Out</label>
                            <input type="time" class="form-control form-control-user" id="check_out" name="check_out" aria-describedby="check-out">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>
