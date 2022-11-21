# TJ Core Sample Plugin

This is a sample plugin to demonstrate how you can write extensions (plugins) to add custom functionality to [Elementor](httjs://github.com/pojome/elementor/)

Plugin Structure:

```
assets/
      /js
      /css

include/
      /elementor
      /icons

index.php
plugin.php
tj-core.php
```

- `assets` directory - holds plugin JavaScript and CSS assets
  - `/js` directory - Holds plugin Javascript Files
  - `/css` directory - Holds plugin CSS Files
- `include` directory - Holds Plugin widgets and function files
  - `/elementor` directory - Holds plugin custom elementor widgets
  - `/icons` directory - Holds plugin custom icon fonts
    - `/allow-svg.php` - Holds svg support function
    - `/common-functions.php` - Holds plugin common functions
- `index.php` - Prevent direct access to directories
- `plugin.php` - The actual Plugin file/Class.
- `tj-core.php` - Main plugin file, used as a loader if plugin minimum requirements are met.

For more documentation please see [Elementor Developers Resource](httjs://developers.elementor.com/creating-an-extension-for-elementor/).
