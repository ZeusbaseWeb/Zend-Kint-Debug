# Zend-Kint-Debug
Var_dump(), print_r() and debug_backtrace() alternative for PHP.
This repository is a port of original Kint's library adapted for Zend Framework users.

The Kint project's author is Rokas Sleinius, an amazing PHP programmer.
You will find official project @ http://code.google.com/p/kint/

## Kint - debugging helper for PHP developers
Kint for PHP is a zero-setup debugging tool to output information about variables and stack traces prettily and comfortably. Extremely easy to use but powerful and customizable.

Kint is an ideological successor (and a superior alternative) to Krumo, which you may know as "Var_dump 2.0". It is no longer updated for quite some time and I've found many issues with it in personal use.

Kint boasts a lot of new unique features over Krumo such as the actual name of the variable being dumped, modifiers (+dd($var) produces different results than dd($var)) - and much more. It also bundles a full-featured backtrace output - the most efficient and comfortable to use out there. Check out the demo below for a quick preview.

## Advantages over vanilla var_dump and/or print_r
Much more elegant and readable output - structured, collapsible, html source is escaped and visible on the page - not only when viewing the source of the page.
The name of the variable or whole expression is displayed along its value.
The place (file, line and method) where the output was called from is displayed too, so you don't have to wander where you left debugging info when you're done.
Accepts any number of parameters in one call. It also groups them for you to see, what was dumped in different iterations. Furthermore, calls from different places in the source are color-coded so you can see loops and repeated calls easily.
Does not choke on recursive variables.
Much more information is displayed about the variable in many cases, for example static properties of the dumped objects class [todo: add more examples]
Complex variables are dumped with a fixed nested depth so that it doesn't hang up your browser for enormous objects. This can be turned off on the fly - read on.
Ability to automatically call ob_clean() before outputting, in most cases this means the dump comes at the top of the page, not obstructed by page elements.
Ability to dynamically turn off any output so you can debug live systems without users suspecting anything.
Modifiers to alter the output (100% unique feature) - see below.
Much shorter name - d($var) (it's an alias for Kint::dump). See below for complete usage.
Installation
Simply place the kint directory anywhere comfy and include the Kint.class.php file from there.

You can optionally copy the included config.default.php and rename to config.php to override default values, but that's, again, entirely optional and you're fine without it.

### Usage
To dump a variable:
    Kint::dump($variable1,$variable2);
    // or simply
    d($variable1,$variable2); // shorthand alias of Kint::dump()

There is often a need to halt execution after dumping a particular variable:
    dd($variable); // execution will stop after this statement; same as d($variable);die;

You can also use modifiers; see examples below (note the trailing symbol):
    +d($variable);
    -Kint::dump($variable); // works on direct and shorthand calls
    @d($variable);

+ will output bypassing the nesting depth limit of the variable (useful for outputting very complex objects, be warned, it may cause your browser to hang in extreme cases);
- will run ob_clean() beforehand, so this dump is (most of the time) shown at the top of the page - instead of being wrapped in HTML that was already outputted. Best used with dd();
@ will return the output of the Kint::dump() instead of displaying it on screen;
Note, these are possible because the class analyzes the PHP code itself where it was called from.

To display backtrace
    Kint::trace();
The displayed information for each step of the trace includes the source snippet, passed arguments and the object at the time of calling. Optionally accepts an array to output as trace.

### Mouse navigation

Variable nodes and trace elements are expanded on click.
A click on the [+] icon will expand the clicked node and all of its children.
Double-clicking any [+] toggles expansion of all nodes on the page.
A single click on a variable or key name will auto-select it for easy copying.
When viewing trace, clicking the [+] will show source snippet where code took place, clicking on the Class->method() will display the object on which it was called (only applicable for dynamic method calls, obviously), and clicking on arguments will show passed arguments.
Configuration
You can find some configuration options in kint/config.php [todo: update with newly introduced settings]

pathDisplayCallback is of type callable Receives file name and line number as its two parameters. You can use it to:
Output the filename as a link for your editor if it supports it (eg. IDE://{filename}:{linenum})
Shorten the displayed paths. If you have configured directories like this: define('DIR_SYSTEM',dirname(__FILE__) . '/system/'), you can replace the filename path to represent 'DIR_SYSTEM' instead of eg. '/var/www/project/system/classes/'
maxStrLength the maximum length of a string before it is truncated and displayed separately
maxLevels the default depth at which the outputting stops, note that this can be overridden on the fly with the '+' modifier (see above).
enabled set this to false to prevent Kint from outputting any data.
skin the name of the included css file, skinning is yet to be improved.

Peace :)!
Laurynas Karvelis