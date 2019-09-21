#!/usr/bin/python

import docker 
import sys
def runContainerById(name,ip):
	client=docker.from_env()
	container=client.containers.run(name,detach=True,privileged=True)
	myNet=client.networks.get('a1112065b8df') 
	myNet.connect(container.short_id,ipv4_address=ip)
	id2=container.short_id
	print(id2)
	

if __name__ == '__main__':
	runContainerById(sys.argv[1],sys.argv[2])
       #runContainerById('92f7bf669a99','172.19.0.20');
	
	
