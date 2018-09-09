Plugin Name: CSV It Plugin
Plugin Uri: https://github.com/alnever/html-it-plugin
Description: The shortcode allows to download a table as a CSV-file
Version: 1.0
Author: Alex Neverov
Author URI: http://alneverov.ru

License: GPL2

    Copyright 2018 Alex Neverov

    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License,
    version 2, as published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

The plugin adds a shortcode

[csv_it separator="<separator>"]
<content>
[/csv_it]

The separator parameter is optional, it equals coma by default.

The table inside of content will be converted into x-Separated-Values format.
It is CSV by default.
