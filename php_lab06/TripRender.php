<?php

namespace php_lab06;

/**
 * Class for rendering the trip add form.
 */
class TripRender
{
    /**
     * Generates HTML code for the trip add form.
     * @return string HTML code of the form
     */
    public function render(): string
    {
        session_start();

        $errors = $_SESSION['errors'] ?? [];
        $old = $_SESSION['old'] ?? [];

        unset($_SESSION['errors'], $_SESSION['old']);

        ob_start();
        include 'TripForm.php';
        return ob_get_clean();
    }
}