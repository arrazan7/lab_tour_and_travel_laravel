<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Paket Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @if (session('alert'))
        <script>
            alert("{{ session('alert') }}");
        </script>
    @endif
    <div class="container mt-5">
        <h2>Formulir Update Paket Destinasi</h2>
        <form action="{{ route('update_paket', ['foto' => $data['foto']]) }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3 mt-3">
                <label for="id_paketdestinasi">ID Paket Destinasi:</label>
                <input type="number" class="form-control" id="id_paketdestinasi" name="id_paketdestinasi" value="{{ $data['id_paketdestinasi'] }}" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="id_profile">ID Profile:</label>
                <input type="number" class="form-control" id="id_profile" name="id_profile" value="{{ $data['id_profile'] }}" readonly>
            </div>
            <div class="mb-3 mt-3">
                <label for="nama_paket">Nama Paket Destinasi:</label>
                <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" id="nama_paket" name="nama_paket" value="{{ $data['nama_paket'] }}">
                <!-- error message untuk nama -->
                @error('nama_paket')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
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

            <button type="submit" class="btn btn-primary mb-3" name="submit" value="Submitt">Submit</button>
        </form>
    </div>
</body>
</html>
