<html>

<head>
    <style>
        /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: white;
            color: black;
            text-align: center;
            line-height: 1.5cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: white;
            color: black;
            text-align: center;
            line-height: 1.5cm;
        }

    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        LAPORAN PENGECEKAN SUHU
        Bulan {{$bulan}} Tahun {{$tahun}}
    </header>

    <footer>
        Copyright &copy; <?php echo date("Y");?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <div class="container-fluid">

            <div class="card">
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
                        {{$pengecekan}}
                        <?php
                        $jumlahhari=cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
                        for($i = 1; $i <= $jumlahhari; $i++){
                            echo '<tr>';
                            echo '<td>'.$i;
                            echo '</tr>';


                        }
                        ?>
                            <!-- @foreach($pengecekan as $p)
                            <tr>
                                <td>{{ $p->tanggal }}</td>
                                <td>{{ $p->suhu }}</td>
                                <td>{{ $p->humidity }}</td>
                                <td>{{ $p->nama_petugas }}</td>
                            </tr>
                            @endforeach -->
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>




        </div><!-- /.container-fluid -->
    </main>
</body>

</html>