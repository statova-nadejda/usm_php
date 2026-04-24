<?php

namespace php_lab07\src\Models;

/**
 * Enum of possible transport types for a trip.
 */
enum TransportType
{
    case Car;
    case Plane;
    case Train;
    case Bus;
}