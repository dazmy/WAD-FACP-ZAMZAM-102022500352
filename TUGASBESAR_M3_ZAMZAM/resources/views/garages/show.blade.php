<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Bengkel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">

        <div class="card shadow-sm border-0" style="max-width: 600px;">
            <div class="card-header bg-primary text-white">
                <h1 class="h5 mb-0">Detail Bengkel</h1>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between">
                    <span class="text-muted">Nama Bengkel</span>
                    <span class="fw-semibold">{{ $garage->name }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span class="text-muted">Lokasi</span>
                    <span>{{ $garage->location }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span class="text-muted">Nomor Kontak</span>
                    <span>{{ $garage->contact_number }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span class="text-muted">Jenis Layanan</span>
                    <span class="badge bg-success">{{ ucwords(str_replace('_', ' ', $garage->service_type)) }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span class="text-muted">Dibuat</span>
                    <span>{{ $garage->created_at->format('d M Y H:i') }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span class="text-muted">Diperbarui</span>
                    <span>{{ $garage->updated_at->format('d M Y H:i') }}</span>
                </li>
            </ul>
            <div class="card-footer bg-white">
                <a href="{{ route('garages.edit', $garage) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('garages.index') }}" class="btn btn-outline-secondary">Kembali ke daftar</a>
            </div>
        </div>

    </div>
</body>
</html>