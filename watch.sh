#!/bin/sh

# No minification
sass --watch content/themes/london-typography/sass/main.scss:content/themes/london-typography/css/main.css --style expanded
#sass --watch sass/main.scss:web/css/main.css --style compressed

exit
