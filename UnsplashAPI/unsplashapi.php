<?php

class UnsplashAPI
{
    private $accessKey;

    public function __construct($accessKey)
    {
        $this->accessKey = $accessKey;
    }
    public function getImages($n)
    {
        $url = "https://api.unsplash.com/photos/random?count=$n&client_id=" . $this->accessKey . "&query=home+for+renting";
        $response = file_get_contents($url);
        $images = json_decode($response);
    
        return $images;
    }
    

    public function searchImages($key)
    {
        $url = "https://api.unsplash.com/search/photos?query=$key&client_id=" . $this->accessKey;
        $response = file_get_contents($url);
        $images = json_decode($response)->results;

        return $images;
    }
}
?>
