<?php
/**
 * Created by PhpStorm.
 * User: tacsiazuma
 * Date: 2016.11.13.
 * Time: 21:53
 */

namespace Letscodehu\HumbugHtml;


class StreamCapturer {

    public function includeFile($_fileToInclude, $variables) {
        extract($variables);
        ob_start();
        include $_fileToInclude;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

}