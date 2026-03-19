# 🐎 Andhong Jogja - Information & Route Guide

Proyek ini adalah platform media informasi digital bagi penumpang Andhong di Yogyakarta. Aplikasi ini membantu wisatawan mengetahui rute perjalanan, estimasi jarak, dan informasi terkait layanan Andhong melalui integrasi peta interaktif.

## 🌟 Fitur Utama
* **Interactive Map**: Integrasi dengan **Leaflet.js** untuk menampilkan peta Yogyakarta.
* **Route Visualization**: Menampilkan rute perjalanan yang dilalui Andhong secara visual.
* **Information System**: Detail informasi untuk penumpang yang dikelola melalui database PHP & MySQL.
* **Responsive Design**: Tampilan yang dioptimalkan untuk perangkat mobile (memudahkan wisatawan di jalan).

## 🛠️ Tech Stack
* **Frontend**: HTML5, CSS3 (Custom Layout)
* **Maps API**: [Leaflet.js](https://leafletjs.com/) (Open-source JavaScript library for interactive maps)
* **Backend**: PHP (Logic & Routing)
* **Database**: MySQL (Storage rute dan informasi)

## 📂 Struktur Proyek
* `index.php` / `home.php`: Halaman utama dengan integrasi peta Leaflet.
* `/js`: Script untuk inisialisasi koordinat dan marker peta.
* `/config`: Koneksi database untuk mengambil data rute.
* `/sql`: Skema database untuk koordinat rute Andhong.

## 🚀 Cara Menjalankan
1. Clone repositori ini.
2. Import database dari folder `/sql`.
3. Jalankan melalui server lokal (XAMPP/Laragon).
4. Pastikan koneksi internet aktif untuk memuat tile server peta (OpenStreetMap).

---
*Dikembangkan oleh [Ichsan WP](https://github.com/ichsannnwp) - Melestarikan transportasi tradisional melalui teknologi.*
