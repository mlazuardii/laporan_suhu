@extends('layout')

@section('petugas')
{{$nama}}
@endsection

@section('judul')
Input Suhu
@endsection

@section('content')
<div class="row">
    <div class="card col-md-6">
        <div class="card-body col-md-10">
            <form action="/admin/input" class="was-validated">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" placeholder="Masukan tanggal" name="tanggal"
                        value="{{ date('yy-m-d') }}" readonly required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="suhu">Suhu (°C)</label>
                    <input type="text" class="form-control" id="suhu" placeholder="Masukan suhu" name="suhu" required
                        data-inputmask="'mask': ['99']" data-mask>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <label for="humidity">Humidity (%)</label>
                    <input type="text" class="form-control" id="humidity" placeholder="Masukan humidity" name="humidity"
                        required data-inputmask="'mask': ['99']" data-mask>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="keterangan" placeholder="Masukan keterangan"
                        name="keterangan" value="" readonly required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div class="card-body">
    </div class="card">

    <div class="card col-md-6">
        <!-- LINE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Line Chart</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                            class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="lineChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<div class="row">
    <div class="card col-md-12">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Suhu</th>
                        <th>Humidity</th>
                        <th>Keterangan</th>
                        <th>Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengecekan as $p)
                    <tr>
                        <td>{{ $p->tanggal }}</td>
                        <td>{{ $p->suhu }}</td>
                        <td>{{ $p->humidity }}</td>
                        <td>{{ $p->keterangan }}</td>
                        <td>{{ $p->nama_petugas }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Tanggal</th>
                        <th>Suhu</th>
                        <th>Humidity</th>
                        <th>Keterangan</th>
                        <th>Petugas</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

@endsection

@section('script')
<!-- jQuery -->
<script src="assets/adminlte/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        

        <!-- daterangepicker -->
        <script src="assets/adminlte/plugins/moment/moment.min.js"></script>
        <script src="assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

        <!-- DataTables -->
        <script src="../../assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../../assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../../assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../assets/adminlte/dist/js/adminlte.min.js"></script>
        <!-- Select2 -->
        <script src="../../assets/adminlte/plugins/select2/js/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="assets/adminlte/plugins/moment/moment.min.js"></script>
        <script src="assets/adminlte/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="../../assets/adminlte/plugins/chart.js/Chart.min.js"></script>
        <!-- Bootstrap4 Duallistbox -->
        <link rel="stylesheet" href="../../assets/adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">


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
        <script>
        $( document ).ready(function() {
            /* ChartJS
            * -------
            * Here we will create a few charts using ChartJS
            */
            // Get context with jQuery - using jQuery's .get() method.
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')

            var lineChartData = {
            labels  : [<?php 
            $i = 0;
            foreach($pengecekan as $p){
                echo json_encode($p->tanggal);
                echo ',';
                if (++$i == 30) break;
            }?>],
            datasets: [
                {
                label               : 'Suhu',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : [<?php 
                $i = 0;
                foreach($pengecekan as $p){
                echo $p->suhu;
                echo ',';
                if (++$i == 30) break;
            }?>]
                },
                {
                label               : 'Humidity',
                backgroundColor     : 'rgba(210, 214, 222, 1)',
                borderColor         : 'red',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [<?php 
                $i = 0;
                foreach($pengecekan as $p){
                echo $p->humidity;
                echo ',';
                if (++$i == 30) break;
            }?>]
                },
            ]
            }

            var lineChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                gridLines : {
                    display : false,
                }
                }],
                yAxes: [{
                gridLines : {
                    display : false,
                }
                }]
            }
            }

            // This will get the first returned node in the jQuery collection.
            var lineChart       = new Chart(lineChartCanvas, { 
            type: 'line',
            data: lineChartData, 
            options: lineChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, { 
            type: 'line',
            data: lineChartData, 
            options: lineChartOptions
            })

            

        })
        </script>
        <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                'Today'       : [moment(), moment()],
                'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
            format: 'LT'
            })
            
            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
        </script>
@endsection
