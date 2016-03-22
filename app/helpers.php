<?php

// SVG icon helper
function icon($name) {
    return (file_get_contents('icons/' . $name . '.svg'));
}