<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Barcode Komoditas</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            margin: 50px;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            width: 80%;
            margin: 0 auto;
        }
        .barcode {
            margin: 20px 0;
        }
        img {
            width: auto;
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>{{ $commodity->name }}</h2>
        <p>ID Komoditas: {{ $commodity->id }}</p>
        <div class="barcode">
            <img src="{{ $barcodeImage }}" alt="Barcode">
        </div>
    </div>
</body>
</html>
