<?
function rash_rss()
{
    require('settings.php');
    require('connect.php');
//    require($template); what the fuck do you need this for (its what broke it btw)
    $query = "SELECT id, quote, rating, flag FROM rash_quotes ORDER BY id DESC LIMIT 15"; 

    $res =& $db->query($query);
    print "<?xml version=\"1.0\" ?>\n";
    print "<rss version=\"0.92\">\n";
    print "<channel>\n";
    print "<title>".$rss_title."</title>\n";
    print "<description>Rash Quote Management System is a PHP script for the management of quotes, similar in function to that in use at http://bash.org</description>\n";
    print "<link>".$rss_url."</link>\n";

    while($row=$res->fetchRow(DB_FETCHMODE_ASSOC))
    {
     print "<item>\n";
     print "<title>".$rss_url."/?".$row['id']."</title>\n";
     print "<description>".nl2br($row['quote'])."</description>\n";
     print "<link>".$rss_url."/?".$row['id']."</link>\n";
     print "</item>\n\n";
    }
print "</channel></rss>";
}


?>
