<?php

/**
 * TODO Example hooks for a Pico plugin
 *
 * @package Pico
 * @subpackage Gallery
 * @since version 0.1
 * @author Shawn Sandy
 * @link http://www.shawnsandy.com
 * @license http://opensource.org/licenses/MIT
 *
 */
include_once dirname(__FILE__) . '/lib/Zebra_Image.php';

class Gallery {

    private $theme_dir,
            $theme_url,
            $current_page,
            $gallery_dir,
            $config,
            $images = array(),
            $thumbnails = array(),
            $resize_error = array();

    public function plugins_loaded() {

    }

    public function request_url(&$url) {

    }

    public function before_load_content(&$file) {
        $_file = basename($file, '.md');
        $this->current_page = $_file;
    }

    public function after_load_content(&$file, &$content) {

    }

    public function before_404_load_content(&$file) {

    }

    public function after_404_load_content(&$file, &$content) {

    }

    public function config_loaded(&$settings) {

        if (isset($settings['gallery_settings']))
            $this->config = $settings['gallery_settings'];
            $this->theme_dir = $settings['theme'];
    }

    public function file_meta(&$meta) {
        if (isset($meta['slug']))
            $this->current_page = $meta['slug'];
        //if (isset($meta['']))
    }

    public function content_parsed(&$content) {

    }

    public function get_pages(&$pages, &$current_page, &$prev_page, &$next_page) {

    }

    public function before_twig_register() {

    }

    public function before_render(&$twig_vars, &$twig) {

        //echo $this->current_page;
        $this->theme_url = $twig_vars['base_url'];

        $this->get_gallery();
        $twig_vars['gallery'] = $this->images;
        $thumbs = $this->thumbnails;
        unset($thumbs[0],$thumbs[1]);
        $twig_vars['gallery_thumbnails'] = $thumbs;
        //var_dump($this->resize_error);


    }

    public function after_render(&$output) {

    }

    public function get_gallery() {

        $this->gallery_dir = ROOT_DIR . 'content/gallery/' . $this->current_page;

        $directory = $this->gallery_dir;

        $directory_url = $this->theme_url . '/content/gallery/' . $this->current_page;

        //pico function

        if (!is_dir($directory))
            return false;
        $array_items = array();
        if ($handle = opendir($directory)) {

            while (false !== ($file = readdir($handle))) {
                $file_thumb = $this->gallery_dir . "/thumbs/" . $file;
                $file = $directory . "/" . $file;
                if (strstr($file, '.jpg') OR strstr($file, '.png')){
                     $this->create_thumbs($file, $file_thumb);
                    $this->images[] = $directory_url .'/'.basename(preg_replace("/\/\//si", "/", $file));
                    //resze the images create thumbs

                    $this->thumbnails[] = $directory_url . '/thumbs/' . basename(preg_replace("/\/\//si", "/", $file));;
                }

                    }



            closedir($handle);

        }

        return $this->images;
    }

    public function create_thumbs($source_image, $target_image) {

        $quality = 100;
        $width = 300;
        $height = 300;

        $settings = $this->config;

        if (isset($settings['thumb_quality']))
            $quality = $settings['thumb_quality'];

        if (isset($settings['thumb_width']))
            $width = $settings['thumb_width'];

        if (isset($settings['thumb_height']))
            $height = $settings['thumb_height'];


        if (file_exists($target_image))
            return;

        $image = new Zebra_Image();

        $image->source_path = $source_image;

        $image->target_path = $target_image;

        $image->jpeg_quality = $quality;

        $image->resize($width, $height, ZEBRA_IMAGE_CROP_CENTER);

        $this->resize_error[] = $image->error .' -- '.$target_image;
        return $image->error;
    }

}
