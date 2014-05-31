codiad-less-updates
===================

a very specific script for my workflow on Chromebook. it transfers a css file from server where codiad resides to the server hosting the web site.

when a .less file is compiled with the Less Compiler Plugin for Codiad, the genereated css file will be sent to the specified directory in accept/index.php

## How to use
- update.php should reside in the same workspace directory the .less file is in.
- accept directory should reside in the same server as the live site.
- edit $target_url in update.php to point to the accept directory.
- edit $uploaddir in accept/index.php to specify your file's destination.


