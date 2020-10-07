<x-app-layout>

    <head>
        <title>Admin</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>
    </x-slot>

    <style type="text/css">
        .container {
            margin-top: 5%;
        }

        h4 {
            margin-bottom: 30px;
        }
    </style>

    <body>
        <!------------------------------------- ARTICLE ------------------------------------->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4>Manage Article</h4>
                        </div>
                        <div class="col-md-12 text-right mb-5">
                            <a class="btn btn-success" href="javascript:void(0)" id="createNewArticle"> Create New Article</a>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered data-table">
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
                                    <textarea id="content" name="content" required="" placeholder="Enter Contents" class="form-control"></textarea>
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
                                    <div class="col-md-12 text-center">
                                        <h4>Manage Images</h4>
                                    </div>
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
    </body>

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
                $('#imageDetailHeading').html("Images List");

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
</x-app-layout>