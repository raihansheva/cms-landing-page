public function create_slug($string)
    {
        // Replace spaces and special characters with hyphens
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower($string));
        return trim($slug, '-');
    }