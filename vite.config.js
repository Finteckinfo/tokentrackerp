import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [ 'resources/assets/css/app.css', 'resources/assets/css/custom.css', 'resources/assets/js/main.js'],
            refresh: true,
        }),
        vue(),
    ],
});
