# Changelog of ATVG-CAD

----

# Development

### 1.3.2.0  
(18.02.2019)  
[Based on OpenCAD 0.2.6]

* Base: This is a major base upgrade.
  * Final update of content to sync with Arena Wars and Christmas Holiday (2019) update(s)
* Refactor database structure file to prevent any kind of `default value` issues (Closes #40)
* Fix possible issues with error_blobs and html special chars
* Improve CSS on register page (Closes #39)
* Fix civ panel not working
  * Implement maximum identity feature
* Make roles 1 based not 0
* Fix automated civ registration
* Pevent moderator to set himself administrator
* Limit number of Civ Identities
* Limit number of Civ Vehicles
* Limit number of Civ Weapons
* Move search_name and search_plate to actions
* Migrate search_name and search_plate to PDO

**BREAKING UPDATE**

This update will break you current installation of ATVG-CAD, to make it work the Database structure needs to be reimported to apply all new changes. The update cant be done with the internal Updater!

----

# 1.3

### 1.3.1.1  
(15.01.2019)  
[Based on OpenCAD 0.2.6]

* Remove 418 error code from htaccess as it causes issues on some apache2 configurations

### 1.3.1.0  
(15.01.2019)  
[Based on OpenCAD 0.2.6]

* Base: This is a major base upgrade.
  * Move logout in sidebar to bottom
  * Spellfixes
  * Seperate hair colors strawberry and blonde
* Update-Notify can now be set to BETA and NIGHTLY channels (which will be available in the future)

ATVG-CAD originaly was forked from OpenCAD 0.2.2.7 and was fastly upgraded to OpenCAD 0.2.3 and got some patches for 0.2.4. This is the update to OpenCAD 0.2.6 Development.

### 1.3.0.0
(02.01.2019)  
[Based on OpenCAD 0.2.3.2]

* Mod: Api Security

**BREAKING UPDATE**

This update will break you current installation of ATVG-CAD, to make it work the Database structure needs to be reimported to apply all new changes. The update cant be done with the internal Updater!

# 1.2

### 1.2.0.1
(02.01.2019)  
[Based on OpenCAD 0.2.3.2]

* Add: jsimport for simpler JS imports
* Fix: Show update password dialog
* Fix: Enable missing JS features
* Del: Unused plugin captcha 

### 1.2.0.0
(25.11.2018)  
[Based on Opencad 0.2.3.2]

* Add: Updater (#19)
* Add: Error Page (#31)
* Fix: Moderator have the abilities to suspend Admin (#30)
* Fix: Cant delete vehicles from database (#32)

# 1.1

### 1.1.0.9
(18.10.2018)  
[Based on OpenCAD 0.2.3.2]

* Fix: Change password error

### 1.1.0.8
(01.10.2018)  
[Based on OpenCAD 0.2.3.2]

* Fix #29
* Fix [OCPHP-402](https://jira.opencad.io/browse/OCPHP-402)
* Fix: AOP not setable after fresh installation

### 1.1.0.7
(23.09.2018)  
[Based on OpenCAD 0.2.3]

* Fixing wrong name on 'AOP' modal
* Fix department selector

### 1.1.0.6
(08.09.2018)  
[Based on OpenCAD 0.2.3]

* Fixing Bugs:
  * Civilian unable to submit 911 calls
  * Admin unable to delete vehicle from NCIC Vehicle DB

### 1.1.0.5
(02.09.2018)  
[Based on OpenCAD 0.2.3]

* Adding session opening (*facepalm)

### 1.1.0.4
(02.09.2018)  
[Based on OpenCAD 0.2.3]

* Fixing a number of bugs

(Thanks to @SmokeyDaLion for pointing out some bugs)

### 1.1.0.3
(02.09.2018)  
[Based on OpenCAD 0.2.3]

* New feature: Update Notifyer (#18)

# 1.0

### 1.0.0.3
(02.09.2018)  
[Based on OpenCAD 0.2.3]

* Make check of Security Patch 1.0.0.2 optinal and disabled by default (#23)
* Fixing Bugs:
  * #24

### 1.0.0.2
(02.09.2018)  
[Based on OpenCAD 0.2.3]

* Security Patch
  * Adding check if a Session and Cookie exist on requests
  * Asking for API_KEY when requesting without Session and Cookie
* Adding [Contribution Guidline](contribuging.md)
* Adding GitLab Templates
* Deleting GitHub Templates

### 1.0.0.1
(01.09.2018)  
[Based on OpenCAD 0.2.3]

* Fixing Bugs:
  * #8
  * #16
  * #17
  * #20
  * #21
* Upgrading information about ATVG-CAD

### 1.0.0.0
(01.09.2018)  
[Based on OpenCAD 0.2.3]

* Migration from `mysqli` to `PDO`
* Base Patches:
  * OCPHP-344
  * OCPHP-388
  * OCPHP-390

-----
##### Important note for development after 1st September

* New versioning:  
  * Format: Major, Minor, Base, Patch
    * Major = Huge change
    * Minor = New feature
    * Base  = Any changes from OpenCAD
    * Patch = Small changes
* New release cycle
  * Every week we merge changes from OpenCAD, these changes are merged on sundays
* New branch structure
  * Stable     = Stable running (tested) version
  * Major      = Development of big changes (Majors)
  * Feature    = Development of features (Minors)
  * Feature/** = Development of feature parts (Merges into Feature)
  * Merge      = Changes from OpenCAD (Will be created and merge on sundays) (Bases)
  * Devel      = Development of small changes (Patches)
* New changelog structure
  * Changelog now lists all changes more direct and detailed.
  * Together with this file CHANGELOG.lbl lists a even more detail list of files that changed between versions.