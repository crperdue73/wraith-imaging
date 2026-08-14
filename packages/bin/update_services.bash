#!/bin/bash

WRAITHROOT="$1"
WRAITHSERVICEROOT="$WRAITHROOT/packages/service"
SERVICEROOT="$2"

if [ `whoami` != "root" ]; then
    echo "Must run as root."
    exit 1
fi

if [ ! -d "$WRAITHROOT" ]; then
    echo "usage: $0 wraithrootdir servicerootdir"
    exit 1
fi

if [ ! -d "$SERVICEROOT" ]; then
    echo "usage: $0 wraithrootdir servicerootdir"
    exit 1
fi

CONFIG_FILE="config.php"
CONFIG_FILE_SRC="${SERVICEROOT}/etc/${CONFIG_FILE}"
BAK_CONFIG_FILE="/tmp/${CONFIG_FILE}"

if [ ! -e "$CONFIG_FILE_SRC" ]; then
    echo "$CONFIG_FILE_SRC doesn't exist."
    exit 1
else
    echo "Backing up $CONFIG_FILE_SRC to $BAK_CONFIG_FILE."
    cp -f "$CONFIG_FILE_SRC" "$BAK_CONFIG_FILE"
fi

echo "Copying from $WRAITHSERVICEROOT to $SERVICEROOT"
tar -cf - -C "$WRAITHSERVICEROOT" . | tar -xf - -C "$SERVICEROOT"

echo "Restoring $CONFIG_FILE_SRC from $BAK_CONFIG_FILE."
cp -f "$BAK_CONFIG_FILE" "$CONFIG_FILE_SRC" 

echo "Fixing ownership"
chown -R root:root "$SERVICEROOT"

exit 0
