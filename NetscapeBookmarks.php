<?php

namespace w3lifer\netscapeBookmarks;

class NetscapeBookmarks
{
    const OPEN_DIR = '<DL><p>';

    const CLOSE_DIR = '</DL><p>';

    /**
     * @var string
     */
    private $markup = '';

    /**
     * Example of input array:
     * ``` php
     * [
     *     'Bookmark name 1' => 'Bookmark URL 1',
     *     'Bookmark name 2' => 'Bookmark URL 2',
     *     'Directory name' => [
     *         'Bookmark name 3' => 'Bookmark URL 3',
     *         'Bookmark name 4' => 'Bookmark URL 4',
     *     ],
     * ]
     * ```
     * @param array $bookmarks
     */
    public function __construct($bookmarks = [])
    {
        if ($bookmarks) {
            $this->setMarkup($bookmarks);
        }
    }

    public function __toString()
    {
        return $this->markup;
    }

    private function setMarkup($bookmarks)
    {
        $this->markup .= self::OPEN_DIR . "\n";

        foreach ($bookmarks as $linkName => $linkUrl) {
            if (is_array($linkUrl)) {
                $this->markup .= $this->getDirectoryMarkup($linkName) . "\n";
                $this->setMarkup($linkUrl);
            } else {
                $this->markup .=
                    $this->getLinkMarkup($linkName, $linkUrl) . "\n";
            }
        }

        $this->markup .= self::CLOSE_DIR . "\n";
    }

    /**
     * @param string $name
     * @return string
     */
    private function getDirectoryMarkup($name)
    {
        return '<DT><H3>' . $name . '</H3>';
    }

    /**
     * @param string $name
     * @param string $url
     * @return string
     */
    private function getLinkMarkup($name, $url)
    {
        return '<DT><A HREF="' . $url . '">' . $name . '</A>';
    }
}
