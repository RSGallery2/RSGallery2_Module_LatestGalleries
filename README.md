# RSGallery2_Module_LatestGalleries

The RSGallery2 Module *LatestGalleries* shows  as the name suggests the latest galleries from RSGallery2


<!-- ToDo: fill out like in Latest images -->

* A click on the thumb nail may lead to
* .
* .
* .

## General

* .
* .
* .
* .

## Parameter

![](https://github.com/RSGallery2/RSGallery2_Project/blob/master/Documentation/ImagesUsedInDoc/moduleLatestGalleries.backend.01.png?raw=true)

* (1) Number of rows

  Number of vertical images  (Images per column)

* (2) Number of columns

  Number of horizontal images (Images per row)
  The number of displayed images is the result from Count = row number times column number. Therefore Count image names are fetched from the Database and prepared for the display

* (3) Select galleries to show images from

  e.g. 3,8,42. The used galleries may be restricted to a selection. Please use a comma separated list. Select galleries to show images from where multiple galleries are separated by a comma, e.g. '3,8,42' or '5'. If you want to show images from all galleries enter '0'. The access level of user will be taken into account, so if a user is not allowed to see gallery 2 its images won't show even if you put it here.The gallery id numbers to use can be found here: Backend > Components > RSGallery2 > Galleries, in the column ID

* (4) Include sub galleries: (No/Yes)

  When the range of galleries is limited by user input (see above) the child galleries may be included in the image search

* (5) Display type of image to show

  RSGallery2 stores the original (depending on settings), a display sized image and a thumbnail sized image. User can select which display type is to be used.


![](https://github.com/RSGallery2/RSGallery2_Project/blob/master/Documentation/ImagesUsedInDoc/moduleLatestGalleries.backend.02.png?raw=true)

* (1) CSS img element height parameter:

  Enter the size of the CSS height attribute of the image to show in pixels. If '0' is entered there won't be a height specified for img element and the actual height of the image will be taken.

* (2) CSS img element width parameter:

  Enter the size of the CSS width attribute of the image to show in pixels. If '0' is entered there won't be a width specified for img element and the actual width of the image will be taken
  CSS width attribute for the img and the div element (0=no attribute)
  Set size of image, use one (!) of height or width to make the image smaller. Set one or both settings for image height and width to 0, this will keep the aspect ratio of the image, if you set a size for both the image will be stretched. Do not set the size larger than the actual image size, e.g. when a thumb size image has a size of 50x50 pixels, don't set either size to larger than 50, rather use the larger display or the original image

* (3) CSS div element height parameter:

  Set size of div, use this to crop the image. Enter the size of the CSS height attribute of the div that holds the image in pixels. This will crop the image. If '0' is entered there won't be a height specified for the div element and it will fit the actual height of the image

* (4)  CSS div element width parameter:

  Set size of div, use this to crop the image. Enter the size of the CSS width attribute of the div that holds the image in pixels. This will crop the image. If '0' is entered there won't be a width specified for the div element and it will fit the actual width of the image

* (5) CSS div element height parameter for name of gallery:

  CSS div element height parameter for name of gallery. Enter the size of the CSS height attribute of the dive that holds the name of the image, in pixels. If '0' is entered there won't be a height specified for the div element.
  There is no width parameter to set the width of this div element since the width of the 'CSS div element width parameter' would overrule this

* (6) Display gallery name:

  (No/Yes) Do display gallery name below the gallery thumbnail

* (7) Display date:

  (No/Yes) Do display gallery date below the gallery thumbnail

* (8) Date format:

  Select format type the date should display (for example, d-m-Y | d/m/Y | m-d-Y : G-i). See http://nl3.php.net/date for more info about this.
