# ATVG-CAD
ATVG-CAD is ATVG's own version of OpenCAD.

**Info:**  
Please do not report any issues of ATVG-CAD to the OpenCAD team.  
For issues use our [issue tracker](https://gitlab.atvg-studios.at/atvg-studios/ATVG-CAD/issues) and notify us on [Mattermost](https://mattermost.atvg-studios.at).

# Git Branches

This is the ATVG-CAD branch structure:

* `master` - Continuous Development
* `2.0.x` - Patch level Development for stable release 2.0

Changes from master can only be merged into a patch level development branch, if the changes are considered compatible, stable and clean.

(Clean in this context means that no debugging statements are allowed)

# Major.Minor.Patch

This is a quick list to show what version number needs to be changed when what change occurs:

| Version | Release Type | Change |
|---------|--------------|--------|
|  X.0.0  | Major | incompatible with prior versions |
|  0.X.0  | Minor | compatible with prior versions |
|  0.0.X  | Patch | compatible with prior versions |

(The `X` represents the value being changed in the version)  
(This versioning is known as [semver](https://semver.org))

If a back-port from OpenCAD brings a incompatible change, a Major release will be triggered.
If a back-port from OpenCAD brings a compatible change, a Minor release will be triggered.

# OpenCAD
Open Source Computer Aided Dispatch System for GTA V Roleplay Communities.

## Installation Requirements
* Operating System: Linux or Windows
* Webserver: Apache or Nginx
* PHP: >= 7.2 (Recommended), 7.1 (Minimum)
* Database: MySQL 5.7 or MariaDB 10.2 (Recommended)

**Recommended**
* Operating System: Linux (Debian 9 | Ubuntu 18.04) or Unix (FreeBSD 12)
* Webserver: Apache 2.4.35
* PHP: 7.2.10
* Database: MariaDB 10.3.9

For this recommended setup, we will help you installing ATVG-CAD for a one-time-fee of 6 USD (or 5 EUR).  
Contact us on [Mattermost](https://mattermost.atvg-studios.at) to obtain the installation support.

#### Important
We do **NOT** recommend using systems like `XAMPP` for real world applications like OpenCAD!

The reason can be read [here](https://en.wikipedia.org/wiki/XAMPP#Usage):

>Officially, XAMPP's designers intended it for use only as a development tool, to allow website designers and programmers to test their work on their own computers without any access to the Internet. To make this as easy as possible, many important security features are disabled by default. XAMPP has the ability to serve web pages on the World Wide Web. A special tool is provided to
password-protect the most important parts of the package.

Instead of using XAMPP and bringing high security risks into your system, we recommend using LAMPP on Linux, WAMP on Windows, MAMP on macOS, BAMP on BSD or FAMP on FreeBSD as they were made for real world applications.

## Support

Having Trouble? create a issue in our [issue tracker](https://gitlab.atvg-studios.at/atvg-studios/ATVG-CAD/issues) or post your issue at [Mattermost](https://mattermost.atvg-studios.at) in the support channel.

## License

This project is licensed under the [GPL3](LICENSE) License.

# Disclosure of Fork
This version of ATVG-CAD is based on the Open-Source Project OpenCAD.  
The OpenCAD version we use is based on the original source from [Shane Gill](https://github.com/ossified/openCad).