<?php
// Instagram username and number of posts to download
$username = 'kerandomankocak';
$num_posts = 5;

// URL to fetch the Instagram feed
$instagram_url = 'https://www.instagram.com/' . $username . '/?__a=1';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $instagram_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
$result = curl_exec($ch);
curl_close($ch);

if ($result === FALSE) {
    die('Error fetching Instagram data.');
}

$data = json_decode($result, true);
if (isset($data['graphql']['user']['edge_owner_to_timeline_media']['edges'])) {
    $posts = $data['graphql']['user']['edge_owner_to_timeline_media']['edges'];

    for ($i = 0; $i < min($num_posts, count($posts)); $i++) {
        $post = $posts[$i]['node'];
        $image_url = $post['display_url'];
        $image_name = basename($image_url);

        // Download image
        file_put_contents($image_name, file_get_contents($image_url));

        echo "Downloaded: " . $image_name . "\n";
    }
} else {
    echo "Failed to retrieve posts.";
}
?>
