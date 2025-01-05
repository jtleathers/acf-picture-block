# ACF Picture Block
This is a guide for adding an ACF custom block that outputs an HTML picture element. It is intended to be completed following the in-class exercise during the FWDP 3600 course.

Inside of your 'acf-blocks' folder, create a folder called 'picture' and place the following files from this repo:
 - block.json
 - style.css
 - render.php

For any of that to work, the following line of code needs to be added into the acf-blocks.php file. *Make sure you put it in the correct place!*

`register_block_type( __DIR__ . '/picture' );`

Once those files and that line of code have been added, you can can import the ACF field group. Use this provided file: 
 - acf-picture-field-group.json

Test it out! Modify it! Make it better!