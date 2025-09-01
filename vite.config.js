import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [tailwindcss()],
  build: {
    // Build to dist directory for production
    outDir: 'dist',
    // Generate manifest for cache busting
    manifest: true,
    // Rollup options
    rollupOptions: {
      input: {
        main: './main.js'
      },
      output: {
        // Generate separate CSS file
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return 'styles.css'
          }
          return assetInfo.name
        },
        // Generate separate JS file
        entryFileNames: 'main.js',
        // Use chunk names for better organization
        chunkFileNames: '[name].js',
      }
    }
  },
  server: {
    // Development server settings
    port: 5173,
    host: 'localhost',
    // Enable CORS for WordPress integration
    cors: true
  },
  // Optimize for WordPress theme usage
  optimizeDeps: {
    include: []
  }
})
