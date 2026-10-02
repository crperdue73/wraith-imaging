# WRAITH — Deployment System

## Introduction

WRAITH is a free, open-source network cloning / imaging / rescue / inventory
platform — a fork of the FOG Project. WRAITH images **Windows 10 and Windows 11**
and modern **Linux** distributions over PXE (iPXE boot menu + PartClone), with a
web GUI for inventory, task scheduling, disk wipe, memory/disk testing, and remote
OS and software deployment. Features are triggered from the web GUI once a client
machine has registered with WRAITH.

> **Legacy OS note:** Windows XP, Vista, 7, and 8/8.1 support is inherited from
> upstream FOG Project and is **legacy / untested** here. It is not a supported
> target for WRAITH.

## Upstream & Attribution

WRAITH is a fork of the [FOG Project](https://github.com/FOGProject/fogproject) —
an open-source cloning/imaging suite by Chuck Syperski, Jian Zhang, and the
FOG Project contributors.

| | |
|---|---|
| **License** | GNU General Public License v3.0 — see [LICENSE](LICENSE) |
| **Upstream** | FOG Project — https://github.com/FOGProject/fogproject |
| **Baseline** | FOG Project `stable` 1.5.10.1903 |
| **Fork point** | 2026-07-26 |
| **Changes** | this repository contains modified files; see [NOTICE](NOTICE) |

WRAITH is not affiliated with or endorsed by the FOG Project. "FOG" and
"FOG Project" are the marks of their authors and are used here solely to satisfy
the attribution requirements of the GPL. The rebrand keeps the WRAITH *product
surface* free of upstream branding; it does **not** erase upstream credit — that
credit is a license obligation, not a cosmetic one.

## Versioning and branches

WRAITH follows semantic versioning with adjustments to fit the development lifecycle. From **1.6.0.0** WRAITH tracks its **own** version line, independent of upstream; the FOG Project baseline each release is built from is recorded in [UPSTREAM_VERSION](UPSTREAM_VERSION) and exposed as `WRAITH_UPSTREAM_BASELINE`. Release automation is planned for the WRAITH fork repository (see [ROADMAP.md](ROADMAP.md)).

* The default branch of `stable` will always have the latest patch release, for most users this is where you want to install from.
* The `master` branch has the baseline of the latest Minor release. You should not typically install from here as it won't include security patches released since the baseline was set.
* `dev-branch` is where the latest patch release changes are staged and tested. You can install from dev-branch to help test bug-fixes, security-fixes, and minor feature enhancements on a more frequent cadence.
* `working-*` and `feature-named` branches are where work on the next Major or Minor release take place. They can be used to install and test the current beta version or specific working features.

This gives us a Production, Staging, and Dev branches to follow standard devops practices.

| Dev Cycle Stage  | Branches                                                                                                              | Version Property Associated |
|------------------|-----------------------------------------------------------------------------------------------------------------------| ----------------------------|
| Production       | stable, master                                                                                                        | Minor and Patch
| Staging          | dev-branch                                                                                                            | Patch
| Dev              | working-*, {feature-name}                                                                                             | Major, Minor


### Version Format

Our versions are formatted in a x.x.x.x format like so:

`{CodeBaseMajor}.{Major}.{Minor}.{Patch}`

| Version Property | Description                                                                                                           | Example |
|------------------|-----------------------------------------------------------------------------------------------------------------------|-----------|
| CodeBaseMajor    | Major code baseline changes and API breaking changes, requires formal release                                         | 1.x.x.x   |
| Major            | Major feature additions and UI changes, potential breaking changes within the same code base, requires formal release | 1.5.x.x   |
| Minor            | Non-breaking major feature enhancements, requires formal release                                                      | 1.5.10.x  |
| Patch            | On-going Bug and security fixes and feature enhancements, automated releases                                          | 1.5.10.41 |


## Install stable version

0. Install and update your linux server distro

1. Download the installation file(s)

* All that is needed to start installation is to download the files to perform the install. Choose one of the following methods you prefer;

  * **ZIP archive** `wget https://github.com/crperdue73/wraith-imaging/archive/stable.zip; unzip stable.zip`

  * **TAR/GZ archive** `wget https://github.com/crperdue73/wraith-imaging/archive/stable.tar.gz; tar xzf stable.tar.gz`

  * **git** `git clone https://github.com/crperdue73/wraith-imaging.git wraith-imaging-stable`

2. Run the install script **as root** and follow all prompts accordingly

```
sudo -i
cd /path/to/wraith-imaging-stable/bin
./installwraith.sh
```

3. You should now be ready to use WRAITH

## Install latest development version

0. Install and update your linux server distro

1. Download the installation file(s)

* All that is needed to start the installation is to download the files to perform the install. Choose one of the following methods you prefer;

  * **git** `git clone https://github.com/crperdue73/wraith-imaging.git wraith-imaging-dev-branch; cd wraith-imaging-dev-branch; git checkout dev-branch` (**recommended if you want to keep up with current developments!**

  * **ZIP archive** `wget https://github.com/crperdue73/wraith-imaging/archive/dev-branch.zip; unzip dev-branch.zip`

  * **TAR/GZ archive** `wget https://github.com/crperdue73/wraith-imaging/archive/dev-branch.tar.gz; tar xzf dev-branch.tar.gz`

2. Run the install script **as root** and follow all prompts accordingly

```
sudo -i
cd /path/to/wraith-imaging-dev-branch/bin
./installwraith.sh
```
3. You should now be ready to use WRAITH

All should now be installed and you can start configuring and registering systems. See the documentation at https://docs.wraithproject.org to assist you in setting up further.

There are many resources for assistance.

 - **Docs:** https://docs.wraithproject.org — installation and administration guides.
 - **Forum:** https://forums.wraithproject.org — general help and bug reports.
 - **Source:** https://github.com/crperdue73/wraith-imaging — the WRAITH fork.
 - **Attribution:** see [NOTICE](NOTICE) and [UPSTREAM_VERSION](UPSTREAM_VERSION).

> ⚠️ **Link status:** the documentation site, forum, and public Git organization
> are still being finalized. If a link above does not resolve, treat the in-repo
> files as canonical. (Tracked in [ROADMAP.md](ROADMAP.md), decision D1.)

## Development

 Download the source with git and checkout the branch `dev-branch` for the latest code or a more specific feature branch you would like to help work on.

 For further details please check out the [information on contributing to the project](CONTRIBUTING.md).
