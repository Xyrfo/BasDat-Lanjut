<?php
$conn = pg_connect("host=localhost dbname=yourdb user=youruser password=yourpass");

$query = "
SELECT 
    CASE 
    WHEN EXTRACT(YEAR FROM AGE(join_date)) < 1 THEN 'Junior'
    WHEN EXTRACT(YEAR FROM AGE(join_date)) BETWEEN 1 AND 3 THEN 'Middle'
    ELSE 'Senior'
    END AS tenure_level,
    COUNT(*) AS employee_count
FROM employees
GROUP BY tenure_level
";

$result = pg_query($conn, $query);

echo "<h2>Karyawan Berdasarkan Masa Kerja</h2><table border='1'>";
echo "<tr><th>Kategori</th><th>Jumlah</th></tr>";
while ($row = pg_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['tenure_level']}</td>
            <td>{$row['employee_count']}</td>
        </tr>";
}
echo "</table>";
?>
