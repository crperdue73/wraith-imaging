# WRAITH — Deployment System

## Introduction

WRAITH is a free, open-source network cloning / imaging / rescue suite — a fork of the FOG Project. WRAITH images **Windows 10 and Windows 11** and modern **Linux** distributions over PXE (PartClone + an iPXE boot menu), with a Web GUI. It includes memory and disk test, disk wipe, AV scan, and task scheduling.

> Legacy Windows XP / Vista / 7 / 8 support is inherited from upstream and is **unsupported** here.

## Install Stable

0. Install and update your chosen linux server

1. Download the file(s)

 - All that is needed to start installation is to download the files to perform the install. Choose one of the following methods you prefer;

 - **git** `git clone https://github.com/crperdue73/wraith-imaging.git wraith_stable/`

2. Go into the downloaded source/bin folder

 - `cd wraith_stable/bin`

3. Run the Install and follow all prompts accordingly

 - `sudo ./installwraith.sh`

4. Enjoy

## Install Development (`dev` branch)

0. Install and update your chosen linux server

1. Download the file(s)

 - All that is needed to start installation is to download the files to perform the install. Choose one of the following methods you prefer;

2. Go into the downloaded source/bin folder

 - ### Initial setup

 - **git** `git clone https://github.com/crperdue73/wraith-imaging.git trunk/; git checkout dev; cd trunk/bin/`

 - **Update setup**

 - **git** `cd trunk/; git pull; cd bin/`

3. Run the Install and follow all prompts accordingly

 - **Manual prompts** (NOTE: Recommended to run this if fresh install)

 - `sudo ./installwraith.sh`

 - **Auto-Accepted**

 - `sudo ./installwraith.sh -y`

4. Enjoy

All should now be installed and you can start configuring and registering systems. See https://github.com/crperdue73/wraith-imaging to assist you in setting up further.

There are many resources for assistance.

 - **Docs:** https://github.com/crperdue73/wraith-imaging (README, ROADMAP, CONTRIBUTING).
 - **Issues:** https://github.com/crperdue73/wraith-imaging/issues.

## Development

 Download the source with git and checkout the `dev` branch for the latest code or a more specific feature branch you would like to help work on.

 As you are running a development branch, please post bugs to:

 - A new issue on https://github.com/crperdue73/wraith-imaging/issues

 If you would like to create a pull request, please make the pull request into the `dev` branch.
