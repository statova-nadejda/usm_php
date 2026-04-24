<?php

namespace php_lab07\views\pages;

/** @var HtmlEscaper $escaper */
?>
<form action="submit.php" method="POST">
    <div>
        <label for="title">Title *</label>
        <input
                type="text"
                name="title"
                id="title"
                value="<?= $escaper->escape($old['title'] ?? '') ?>"
                class="<?= !empty($errors['title']) ? 'error-input' : '' ?>"
        >
        <?php if (!empty($errors['title'])): ?>
            <p class="error-text"><?= $escaper->escape($errors['title']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="destination">Destination *</label>
        <input
                type="text"
                name="destination"
                id="destination"
                value="<?= $escaper->escape($old['destination'] ?? '') ?>"
                class="<?= !empty($errors['destination']) ? 'error-input' : '' ?>"
        >
        <?php if (!empty($errors['destination'])): ?>
            <p class="error-text"><?= $escaper->escape($errors['destination']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="startDate">Start Date *</label>
        <input
                type="date"
                name="startDate"
                id="startDate"
                value="<?= $escaper->escape($old['startDate'] ?? '') ?>"
                class="<?= !empty($errors['startDate']) ? 'error-input' : '' ?>"
        >
        <?php if (!empty($errors['startDate'])): ?>
            <p class="error-text"><?= $escaper->escape($errors['startDate']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="endDate">End Date *</label>
        <input
                type="date"
                name="endDate"
                id="endDate"
                value="<?= $escaper->escape($old['endDate'] ?? '') ?>"
                class="<?= !empty($errors['endDate']) ? 'error-input' : '' ?>"
        >
        <?php if (!empty($errors['endDate'])): ?>
            <p class="error-text"><?= $escaper->escape($errors['endDate']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="description">Description</label>
        <input
                type="text"
                name="description"
                id="description"
                value="<?= $escaper->escape($old['description'] ?? '') ?>"
        >
    </div>

    <div>
        <label for="budget">Budget *</label>
        <input
                type="text"
                name="budget"
                id="budget"
                value="<?= $escaper->escape($old['budget'] ?? '') ?>"
                class="<?= !empty($errors['budget']) ? 'error-input' : '' ?>"
        >
        <?php if (!empty($errors['budget'])): ?>
            <p class="error-text"><?= $escaper->escape($errors['budget']) ?></p>
        <?php endif; ?>
    </div>

    <fieldset class="<?= !empty($errors['transport']) ? 'error-fieldset' : '' ?>">
        <legend>Transport Type *</legend>

        <label>
            <input
                    type="radio"
                    name="transport"
                    value="Car"
                    <?= (($old['transport'] ?? '') === 'Car') ? 'checked' : '' ?>
            >
            Car
        </label>

        <label>
            <input
                    type="radio"
                    name="transport"
                    value="Plane"
                    <?= (($old['transport'] ?? '') === 'Plane') ? 'checked' : '' ?>
            >
            Plane
        </label>

        <label>
            <input
                    type="radio"
                    name="transport"
                    value="Train"
                    <?= (($old['transport'] ?? '') === 'Train') ? 'checked' : '' ?>
            >
            Train
        </label>

        <label>
            <input
                    type="radio"
                    name="transport"
                    value="Bus"
                    <?= (($old['transport'] ?? '') === 'Bus') ? 'checked' : '' ?>
            >
            Bus
        </label>

        <?php if (!empty($errors['transport'])): ?>
            <p class="error-text"><?= $escaper->escape($errors['transport']) ?></p>
        <?php endif; ?>
    </fieldset>

    <input type="submit" value="Submit">
</form>
