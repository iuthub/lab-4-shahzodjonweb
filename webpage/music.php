<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	
	
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>


		<div id="listarea">
			<ul id="musiclist">
<?php 

if(empty($_REQUEST["playlist"])){
	?>
	<?php
		$dir    = 'songs';
		$files = scandir($dir);
     foreach($files as $file){
		$info = pathinfo($file);
		if($info['extension'] == "mp3"){
			?>
			
			<li class="mp3item">
					<a href="songs/<?php echo $info['basename']; ?>"><?php echo $info['basename']; ?></a>
					(<?php 
					if (filesize("songs/".$info['basename']) >= 1048576)
					{
						echo number_format(filesize("songs/".$info['basename']) / 1048576, 2) . ' MB';
					}
					elseif (filesize("songs/".$info['basename']) >= 1024)
					{
						echo number_format(filesize("songs/".$info['basename']) / 1024, 2) . ' KB';
					}
					elseif (filesize("songs/".$info['basename']) > 1)
					{
						echo filesize("songs/".$info['basename']) . ' b';
					}
					?> )
				</li>
			<?php
		}
		
	 }
		
		?>
				<?php
		$dir    = 'songs';
		$files = scandir($dir);
     foreach($files as $file){
		$info = pathinfo($file);
		if($info['extension'] == "txt"){
			?>
			
			<li class="mp3item">
					<a href="music.php?playlist=<?php echo $info['basename']; ?>"><?php echo $info['basename']; ?></a>
				</li>
			<?php
		}
		
	 }
		
		?>

<?php
}else{
	?>
<?php
		$dir    = 'songs/'.$_REQUEST["playlist"];
		$filee = fopen($dir,"r");
$files=array();
while(! feof($filee))
  {
   array_push($files,fgets($filee));
  }

fclose($filee);

     foreach($files as $file){
		$file = trim($file,"
		");
		$info = pathinfo($file);
		
		if($info['extension'] == "mp3"){
			?>
			<li class="mp3item">
					<a href="songs/<?php echo $info['basename']; ?>"><?php echo $info['basename']; ?></a>
					(<?php 
					if (filesize("songs/".$info['basename']) >= 1048576)
					{
						echo number_format(filesize("songs/".$info['basename']) / 1048576, 2) . ' MB';
					}
					elseif (filesize("songs/".$info['basename']) >= 1024)
					{
						echo number_format(filesize("songs/".$info['basename']) / 1024, 2) . ' KB';
					}
					elseif (filesize("songs/".$info['basename']) > 1)
					{
						echo filesize("songs/".$info['basename']) . ' b';
					}
					?> )
				</li>
				
			<?php
		}
		
	 }
		
		?>
<?php
}

?>



		
			
				
			</ul>
		</div>
	</body>
</html>
