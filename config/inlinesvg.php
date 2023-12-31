<?php

return [

    // Enter the paths to the directories where you store your individual SVG
    // files. Absolute paths should be used, which is simple using aliases
    // such as @webroot. (https://docs.craftcms.com/v3/config/#aliases)

    'paths' => [
        '@webroot/static/images',
    ],

    // Specify any CSS classes that you want to add to all SVGs included in
    // your templates. The classes that you specify here will be merged
    // with any passed through as the second param of `inlineSvg()`.

    'class' => 'fill-current',

];
