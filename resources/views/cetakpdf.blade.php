<html>

<head>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        .container {
            position: relative;
            text-align: center;
            color: black;
        }

        /* Bottom left text */
        .bottom-left {
            position: absolute;
            bottom: 8px;
            left: 16px;
        }

        /* Top left text */
        .top-left {
            position: absolute;
            top: 8px;
            left: 16px;
        }

        /* Top right text */
        .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
        }

        /* Bottom right text */
        .bottom-right {
            position: absolute;
            bottom: 8px;
            right: 16px;
        }

        /* Centered text */
        .centered {
            font-family: Calibri, sans-serif;
            font-size: 10px;
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        section table {
			width: 100%;
			border-collapse: collapse;
			border-spacing: 0;
			font-size: 0.9166em;
		}
		section table thead {
			display: table-header-group;
			vertical-align: middle;
			border-color: inherit;
		}
		section table thead th {
			padding: 5px 10px;
			background: #bfbfbf;
			border-bottom: 5px solid #FFFFFF;
			border-right: 1px solid #FFFFFF;
			text-align: center;
			color: black;
			font-weight: 400;
            font-style: bold;
			text-transform: uppercase;
		}
		section table tbody td {
			padding: 10px;
			background: #d9d9d9;
			color: black;
			text-align: center;
			border-bottom: 1px solid #FFFFFF;
			border-right: 1px solid #E8F3DB;
		}
    </style>
</head>

<body>
    <div class="container">
        <img src="img/laporan.jpg" alt="Snow" style="width:100%;">
        <!-- <div class="bottom-left">Bottom Left</div>
        <div class="top-left">Top Left</div>
        <div class="top-right">Top Right</div>
        <div class="bottom-right">Bottom Right</div> -->
        <div class="centered">

            <div class="container-fluid">
            <p><b>MONITORING SUHU RUANGAN SERVER</b></p>
            <p>Periode : {{$bulan}} - {{$tahun}}</p>

            <section>            
            <table id="table" class="table">

                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Suhu (°C)</th>
                                    <th>Humidity (%)</th>
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
                        </table>
    </section>
                    </div>
        </div>
    </div>

</body>

</html>
