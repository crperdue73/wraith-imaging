#!/bin/bash
. ../../lib/common/functions.sh
handleError() {
    echo "$1"
    exit $2
}
[[ ! -f /opt/wraith/.wraithsettings ]] && handleError "    No wraith settings found so nothing to work from" 1
. /opt/wraith/.wraithsettings
[[ ! -d $docroot ]] && handleError "    No web folder found" 2
case $osid in
    1|2)
        if [[ -z $docroot ]]; then
            docroot="/var/www/html/"
            webdirdest="${docroot}wraith/"
        elif [[ $docroot != *'wraith'* ]]; then
            webdirdest="${docroot}wraith/"
        else
            webdirdest="${docroot}/"
        fi
        if [[ $osid -eq 2 ]]; then
            if [[ $docroot == /var/www/html/ && ! -d $docroot ]]; then
                docroot="/var/www/"
                webdirdest="${docroot}wraith/"
            fi
        fi
        ;;
    3)
        if [[ -z $docroot ]]; then
            docroot="/var/www/html/"
            webdirdest="${docroot}wraith/"
        elif [[ $docroot != *'wraith'* ]]; then
            webdirdest="${docroot}wraith/"
        else
            webdirdest="${docroot}/"
        fi
        ;;
esac
[[ ! -d $webdirdest ]] && handleError "    No wraith web directory found" 3
[[ -f ${webdirdest}lib/wraith/system.class.php ]] && configpath=${webdirdest}lib/wraith/system.class.php || configpath=${webdirdest}lib/wraith/System.clss.php
[[ ! -f $configpath ]] && handleError "    No config file found" 4
OS=$(uname -s)
[[ $OS =~ ^[^Ll][^Ii][^Nn][^Uu][^Xx]$ ]] && handleError "    We only support these utilities on Linux OS's" 6
clear
displayBanner
dots "Checking running version"
version=$(awk -F\' /"define\('WRAITH_VERSION'[,](.*)"/'{print $4}' $configpath | tr -d '[[:space:]]')
[[ -z $version ]] && (echo "Failed" && handleError "Could not find version of WRAITH" 7)
echo "Done"
echo " * Running WRAITH Version: $version"
