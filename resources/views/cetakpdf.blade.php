<html>

<head>
    <style>
        /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
        @page {
            margin: 1cm 1cm;
            border-style: solid;
            border-width: 5px;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
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
            line-height: 1cm;
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
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size:12px;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 3px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        MONITORING SUHU RUANGAN SERVER<br>
        Periode : {{$bulan}}-{{$tahun}}
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
                    <table id="customers" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Suhu</th>
                                <th>Humidity</th>
                                <th>Keterangan</th>
                                <th>Petugas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $jumlahhari=cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
                        for($i = 1; $i <= $jumlahhari; $i++){
                            echo '<tr>';
                            echo '<td>'.$i;
                            echo '</tr>';


                        }
                        ?>
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
                    </table>
                </div>
                <!-- /.card-body -->
            </div>




        </div><!-- /.container-fluid -->
    </main>
</body>

</html>
