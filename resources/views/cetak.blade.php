@extends('layout')

@section('petugas')
{{$nama}}
@endsection

@section('judul')
Cetak Laporan
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form class="form-inline" action="/admin/cetakpdf">
            <div class="col-md-1">
                <label class="sr-only" for="inlineFormInputGroupUsername">Bulan</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Bulan</div>
                    </div>
                    <?php
                            $now=date('m');
                            echo "<select name='bulan' class='custom-select'>";
                            for ($a=01;$a<=$now;$a++){
                                echo "<option value='$a'>$a</option>";
                            }
                            echo "</select>";
                        ?>
                </div>
            </div>
            <div class="col-md-2">
                <label class="sr-only" for="inlineFormInputGroupUsername">Tahun</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Tahun</div>
                    </div>
                    <?php
                            $now=date('Y');
                            echo "<select name='tahun' class='custom-select'>";
                            for ($a=2020;$a<=$now;$a++){
                                echo "<option value='$a'>$a</option>";
                            }
                                echo "</select>";
                        ?>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">Submit</button>
        </form>
    </div>
    <!-- /.card-body -->
</div>

@endsection

@section('script')
<!-- jQuery -->
<script src="../../assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/adminlte/dist/js/demo.js"></script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
@endsection
