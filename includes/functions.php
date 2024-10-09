<?php
function formatTimestamp($timestamp)
{
    $date = DateTime::createFromFormat('Y-m-d H:i:s.u', $timestamp);

    if ($date) {
        return $date->format('d.m. H') . '-hodin';
    } else {
        return "Invalid timestamp format.";
    }
}