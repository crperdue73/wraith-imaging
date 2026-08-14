#!/bin/bash

# Get the OS Information.
read -r os_name os_version <<< $(lsb_release -ir | cut -d':' -f2 | sed -e 's/^[[:space:]]*//' -e 's/[[:space:]]*$//' | tr '\n' ' ')

# Try another method if lsb_release is not installed or returned empty values
[[ -z $os_name ]] && os_name=$(sed -n 's/^NAME=\(.*\)/\1/p' /etc/os-release | tr -d '"')
[[ -z $os_version ]] && os_version=$(sed -n 's/^VERSION_ID=\([^.]*\).*/\1/p' /etc/os-release | tr -d '"')

# Get the WRAITH Version.
source /opt/wraith/.wraithsettings
system_class_php=${docroot}/${webroot}/lib/wraith/system.class.php
wraith_version=$(cat ${system_class_php} | grep WRAITH_VERSION | cut -d',' -f2 | cut -d"'" -f2)

# Construct correct mysql options.
options="-sN"
if [[ $snmysqlhost != "" ]]; then
        options="$options -h$snmysqlhost"
fi
if [[ $snmysqluser != "" ]]; then
        options="$options -u$snmysqluser"
fi
if [[ $snmysqlpass != "" ]]; then
        options="$options -p$snmysqlpass"
fi
options="$options -D $mysqldbname -e"

# Construct sql statements.
WRAITH_TFTP_PXE_KERNEL_32_select='select settingValue from globalSettings WHERE settingKey = "WRAITH_TFTP_PXE_KERNEL_32";'
WRAITH_TFTP_PXE_KERNEL_select='select settingValue from globalSettings WHERE settingKey = "WRAITH_TFTP_PXE_KERNEL";'
WRAITH_TFTP_PXE_KERNEL_DIR_select='select settingValue from globalSettings WHERE settingKey = "WRAITH_TFTP_PXE_KERNEL_DIR";'
WRAITH_HOSTS_KERNELS_select='SELECT UNIQUE hostKernel FROM hosts;'

# Execute sql statements, get values.
WRAITH_TFTP_PXE_KERNEL_32=$(mysql $options "$WRAITH_TFTP_PXE_KERNEL_32_select")
WRAITH_TFTP_PXE_KERNEL=$(mysql $options "$WRAITH_TFTP_PXE_KERNEL_select")
WRAITH_TFTP_PXE_KERNEL_DIR=$(mysql $options "$WRAITH_TFTP_PXE_KERNEL_DIR_select")
WRAITH_HOST_KERNELS=$(mysql $options "$WRAITH_HOSTS_KERNELS_select")

# Get kernel information.
## Begin building the JSON array to send.
kernel_versions_info='['

# Begin processing global 32 bit kernel.
# Check if 32 bit global kernel file exists.
if [[ -f ${WRAITH_TFTP_PXE_KERNEL_DIR}${WRAITH_TFTP_PXE_KERNEL_32} ]]; then
    # Get file information.
    file_information=$(file --no-pad --brief ${WRAITH_TFTP_PXE_KERNEL_DIR}${WRAITH_TFTP_PXE_KERNEL_32})
    # Check if this is a linux kernel or not.
    if [[ "${file_information}" == *"Linux kernel"* ]]; then
        # Here, we are pretty sure the current file we're looking at is a Linux kernel. Parse the version information.
        version=$(echo ${file_information} | cut -d, -f2 | sed 's/version*//' | cut -d "#" -f 1 | xargs)
        # If there are any double quotes in this version information, add a backslash in front of them for JSON escaping.
        version=$(echo $version | sed 's/"/\\"/g')
	# Wrap the version in double quotes for JSON syntax.
        version="\"${version}\""
        # Check if the last character in the kernel_versions_info variable is a double quote. If so, add a leading comma.
        if [[ "${kernel_versions_info: -1}" == '"' ]]; then
            version=",${version}"
        fi
        # Append version to kernel_versions_info JSON list.
        kernel_versions_info="${kernel_versions_info}${version}"
    fi
fi

# Begin processing 64 bit global kernel.
# Check if global kernel file exists.
if [[ -f ${WRAITH_TFTP_PXE_KERNEL_DIR}${WRAITH_TFTP_PXE_KERNEL} ]]; then
    # Get file information.
    file_information=$(file --no-pad --brief ${WRAITH_TFTP_PXE_KERNEL_DIR}${WRAITH_TFTP_PXE_KERNEL})
    # Check if this is a linux kernel or not.
    if [[ "${file_information}" == *"Linux kernel"* ]]; then
        # Here, we are pretty sure the current file we're looking at is a Linux kernel. Parse the version information.
        version=$(echo ${file_information} | cut -d, -f2 | sed 's/version*//' | cut -d "#" -f 1 | xargs)
        # If there are any double quotes in this version information, add a backslash in front of them for JSON escaping.
        version=$(echo $version | sed 's/"/\\"/g')
        # Wrap the version in double quotes for JSON syntax.
        version="\"${version}\""
        # Check if the last character in the kernel_versions_info variable is a double quote. If so, add a leading comma.
        if [[ "${kernel_versions_info: -1}" == '"' ]]; then
            version=",${version}"
        fi
        # Append version to kernel_versions_info JSON list.
        kernel_versions_info="${kernel_versions_info}${version}"
    fi
fi

# Begin processing each unique host kernel that is not a global kernel.
for host_kernel in $WRAITH_HOST_KERNELS; do
    # Check if this is the name of the 32 or 64 bit global kernel. If so, skip it.
    if [[ "${host_kernel}" != "${WRAITH_TFTP_PXE_KERNEL}" && "${host_kernel}" != "${WRAITH_TFTP_PXE_KERNEL_32}" ]]; then
        if [[ -f ${WRAITH_TFTP_PXE_KERNEL_DIR}${host_kernel} ]]; then
            # Get file information.
            file_information=$(file --no-pad --brief ${WRAITH_TFTP_PXE_KERNEL_DIR}${host_kernel})
            # Check if this is a linux kernel or not.
            if [[ "${file_information}" == *"Linux kernel"* ]]; then
                # Here, we are pretty sure the current file we're looking at is a Linux kernel. Parse the version information.
                version=$(echo ${file_information} | cut -d, -f2 | sed 's/version*//' | cut -d "#" -f 1 | xargs)
                # If there are any double quotes in this version information, add a backslash in front of them for JSON escaping.
                version=$(echo $version | sed 's/"/\\"/g')
                # Wrap the version in double quotes for JSON syntax.
                version="\"${version}\""
                # Check if the last character in the kernel_versions_info variable is a double quote. If so, add a leading comma.
                if [[ "${kernel_versions_info: -1}" == '"' ]]; then
                    version=",${version}"
                fi
                # Append version to kernel_versions_info JSON list.
                kernel_versions_info="${kernel_versions_info}${version}"
            fi
        fi
    fi    
done

# Finish JSON list formatting.
kernel_versions_info="${kernel_versions_info}]"

# Format payload.
payload='{"wraith_version":"'${wraith_version}'","os_name":"'${os_name}'","os_version":"'${os_version}'","kernel_versions_info":'${kernel_versions_info}'}'

#echo "os_name=${os_name}"
#echo "os_version=${os_version}"
#echo "wraith_version=${wraith_version}"
#echo "kernel_versions_info=${kernel_versions_info}"
#echo "payload=${payload}"

# Send to reporting endpoint.
curl -s -X POST -H "Content-Type: application/json" -d "${payload}" https://wraith-external-reporting-entries.wraithproject.us:/api/records
