<?php
$conn = pg_connect("host=localhost dbname=company_rifo user=postgree password=000000");

$query = "
SELECT department,
    AVG(salary) AS avg_salary,
    MAX(salary) AS max_salary,
    MIN(salary) AS min_salary
FROM employees
GROUP BY department
";

$result = pg_query($conn, $query);

echo "<h2>Statistik Gaji per Departemen</h2><table border='1'>";
echo "<tr><th>Departemen</th><th>Rata-rata</th><th>Tertinggi</th><th>Terendah</th></tr>";
while ($row = pg_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['department']}</td>
            <td>{$row['avg_salary']}</td>
            <td>{$row['max_salary']}</td>
            <td>{$row['min_salary']}</td>
        </tr>";
}
echo "</table>";
?>
