<?php

namespace php_lab07\src\Models;

use php_lab06\DateTime;

require_once 'TransportType.php';

/**
 * Class Trip represents a trip with main parameters.
 */
class Trip
{
    /** @var string Trip title */
    private string $title;
    /** @var string Destination */
    private string $destination;
    /** @var DateTime Start date of the trip */
    private DateTime $startDate;
    /** @var DateTime End date of the trip */
    private DateTime $endDate;
    /** @var string Trip description */
    private string $description;
    /** @var float Trip budget */
    private float $budget;
    /** @var TransportType Transport type */
    private TransportType $transportType;

}