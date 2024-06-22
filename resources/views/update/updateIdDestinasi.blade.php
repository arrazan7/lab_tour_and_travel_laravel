<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update ID Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Formulir Update ID Destinasi</h2>
        <form action="{{ route('update_id_destinasi_test') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 mt-3">
                <label for="id_paket">ID Paket Destinasi:</label>
                <input type="number" value="{{ $data['id_paketdestinasi'] }}" class="form-control" id="id_paket" name="id_paketdestinasi" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="hari">Hari Ke:</label>
                <input type="number" value="{{ $data['hari_ke'] }}" class="form-control" id="hari" name="hari_ke" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="destinasi">Destinasi Ke:</label>
                <input type="number" value="{{ $data['destinasi_ke'] }}" class="form-control" id="destinasi" name="destinasi_ke" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="id_destinasi">ID Destinasi:</label>
                <input type="number" value="{{ $data['id_destinasi'] }}" class="form-control" id="id_destinasi" name="id_destinasi">
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="submit" value="id_destinasi">Submit</button>
        </form>
    </div>
</body>
</html>
