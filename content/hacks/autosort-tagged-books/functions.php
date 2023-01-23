<?php

use BookStack\Actions\ActivityType;
use BookStack\Entities\Models\Book;
use BookStack\Entities\Models\Chapter;
use BookStack\Entities\Models\Page;
use BookStack\Facades\Theme;
use BookStack\Theming\ThemeEvents;

/**
 * Auto-sort the contents of the given book.
 * This sorts in name order, ascending, with chapters first.
 */
function autoSortBook(Book $book) {
    $chapters = $book->chapters()->orderBy('name', 'asc')->get(['id', 'priority']);
    $pages = $book->pages()->orderBy('name', 'asc')
        ->where('draft', '=', false)
        ->get(['id', 'priority']);
    $chapterCount = $chapters->count();

    foreach ($chapters as $index => $chapter) {
        $chapter->priority = $index;
        $chapter->save();
    }

    foreach ($pages as $index => $page) {
        $page->priority = $chapterCount + $index;
        $page->save();
    }
}

// Listen to the activity logged theme event to run our custom logic
Theme::listen(ThemeEvents::ACTIVITY_LOGGED, function (string $type, $detail) {

    // The activity events we're triggering sort upon.
    $sortActivityTypes = [
        ActivityType::PAGE_CREATE,
        ActivityType::PAGE_UPDATE,
        ActivityType::CHAPTER_CREATE,
        ActivityType::CHAPTER_UPDATE,
    ];

    // The name of the book-level tag which indicates auto-sort should run.
    // Set to empty string ('') to run for all books.
    $tagName = 'autosort';

    // If it's one of our activity types, correctly tagged, run the auto-sort logic
    if (in_array($type, $sortActivityTypes) && ($detail instanceof Page || $detail instanceof Chapter)) {
        $book = $detail->book;
        if (empty($tagName) || $book->tags()->where('name', '=', $tagName)->exists()) {
            autoSortBook($detail->book);
        }
    }

});