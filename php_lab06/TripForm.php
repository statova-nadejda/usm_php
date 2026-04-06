<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="submit.php" method="POST">
    <div>
        <label for="title">Title *</label>
        <input
            type="text"
            name="title"
            id="title"
            value="<?= htmlspecialchars($old['title'] ?? '') ?>"
            class="<?= !empty($errors['title']) ? 'error-input' : '' ?>"
        >
        <?php if (!empty($errors['title'])): ?>
            <p class="error-text"><?= htmlspecialchars($errors['title']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="destination">Destination *</label>
        <input
            type="text"
            name="destination"
            id="destination"
            value="<?= htmlspecialchars($old['destination'] ?? '') ?>"
            class="<?= !empty($errors['destination']) ? 'error-input' : '' ?>"
        >
        <?php if (!empty($errors['destination'])): ?>
            <p class="error-text"><?= htmlspecialchars($errors['destination']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="startDate">Start Date *</label>
        <input
            type="date"
            name="startDate"
            id="startDate"
            value="<?= htmlspecialchars($old['startDate'] ?? '') ?>"
            class="<?= !empty($errors['startDate']) ? 'error-input' : '' ?>"
        >
        <?php if (!empty($errors['startDate'])): ?>
            <p class="error-text"><?= htmlspecialchars($errors['startDate']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="endDate">End Date *</label>
        <input
            type="date"
            name="endDate"
            id="endDate"
            value="<?= htmlspecialchars($old['endDate'] ?? '') ?>"
            class="<?= !empty($errors['endDate']) ? 'error-input' : '' ?>"
        >
        <?php if (!empty($errors['endDate'])): ?>
            <p class="error-text"><?= htmlspecialchars($errors['endDate']) ?></p>
        <?php endif; ?>
    </div>

    <div>
        <label for="description">Description</label>
        <input
            type="text"
            name="description"
            id="description"
            value="<?= htmlspecialchars($old['description'] ?? '') ?>"
        >
    </div>

    <div>
        <label for="budget">Budget *</label>
        <input
            type="text"
            name="budget"
            id="budget"
            value="<?= htmlspecialchars($old['budget'] ?? '') ?>"
            class="<?= !empty($errors['budget']) ? 'error-input' : '' ?>"
        >
        <?php if (!empty($errors['budget'])): ?>
            <p class="error-text"><?= htmlspecialchars($errors['budget']) ?></p>
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
            <p class="error-text"><?= htmlspecialchars($errors['transport']) ?></p>
        <?php endif; ?>
    </fieldset>

    <input type="submit" value="Submit">
</form>

</body>
</html>