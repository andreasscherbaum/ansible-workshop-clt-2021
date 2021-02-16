<!DOCTYPE html>
<html>
<head>
    <title>Datenbank Beispiel</title>
    <meta charset="utf-8">
</head>

<body>
    <h1>Datenbank Beispiel</h1>
    <p>
<?php

# connect to database
$conn = pg_connect("host={{ hostvars['host1'].ansible_host }} dbname='test' user='test' password='{{ lookup('password', '../../db-account-test.txt chars=ascii_letters,digits length=12') }}'");
if (!$conn) {
    die('Could not connect: ' . pg_last_error());
}

# select the database version
$query = 'SELECT pg_catalog.version() AS version';
$result = pg_query($query);
if (!$result) {
    die('Query failed: ' . pg_last_error());
}

# print result
$line = pg_fetch_assoc($result);
print "PostgreSQL Version: " . $line['version'] . "<br/><br/><br/>\n";

# free resultset
pg_free_result($result);



# select databases
$query = 'SELECT * FROM pg_catalog.pg_database ORDER BY oid';
$result = pg_query($query);
if (!$result) {
    die('Query failed: ' . pg_last_error());
}

print "Tabellen in Datenbank:<br/><br/>\n";
print "<ul>\n";

while ($line = pg_fetch_assoc($result)) {
    print "<li>" . $line['datname'] . "</li>\n";
}

print "</ul>\n";


# free resultset
pg_free_result($result);

# close connection
pg_close($dbconn);

?>
    </p>
</body>

</html>
