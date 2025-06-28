@extends('layouts.appLanding')

@section('title', 'Promo')
@section('content')

<style>
    body {
        background: #0f0f0f;
        color: #fff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 40px 20px;
    }

    .promo-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .promo-header h1 {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 10px;
        color: #ffffff;
    }

    .promo-header p {
        font-size: 1.2rem;
        color: #ffb347;
    }

    .grid {
        display: grid;
        gap: 30px;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    }

    .promo-box {
        position: relative;
        background-color: #1a1a1a;
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 0 15px 2px rgba(255, 140, 0, 0.2);
        color: white;
        text-align: left;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .promo-box:hover {
        transform: scale(1.02);
        box-shadow: 0 0 20px 4px rgba(255, 140, 0, 0.5);
    }

    .promo-box h2 {
        font-size: 1.3rem;
        margin-bottom: 15px;
        color: #ffb347;
        font-weight: 600;
    }

    .promo-box ul,
    .promo-box ol,
    .promo-box p {
        line-height: 1.6;
        font-size: 0.95rem;
        color: #ddd;
    }

    .promo-box strong {
        color: #fff;
    }

    .discount-badge {
        display: inline-block;
        background: #ff6a00;
        color: black;
        padding: 6px 15px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 0.9rem;
        margin-top: 15px;
    }

    .label-popular,
    .label-best {
        position: absolute;
        top: -10px;
        right: -10px;
        background-color: orange;
        color: black;
        font-size: 0.75rem;
        padding: 4px 8px;
        border-radius: 5px;
        font-weight: bold;
    }

    .footer {
        text-align: center;
        padding: 20px 0;
        color: #aaa;
        font-size: 0.9rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 60px;
    }
</style>

<div class="container">
    <div class="promo-header">
        <h1>PROMO BULAN JUNI 2025</h1>
        <p>KHUSUS MEMBER PROSPEK BODY GOALS</p>
    </div>

    <div class="grid">
        <!-- Promo Pelajar -->
        <div class="promo-box">
            <span class="label-popular">Popular</span>
            <h2>📘 Promo Khusus Pelajar & Mahasiswa</h2>
            <p><strong>Biaya Pendaftaran:</strong> 25k</p>
            <ul>
                <li>SD/Sederajat: <strong>60k/bulan</strong></li>
                <li>SMP/Sederajat: <strong>70k/bulan</strong></li>
                <li>SMA/Sederajat: <strong>80k/bulan</strong></li>
            </ul>
            <p><strong>Non Member (Harian):</strong> 10k/visit</p>
            <span class="discount-badge">Berlaku sampai Juni 2025</span>
        </div>

        <!-- Member Aktif -->
        <div class="promo-box">
            <h2>🔥 Hadiah Untuk Member Paling Aktif</h2>
            <p>Setiap bulan, <strong>1 pria dan 1 wanita</strong> paling aktif akan mendapatkan hadiah menarik.</p>
            <p><em>*Cukup tunjukkan kartu member saat absen</em></p>
        </div>

        <!-- Istana Auto Wash -->
        <div class="promo-box">
            <span class="label-best">Best Value</span>
            <h2>🚗 Gebyar Kinclong – Istana Auto Wash</h2>
            <ul>
                <li>Cuci Mobil: <strong>Diskon 20%</strong></li>
                <li>Coating Mobil: Mulai 1.000k</li>
                <li>Coating Motor: Mulai 500k</li>
                <li>Jamur Kaca: Mulai 100k</li>
            </ul>
            <p><em>Tunjukkan kartu member aktif & voucher saat transaksi</em></p>
        </div>

        <!-- Kartika Accessories -->
        <div class="promo-box">
            <h2>📱 Kartika Accessories HP</h2>
            <ul>
                <li><strong>Diskon 50%</strong> Biaya pendaftaran member bulanan</li>
                <li><strong>Diskon 20%</strong> Belanja untuk member aktif</li>
            </ul>
        </div>

        <!-- De Lapan Coffee -->
        <div class="promo-box">
            <h2>☕ De Lapan Coffee & Eatery</h2>
            <p><strong>Diskon 10%</strong> Semua menu</p>
            <p><em>Hanya untuk member aktif bulanan/tahunan</em></p>
        </div>

        <!-- Cara Bergabung -->
        <div class="promo-box">
            <h2>👥 Cara Bergabung</h2>
            <ol>
                <li><strong>Daftar Akun:</strong> Gratis melalui halaman login</li>
                <li><strong>Pilih Paket:</strong> Sesuai kebutuhan dan budget</li>
                <li><strong>Mulai Berlatih:</strong> Datang ke gym dan nikmati fasilitas terbaik</li>
            </ol>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 Prospek Gym. All rights reserved. | Ikuti kami di <strong>@Prospek_bodygoals</strong>
    </div>
</div>
@endsection
