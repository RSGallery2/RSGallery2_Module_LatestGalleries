<?php
/**
* RSGallery2 latest galleries module: shows latest galleries from the Joomla extension RSGallery2 (www.rsgallery2.nl).
* @copyright (C) 2012-2015 RSGallery2 Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
**/

defined('_JEXEC') or die();

?>

<div class="mod_rsgallery2_latest_galleries">
	<table class="mod_rsgallery2_latest_galleries_table" >
		<?php
		$item = 0; // Todo : $ItemIdx
		for ($row = 1; $row <= $countRows; $row++) {
			// If there still is a gallery image to show, start a new row
			if (!isset($latestGalleries[$item])) {
				break;
			}

			echo '<tr>';
			for ($column = 1; $column <= $countColumns; $column++) {

				// If there still is a gallery image to show, show it, otherwise, continue
				if (!isset($latestGalleries[$item])) {
					break;
				}

                $HTML = '';
                echo '<td>';
				// Get the gallery  of the item to show
				$gallery = new rsgGallery($latestGalleries[$item]);
				// Get the name of the item to show
				$itemName = $gallery->thumb->name;
				
				// Create HTML for image: get the url (with/without watermark) with img attributes
				if ($displayType == 1) {
					// *** display ***: 
					$watermark = $rsgConfig->get('watermark');
					$imageUrl = $watermark ? waterMarker::showMarkedImage( $itemName ) : imgUtils::getImgDisplay( $itemName );
					$HTML = '<img class="rsg2-displayImage" src="'.$imageUrl.'" alt="'.$itemName.'" title="'.$itemName.'" '.$imgAttributes.'/>';
				} elseif ($displayType == 2) {
					// *** original ***
					$watermark = $rsgConfig->get('watermark');
					$imageOriginalUrl = $watermark ? waterMarker::showMarkedImage( $itemName, 'original' ) : imgUtils::getImgOriginal( $itemName );
					$HTML = '<img class="rsg2-displayImage" src="'.$imageOriginalUrl.'" alt="'.$itemName.'" title="'.$itemName.'" '.$imgAttributes.'/>';
				} else {
					// *** thumb ***
					$HTML = galleryUtils::getThumb( $gallery->get('id'),$imageHeight,$imageWidth,"mod_rsgallery2_latest_galleries_img" );	// thumbid, height, width, class
				}
				$name	= $gallery->name;
				$date	= $gallery->date;

				// Show it
				?>
				<div class="mod_rsgallery2_latest_galleries_attibutes" <?php echo $divAttributes;?>>
					<div class="mod_rsgallery2_latest_galleries-cell">
						<a href="<?php echo $gallery->url;?>">
							
							<?php echo $HTML;?>
							
						</a>
					</div>
					
					<div style="clear:both;"></div>
				<?php
					if ($displayName) {
				?>
						<div class="mod_rsgallery2_latest_galleries_name" <?php echo $divNameAttributes;?>>
							<?php echo $name;?>
						</div>
				<?php
					}
					if ($displayDate) {
				?>
						<div class="mod_rsgallery2_latest_galleries_date">
							<?php echo date($dateFormat,strtotime($date));  ?>
						</div>
				<?php 
					}
				?>
				</div>
	<?php
				$item++;
				echo '</td>';
			}	
			echo '</tr>';
		}
		
	?>
	</table>
	<table class="mod_rsgallery2_latest_galleries_table" >
	<?php
	?>
	</table>
</div>


