#!/usr/bin/python
import docker 
import sys

def runContainerById(name,ip):
	client=docker.from_env()
	container=client.containers.run(name,detach=True,privileged=True)
	myNet=client.networks.get('8cc234f12ebe')
	# myNet=client.networks.get('0f5d5c3445a2')
	myNet.connect(container.short_id,ipv4_address=ip)
	id2=container.short_id
	print(id2)
	

if __name__ == '__main__':
	runContainerById(sys.argv[1],sys.argv[2])
	
	