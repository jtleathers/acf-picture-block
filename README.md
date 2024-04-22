# ACF Picture Block
This is a guide for adding an ACF block that outputs an HTML picture element. It is intended to be completed following the in-class exercise during the FWDP 3600 course.

The following files from this repo can be placed inside of the 'blocks/picture' folder in your plugin:
 - block.json
 - picture.css
 - picture.php

For any of that to work, the following line of code needs to be added into the fwd-acf-blocks.php file. *Make sure you put it in the correct place!*

`register_block_type( __DIR__ . '/blocks/picture' );`
