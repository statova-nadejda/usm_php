<?php

namespace php_lab06;

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