// URL of the WordPress site's REST API endpoint Code Starts

function get_remote_blog_posts() {

    /*$url = 'https://public-api.wordpress.com/wp/v2/sites/thegirlwho.uk/posts?_embed';*/
    $url = 'https://public-api.wordpress.com/wp/v2/sites/thegirlwho.uk/posts?per_page=100';


    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        return [];
    }

    $body = wp_remote_retrieve_body($response);
    $posts = json_decode($body);

    if (empty($posts)) {
        return [];
    }

    $data = [];

    foreach ($posts as $post) {

        $title = $post->title->rendered ?? '';

        $excerpt = wp_strip_all_tags($post->excerpt->rendered ?? '');

        $link = $post->link ?? '#';

        $image = "";

        if (!empty($post->jetpack_featured_media_url)) {
            $image = $post->jetpack_featured_media_url;
        }

        if (empty($image) && !empty($post->_embedded->{'wp:featuredmedia'}[0]->source_url)) {
            $image = $post->_embedded->{'wp:featuredmedia'}[0]->source_url;
        }

        $data[] = [
            "title"   => $title,
            "excerpt" => $excerpt,
            "image"   => $image,
            "link"    => $link
        ];
    }

    return $data;
}

// URL of the WordPress site's REST API endpoint Code Ends
