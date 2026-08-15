<?php
/**
 * This is a starter file. It's purpose, in my eyes, is to contain
 * all the text within wraith that needs to be translated for other
 * languages. The idea is to make the translations needed all
 * in one file. You just call the variable and array you need.
 * The other idea of this is to make one location for multiple
 * calls. For example, Host updated and Printer updated would
 * only need to be called as %s updated. The word updated, could
 * then be translated just the one time for all the languages.
 * Then the element Host or Printer could be translated later.
 *
 * PHP version 5
 *
 * @category Redirect
 * @package  WRAITHProject
 * @author   Tom Elliott <tommygunsster@gmail.com>
 * @license  http://opensource.org/licenses/gpl-3.0 GPLv3
 * @link     https://wraithproject.org
 */
//Singular, status words to translate.
$wraithlang['Display'] = _('Display');
$wraithlang['Auto'] = _('Auto');
$wraithlang['Model'] = _('Model');
$wraithlang['Inventory'] = _('Inventory');
$wraithlang['OS'] = _('O/S');
$wraithlang['Edit'] = _('Edit');
$wraithlang['Delete'] = _('Delete');
$wraithlang['Deleted'] = _('Deleted');
$wraithlang['All'] = _('All');
$wraithlang['Add'] = _('Add');
$wraithlang['Search'] = _('Search');
$wraithlang['Storage'] = _('Storage');
$wraithlang['Snapin'] = _('Snapin');
$wraithlang['Snapins'] = _('Snapins');
$wraithlang['Remove'] = _('Remove');
$wraithlang['Removed'] = _('Removed');
$wraithlang['Enabled'] = _('Enabled');
$wraithlang['Management'] = _('Management');
$wraithlang['Update'] = _('Update');
$wraithlang['Image'] = _('Image');
$wraithlang['Images'] = _('Images');
$wraithlang['Node'] = _('Node');
$wraithlang['Group'] = _('Group');
$wraithlang['Groups'] = _('Groups');
$wraithlang['Logout'] = _('Logout');
$wraithlang['Host'] = _('Host');
$wraithlang['Hosts'] = _('Hosts');
$wraithlang['Bandwidth'] = _('Bandwidth');
$wraithlang['BandwidthReplication'] = _('Replication Bandwidth');
$wraithlang['BandwidthRepHelp'] = sprintf(
    '%s. %s %s. %s %s %s, %s.',
    _('This setting limits the bandwidth for replication between nodes'),
    _('It operates by getting the max bandwidth setting of the node'),
    _('it\'s transmitting to'),
    _('So if you are trying to transmit to remote node A'),
    _('and node A only has a 5Mbps and you want the speed'),
    _('limited to 1Mbps on that node'),
    _('you set the bandwidth field on that node to 1000')
);
$wraithlang['Transmit'] = _('Transmit');
$wraithlang['Receive'] = _('Receive');
$wraithlang['New'] = _('New');
$wraithlang['User'] = _('User');
$wraithlang['Users'] = _('Users');
$wraithlang['Name'] = _('Name');
$wraithlang['Members'] = _('Members');
$wraithlang['Advanced'] = _('Advanced');
$wraithlang['Hostname'] = _('Hostname');
$wraithlang['IP'] = _('IP');
$wraithlang['MAC'] = _('MAC');
$wraithlang['Version'] = _('Version');
$wraithlang['Text'] = _('Text');
$wraithlang['Graphical'] = _('Graphical');
$wraithlang['File'] = _('File');
$wraithlang['Path'] = _('Path');
$wraithlang['Shutdown'] = _('Shutdown');
$wraithlang['Reboot'] = _('Reboot');
$wraithlang['Time'] = _('Time');
$wraithlang['Action'] = _('Action');
$wraithlang['Printer'] = _('Printer');
$wraithlang['PowerManagement'] = _('Power Management');
$wraithlang['Client'] = _('Client');
$wraithlang['Task'] = _('Task');
$wraithlang['Username'] = _('Username');
$wraithlang['Service'] = _('Service');
$wraithlang['General'] = _('General');
$wraithlang['Mode'] = _('Mode');
$wraithlang['Date'] = _('Date');
$wraithlang['Clear'] = _('Clear');
$wraithlang['Desc'] = _('Description');
$wraithlang['Here'] = _('here');
$wraithlang['NOT'] = _('NOT');
$wraithlang['or'] = _('or');
$wraithlang['Row'] = _('Row');
$wraithlang['Errors'] = _('Errors');
$wraithlang['Error'] = _('Error');
$wraithlang['Export'] = _('Export');
$wraithlang['Schedule'] = _('Schedule');
$wraithlang['Deploy'] = _('Deploy');
$wraithlang['Capture'] = _('Capture');
$wraithlang['Multicast'] = _('Multicast');
$wraithlang['Status'] = _('Status');
$wraithlang['Actions'] = _('Actions');
$wraithlang['Hosts'] = _('Hosts');
$wraithlang['State'] = _('State');
$wraithlang['Kill'] = _('Kill');
$wraithlang['Kernel'] = _('Kernel');
$wraithlang['Location'] = _('Location');
$wraithlang['N/A'] = _('N/A');
$wraithlang['Home'] = _('Home');
$wraithlang['Report'] = _('Report');
$wraithlang['Reports'] = _('Reports');
$wraithlang['Login'] = _('Login');
$wraithlang['Queued'] = _('Queued');
$wraithlang['Complete'] = _('Complete');
$wraithlang['Unknown'] = _('Unknown');
$wraithlang['Force'] = _('Force');
$wraithlang['Type'] = _('Type');
$wraithlang['Settings'] = _('Settings');
$wraithlang['WRAITH'] = _('WRAITH');
$wraithlang['Active'] = _('Active');
$wraithlang['Printers'] = _('Printers');
$wraithlang['Directory'] = _('Directory');
$wraithlang['AD'] = _('Active Directory');
$wraithlang['VirusHistory'] = _('Virus History');
$wraithlang['LoginHistory'] = _('Login History');
$wraithlang['ImageHistory'] = _('Image History');
$wraithlang['SnapinHistory'] = _('Snapin History');
$wraithlang['Configuration'] = _('Configuration');
$wraithlang['Plugin'] = _('Plugin');
$wraithlang['Locations'] = _('Locations');
$wraithlang['Location'] = _('Location');
$wraithlang['License'] = _('License');
$wraithlang['KernelUpdate'] = _('Kernel Update');
$wraithlang['InitrdUpdate'] = _('Initrd Update');
$wraithlang['PXEBootMenu'] = _('iPXE General Configuration');
$wraithlang['ClientUpdater'] = _('Client Updater');
$wraithlang['HostnameChanger'] = _('Hostname Changer');
$wraithlang['HostRegistration'] = _('Host Registration');
$wraithlang['SnapinClient'] = _('Snapin Client');
$wraithlang['TaskReboot'] = _('Task Reboot');
$wraithlang['UserCleanup'] = _('User Cleanup');
$wraithlang['UserTracker'] = _('User Tracker');
$wraithlang['SelManager'] = _('%s Manager');
$wraithlang['GreenWRAITH'] = _('Green WRAITH');
$wraithlang['DirectoryCleaner'] = _('Directory Cleaner');
$wraithlang['MACAddrList'] = _('MAC Address List');
$wraithlang['WRAITHSettings'] = _('WRAITH Settings');
$wraithlang['ServerShell'] = _('Server Shell');
$wraithlang['LogViewer'] = _('Log Viewer');
$wraithlang['ConfigSave'] = _('Configuration Save');
$wraithlang['WRAITHSFPage'] = _('WRAITH Sourceforge Page');
$wraithlang['WRAITHWebPage'] = _('WRAITH Home Page');
$wraithlang['NewSearch'] = _('New Search');
$wraithlang['ListAll'] = _('List All %s');
$wraithlang['CreateNew'] = _('Create New %s');
$wraithlang['Tasks'] = _('Tasks');
$wraithlang['ClientSettings'] = _('Client Settings');
$wraithlang['Plugins'] = _('Plugins');
$wraithlang['BasicTasks'] = _('Basic Tasks');
$wraithlang['Membership'] = _('Membership');
$wraithlang['ImageAssoc'] = _('Image Association');
$wraithlang['SelMenu'] = _('%s Menu');
$wraithlang['PrimaryGroup'] = _('Primary Group');
$wraithlang['AllSN'] = _('All Storage Nodes');
$wraithlang['AddSN'] = _('Add Storage Node');
$wraithlang['AllSG'] = _('All Storage Groups');
$wraithlang['AddSG'] = _('Add Storage Group');
$wraithlang['ActiveTasks'] = _('Active Tasks');
$wraithlang['ActiveMCTasks'] = _('Active Multicast Tasks');
$wraithlang['ActiveSnapins'] = _('Active Snapin Tasks');
$wraithlang['ScheduledTasks'] = _('Scheduled Tasks');
$wraithlang['InstalledPlugins'] = _('Installed Plugins');
$wraithlang['InstallPlugins'] = _('Install Plugins');
$wraithlang['ActivatePlugins'] = _('Activate Plugins');
$wraithlang['ExportConfig'] = _('Export Configuration');
$wraithlang['ImportConfig'] = _('Import Configuration');
$wraithlang['Slogan'] = _('Enterprise Device Imaging & Deployment Platform');
$wraithlang['InvalidMAC'] = _('Invalid MAC Address!');
$wraithlang['PXEConfiguration'] = _('iPXE Menu Item Settings');
$wraithlang['PXEMenuCustomization'] = _('iPXE Menu Customization');
$wraithlang['NewMenu'] = _('iPXE New Menu Entry');
$wraithlang['Submit'] = _('Save Changes');
$wraithlang['RequiredDB'] = _('Required database field is empty');
$wraithlang['NoResults'] = _('No results found');
$wraithlang['isRequired'] = _('%s is required');
// Page Names
$wraithlang['Host Management'] = _('Host Management');
$wraithlang['Storage Management'] = _('Storage Management');
$wraithlang['Task Management'] = _('Task Management');
$wraithlang['Client Management'] = _('Client Management');
$wraithlang['Dashboard'] = _('Dashboard');
$wraithlang['Service Configuration'] = _('Service Configuration');
$wraithlang['Report Management'] = _('Report Management');
$wraithlang['Printer Management'] = _('Printer Management');
$wraithlang['WRAITH Configuration'] = _('WRAITH Configuration');
$wraithlang['Group Management'] = _('Group Management');
$wraithlang['Image Management'] = _('Image Management');
$wraithlang['User Management'] = _('User Management');
$wraithlang['Hardware Information'] = _('Hardware Information');
$wraithlang['Snapin Management'] = _('Snapin Management');
$wraithlang['Plugin Management'] = _('Plugin Management');
$wraithlang['Location Management'] = _('Location Management');
$wraithlang['Access Management'] = _('Access Control Management');
// Help page translations
$wraithlang['GenHelp'] = _('WRAITH General Help');
// Sub Menu translates
$wraithlang['PendingHosts'] = _('Pending Hosts');
$wraithlang['LastDeployed'] = _('Last Deployed');
$wraithlang['LastCaptured'] = _('Last Captured');
$wraithlang['DeployMethod'] = _('Deploy Method');
$wraithlang['ImageType'] = _('Image Type');
$wraithlang['NoAvail'] = _('Not Available');
$wraithlang['ExportHost'] = _('Export Hosts');
$wraithlang['ImportHost'] = _('Import Hosts');
$wraithlang['ExportUser'] = _('Export Users');
$wraithlang['ImportUser'] = _('Import Users');
$wraithlang['ExportImage'] = _('Export Images');
$wraithlang['ImportImage'] = _('Import Images');
$wraithlang['ExportGroup'] = _('Export Groups');
$wraithlang['ImportGroup'] = _('Import Groups');
$wraithlang['ExportSnapin'] = _('Export Snapins');
$wraithlang['ImportSnapin'] = _('Import Snapins');
$wraithlang['ExportPrinter'] = _('Export Printers');
$wraithlang['ImportPrinter'] = _('Import Printers');
$wraithlang['EquipLoan'] = _('Equipment Loan');
$wraithlang['HostList'] = _('Host List');
$wraithlang['ImageLog'] = _('Imaging Log');
$wraithlang['PendingMACs'] = _('Pending MACs');
$wraithlang['SnapinLog'] = _('Snapin Log');
$wraithlang['UploadRprts'] = _('Upload Reports');
// WRAITH Sub Menu translates
$wraithlang['MainMenu'] = _('Main Menu');
// ProcessLogin
$wraithlang['InvalidLogin'] = _('Invalid Login');
$wraithlang['NotAllowedHere'] = _('Not allowed here');
$wraithlang['ManagementLogin'] = _('Management Login');
$wraithlang['Password'] = _('Password');
$wraithlang['WRAITHSites'] = _('Estimated WRAITH Sites');
$wraithlang['LatestVer'] = _('Latest Version');
$wraithlang['LatestDevVer'] = _('Latest Development Version');
// Image class Translates
$wraithlang['ProtectedImage'] = _('Image is protected and cannot be deleted');
$wraithlang['ProtectedSnapin'] = _('Snapin is protected and cannot be deleted');
$wraithlang['NoMasterNode'] = _('No master nodes are enabled to delete this image');
$wraithlang['FailedDeleteImage'] = _('Failed to delete image files');
$wraithlang['FailedDelete'] = _('Failed to delete file');
// PXEMenu Translates
$wraithlang['NotRegHost'] = _('Not Registered Hosts');
$wraithlang['RegHost'] = _('Registered Hosts');
$wraithlang['AllHosts'] = _('All Hosts');
$wraithlang['DebugOpts'] = _('Debug Options');
$wraithlang['AdvancedOpts'] = _('Advanced Options');
$wraithlang['AdvancedLogOpts'] = _('Advanced Login Required');
$wraithlang['PendRegHost'] = _('Pending Registered Hosts');
// WRAITHCore Translates
$wraithlang['n/a'] = _('n/a');
// Service Translates
$wraithlang['DirExists'] = _('Directory Already Exists');
$wraithlang['TimeExists'] = _('Time Already Exists');
$wraithlang['UserExists'] = _('User Already Exists');
// Host class translates
$wraithlang['NoActSnapJobs'] = _('No Active Snapin Jobs Found For Host');
$wraithlang['FailedTask'] = _('Failed to create task');
$wraithlang['InTask'] = _('Host is already a member of an active task');
$wraithlang['HostNotValid'] = _('Host is not valid');
$wraithlang['GroupNotValid'] = _('Group is not valid');
$wraithlang['TaskTypeNotValid'] = _('Task Type is not valid');
$wraithlang['ImageNotValid'] = _('Image is not valid');
$wraithlang['ImageGroupNotValid'] = _('The image storage group assigned is not valid');
$wraithlang['SnapNoAssoc'] = _('There are no snapins associated with this host');
$wraithlang['SnapDeploy'] = _('Snapins Are already deployed to this host');
$wraithlang['NoFoundSG'] = sprintf(
    '%s %s.',
    _('Could not find a Storage Node is'),
    _('there one enabled within this Storage Group')
);
$wraithlang['SGNotValid'] = sprintf(
    '%s',
    _('The storage groups associated storage node is not valid')
);
$wraithlang['InPast'] = _('Scheduled date is in the past');
$wraithlang['TaskSchExists'] = sprintf(
    '%s',
    _('A task already exists for this host at the scheduled tasking')
);
$wraithlang['MinNotValid'] = _('Minute value is not valid');
$wraithlang['HourNotValid'] = _('Hour value is not valid');
$wraithlang['DOMNotValid'] = _('Day of month value is not valid');
$wraithlang['MonthNotValid'] = _('Month value is not valid');
$wraithlang['DOWNotValid'] = _('Day of week value is not valid');
// MAC Address class translates
$wraithlang['NoHostFound'] = _('No Host found for MAC Address');
// ManagerController class translates
$wraithlang['PleaseSelect'] = _('Please select an option');
// HostManager Class translates
$wraithlang['ErrorMultipleHosts'] = sprintf(
    '%s',
    _('Error multiple hosts returned for list of mac addresses')
);
// User class translates
$wraithlang['SessionTimeout'] = _('Session timeout');
// Storage Page translates
$wraithlang['SN'] = _('Storage Node');
$wraithlang['SG'] = _('Storage Group');
$wraithlang['GraphEnabled'] = _('Graph Enabled');
$wraithlang['MasterNode'] = _('Master Node');
$wraithlang['IsMasterNode'] = _('Is Master Node');
$wraithlang['SNName'] = _('Storage Node Name');
$wraithlang['SNDesc'] = _('Storage Node Description');
$wraithlang['IPAdr'] = _('IP Address');
$wraithlang['MaxClients'] = _('Max Clients');
$wraithlang['ImagePath'] = _('Image Path');
$wraithlang['FTPPath'] = _('FTP Path');
$wraithlang['SnapinPath'] = _('Snapin Path');
$wraithlang['SSLPath'] = _('SSL Path');
$wraithlang['Interface'] = _('Interface');
$wraithlang['IsEnabled'] = _('Is Enabled');
$wraithlang['IsGraphEnabled'] = _('Is Graph Enabled');
$wraithlang['OnDash'] = _('On Dashboard');
$wraithlang['ManUser'] = _('Management Username');
$wraithlang['ManPass'] = _('Management Password');
$wraithlang['CautionPhrase'] = sprintf(
    '%s! %s, %s %s %s. %s %s. %s, %s, %s, %s, %s, %s.',
    _('Use extreme caution with this setting'),
    _('This setting'),
    _('if used incorrectly could potentially'),
    _('wipe out all of your images stored on'),
    _('all current storage nodes'),
    _('The \'Is Master Node\' setting defines which'),
    _('node is the distributor of the images'),
    _('If you add a blank node'),
    _('meaning a node that has no images on it'),
    _('and set it to master'),
    _('it will distribute its store'),
    _('which is empty'),
    _('to all nodes in the group')
);
$wraithlang['StorageNameRequired'] = sprintf(
    $wraithlang['isRequired'],
    _('Storage Node Name')
);
$wraithlang['StorageNameExists'] = _('Storage Node already exists');
$wraithlang['StorageIPRequired'] = sprintf(
    $wraithlang['isRequired'],
    _('Storage Node IP')
);
$wraithlang['StorageClientsRequired'] = sprintf(
    $wraithlang['isRequired'],
    _('Storage Node Max Clients')
);
$wraithlang['StorageIntRequired'] = sprintf(
    $wraithlang['isRequired'],
    _('Storage Node Interface')
);
$wraithlang['StorageUserRequired'] = sprintf(
    $wraithlang['isRequired'],
    _('Storage Node Username')
);
$wraithlang['StoragePassRequired'] = sprintf(
    $wraithlang['isRequired'],
    _('Storage Node Password')
);
$wraithlang['SNCreated'] = _('Storage Node Created');
$wraithlang['SNUpdated'] = _('Storage Node Updated');
$wraithlang['DBupfailed'] = _('Database Update Failed');
$wraithlang['ConfirmDel'] = _('Please confirm you want to delete');
$wraithlang['FailDelSN'] = _('Failed to destroy Storage Node');
$wraithlang['SNDelSuccess'] = _('Storage Node deleted');
$wraithlang['SGName'] = _('Storage Group Name');
$wraithlang['SGDesc'] = _('Storage Group Description');
$wraithlang['SGNameReq'] = sprintf(
    $wraithlang['isRequired'],
    $wraithlang['SGName']
);
$wraithlang['SGExist'] = _('Storage Group Already Exists');
$wraithlang['SGCreated'] = _('Storage Group Created');
$wraithlang['SGUpdated'] = _('Storage Group Updated');
$wraithlang['OneSG'] = _('You must have at least one Storage Group');
$wraithlang['SGDelSuccess'] = _('Storage Group deleted');
$wraithlang['FailDelSG'] = _('Failed to destroy Storage Group');
$wraithlang['InvalidClass'] = _('Invalid Class');
$wraithlang['NotExtended'] = _('Class is not extended from WRAITHPage');
$wraithlang['DoNotList'] = _('Do not list on menu');
// Language menu options.
$wraithlang['LanguagePhrase'] = _('Language');
$wraithlangt['Language']['zh'] = '中文';
$wraithlangt['Language']['en'] = 'English';
$wraithlangt['Language']['es'] = 'Español';
$wraithlangt['Language']['fr'] = 'Français';
$wraithlangt['Language']['de'] = 'Deutsch';
$wraithlangt['Language']['it'] = 'Italiano';
$wraithlangt['Language']['pt'] = 'Português';
