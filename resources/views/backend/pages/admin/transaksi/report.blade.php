<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Penjualan</title>
    <style>

        /* Gaya untuk cetak pada halaman A4 landscape */
        @media print {
            @page {
                size: A4 landscape;
                margin: 1cm;
            }
            .no-print {
                display: none;
            }
        }

        body {
            color: black;
            background-color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            word-wrap: break-word; /* Memungkinkan wrap text */
        }

        th {
            background-color: #f2f2f2;
        }

        /* Gaya baris ganjil dan genap */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Gaya baris yang sedang dihover */
        tbody tr:hover {
            background-color: #e0e0e0;
        }

        /* Gaya tebal untuk kolom Total */
        td:nth-child(8) {
            font-weight: bold;
        }

        /* Wrap text untuk kolom tertentu */
        td:nth-child(2), /* Kolom Tanggal */
        td:nth-child(3), /* Kolom Pelanggan */
        td:nth-child(9), /* Kolom Metode Pembayaran */
        td:nth-child(10) /* Kolom Status */
        {
            /* Atur wrap text */
            overflow-wrap: break-word;
            word-wrap: break-word;
            white-space: normal;
        }
    </style>
</head>
<body>
    <div style="text-align: center; margin-bottom:20px;">
        <h1 style="line-height: 0;">Laporan Transaksi Hitrat</h1>
        <a href="#" onclick="window.print()" class="no-print">Cetak Laporan</a>
    </div>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Barang</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Metode Pembayaran</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($orders as $order)
        @php
            $rowSpan = count($order->orderitem);
        @endphp
        @foreach ($order->orderitem as $index => $item)
        <tr>
            @if ($index == 0)
            <td rowspan="{{$rowSpan}}">{{ $i }}</td>
            <td rowspan="{{$rowSpan}}">{{ $order->order_date }}</td>
            <td rowspan="{{$rowSpan}}">{{ $order->user->name }}</td>
            @endif
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->product->discount_price }}</td>
            <td>{{ $item->unit_price }}</td>
            @if ($index == 0)
            <td rowspan="{{$rowSpan}}">{{ $order->transaction->total_harga }}</td>
            <td rowspan="{{$rowSpan}}">{{ $order->transaction->payment_method->nama_bank }}</td>
            <td rowspan="{{$rowSpan}}">{{ $order->status }}</td>
            @endif
        </tr>
        @endforeach
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
</table>
</body>
</html>
