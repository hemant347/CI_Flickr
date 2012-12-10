<?php

class flickr_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

  function get_images($offset, $query) {
	$apiKey = '66767955a71295c26de4f8dd7f6a2524';
	$search = 'http://flickr.com/services/rest/?method=flickr.photos.search&api_key=' . $apiKey . '&text=' . urlencode($query) . '&per_page=10&page='.$offset.'&format=php_serial';
	$result = file_get_contents($search);
	$result = unserialize($result);
    return $result;
  }
}
?>
