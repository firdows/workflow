import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    // base: "./",
    // build: {
    //     outDir: 'dist',
    //     assetsDir: 'assets',
    //   },
    // server: {
    //     https: true,
    //     host: 'dev.baansanfun.com',
    // },
    plugins: [
        vue(),
        laravel({
            input: [
                // 'resources/css/app.css', 
                'resources/sass/app.scss', 
                'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
