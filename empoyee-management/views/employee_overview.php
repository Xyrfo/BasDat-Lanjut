<?php
$conn = pg_connect("host=localhost dbname=company_rifo user=postgree password=000000");

$query = "
SELECT 
    COUNT(*) AS total_employees,
    SUM(salary) AS total_monthly_salary,
    AVG(EXTRACT(YEAR FROM AGE(join_date))) AS avg_tenure
FROM employees
";

$result = pg_query($conn, $query);
$row = pg_fetch_assoc($result);

echo "<h2>Ringkasan Karyawan</h2><table border='1'>";
echo "<tr><th>Total Karyawan</th><th>Total Gaji/Bulan</th><th>Rata-rata Masa Kerja (tahun)</th></tr>";
echo "<tr>
        <td>{$row['total_employees']}</td>
        <td>{$row['total_monthly_salary']}</td>
        <td>{$row['avg_tenure']}</td>
    </tr>";
echo "</table>";
?>
