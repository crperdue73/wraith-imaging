#  WRAITH is a computer imaging solution.
#  Copyright (C) 2007  Chuck Syperski & Jian Zhang
#
#   This program is free software: you can redistribute it and/or modify
#   it under the terms of the GNU General Public License as published by
#   the Free Software Foundation, either version 3 of the License, or
#   any later version.
#
#   This program is distributed in the hope that it will be useful,
#   but WITHOUT ANY WARRANTY; without even the implied warranty of
#   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#   GNU General Public License for more details.
#
#   You should have received a copy of the GNU General Public License
#   along with this program.  If not, see <http://www.gnu.org/licenses/>.
[[ -z $username || "x$username" = "xwraith" ]] && username="wraithproject"
[[ -z $webdirsrc ]] && webdirsrc="../packages/web"
[[ -z $tftpdirsrc ]] && tftpdirsrc="../packages/tftp"
[[ -z $buildipxesrc ]] && buildipxesrc="../utils/WRAITHiPXE"
[[ -z $udpcastsrc ]] && udpcastsrc="../packages/udpcast-20250223.tar.gz"
[[ -z $udpcastout ]] && udpcastout="udpcast-20250223"
[[ -z $servicesrc ]] && servicesrc="../packages/service"
[[ -z $servicedst ]] && servicedst="/opt/wraith/service"
[[ -z $servicelogs ]] && servicelogs="/opt/wraith/log"
[[ -z $wraithprogramdir ]] && wraithprogramdir="/opt/wraith"
[[ -z $nfsconfig ]] && nfsconfig="/etc/exports"
[[ -z $nfsservice ]] && nfsservice="nfs-server nfs-kernel-server nfs"
[[ -z $sqlclientlist ]] && sqlclientlist="mariadb-client mariadb MariaDB-client mysql"
[[ -z $sqlserverlist ]] && sqlserverlist="mariadb-galera-server mariadb-server MariaDB-Galera-server MariaDB-server mysql-server"
command -v systemctl >>$error_log 2>&1
exitcode=$?
ps -p 1 -o comm= | grep systemd >>$error_log 2>&1
bootcode=$?
[[ $exitcode -eq 0 && $bootcode -eq 0 && -z $systemctl ]] && systemctl="yes"
if [[ $systemctl == yes ]]; then
    initdsrc="../packages/systemd"
    initdMCfullname="WRAITHMulticastManager.service"
    initdIRfullname="WRAITHImageReplicator.service"
    initdSDfullname="WRAITHScheduler.service"
    initdSRfullname="WRAITHSnapinReplicator.service"
    initdSHfullname="WRAITHSnapinHash.service"
    initdPHfullname="WRAITHPingHosts.service"
    initdISfullname="WRAITHImageSize.service"
    case $linuxReleaseName_lower in
        *ubuntu*|*bian*|*mint*)
            initdpath="/lib/systemd/system"
            ;;
        *)
            initdpath="/usr/lib/systemd/system"
            ;;
    esac
    if [[ -e $initdpath/mariadb.service ]]; then
        ln -s $initdpath/{mariadb,mysql}.service >>$error_log 2>&1
        ln -s $initdpath/{mariadb,mysqld}.service >>$error_log 2>&1
        ln -s $initdpath/mariadb /etc/systemd/system/mysql.service >>$error_log 2>&1
        ln -s $initdpath/mariadb /etc/systemd/system/mysqld.service >>$error_log 2>&1
    elif [[ -e $initdpath/mysqld.service ]]; then
        ln -s $initdpath/mysql{d,}.service >>$error_log 2>&1
        ln -s $initdpath/mysqld.service /etc/systemd/system/mysql.service >>$error_log 2>&1
    fi
else
    initdpath="/etc/init.d"
    initdMCfullname="WRAITHMulticastManager"
    initdIRfullname="WRAITHImageReplicator"
    initdSDfullname="WRAITHScheduler"
    initdSRfullname="WRAITHSnapinReplicator"
    initdSHfullname="WRAITHSnapinHash"
    initdPHfullname="WRAITHPingHosts"
    initdISfullname="WRAITHImageSize"
    case $linuxReleaseName_lower in
        *ubuntu*|*bian*|*mint*)
            initdsrc="../packages/init.d/ubuntu"
            ;;
        *)
            initdsrc="../packages/init.d/redhat"
            ;;
    esac
fi
serviceList="$initdMCfullname $initdIRfullname $initdSRfullname $initdSDfullname $initdPHfullname $initdSHfullname $initdISfullname"
