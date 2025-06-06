@php
    $trainers = [
        [
            'name' => 'Coach Naning',
            'role' => 'Personal Trainer',
            'image' => 'storage/images/trainer1.png',
            'specializations' => [
                'Aerobic Semarangan',
                'Aerobic Zumbar',
                'Yoga',
                'Pilates',
                'RL Sex Exercise',
                'Stepobic',
            ],
            'packages' => [
                ['sessions' => '1x session', 'duration' => '1 Hari', 'price' => 'Rp50.000'],
                ['sessions' => '8x sessions', 'duration' => '24 Hari', 'price' => 'Rp40.000/sesi'],
            ],
            'instagram' => 'https://instagram.com/coachnaning',
            'whatsapp' => 'https://wa.me/6281234567890',
        ],
        [
            'name' => 'Coach Adi',
            'role' => 'Personal Trainer',
            'image' => 'storage/images/trainer2.png',
            'specializations' => [
                'Belajar Teknik Latihan Dasar',
                'Program Menaikan Massa Otot',
                'Program Mengikis Masa Lemak',
            ],
            'packages' => [
                ['sessions' => '1x session', 'duration' => '1 Hari', 'price' => 'Rp80.000'],
                ['sessions' => '8x sessions', 'duration' => '21 Hari', 'price' => 'Rp70.000/sesi'],
            ],
            'instagram' => 'https://instagram.com/coachnaning',
            'whatsapp' => 'https://wa.me/6281234567890',
        ],
        [
            'name' => 'Coach Ade Chairani',
            'role' => 'Personal Trainer',
            'image' => 'storage/images/trainer3.png',
            'specializations_title' => 'Kelas Cardio & Body Conditioning',
            'specializations' => ['Workout', 'Aerobic', 'Zumba', 'Aeroboxing'],
            'packages' => [
                ['sessions' => '1x session', 'duration' => '1 Hari', 'price' => 'Rp100.000'],
                ['sessions' => '4x sessions', 'duration' => '15 Hari', 'price' => 'Rp360.000'],
            ],
            'instagram' => 'https://instagram.com/coachnaning',
            'whatsapp' => 'https://wa.me/6281234567890',
        ],
        [
            'name' => 'Arifianto (Arif)',
            'role' => 'Personal Trainer',
            'image' => 'storage/images/trainer4.png',
            'achievements' => [
                'Runner up master fitnes Indonesia Kudus 2018',
                'Top finalis all season Open di Bali 2023',
                'Best sixpack New Muscle 2023 Kudus',
            ],
            'packages' => [
                ['sessions' => '1x session', 'duration' => '1 Hari', 'price' => 'Rp50.000'],
                ['sessions' => '5x sessions', 'duration' => '1 Bulan', 'price' => 'Rp200.000'],
            ],
            'instagram' => 'https://instagram.com/coachnaning',
            'whatsapp' => 'https://wa.me/6281234567890',
        ],
        [
            'name' => 'Coach Supriyanto',
            'role' => 'Personal Trainer',
            'image' => 'storage/images/trainer5.png',
            'specializations' => ['Pelatih bersertifikasi', 'Instruktur boxing, fitnes, aerobik dan power step'],
            'packages' => [
                ['sessions' => '1x session', 'duration' => '1 Hari', 'price' => 'Rp75.000'],
                ['sessions' => '8x sessions', 'duration' => '30 Hari', 'price' => 'Rp240.000'],
            ],
            'instagram' => 'https://instagram.com/coachnaning',
            'whatsapp' => 'https://wa.me/6281234567890',
        ],
    ];
@endphp

<section class="bg-neutral-900 py-24">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 auto-rows-fr">
            @foreach ($trainers as $trainer)
                <x-trainer-card :trainer="$trainer" />
            @endforeach
        </div>
    </div>
</section>
