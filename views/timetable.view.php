<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="/controllers/apiController.php" method="post">
        <p>Select a Group:</p>
        <select name="group" id="group">
            <?php foreach ($groups['data'] as $group): ?>
                <option value="<?= $group['id'] ?>" <?= $group['id'] == $groupId ? "selected" : "" ?>><?= $group['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Submit</button>
    </form>

    <p>Stundu Saraksts priekš <?= isset($groupId) ? $groupName : "nav izvēlēta grupa"?></p> 

    <?php foreach ($timetable[$groupName] as $date => $days): ?>
            <h2>Nedēļa: <?= $date ?></h2>

            <table>
                <thead>
                    <tr>
                        <?php foreach ($days as $dayInfo): ?>
                            <th><?= $dayInfo['day'] ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $maxLessons = max(array_map(function($day) { return count($day['data']); }, $days));
                    ?>
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <tr>
                            <?php foreach ($days as $dayInfo): ?>
                                <td>
                                    <?php if (isset($dayInfo['data'][$i])): ?>
                                        <?php $lesson = $dayInfo['data'][$i]; ?>
                                        <p><?= substr($lesson['start'], 0, 5) ?>-<?= substr($lesson['end'], 0, 5) ?></p>
                                        <p><?= $lesson['name'] ?></p>
                                        <p>Telpa: <?= $lesson['class'] ?> | Pasniedējs: <?= $lesson['teacher'] ?></p>
                                    <?php endif; ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    

    
</body>
</html>