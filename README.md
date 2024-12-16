*configuring AWS*
created security groups, set inboundary rule of port 80 to any ipv4 and port 22 for my ip
created keypair to ssh into it
created an EC2 instance with ubuntu as OS
attached security group and keypair to it
then opened vagrant and ssh into the EC2 instance

*Installing required packages*
first sudo apt-get update
then sudo apt-get install apache2 mysql-server php libapache2-mod-php php-mysql to install necessary p>
then started apache and sql and enabled it by
sudo systemctl start apache2
sudo systemctl enable apache2
sudo systemctl start mysql
sudo systemctl enable mysql

created index.html containing hello world using command echo "<h1>Hello World\!</h1>" | sudo tee /var/>
tested by writing http://54.152.82.35 on my web browser and it showed hello world!

created php file containing hello world using command echo "<?php echo 'Hello World!'; ?>" | sudo tee >
tested by writing http://54.152.82.35 on my web browser and it showed hello world!

*configure MySql*
installed secure using sudo mysql_secure_installation
logged in using root user sudo mysql -u root -p
then created a user with a password, gave it privileges
CREATE DATABASE web_db;
CREATE USER 'web_user'@'localhost' IDENTIFIED BY 'StrongPassword123#';
GRANT ALL PRIVILEGES ON web_db.* TO 'web_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;

*change the website to use the database*
modified the php file index.php with new user of db to connect to apache server and show the ip
sudo nano /var/www/html/index.php to open the file
then wrote
<?php
$server = 'localhost';
$username = 'web_user';
$password = 'StrongPassword123';
$dbname = 'web_db';

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$time = date("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];

echo "Hello! Your IP is $ip. Current server time is $time.";
$conn->close();
?>

tested by writing http://54.152.82.35 on my web browser and it showed my ip and time