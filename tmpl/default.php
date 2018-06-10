<?php
/**
* RSGallery2 latest galleries module: shows latest galleries from the Joomla extension RSGallery2 (www.rsgallery2.org).
* @copyright (C) 2012-2018 RSGallery2 Team
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
**/

defined('_JEXEC') or die();

?>

<div class="mod_rsgallery2_latest_galleries">
	<table class="mod_rsgallery2_latest_galleries_table" >
		<?php
		$ItemIdx = 0; 
		for ($row = 1; $row <= $countRows; $row++) {
			// If there still is a gallery image to show, start a new row
			if (!isset($latestGalleries[$ItemIdx])) {
				break;
			}

			echo '<tr>';
			for ($column = 1; $column <= $countColumns; $column++) {

				// If there still is a gallery image to show, show it, otherwise, continue
				if (!isset($latestGalleries[$ItemIdx])) {
					break;
				}

                $HTML = '';
                echo '<td>';
				// Get the gallery  of the item to show
				$gallery = new rsgGallery($latestGalleries[$ItemIdx]);
				// Get the name of the item to show

                // Gallery has images ? (thumb exists)
                if (! empty($gallery->thumb))
                {
	                $ItemIdxName = $gallery->thumb->name;

	                // Create HTML for image: get the url (with/without watermark) with img attributes
	                if ($displayType == 1)
	                {
		                // *** display ***:
		                $watermark = $rsgConfig->get('watermark');
		                //$imageUrl = $watermark ? waterMarker::showMarkedImage( $ItemIdxName ) : imgUtils::getImgDisplayPath( $ItemIdxName );
		                $imageUrl = $watermark ? waterMarker::showMarkedImage($ItemIdxName) : imgUtils::getImgDisplay($ItemIdxName);
		                $HTML     = '<img class="rsg2-displayImage" src="' . $imageUrl . '" alt="' . $ItemIdxName . '" title="' . $ItemIdxName . '" ' . $imgAttributes . '/>';
	                }
                    elseif ($displayType == 2)
	                {
		                // *** original ***
		                $watermark = $rsgConfig->get('watermark');
		                //$imageOriginalUrl = $watermark ? waterMarker::showMarkedImage( $ItemIdxName, 'original' ) : imgUtils::getImgOriginalPath( $ItemIdxName );
		                $imageOriginalUrl = $watermark ? waterMarker::showMarkedImage($ItemIdxName, 'original') : imgUtils::getImgOriginal($ItemIdxName);
		                $HTML             = '<img class="rsg2-displayImage" src="' . $imageOriginalUrl . '" alt="' . $ItemIdxName . '" title="' . $ItemIdxName . '" ' . $imgAttributes . '/>';
	                }
	                else
	                {
		                // *** thumb ***
		                $HTML = galleryUtils::getThumb($gallery->get('id'), $imageHeight, $imageWidth, "mod_rsgallery2_latest_galleries_img");    // thumbid, height, width, class
	                }
                }
                else
                {
                    // gallery had no images
                    $HTML = $gallery->thumbHTML;
                }

				$name	= $gallery->name;
				$date	= $gallery->date;

				// Show it
				?>
				<div class="mod_rsgallery2_latest_galleries_attributes" <?php echo $divAttributes;?>>
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
				$ItemIdx++;
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


