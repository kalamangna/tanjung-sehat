<?php

if (!function_exists('get_image_url')) {
    /**
     * Get the correct URL for an image, with category-specific fallbacks.
     * 
     * @param string|null $path The stored image path or URL
     * @param string $category 'service', 'doctor', 'blog', or 'gallery'
     * @return string
     */
    function get_image_url(?string $path, string $category = 'general'): string
    {
        // 1. If it's a full URL (placeholder), return it directly
        if ($path && strpos($path, 'http') === 0) {
            return $path;
        }

        // 2. If it's a local file, check if it exists
        if ($path) {
            $folderMap = [
                'service' => 'services',
                'doctor'  => 'doctors',
                'blog'    => 'blog',
                'gallery' => 'gallery'
            ];
            $folder = $folderMap[$category] ?? '';
            $fullPath = ROOTPATH . 'public/uploads/' . $folder . '/' . $path;
            
            if (file_exists($fullPath)) {
                return base_url('uploads/' . $folder . '/' . $path);
            }
        }

        // 3. Fallback to category-specific placeholders (Picsum)
        $fallbacks = [
            'service' => 'https://picsum.photos/seed/service/800/450', // 16:9
            'doctor'  => 'https://picsum.photos/seed/doctor/600/800',  // 3:4
            'blog'    => 'https://picsum.photos/seed/blog/1000/625',  // 16:10
            'gallery' => 'https://picsum.photos/seed/gallery/800/800', // 1:1
            'general' => 'https://picsum.photos/seed/tanjung/800/600'
        ];

        return $fallbacks[$category] ?? $fallbacks['general'];
    }
}