<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" lang="en-us">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Showing Flickr Images Using CodeIgniter</title>
		<script type="text/javascript">
			// <![CDATA[
			function resizeToMax (id) {
				var img = document.getElementById(id);
				myImage = new Image();
				myImage.src = img.src;
				if (window.innerWidth / myImage.width < window.innerHeight / myImage.height) {
					img.style.width = "100%";
				} else {
					img.style.height = "100%";
				}
			}
			// ]]>
		</script>
	</head>
	<body>
		<form action="<?php echo base_url() ?>/index.php/flickr/search" method="post">
			<div style="display:inline;">
			<h4>Search</h4>
			<input type="text" name="text1" title="type in a name" />
			<input type="submit" name="submit1" value="Send" />
			</div><br /><br />
		</form>
		<?php
		if(isset($result)) {
			$data = $result;

			echo $this->pagination->create_links();

			echo "<table><tr>";
			$i=1;
			foreach($data['photos']['photo'] as $photo) {
				if($i == 6)
					echo "</tr><tr>";
				echo '<td style="padding:10px;"><img src="http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg" title="'.$photo["title"].'" id="'.$photo["id"] . '_' . $photo["secret"].'"></td>';
				$i++;
			}
			echo "</tr></table>";

			echo $this->pagination->create_links();
		}
		?>
	</body>
</html>
