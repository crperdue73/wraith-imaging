all:
	@echo This make file is for developers.
	@echo run \"make update-web\" to copy the web sources to /var/www/wraith/...
	@echo run \"make update-services\" to copy the services sources to /opt/wraith/service/...


update-web:
	bin/update_web.bash .. /var/www/wraith
	service apache2 restart
	service WRAITHImageReplicator restart
	service WRAITHMulticastManager restart
	service WRAITHScheduler restart
	service WRAITHSnapinReplicator restart

update-services:
	bin/update_services.bash .. /opt/wraith/service
	service apache2 restart
	service WRAITHImageReplicator restart
	service WRAITHMulticastManager restart
	service WRAITHScheduler restart
	service WRAITHSnapinReplicator restart


