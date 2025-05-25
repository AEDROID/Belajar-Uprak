<!DOCTYPE html>
<html>
<head>
    <title>Print Data Buah</title>
</head>
<body onload="window.print()">
    <h1>Data Buah</h1>
    <table border="1" cellpadding="5" cellspacing="0" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gizi</th>
                <th>Manfaat</th>
                <th>Tanggal Input</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fruits as $index => $fruit)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $fruit->name }}</td>
                <td>{{ $fruit->nutrition }}</td>
                <td>{{ $fruit->benefits }}</td>
                <td>{{ $fruit->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
