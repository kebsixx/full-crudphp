<!-- /.content-wrapper
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer> -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- ChartJS -->
<script src="assets-template/plugins/chart.js/Chart.min.js"></script>
<!-- JQVMap -->
<script src="assets-template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets-template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets-template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets-template/plugins/moment/moment.min.js"></script>
<script src="assets-template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets-template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets-template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets-template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets-template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets-template/dist/js/demo.js"></script> -->
<!-- DataTables  & Plugins -->
<script src="assets-template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets-template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets-template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets-template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- Page specific script -->
<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<script>
    $(function() {
        $('#example2').DataTable();
    });
</script>
<script>
    new DataTable('#serverSide', {
        ajax: {
            url: 'siswa-serverside.php?action=table_data',
            type: 'POST',
            dataType: 'json'
        },
        columns: [{
                data: 'no'
            },
            {
                data: 'nama'
            },
            {
                data: 'jurusan'
            },
            {
                data: 'jk'
            },
            {
                data: 'telepon'
            },
            {
                data: 'aksi'
            }
        ],
        processing: true,
        serverSide: true
    });
</script>
<script type="importmap">
    {
                "imports": {
                    "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
                    "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
                }
            }
        </script>
<script type="module">
    import {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font
    } from 'ckeditor5';

    ClassicEditor
        .create(document.querySelector('#alamat'), {
            plugins: [Essentials, Paragraph, Bold, Italic, Font],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(error => {
            console.error(error);
        });
</script>
<!-- A friendly reminder to run on a server, remove this during the integration. -->
<script>
    window.onload = function() {
        if (window.location.protocol === "file:") {
            alert("This sample requires an HTTP server. Please serve this file with a web server.");
        }
    };
</script>
</body>

</html>