<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bengkel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">

        <div class="card shadow-sm border-0" style="max-width: 600px;">
            <div class="card-header bg-primary text-white">
                <h1 class="h5 mb-0">Edit Bengkel</h1>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('garages.update', $garage) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Bengkel</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $garage->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $garage->location) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact_number" class="form-label">Nomor Kontak</label>
                        <input type="text" id="contact_number" name="contact_number" class="form-control" value="{{ old('contact_number', $garage->contact_number) }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="service_type" class="form-label">Jenis Layanan</label>
                        <select id="service_type" name="service_type" class="form-select" required>
                            @php $currentType = old('service_type', $garage->service_type); @endphp
                            <option value="maintenance" {{ $currentType == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            <option value="repair" {{ $currentType == 'repair' ? 'selected' : '' }}>Repair</option>
                            <option value="tire_service" {{ $currentType == 'tire_service' ? 'selected' : '' }}>Tire Service</option>
                            <option value="car_wash" {{ $currentType == 'car_wash' ? 'selected' : '' }}>Car Wash</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Perbarui</button>
                    <a href="{{ route('garages.show', $garage) }}" class="btn btn-outline-secondary">Batal</a>
                </form>

            </div>
        </div>

    </div>
</body>
</html>