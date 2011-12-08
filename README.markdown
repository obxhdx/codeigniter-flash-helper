# codeigniter-flash-helper

## Methods

### display_flash($name)

This function displays a selected flash message in a view file. Simply provide the name of the flash variable and it will display it in a properly formatted HTML div.

### set_flash($name, $message_type, $message, $redirect=FALSE)

This function sets a flash variable with a value you specify. If you use flash variables for a lot of different messages, which you may need to format differently, you can use this function to store some formatting data along with the message. That way the message can be automatically displayed using an intended CSS style (`$message_type`). The `$redirect` parameter when set, redirects the page to a given view right after the flash message is set.

## Installation

Just copy the file to `<path_to_your_CI_app>/system/helpers`.
