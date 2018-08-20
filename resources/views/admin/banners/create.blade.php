@extends('admin._layout')

@section('content')
    <section class="content-header">
        <h1>
            Banner
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!--/.col (left) -->
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Thêm ảnh banner
                        </h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <form role="form" method="POST" action="{{ url('/admin/banner') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- /.box-header -->
                            <!-- form start -->
                            <div class="form-group">
                                <label>Ảnh</label>
                                <input type="file" name="url" class="form-control" required accept=".jpeg, .png, .bmp, .gif, .svg" onchange="loadFile(event)">
                                {!! $errors->first('url', '<p class="help-block">:message</p>') !!}
                                <img id="imagePreview" style="margin-top: 20px;"/>
                            </div>

                            <div class="form-group">
                                <label>Link liên kết</label>
                                <input type="text" name="target_link" class="form-control" required>
                                {!! $errors->first('target_link', '<p class="help-block">:message</p>') !!}
                            </div>

                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control" name="status">
                                    <option value="1">Hiển thị</option>
                                    <option value="2">Không hiển thị</option>
                                </select>
                                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <a href="/admin/category" class="btn btn-danger">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>

@endsection
@section('js')
    <script>
        $("#imagePreview").attr("src", "/banner/");
        var loadFile = function(event) {
            var output = document.getElementById('imagePreview');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection