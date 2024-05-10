<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Foto Paket Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2>Formulir Update Foto Paket Destinasi</h2>
        <form action="{{ route('update_foto_paket', ['foto' => $data[0]['foto']]) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 mt-3">
                <label for="id_paket">ID Paket Destinasi:</label>
                <input type="number" value="{{ $data[0]['id_paketdestinasi'] }}" class="form-control" id="id_paket" name="id_paketdestinasi" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="profile">ID Profile:</label>
                <input type="number" value="{{ $data[0]['id_profile'] }}" class="form-control" id="profile" name="id_profile" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="nama">Nama Paket:</label>
                <input type="text" value="{{ $data[0]['nama_paket'] }}" class="form-control" id="nama" name="nama_paket" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                <!-- error message untuk image -->
                @error('foto')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mb-3" name="submit" value="foto">Submit</button>
        </form>
    </div>
</body>
</html>
