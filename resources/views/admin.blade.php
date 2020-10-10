<!DOCTYPE html>
<html lang="en">

<head>
    <title>ROCKAROMA -SIT-</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            background-image: url("{{asset('img/bg.bottomSquare.png')}}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: bottom;
        }

        .container-card {
            position: relative;
        }

        .image-card {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            opacity: 0;
            transition: .4s ease;
            background-color: #BD7E28;
        }

        .container-card:hover .overlay {
            opacity: 0.7;
        }

        .text-card {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        h2#linkback a:hover {
            text-decoration: underline;
        }

        .masthead {
            margin-bottom: 10rem;
        }

        .masthead-brand {
            margin-bottom: 0;
        }

        .nav-masthead .nav-link {
            padding: .25rem 0;
            font-weight: 500;
            color: #ffd143;
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: #FFD143;
            opacity: 0.4;
        }

        .nav-masthead .nav-link+.nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #FFD143;
            border-bottom-color: #FFD143;
        }

        @media (min-width: 48em) {
            .masthead-brand {
                float: left;
            }

            .nav-masthead {
                float: right;
            }
        }

        .act-floating-btn {
            background: #BD7E28;
            display: block;
            width: 120px;
            height: auto;
            line-height: 50px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            text-decoration: none;
            transition: ease all 0.3s;
            position: fixed;
            right: 30px;
            bottom: 50px;
        }

        .act-btn:hover {
            background: blue
        }
    </style>
</head>

<body>
    <div class="container">

        <jumbotron class="mb-0">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-menu-background" style="background-color: black; opacity: 0.7;"></div>
                <div class="carousel-menu">
                    <div class="container">
                        <header class="masthead mb-auto">
                            <div class="inner">
                                <h3 class="masthead-brand" style="color: #FFDF6C;">ROCK AROMA</h3>
                                <nav class="nav nav-masthead justify-content-center">
                                    <a class="nav-link" href="{{ route('dashboard') }}">HOME</a>
                                    @if (session()->has('password_hash_web'))
                                    <a class="nav-link active" href="{{ route('admins') }}">MANAGE</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="nav-link" style="margin-left: 25% ;" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">LOGOUT</a>
                                    </form>
                                    @else
                                    <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                                    @endif
                                </nav>
                            </div>
                        </header>
                    </div>
                </div>
            </div>
        </jumbotron>

        <!------------------------------------- ARTICLE ------------------------------------->
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12 text-right mt-5 mb-3">
                    <a class="btn btn-success" href="javascript:void(0)" id="createNewArticle"> Create New Article</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered data-table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="articleForm" name="articleForm" class="form-horizontal">
                            <input type="hidden" name="article_id" id="article_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="" maxlength="50" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Contents</label>
                                <div class="col-sm-12">
                                    <textarea id="content" name="content" required="" placeholder="Enter Contents" class="form-control" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------- ARTICLE ------------------------------------->

        <!-------------------------------------- IMAGES ------------------------------------->
        <div class="modal fade" id="imageListModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="imageListHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <form id="imageListForm" name="imageListForm" class="form-horizontal">
                                        <input type="hidden" name="image_list_article_id" id="image_list_article_id">
                                    </form>
                                    <div class="col-md-12 text-right mb-5">
                                        <a class="btn btn-success" href="javascript:void(0)" id="createNewImage">Upload New Image</a>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-bordered image-table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Preview</th>
                                                    <th width="280px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="imageDetailModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="imageDetailHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                            @csrf
                            <div>
                            </div>
                        </form>
                        <form id="imageDetailForm" name="imageDetailForm" class="form-horizontal">
                            <input type="hidden" name="image_detail_article_id" id="image_detail_article_id">
                            <input type="hidden" name="image_url" id="image_url">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="uploadBtn" value="create">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------------------------- IMAGES ------------------------------------->
    </div>

    <footer class="footer" style="background-color: #FFD143;">
        <div class="container yellowed" style="padding: 0 1%;">
            <a href="{{ route('about') }}" style="margin: 0 1%;" class="footer">About us</a>
            <a href="{{ route('contact') }}" style="margin: 0 1%;" class="footer">Contact us</a>
        </div>
    </footer>

    <script type="text/javascript">
        $(function() {
            Dropzone.options.imageUpload = {
                maxFilesize: 1,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                init: function() {
                    var known = false;
                    this.on("success", function(file, responseText) {
                        $('#image_url').val(responseText.success);
                    });
                    this.on('error', function() {
                        // aler stuff
                    });
                    this.on("addedfile", function() {
                        if (this.files[10] != null) {
                            this.removeFile(this.files[0]);
                            if (known === false) {
                                alert('Max. 10 Uploads!')
                                known = true;
                            }
                        }
                    });
                }
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //ARTICLE////////////////////////////////////////////////////////////////////////
            var table = $('.data-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'content_mini',
                        name: 'content_mini'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('#createNewArticle').click(function() {
                $('#saveBtn').val("create-article");
                $('#article_id').val('');
                $('#articleForm').trigger("reset");
                $('#modelHeading').html("Create New Article");
                $('#ajaxModel').modal('show');
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                    data: $('#articleForm').serialize(),
                    url: "{{ route('admin.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#articleForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        $('#saveBtn').html('Save Changes');
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            $('body').on('click', '.editArticle', function() {
                var article_id = $(this).data('id');
                $.get("{{ route('admin.index') }}" + '/' + article_id + '/edit', function(data) {
                    $('#modelHeading').html("Edit Article");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#article_id').val(data.id);
                    $('#title').val(data.title);
                    $('#content').val(data.content);
                })
            });

            $('body').on('click', '.deleteArticle', function() {
                var article_id = $(this).data("id");
                var result = confirm("Are You sure want to delete !");
                if (result) {
                    $.ajax({
                        data: {
                            article_id: article_id,
                            delete: true
                        },
                        url: "{{ route('admin.store') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(data) {
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                } else {
                    return false;
                }
            });

            $('body').on('click', '.publishArticle', function() {
                var article_id = $(this).data("id");
                var result = confirm("Are You sure want to publish !");
                if (result) {
                    $.ajax({
                        data: {
                            article_id: article_id,
                            publish: true
                        },
                        url: "{{ route('admin.store') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(data) {
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                } else {
                    return false;
                }
            });

            $('body').on('click', '.unpublishArticle', function() {
                var article_id = $(this).data("id");
                var result = confirm("Are You sure want to unpublish !");
                if (result) {
                    $.ajax({
                        data: {
                            article_id: article_id,
                            unpublish: true
                        },
                        url: "{{ route('admin.store') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(data) {
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                } else {
                    return false;
                }
            });
            //ARTICLE////////////////////////////////////////////////////////////////////////

            //IMAGES/////////////////////////////////////////////////////////////////////////
            $('#createNewImage').click(function() {
                var article_id = $('#image_list_article_id').val();
                $('#image_detail_article_id').val(article_id);

                $('#saveBtn').val("create-article");
                $('#imageDetailForm').trigger("reset");
                $('#imageDetailHeading').html("Upload New Images");
                $('#imageDetailModal').modal('show');
            });

            $('#uploadBtn').click(function(e) {
                e.preventDefault();
                $(this).html('Uploading..');

                $.ajax({
                    data: $('#imageDetailForm').serialize(),
                    url: "{{ route('admin.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        $('#imageDetailForm').trigger("reset");
                        $('#imageDetailModal').modal('hide');
                        $('#uploadBtn').html('Save Changes');
                        imageTable.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#uploadBtn').html('Save Changes');
                    }
                });
            });

            $('#imageDetailModal').on('hidden.bs.modal', function() {
                imageTable.destroy();
            })

            $('body').on('click', '.imageArticle', function() {
                var article_id = $(this).data('id');
                $('#image_list_article_id').val(article_id);
                $('#imageListHeading').html("Manage Images");

                var imageTable = $('.image-table').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    ajax: {
                        url: "{{ route('image.index') }}",
                        data: function(data) {
                            data.article_id = article_id;
                        }
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'images',
                            name: 'images'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });
                $('#imageListModal').modal('show');
            });
            //IMAGES/////////////////////////////////////////////////////////////////////////
        });
    </script>
</body>

</html>