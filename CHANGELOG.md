# Changelog of ATVG-CAD

Read the [Line-by-Line Changelog](CHANGELOG.lbl)

----
## 1.0.x

##### 1.0.0.2
(02.09.2018)  
[Based on OpenCAD 0.2.3]

* Security Patch
  * Adding check if a Session and Cookie exist on requests
  * Asking for API_KEY when requesting without Session and Cookie
* Adding [Contribution Guidline](contribuging.md)
* Adding GitLab Templates
* Deleting GitHub Templates

##### 1.0.0.1
(01.09.2018)  
[Based on OpenCAD 0.2.3]

* Fixing Bugs:
  * [#8](https://gitlab.atvg-studios.at/root/OpenCAD/issues/8)
  * [#16](https://gitlab.atvg-studios.at/root/OpenCAD/issues/16)
  * [#17](https://gitlab.atvg-studios.at/root/OpenCAD/issues/17)
  * [#20](https://gitlab.atvg-studios.at/root/OpenCAD/issues/20)
  * [#21](https://gitlab.atvg-studios.at/root/OpenCAD/issues/21)
* Upgrading information about ATVG-CAD

##### 1.0.0.0
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