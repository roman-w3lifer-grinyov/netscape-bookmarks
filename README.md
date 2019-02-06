# netscape-bookmarks

- [Installation](#installation)
- [Usage](#usage)

## Installation

``` sh
composer require w3lifer/netscape-bookmarks
```

## Usage

``` php
echo new NetscapeBookmarks([
    'Bookmark name 1' => 'Bookmark URL 1',
    'Bookmark name 2' => 'Bookmark URL 2',
    'Directory name' => [
        'Bookmark name 3' => 'Bookmark URL 3',
        'Bookmark name 4' => 'Bookmark URL 4',
    ],
]);

// <DL><p>
// <DT><A HREF="Bookmark URL 1">Bookmark name 1</A>
// <DT><A HREF="Bookmark URL 2">Bookmark name 2</A>
// <DT><H3>Directory name</H3>
// <DL><p>
// <DT><A HREF="Bookmark URL 3">Bookmark name 3</A>
// <DT><A HREF="Bookmark URL 4">Bookmark name 4</A>
// </DL><p>
// </DL><p>
```
