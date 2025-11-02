<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/style.css">
    <style>
       
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color:darkgray;
            font-size: 24px;
        }
        
        .centered-text {
            text-align: center;
            font-size: 28px;
            margin: 20px 0;
        }
        
        .labi {
            text-align: right;
            margin-right: 20px;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px;
        }

        .form-container {
            display: flex;
            align-items: center;
        }

        .form-container p {
            margin-right: 10px;
            margin-bottom: 0;
        }

        select {
            padding: 5px;
        }
    </style> 
</head>
<body>

    <p class="centered-text">Stundu Saraksts priekš <?= isset($groupId) ? $groupName : "nav izvēlēta grupa"?></p> 

    <?php foreach ($timetable[$groupName] as $date => $days): ?>
    <div class="container">
        <form action="/controllers/apiController.php" method="post" id="groupForm" class="form-container">
            <div style="display: flex; flex-direction: column;">
                <b><p style="margin-bottom: 5px;">Izvēlies grupu:</p></b>
                <select name="group" id="group" onchange="this.form.submit()">
                    <?php foreach ($groups['data'] as $group): ?>
                        <option value="<?= $group['id'] ?>" <?= $group['id'] == $groupId ? "selected" : "" ?>><?= $group['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </form>
        <h2>Nedēļa: <?= $date ?></h2>
    </div>

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
                                        <b><p><?= substr($lesson['start'], 0, 5) ?>-<?= substr($lesson['end'], 0, 5) ?></p></b>
                                        <h2><p><?= $lesson['name'] ?></p></h2>
                                        <p> <b>Telpa:  </b><?= $lesson['class'] ?><br>  <b> Pasniedzējs:  </b><?= $lesson['teacher'] ?></p>
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