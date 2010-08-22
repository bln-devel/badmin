<?php
function format_size($size) {
      $sizes = array(" Bytes", " KiB", " MiB", " GiB", " TiB", " PiB", " EiB", " ZiB", " YiB");
      if ($size == 0) { return("n/a"); } else {
      return (round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]); }
}
?>
	<div id="content-wrapper">
	<div id="content">
		<h2><?= $pageTitle; ?></h2>

		<p class="breadcrumb">
		<?php
			$separator = "<span class=\"separator\"> &nbsp; </span>";
			if(empty($uri_chunks)){
				echo $root; //no link if displaying the root
			}else{
				echo anchor(site_url("documents/browser/"), $root).$separator;
			}
			$relative_path = "";
			foreach($uri_chunks as $dir) {
				$relative_path .= "/".$dir;
				if($dir == end($uri_chunks)){ //no link for last element
					echo $dir;
				}else{
					echo anchor(site_url("documents/browser/".$relative_path), $dir).$separator;
				}
			}
		?>
		</p>
<?php if(!empty($dirs_and_files)):?>
	<table class="fs">
<?php
	$i = -1;
	foreach($dirs_and_files as $type => $resources):
		foreach($resources as $resource):
			$parity = ($i++ %2 == 0) ? "even" : "odd";
			$resource_name = basename($resource);
			if($type == "dirs"){
				$title = "Go into ".$resource_name;
				$icon = "folder";
				$alt = "[d]";
				$kind_of_delete = "folder_delete";
				$dl_as_zip_available = FALSE; //FIXME TRUE when available && presentation of tables with 2 images ok
			}else{
				$knownExtensions = $this->config->item("file.extensions", $this->_config);
				$title = "Download ".$resource_name;
				$ext = strtolower(strrchr($resource_name, '.'));
				$kind_of_delete = "page_white_delete";
				if($ext && key_exists($ext, $knownExtensions)) { //this is a well known file extension
					$icon = $knownExtensions[$ext];
				}else{
					$icon = "page_white";
				}
				$alt = "";
				$dl_as_zip_available = FALSE;
			}
		?>
		<tr class="<?= $parity; ?>">
			<td class="resource_control"><a href="<?= site_url("/documents/upload/remove/".$resource); ?>" class="img"><img src="<?= base_url() ?>/resources/core/images/famfamfam/<?= $kind_of_delete; ?>.png" alt="Delete" title="Delete"></a>
			<?php if($type == "dirs" && $dl_as_zip_available):?>
				<img src="<?= base_url() ?>/resources/core/images/famfamfam/folder_go.png" alt="Download zip" title="Download zip">
			<?php endif; ?>
			</td>
			<td class="resource_desc"><img src="<?= base_url() ?>/resources/core/images/famfamfam/<?= $icon ?>.png" alt="<?= $alt; ?>"></td>
			<td><?= anchor(site_url("documents/browser/".$resource), $resource_name, array("title"=>$title)); ?></td>
			<td>
			<?php
			$file = $media_dir."/".$resource;
			if(is_file($file)){
				echo format_size(filesize($file));
			}else{
				//echo size of downloadable zip
			}
			?>
			</td>
		</tr>
	<?php endforeach; endforeach; ?>
	</table>
	
<?php else: ?>
	<p>No file.</p>
<?php endif; ?>

	<?php $this->load->view("documents/file_upload_v"); ?>

	</div> <!-- /#content -->
	</div> <!-- /#content-wrapper -->
