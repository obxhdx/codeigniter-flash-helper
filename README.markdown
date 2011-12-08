# codeigniter-flash-helper

## Methods

### display_flash($name)

The `display_flash($name)` function displays a selected flash message in a view file. Simply provide the name of the flash variable and it will display it in a properly formatted HTML div.

### set_flash($name, $type, $msg)

The `set_flash($name, $type, $msg)` function sets a flash variable with a value you specify. If you use flash variables for a lot of different messages, which you may need to format differently, you can use this function to store some formatting data along with the message. That way the message can be automatically displayed using an intended CSS style.

## Installation

Just copy the file to `<path_to_your_CI_app>/system/helpers`.
