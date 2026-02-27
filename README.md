# Portfolio Website - Purjayadi

Website portfolio profesional untuk Purjayadi, seorang Fullstack Developer dengan pengalaman 7 tahun.

## 🌟 Fitur

- **Design Modern & Responsif** - Tampilan menarik yang bekerja sempurna di semua perangkat
- **Smooth Scrolling** - Navigasi yang halus antar section
- **Animasi Interaktif** - Efek animasi yang smooth dan profesional
- **Hamburger Menu** - Menu mobile yang user-friendly
- **Section Highlighting** - Active link yang mengikuti scroll position
- **Scroll to Top Button** - Tombol untuk kembali ke atas halaman
- **Social Media Integration** - Link ke LinkedIn, GitHub, dan email

## 📂 Struktur File

```
profile/
├── index.html      # Halaman utama website
├── style.css       # Styling dan animasi
├── script.js       # Interaktivitas dan fungsi JavaScript
└── README.md       # Dokumentasi
```

## 🚀 Cara Menggunakan

### Metode 1: Buka Langsung di Browser

1. Buka file `index.html` di browser favorit Anda
2. Website siap digunakan!

### Metode 2: Menggunakan Live Server (Recommended)

**Dengan VS Code:**

1. Install extension "Live Server" di VS Code
2. Klik kanan pada file `index.html`
3. Pilih "Open with Live Server"

**Dengan Python:**

```bash
# Python 3
python -m http.server 8000

# Python 2
python -m SimpleHTTPServer 8000
```

Kemudian buka `http://localhost:8000` di browser.

**Dengan Node.js (http-server):**

```bash
# Install http-server globally
npm install -g http-server

# Run server
http-server
```

## 🎨 Kustomisasi

### Mengubah Warna Tema

Edit file `style.css` pada bagian `:root`:

```css
:root {
  --primary-color: #2563eb; /* Warna utama */
  --secondary-color: #1e40af; /* Warna sekunder */
  --accent-color: #60a5fa; /* Warna aksen */
}
```

### Mengubah Konten

Edit file `index.html` untuk mengubah:

- Informasi personal
- Deskripsi pengalaman kerja
- Skill yang ditampilkan
- Informasi pendidikan
- Link social media
- Email dan informasi kontak

### Menambah/Mengurangi Skill

Cari section dengan class `.skill-tags` di `index.html` dan tambahkan/hapus:

```html
<span class="skill-tag">Skill Name</span>
```

## 📱 Responsif

Website ini sepenuhnya responsif dan telah dioptimasi untuk:

- 📱 Mobile (< 600px)
- 📱 Tablet (600px - 968px)
- 💻 Desktop (> 968px)

## 🔧 Teknologi yang Digunakan

- **HTML5** - Struktur website
- **CSS3** - Styling dengan Flexbox & Grid
- **JavaScript (ES6+)** - Interaktivitas
- **Font Awesome** - Icon library

## ✨ Fitur JavaScript

- Smooth scrolling ke section
- Hamburger menu untuk mobile
- Active navigation link tracking
- Scroll-triggered animations
- Intersection Observer API untuk lazy animations
- Scroll to top button
- Parallax effect (optional)

## 📝 Customization Tips

### Mengganti Foto Profil

Saat ini menggunakan icon placeholder. Untuk mengganti dengan foto:

1. Tambahkan foto ke folder `images/`
2. Ganti di `index.html`:

```html
<div class="profile-circle">
  <img src="images/profile.jpg" alt="Profile Photo" />
</div>
```

3. Update CSS di `style.css`:

```css
.profile-circle img {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: cover;
}
```

### Menambah Section Baru

1. Tambahkan section di `index.html`
2. Tambahkan link di navigation menu
3. Style section baru di `style.css`

## 🌐 Deploy Website

### GitHub Pages

1. Push repository ke GitHub
2. Masuk ke Settings > Pages
3. Pilih branch `main` dan folder `root`
4. Website akan live dalam beberapa menit

### Netlify

1. Drag & drop folder ke [Netlify Drop](https://app.netlify.com/drop)
2. Website langsung live dengan URL gratis

### Vercel

```bash
npm i -g vercel
vercel
```

## 📧 Contact Information

Update informasi kontak di section `#contact` pada file `index.html`:

- Email: Ganti `purjayadi@gmail.com` dengan email sebenarnya
- LinkedIn: URL sudah sesuai
- GitHub: Ganti dengan username GitHub yang benar

## 🔒 Best Practices

- ✅ Semua link eksternal menggunakan `target="_blank"` untuk keamanan
- ✅ Responsive design untuk semua ukuran layar
- ✅ Cross-browser compatible
- ✅ Fast loading dengan optimized code
- ✅ Semantic HTML untuk SEO
- ✅ Accessibility features

## 📈 Performance Tips

1. **Optimize Images**: Compress gambar sebelum upload
2. **Minify Files**: Gunakan minifier untuk production
3. **CDN**: Pertimbangkan menggunakan CDN untuk Font Awesome
4. **Caching**: Setup browser caching untuk performa lebih baik

## 🐛 Troubleshooting

**Problem**: Menu tidak berfungsi di mobile

- **Solution**: Pastikan `script.js` di-load setelah DOM

**Problem**: Smooth scroll tidak bekerja

- **Solution**: Check browser compatibility, tambahkan polyfill jika perlu

**Problem**: Font Awesome icon tidak muncul

- **Solution**: Pastikan koneksi internet aktif atau download Font Awesome locally

## 📄 License

Free to use for personal projects. Silakan modifikasi sesuai kebutuhan.

## 🤝 Kontribusi

Jika ada saran atau improvement, silakan:

1. Fork repository
2. Buat branch baru
3. Commit changes
4. Submit pull request

## 📞 Support

Untuk pertanyaan atau bantuan:

- Email: purjayadi@gmail.com
- LinkedIn: [linkedin.com/in/purjayadi-9a154013a/](https://www.linkedin.com/in/purjayadi-9a154013a/)

---

Dibuat dengan ❤️ oleh Purjayadi | © 2026 All Rights Reserved
