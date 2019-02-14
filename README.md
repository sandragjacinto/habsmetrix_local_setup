How to get the local environment ready
===========

1) install mamp/wamp/xamp;
2) download the file "wordpress-5.0.3.zip";
3) unzip inside the htdocs (created by mamp); -> give it the name you want
4) create a database in phpMyAdmin (localhost);
5) inside your wordpress folder copy the file "wp-config.sample.php" and change the name to "wp-config.php";
6) edit wp-config :
    // ** MySQL settings - You can get this info from your web host ** //
    /** The name of the database for WordPress */
    define('DB_NAME', 'YOUR DATABASE NAME');

    /** MySQL database username */
    define('DB_USER', 'root');

    /** MySQL database password */
    define('DB_PASSWORD', 'root');

    /** MySQL hostname */
    define('DB_HOST', 'localhost');
8) inside your wordpress folder themes paste the habs_test folder;
8) inside your wordpress folder plugin paste the plugins you can find here;
9) in your wordpress local website activate the theme and the 4 plugins;
10) ACF plugin: synchronize all;
11) CPT UI > tools paste all the text inside the CPT_UI.json file from github; 
12) Wordpress > tools > import > install Wordpress importer > launch importer > choose file > "wordpress_content.xml"
13) import "habsmetrix_db.zip" to the created database;