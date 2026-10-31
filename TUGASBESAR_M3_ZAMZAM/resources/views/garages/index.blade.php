<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bengkel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0 text-primary">Daftar Bengkel</h1>
            <a href="{{ route('garages.create') }}" class="btn btn-primary">+ Tambah Bengkel</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-success">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Bengkel</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Nomor Kontak</th>
                            <th scope="col">Jenis Layanan</th>
                            <th scope="col" class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($garages as $garage)
                            <tr class="table-success">
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $garage->name }}</td>
                                <td>{{ $garage->location }}</td>
                                <td>{{ $garage->contact_number }}</td>
                                <td>
                                    <span class="badge bg-success">
                                        {{ ucwords(str_replace('_', ' ', $garage->service_type)) }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('garages.show', $garage) }}" class="btn btn-sm btn-primary">Detail</a>
                                    <a href="{{ route('garages.edit', $garage) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('garages.destroy', $garage) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus bengkel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada data bengkel.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>