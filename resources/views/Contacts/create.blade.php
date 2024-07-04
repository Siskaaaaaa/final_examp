<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #FFEFD5;
            color: #4a5568; /* Warna teks utama */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFEFD5;
            box-sizing: border-box;
        }

        .py-6 {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }

        .text-3xl {
            font-size: 1.875rem;
            line-height: 2.25rem;
            color: #2b6cb0; /* Warna teks judul */
            font-weight: 800; /* Ketebalan teks judul */
            margin-bottom: 1rem; /* Jarak bawah untuk judul */
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
            color: #718096; /* Warna teks paragraf */
            margin-bottom: 1rem; /* Jarak bawah untuk paragraf */
        }

        .bg-primary {
            background-color: #2b6cb0; /* Warna latar belakang header */
            color: #FFEFD5; /* Warna teks dalam header */
            padding: 20px;
            border-radius: 8px; /* Corner radius untuk header */
            margin-bottom: 20px; /* Jarak bawah untuk header */
        }

        .leading-relaxed {
            line-height: 1.75;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .text-accent {
            color: #2b6cb0; /* Warna teks aksen */
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
            border-radius: 4px;
            border: 1px solid #cbd5e0;
            margin-bottom: 1rem;
        }

        .btn-contact {
            display: inline-block;
            background-color: #2b6cb0; /* Warna latar belakang tombol */
            color: #FFEFD5; /* Warna teks tombol */
            padding: 0.75rem 1.5rem; /* Padding di dalam tombol */
            font-size: 1rem;
            text-decoration: none; /* Hilangkan garis bawah default pada tautan */
            border-radius: 4px; /* Corner radius untuk tombol */
            transition: background-color 0.3s ease; /* Animasi perubahan warna latar belakang */
            margin-right: 10px; /* Jarak kanan antar tombol */
        }

        .btn-contact:hover {
            background-color: #1a4e8e; /* Warna latar belakang tombol saat dihover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="py-6">
            <h1 class="text-3xl">Add Contact</h1>
            <form action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email" class="text-lg">Email:</label>
                    <input type="email" id="email" name="email" class="form-input" required>
                </div>
                <div class="form-group">
                    <label for="phone" class="text-lg">Phone:</label>
                    <input type="text" id="phone" name="phone" class="form-input" required>
                </div>
                <button type="submit" class="btn-contact">Add Contact</button>
            </form>
        </div>
    </div>
</body>
</html>