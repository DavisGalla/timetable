<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    </style> 
</head>
<body>

    <p class="centered-text">Stundu Saraksts priekš <?= isset($groupId) ? $groupName : "nav izvēlēta grupa"?></p> 

    <?php foreach ($timetable[$groupName] as $date => $days): ?>
          <h2 class="labi">Nedēļa: <?= $date ?></h2>
    <div class="container">
        <form action="/controllers/apiController.php" method="post" id="groupForm" class="form-container">
            <div style="display: flex; flex-direction: column;">
                <b><p style="margin-bottom: 5px; color:red;">Izvēlies grupu:</p></b>
                <select name="group" id="group" onchange="this.form.submit()">
                    <?php foreach ($groups['data'] as $group): ?>
                        <option value="<?= $group['id'] ?>" <?= $group['id'] == $groupId ? "selected" : "" ?>><?= $group['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
    </div>
     <div class="timetable-container">
        <div class="timetable-row">
            <?php foreach ($days as $dayInfo): ?>
                <div class="timetable-card">
                    <div class="card-header">
                        <h2><?= htmlspecialchars($dayInfo['day']) ?></h2>
                    </div>
                    <div class="card-content">
                        <?php if (isset($dayInfo['data']) && is_array($dayInfo['data'])): ?>
                            <?php foreach ($dayInfo['data'] as $lesson): ?>
                                <div class="lesson-block">
                                    <div class="lesson-time">
                                        <?= htmlspecialchars(substr($lesson['start'], 0, 5)) ?>
                                        -
                                        <?= htmlspecialchars(substr($lesson['end'], 0, 5)) ?>
                                    </div>
                                    <div class="lesson-name">
                                        <?= htmlspecialchars($lesson['name']) ?>
                                    </div>
                                    <div class="lesson-details">
                                        <div class="lesson-room">
                                            <p> <b>Telpa:  </b><?= $lesson['class'] ?> 
                                            <p><b> Pasniedzējs:  </b><?= $lesson['teacher']?> </p>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="no-lessons">Nav nodarbību</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>