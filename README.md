Gallery
=======

A simple Pico plugin for creating images galleries with auto thumbnail creation.

Features
* Seperate page galleries
* Auto thumbnail creation
*

Installation / Usage
--------------------

1. Copy the plugin file/folder the plugins directory of your Pico site.
2. Create the gallery folders
3. Upload images
4. Visit pages
5. Add code to theme

``` html

{% for image in gallery %}
<figure>
    <a href="{{ image.url }}" >
    <img src="{{ image.thumb_url }}" />
    </a>
</figure>
{% endfor %}

```

TODO
----

Add image EXIF data.
Document Code


License
-------

### Released under the MIT license.

Copyright (c) <year> <copyright holders>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.