const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                // Menambahkan font Poppins dan Montserrat
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
                montserrat: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            //  Menambahkan warna khusus untuk tema sekolah
            colors: {
                'sekolah-biru-tua': '#0D47A1',   // Contoh Biru Tua
                'sekolah-biru': '#1E88E5',       // Contoh Biru
                'sekolah-biru-muda': '#64B5F6',  // Contoh Biru Muda
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};