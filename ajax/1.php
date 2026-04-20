<?php
$xml = simplexml_load_file("books.xml");

// Get search value if provided
$searchAuthor = isset($_GET['author']) ? $_GET['author'] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books Library</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 70%; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; }
        th { background: #f2f2f2; }
        input { padding: 6px; }
    </style>
</head>
<body>

<h2>Book Library (XML Query System)</h2>

<!-- Search Form -->
<form method="GET">
    <label>Search by Author:</label>
    <input type="text" name="author" placeholder="Enter author name">
    <button type="submit">Search</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Year</th>
    </tr>

<?php
foreach ($xml->book as $book) {

    // If search is active, filter by author
    if ($searchAuthor != "" && stripos($book->author, $searchAuthor) === false) {
        continue;
    }

    echo "<tr>";
    echo "<td>" . $book->id . "</td>";
    echo "<td>" . $book->title . "</td>";
    echo "<td>" . $book->author . "</td>";
    echo "<td>" . $book->year . "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>