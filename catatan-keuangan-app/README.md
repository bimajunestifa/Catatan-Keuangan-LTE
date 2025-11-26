# Catatan Keuangan App

Catatan Keuangan App adalah aplikasi web yang dirancang untuk membantu pengguna dalam mengelola catatan keuangan mereka. Aplikasi ini memungkinkan pengguna untuk mencatat transaksi, mengelompokkan kategori, dan melihat ringkasan keuangan melalui grafik.

## Fitur

- **Dashboard**: Menampilkan ringkasan data keuangan dan grafik untuk memberikan gambaran umum tentang kondisi keuangan pengguna.
- **Transaksi**: Memungkinkan pengguna untuk melihat daftar semua transaksi dan menambahkan transaksi baru melalui formulir.
- **Kategori**: Memungkinkan pengguna untuk mengelola dan mengkategorikan transaksi mereka.

## Struktur Proyek

```
catatan-keuangan-app
├── public
│   └── index.html
├── src
│   ├── index.tsx
│   ├── App.tsx
│   ├── pages
│   │   ├── Dashboard.tsx
│   │   ├── Transactions.tsx
│   │   └── Categories.tsx
│   ├── components
│   │   ├── Header.tsx
│   │   ├── Footer.tsx
│   │   ├── TransactionForm.tsx
│   │   ├── TransactionList.tsx
│   │   └── Chart.tsx
│   ├── services
│   │   └── api.ts
│   ├── hooks
│   │   └── useTransactions.ts
│   ├── types
│   │   └── index.ts
│   ├── utils
│   │   └── format.ts
│   ├── styles
│   │   └── globals.css
│   └── assets
│       └── uploads
├── package.json
├── tsconfig.json
└── README.md
```

## Instalasi

1. Clone repositori ini.
2. Jalankan `npm install` untuk menginstal dependensi.
3. Jalankan `npm start` untuk memulai aplikasi.

## Teknologi yang Digunakan

- **React**: Untuk membangun antarmuka pengguna.
- **TypeScript**: Untuk pengetikan statis dan pengembangan yang lebih aman.
- **CSS**: Untuk styling aplikasi.

## Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan buat pull request atau buka isu untuk diskusi.

## Lisensi

Proyek ini dilisensikan di bawah MIT License.