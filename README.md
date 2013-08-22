Gallery
=======

A simple Pico plugin for creating images galleries with auto thumbnail creation.

* Simple and easy to use plugin setup and configuration
* Automatically find and load galleries for pages from folders with the page file name or page meta slug (Adv Meta plugin required).
* Thumbnail generation.
* ...


Installation / Usage
--------------------

1. Copy the plugin file/folder the plugins directory of your Pico site.
2. Create a folder named gallery in your content directory
3. Add a folder to the gallery directory name it using the page file name or page slug (Adv Meta plugin required) -- for a gallery on your index.md page create a folder named index and inside it add a thumbs folder.
4. Upload your full sized images to the main folder (/index)
5. Add the sample code below your theme.
6. Visit the page, once everything went well your images will appear.

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

* Add image EXIF data.
* Document Code
* ...

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