#!/bin/bash
if [[ -r $1 ]]; then
  cert=$1
elif [[ -r /opt/wraith/snapins/ssl/CA/.wraithCA.pem ]]; then
  cert="/opt/wraith/snapins/ssl/CA/.wraithCA.pem"
fi

BUILDOPTS="CERT=${cert} TRUST=${cert}"
IPXEGIT="https://github.com/ipxe/ipxe"

# Change directory to base ipxe files
SCRIPT=$(readlink -f "$BASH_SOURCE")
WRAITHDIR=$(dirname $(dirname $(dirname "$SCRIPT") ) )
BASE=$(dirname "$WRAITHDIR")

if [[ -d ${BASE}/ipxe ]]; then
  cd ${BASE}/ipxe
  git clean -fd
  git reset --hard
  git pull
  cd src/
  # make sure this is being re-compiled in case the CA has changed!
  touch crypto/rootcert.c
else
  git clone ${IPXEGIT} ${BASE}/ipxe
  cd ${BASE}/ipxe/src/
fi


# Get current header and script from wraithproject repo
echo "Copy (overwrite) iPXE headers and scripts..."
cp ${WRAITHDIR}/src/ipxe/src/Makefile.housekeeping .
cp ${WRAITHDIR}/src/ipxe/src/ipxescript .
cp ${WRAITHDIR}/src/ipxe/src/ipxescript10sec .
cp ${WRAITHDIR}/src/ipxe/src/config/general.h config/
cp ${WRAITHDIR}/src/ipxe/src/config/settings.h config/
cp ${WRAITHDIR}/src/ipxe/src/config/console.h config/
# For BIOS builds, disable USB_HCD_USBIO as it's EFI-specific
sed -i 's+#define	USB_HCD_USBIO+//#define	USB_HCD_USBIO+g' config/usb.h

# Build the files
make -j$(nproc) EMBED=ipxescript bin/ipxe.iso bin/{undionly,ipxe,intel,realtek}.{,k,kk}pxe bin/ipxe.lkrn bin/ipxe.usb ${BUILDOPTS}
[[ $? -eq 0 ]] || exit 40

# Copy files to repo location as required
cp bin/ipxe.iso bin/{undionly,ipxe,intel,realtek}.{,k,kk}pxe bin/ipxe.lkrn bin/ipxe.usb ${WRAITHDIR}/packages/tftp/
cp bin/ipxe.lkrn ${WRAITHDIR}/packages/tftp/ipxe.krn

# Build with 10 second delay
make -j$(nproc) EMBED=ipxescript10sec bin/ipxe.iso bin/{undionly,ipxe,intel,realtek}.{,k,kk}pxe bin/ipxe.lkrn bin/ipxe.usb ${BUILDOPTS}
[[ $? -eq 0 ]] || exit 48

# Copy files to repo location as required
cp bin/ipxe.iso bin/{undionly,ipxe,intel,realtek}.{,k,kk}pxe bin/ipxe.lkrn bin/ipxe.usb ${WRAITHDIR}/packages/tftp/10secdelay/
cp bin/ipxe.lkrn ${WRAITHDIR}/packages/tftp/10secdelay/ipxe.krn

# Change to the efi layout
if [[ -d ${BASE}/ipxe-efi ]]; then
  cd ${BASE}/ipxe-efi/
  git clean -fd
  git reset --hard
  git pull
  cd src/
  # make sure this is being re-compiled in case the CA has changed!
  touch crypto/rootcert.c
else
  git clone ${IPXEGIT} ${BASE}/ipxe-efi
  cd ${BASE}/ipxe-efi/src/
fi

# Get current header and script from wraithproject repo
echo "Copy (overwrite) iPXE headers and scripts..."
cp ${WRAITHDIR}/src/ipxe/src-efi/Makefile.housekeeping .
cp ${WRAITHDIR}/src/ipxe/src-efi/ipxescript .
cp ${WRAITHDIR}/src/ipxe/src-efi/ipxescript10sec .
cp ${WRAITHDIR}/src/ipxe/src-efi/config/general.h config/
cp ${WRAITHDIR}/src/ipxe/src-efi/config/settings.h config/
cp ${WRAITHDIR}/src/ipxe/src-efi/config/console.h config/
# For EFI builds, enable USB_HCD_USBIO for keyboard support and disable conflicting USB_EFI
sed -i 's+//#define	USB_HCD_USBIO+#define	USB_HCD_USBIO+g' config/usb.h
sed -i 's+//#undef	USB_KEYBOARD+#define	USB_KEYBOARD+g' config/usb.h
sed -i 's+//#undef	USB_EFI+#undef	USB_EFI+g' config/usb.h

# Build the files
make -j$(nproc) EMBED=ipxescript bin-{i386,x86_64}-efi/{snp{,only},ipxe,intel,realtek}.efi ${BUILDOPTS}
[[ $? -eq 0 ]] || exit 80

# Apply USB configuration for ARM64 build
make -j$(nproc) CROSS_COMPILE=aarch64-linux-gnu- ARCH=arm64 EMBED=ipxescript bin-arm64-efi/{snp{,only},ipxe,intel,realtek}.efi ${BUILDOPTS}
[[ $? -eq 0 ]] || exit 82

# Copy the files to upload
cp bin-arm64-efi/{snp{,only},ipxe,intel,realtek}.efi ${WRAITHDIR}/packages/tftp/arm64-efi/
cp bin-i386-efi/{snp{,only},ipxe,intel,realtek}.efi ${WRAITHDIR}/packages/tftp/i386-efi/
cp bin-x86_64-efi/{snp{,only},ipxe,intel,realtek}.efi ${WRAITHDIR}/packages/tftp/

# Build with 10 second delay
make -j$(nproc) EMBED=ipxescript10sec bin-{i386,x86_64}-efi/{snp{,only},ipxe,intel,realtek}.efi ${BUILDOPTS}
[[ $? -eq 0 ]] || exit 91

make -j$(nproc) CROSS_COMPILE=aarch64-linux-gnu- ARCH=arm64 EMBED=ipxescript10sec bin-arm64-efi/{snp{,only},ipxe,intel,realtek}.efi ${BUILDOPTS}
[[ $? -eq 0 ]] || exit 93

# Copy the files to upload
cp bin-arm64-efi/{snp{,only},ipxe,intel,realtek}.efi ${WRAITHDIR}/packages/tftp/10secdelay/arm64-efi/
cp bin-i386-efi/{snp{,only},ipxe,intel,realtek}.efi ${WRAITHDIR}/packages/tftp/10secdelay/i386-efi/
cp bin-x86_64-efi/{snp{,only},ipxe,intel,realtek}.efi ${WRAITHDIR}/packages/tftp/10secdelay/
