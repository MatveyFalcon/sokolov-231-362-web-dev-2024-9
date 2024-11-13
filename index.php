<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Соколов Матвей Олегович 231-362 Лабораторная работа №9 – Вариант 4</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>

    <header>
        <img src="images/logo.png" alt="Логотип университета" style="width: 10%" class="logo">
        <h2>Соколов Матвей Олегович 231-362 Лабораторная работа №9 – Вариант 4</h2>
    </header>

    <main>
        <h2>Результаты вычислений функции</h2>

        <?php
        // Инициализация параметров
        $x = 1;
        $step = 1;
        $encounting = 20;
        $type = 'D'; // Тип верстки
        $min_value = -1000;
        $max_value = 1000;

        // Инициализация переменных для статистики
        $sum = 0;
        $count = 0;
        $min = PHP_INT_MAX;
        $max = PHP_INT_MIN;

        // Определение текстового названия типа верстки
        $type_names = [
            'A' => 'Простая верстка',
            'B' => 'Маркированный список',
            'C' => 'Нумерованный список',
            'D' => 'Табличная верстка',
            'E' => 'Блочная верстка'
        ];
        $type_text = $type_names[$type] ?? 'Неизвестный тип';

        // Начало таблицы для типа 'D'
        if ($type === 'D') {
            echo "<table><tr><th>#</th><th>x</th><th>f(x)</th></tr>";
        }

        // Начало нумерованного списка для типа 'C'
        if ($type === 'C') {
            echo "<ol>";
        }

        // Вычисление значений функции
        for ($i = 0; $i < $encounting; $i++, $x += $step) {
            if ($x <= 10) {
                // Проверка на деление на ноль
                $f = ($x == 5) ? "error" : (5 - $x) / (1 - $x / 5);
            } elseif ($x > 10 && $x < 20) {
                $f = ($x * $x / 4) + 7;
            } else {
                $f = 2 * $x - 21;
            }

            if (is_numeric($f)) {
                $f = round($f, 3);
                if ($f >= $min_value && $f <= $max_value) {
                    $sum += $f;
                    $count++;
                    if ($f < $min) $min = $f;
                    if ($f > $max) $max = $f;
                }
            }

            // Вывод результатов в зависимости от типа верстки
            switch ($type) {
                case 'A':
                    echo "f({$x}) = {$f}<br>";
                    break;
                case 'B':
                    echo "<ul><li>f({$x}) = {$f}</li></ul>";
                    break;
                case 'C':
                    echo "<li>f({$x}) = {$f}</li>";
                    break;
                case 'D':
                    echo "<tr><td>" . ($i + 1) . "</td><td>{$x}</td><td>{$f}</td></tr>";
                    break;
                case 'E':
                    echo "<div class='block'>f({$x}) = {$f}</div>";
                    break;
            }
        }

        // Закрытие нумерованного списка для типа 'C'
        if ($type === 'C') {
            echo "</ol>";
        }

        // Закрытие таблицы для типа 'D'
        if ($type === 'D') {
            echo "</table>";
        }

        // Среднее значение
        $avg = $count > 0 ? $sum / $count : 0;

        // Вывод статистики
        echo "<div class='stats'>";
        echo "<p>Сумма значений функции: $sum</p>";
        echo "<p>Среднее арифметическое: $avg</p>";
        echo "<p>Минимальное значение: $min</p>";
        echo "<p>Максимальное значение: $max</p>";
        echo "</div>";
        ?>
    </main>

    <footer>
        <p>Тип верстки: <?php echo $type_text; ?></p>
    </footer>

</body>

</html>