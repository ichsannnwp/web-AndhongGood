<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <nav>
        <h2>Andhong Good</h2>
        <table>
            <th>Home</th>
            <th>Map</th>
            <th>Help</th>
        </table>
    </nav>

    <div class="description">
        <h1>Welcome To Yogyakarta</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum quibusdam error illo facere voluptas nihil cumque nam aperiam ipsam, libero expedita omnis nulla quisquam dolorum aliquid maiores voluptatum eius atque! Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur iure illo sunt totam architecto ipsa repudiandae eum autem fugit. Eveniet ratione dolorem ab beatae veniam aliquam corrupti eligendi amet? Veritatis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum veritatis ullam, voluptas qui eius consequuntur adipisci quisquam similique pariatur aspernatur hic veniam ex voluptate, placeat inventore, non fuga! Excepturi, voluptatum.</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium qui laboriosam, ratione assumenda quidem id in culpa veniam non, amet optio sint nostrum tenetur quos ipsam similique, voluptate veritatis facilis! Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi corporis nisi veritatis omnis enim sint tenetur dolorem excepturi ex ad eligendi, reprehenderit quisquam rerum quibusdam a nihil ipsam recusandae odit!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis ipsam porro corrupti aut quo eius explicabo et distinctio consequuntur architecto aperiam quia, similique eos iste corporis sequi tenetur labore officiis.
        Perferendis ex iusto placeat hic eum, sapiente adipisci, vel eaque aspernatur quae voluptate odio ab culpa itaque minima aperiam, atque sint quam dicta a quibusdam. Molestias maiores deserunt vero delectus.
        Consequuntur aliquid minus corrupti doloribus sequi possimus esse quis deleniti totam natus? Earum ex ad ipsum et! Aliquam atque sequi culpa exercitationem in a nostrum fuga, itaque nemo, obcaecati eligendi.</p>
    </div>

    <div id="map">
        <script>
            var map = L.map('map').setView([-7.7956, 110.3695], 13); // [Latitude, Longitude], Zoom Level

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            
                        const apiUrl = 'http://localhost/projek/config/koneksi.php'; 

                fetch(apiUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Gagal mengambil data dari server. Pastikan API berfungsi.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Data berhasil dimuat:', data);
                        data.forEach(buildings => {
                            
                            // Pastikan kolom lintang dan bujur adalah angka (desimal)
                            const lat = parseFloat(buildings.lintang);
                            const lng = parseFloat(buildings.bujur);
                            
                            if (isNaN(lat) || isNaN(lng)) {
                            console.error(`Marker untuk ${buildings.nama} dilewati karena koordinat tidak valid: Lat=${buildings.lat}, Lng=${buildings.lng}`);
                            return; // Lewati iterasi ini
            }
                            if (!isNaN(lat) && !isNaN(lng)) {
                                // Membuat konten pop-up menggunakan properti dari tabel 'buldingss'
                                const popupContent = `
                                    <div class="popup-container">
                                        <h4 class="popup-title">${buildings.nama}</h4>
                                        <p><strong>Deskripsi:</strong> ${buildings.deskripsi || 'Tidak ada deskripsi.'}</p>
                                        <p><strong>Sejarah:</strong> ${buildings.history || 'Tidak ada riwayat.'}</p>
                                        <small>Lat/Lng: ${lat.toFixed(6)}, ${lng.toFixed(6)}</small>
                                    </div>
                                `;

                                // Tambahkan marker ke peta
                                L.marker([lat, lng])
                                    .bindPopup(popupContent)
                                    .addTo(map);
                            } else {
                                console.warn(`Data koordinat tidak valid untuk: ${buildings.nama}`);
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Terjadi kesalahan saat memuat data:', error);
                        alert('Gagal memuat data bangunan. Silakan periksa koneksi server.');
                    });

            // Panggil fungsi untuk memuat data saat halaman dimuat
            loadbuildingsData();
            
        </script>


    </div>

    <footer>
        <h3>Terima Kasih</h3>
    </footer>
    
</body>
</html>