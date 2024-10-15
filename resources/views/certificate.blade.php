<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>

    <style>
        @page {
            size: A4 landscape; /* Set page size to A4 landscape */
            margin: 20mm; /* Adjust margins as needed */
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7fafc; /* bg-gray-100 */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh; /* min-h-screen */
            margin: 0;
            overflow: hidden;
        }
        .container {
            width: auto;
            max-width: 1024px; /* Maksimum lebar untuk orientasi landskap */
            background-color: #ffffff; /* bg-white */
            border: 8px solid #2b6cb0; /* border-blue-800 */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* shadow-lg */
            padding: 1.5rem; /* p-10 */
            position: relative;
            aspect-ratio: 16 / 9; /* Rasio lebar/tinggi untuk landskap */
            /* Sesuaikan lebar dan tinggi jika perlu */
            overflow: hidden; /* Pastikan tidak ada overflow */
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        .logo {
            display: flex;
            justify-content: center;
            gap: 1rem; /* space-x-4 */
            margin-bottom: 1rem; /* mb-4 */
            position: relative;
            z-index: 10;
        }
        .logo img {
            width: 3rem; /* w-12 */
            padding: 0.5rem; /* p-2 */
        }
        .title {
            margin-top: 1rem;
        }
        .title h1 {
            font-size: 2.25rem; /* text-4xl */
            font-weight: 700; /* font-bold */
            color: #4a5568; /* text-gray-700 */
            text-transform: uppercase;
            letter-spacing: 0.1em; /* tracking-wider */
        }
        .title p {
            font-size: 1rem; /* text-base */
            color: #6b7280; /* text-gray-500 */
        }
        .content {
            margin-top: 2rem; /* mt-8 */
            position: relative;
            z-index: 10;
        }
        .content p {
            font-size: 1.125rem; /* text-lg */
            color: #4a5568; /* text-gray-700 */
        }
        .content h2 {
            margin-top: 1rem; /* mt-4 */
            font-size: 2.5rem; /* text-5xl */
            font-weight: 700; /* font-bold */
            color: #1a202c; /* text-gray-900 */
            text-transform: uppercase;
            text-decoration: underline;
        }
        .content span {
            color: #2b6cb0; /* text-blue-800 */
            text-transform: uppercase;
        }
        .signature {
            margin-top: 4rem; /* mt-12 */
            display: flex;
            justify-content: space-between;
            position: relative;
            z-index: 10;
            font-size: 0.875rem; /* text-sm */
        }
        .signature div {
            text-align: center;
            width: 45%;
        }
        .signature img {
            height: 4rem; /* h-16 */
            margin-bottom: 0.5rem; /* mb-2 */
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .signature p {
            font-weight: 700; /* font-bold */
            color: #4a5568; /* text-gray-700 */
            margin: 0;
        }
        .signature p.small {
            color: #6b7280; /* text-gray-500 */
        }
        .signature.hidden {
            display: none;
        }
        .divider {
            margin: 2rem 0; /* vertical margin */
            border-top: 2px solid #e2e8f0; /* border-gray-200 */
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- logo -->
        <div class="logo">
            <img src="{{ asset('assets/rohis.png')}}" alt="logo">
            <img src="{{ asset('assets/react.png')}}" alt="logo">
            <img src="{{ asset('assets/skenik.png')}}" alt="logo">
        </div>

        <div class="title">
            <h1>Sertifikat</h1>
        </div>

        <!-- Body Content -->
        <div class="content">
            <p>Sertifikat diberikan kepada :</p>
            <h2>{{ $participant_name }}</h2> <!-- Participant's name -->
            <p>atas partisipasinya dalam kegiatan <span>{{ $event_name }}</span> yang diselenggarakan oleh <span>{{ $organizer_name }}</span></p>
        </div>

        <!-- Divider -->
        <div class="divider"></div>

      <!-- Signature -->
<div class="signature">
    <div>
        <img src="{{ $signature_image1 }}" alt="Signature 1">
        <p>{{ $signature_name1 }}</p> <!-- First signature name -->
        <p class="small">{{ $signature_title1 }}</p> <!-- First signature title -->
    </div>

    <div>
        <img src="{{ $signature_image2 }}" alt="Signature 2">
        <p>{{ $signature_name2 }}</p> <!-- Second signature name -->
        <p class="small">{{ $signature_title2 }}</p> <!-- Second signature title -->
    </div>
</div>

    </div>
</body>
</html>
