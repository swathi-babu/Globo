# Globo Website Redesign

### 1. Clone the repository
```
git clone https://github.com/sourcebitsllc/Globo.git
```

### 2. Install node packages
* __TODO: Add node and npm installation instructions__
* Navigate to the globo theme directory
	* `cd Globo/wp-content/themes/globo`
* Install packages
	* `npm install`

### 3. Configure `wp-config-sample`:
* Change the file to match the example below:
```
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'globo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');
```
* Once changed, rename the file to `wp-config.php`.

### 4. MAMP
* If you don't already have MAMP or WAMP installed, download it [here](http://www.mamp.info/en/downloads/).
* Set the document root
	* Open MAMP and select 'Preferences'
	* Click the folder icon next to 'Document Root'
	* Select the Globo repository
	* When the web start page launches in your browser:
		* Tools > phpMyAdmin
		* Databases Tab
		* Create aDatabase (at the top) named globo
		* Leave the dropdown at collation

### 5. Run the WordPress install
* Point your browser at `localhost:8888`
	* You can set your port preferences in MAMP > Ports > Apache Port
* Follow the steps for installation

### 6. Switch to Globo Theme
* Once logged in choose Appearance > Themes > globo

### 7. Helpful Stuff
* Google Maps Static API Key: `AIzaSyAEZ_q2owl-ltSHP5_1A1WnCvkB951jbRQ`
