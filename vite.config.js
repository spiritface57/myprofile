import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'node_modules/waypoints/lib/noframework.waypoints.min.js',
                'node_modules/aos/dist/aos.css',
                'node_modules/bootstrap-icons/font/bootstrap-icons.min.css',
                'node_modules/boxicons/css/boxicons.min.css',
                'node_modules/glightbox/dist/css/glightbox.min.css',
                'node_modules/swiper/swiper-bundle.min.css',
                'node_modules/bootstrap/scss/bootstrap.scss',
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
