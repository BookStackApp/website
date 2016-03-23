<?php

// SVG icon helper
function icon($name) {
    return (file_get_contents('icons/' . $name . '.svg'));
}

// Helper to link to a documenation page
function docLink($page) {
	return '/docs/' . $page;
}